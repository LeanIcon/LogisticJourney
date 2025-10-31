<?php

declare(strict_types=1);

namespace Modules\Blocks\Filament\Actions;

use Filament\Actions\Action;
use Filament\Forms\Components\CodeEditor;
use Filament\Forms\Components\Select;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Process;
use Illuminate\Support\Facades\Storage;
use Modules\Blocks\Facades\Blocks;
use ReflectionClass;
use Throwable;

final class EditBlockClassAction extends Action
{
    protected function setUp(): void
    {
        parent::setUp();

        $blocks = Blocks::all(); // name => class
        $options = collect($blocks)->mapWithKeys(fn ($class, $name) => [$name => $name])->toArray();

        $this->label('Edit Block Class')
            ->modalWidth('6xl')
            ->schemas([
                Select::make('block')
                    ->label('Block')
                    ->options($options)
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(function ($state, $set) {
                        // When the selected block changes, try to load its source file
                        try {
                            $class = Blocks::all()[$state] ?? null;
                            if ($class && class_exists($class)) {
                                $ref = new ReflectionClass($class);
                                $path = $ref->getFileName();
                                if ($path && file_exists($path)) {
                                    $source = file_get_contents($path);
                                    $set('source', $source);
                                }
                            }
                        } catch (Throwable $e) {
                            // ignore
                        }
                    }),

                CodeEditor::make('source')
                    ->label('Class Source')
                    ->fileEditor()
                    ->minHeight(400)
                    ->reactive()
                    ->lazy(),
            ])
            ->action(function (array $data): void {
                $blockName = $data['block'];

                $class = Blocks::all()[$blockName] ?? null;

                if (! $class || ! class_exists($class)) {
                    Notification::make()
                        ->title('Block class not found')
                        ->danger()
                        ->send();

                    return;
                }

                $ref = new ReflectionClass($class);
                $path = $ref->getFileName();

                if (! $path || ! is_writable($path)) {
                    Notification::make()
                        ->title('File not writable')
                        ->danger()
                        ->send();

                    return;
                }

                $source = $data['source'] ?? null;
                if ($source === null) {
                    Notification::make()
                        ->title('No source provided')
                        ->danger()
                        ->send();

                    return;
                }

                // Check PHP syntax before saving using Storage
                $tempFilename = 'block_lint_'.bin2hex(random_bytes(8)).'.php';
                Storage::disk('local')->put($tempFilename, $source);
                $tempFilePath = Storage::disk('local')->path($tempFilename);

                $result = Process::run(['php', '-l', $tempFilePath]);
                Storage::disk('local')->delete($tempFilename); // Clean up temp file

                if ($result->failed()) {
                    $error = $result->errorOutput() ?: $result->output();
                    Notification::make()
                        ->title('PHP Syntax Error')
                        ->body($error)
                        ->danger()
                        ->send();

                    return;
                }

                // Backup current file
                $backupDir = storage_path('app/blocks_backups');
                if (! is_dir($backupDir)) {
                    mkdir($backupDir, 0755, true);
                }

                $timestamp = now()->format('Ymd_His');
                $backupPath = $backupDir.'/'.str_replace('\\', '_', $class).'_'.$timestamp.'.php';
                copy($path, $backupPath);

                // Write new contents
                file_put_contents($path, $source);

                // Cleanup backups older than 7 days (unless archived)
                $files = glob($backupDir.'/*.php');
                $cutoff = now()->subDays(7)->timestamp;
                foreach ($files as $f) {
                    // archived files are named with .archived.php suffix if admin archived
                    if (str_ends_with($f, '.archived.php')) {
                        continue;
                    }

                    if (filemtime($f) < $cutoff) {
                        @unlink($f);
                    }
                }

                Notification::make()
                    ->title('Block class saved')
                    ->success()
                    ->send();
            })
            ->mountUsing(function ($action) {
                // Pre-fill the CodeEditor with the first block's source (best-effort)
                $blocks = Blocks::all();
                if (empty($blocks)) {
                    return;
                }

                $firstName = array_key_first($blocks);
                $class = $blocks[$firstName] ?? null;
                if ($class && class_exists($class)) {
                    try {
                        $ref = new ReflectionClass($class);
                        $path = $ref->getFileName();
                        if ($path && file_exists($path)) {
                            $source = file_get_contents($path);
                            $action->form->fill(['block' => $firstName, 'source' => $source]);
                        }
                    } catch (Throwable $e) {
                        // ignore
                    }
                }
            });
    }

    public static function getDefaultName(): ?string
    {
        return 'editBlockClass';
    }
}
