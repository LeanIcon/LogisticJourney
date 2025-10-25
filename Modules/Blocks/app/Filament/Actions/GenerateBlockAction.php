<?php

namespace Modules\Blocks\Filament\Actions;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Closure;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;

class GenerateBlockAction extends Action
{
    public static function getDefaultName(): ?string
    {
        return 'generateBlock';
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->label('Generate Block')
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->placeholder('MyAwesomeBlock')
                    ->helperText('The name of the block class (without Block suffix)')
                    ->live()
                    ->afterStateUpdated(function (string $state, Closure $set) {
                        // Always update the class name
                            $set('class_name', Str::studly($state) . 'Block');
                    }),

                TextInput::make('class_name')
                    ->required()
                    ->placeholder('MyAwesomeBlock')
                    ->helperText('The full class name including Block suffix'),

                Select::make('module')
                    ->required()
                    ->options(function () {
                        $modules = array_map(function ($path) {
                            return basename($path);
                        }, glob(base_path('Modules/*')));

                        return array_combine($modules, $modules);
                    })
                    ->default('Blocks'),

                TextInput::make('view')
                    ->placeholder('blocks.my-awesome-block')
                    ->helperText('Optional view name (without .blade.php)'),
            ])
            ->action(function (array $data): void {
                $name = $data['class_name'];
                $module = $data['module'];
                $view = $data['view'] ?? null;

                $command = "make:block {$name} --module={$module}";
                if ($view) {
                    $command .= " --view={$view}";
                }

                Artisan::call($command);

                Notification::make()
                    ->title('Block generated successfully')
                    ->success()
                    ->send();
            })
            ->icon('heroicon-o-code-bracket')
            ->modalWidth('md')
            ->modalHeading('Generate New Block')
            ->modalDescription('Create a new block class with optional view file.');
    }
}
