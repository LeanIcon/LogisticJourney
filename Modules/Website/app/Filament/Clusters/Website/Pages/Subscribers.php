<?php

declare(strict_types=1);

namespace Modules\Website\Filament\Clusters\Website\Pages;

use BackedEnum;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkAction;
use Filament\Actions\DeleteAction;
use Filament\Forms\Components\DatePicker;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Support\Enums\IconPosition;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Modules\Website\Filament\Clusters\Website\WebsiteCluster;
use Modules\Website\Models\Subscriber;
use UnitEnum;

final class Subscribers extends Page implements HasTable
{
    use InteractsWithTable;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-users';

    protected static string|UnitEnum|null $navigationGroup = 'Website Management';

    protected static ?string $title = 'Subscribers';

    protected static ?string $navigationLabel = 'Subscribers';

    protected static bool $shouldRegisterNavigation = false;

    public function table(Table $table): Table
    {
        return $table
            ->query(Subscriber::query())
            ->columns([
                TextColumn::make('email')
                    ->searchable()
                    ->sortable()
                    ->copyable()
                    ->icon('heroicon-m-envelope')
                    ->iconPosition(IconPosition::Before),

                TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->placeholder('—'),

                IconColumn::make('is_verified')
                    ->label('Verified')
                    ->boolean()
                    ->sortable(),

                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'active' => 'success',
                        'unsubscribed' => 'danger',
                        'pending' => 'warning',
                        default => 'gray',
                    })
                    ->sortable(),

                TextColumn::make('subscribed_at')
                    ->label('Subscribed')
                    ->dateTime('M j, Y')
                    ->sortable()
                    ->placeholder('—'),

                TextColumn::make('verified_at')
                    ->label('Verified')
                    ->dateTime('M j, Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->placeholder('—'),

                TextColumn::make('unsubscribed_at')
                    ->label('Unsubscribed')
                    ->dateTime('M j, Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->placeholder('—'),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'active' => 'Active',
                        'pending' => 'Pending',
                        'unsubscribed' => 'Unsubscribed',
                    ])
                    ->default('active'),

                SelectFilter::make('is_verified')
                    ->label('Verification Status')
                    ->options([
                        '1' => 'Verified',
                        '0' => 'Not Verified',
                    ]),

                Filter::make('subscribed_at')
                    ->schema([
                        DatePicker::make('from')
                            ->label('Subscribed From'),
                        DatePicker::make('until')
                            ->label('Subscribed Until'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('subscribed_at', '>=', $date),
                            )
                            ->when(
                                $data['until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('subscribed_at', '<=', $date),
                            );
                    }),
            ])
            ->recordActions([
                Action::make('verify')
                    ->icon('heroicon-m-check-badge')
                    ->color('success')
                    ->visible(fn (Subscriber $record) => ! $record->is_verified)
                    ->requiresConfirmation()
                    ->action(function (Subscriber $record) {
                        $record->update([
                            'is_verified' => true,
                            'verified_at' => now(),
                        ]);

                        Notification::make()
                            ->success()
                            ->title('Subscriber verified')
                            ->send();
                    }),

                DeleteAction::make(),
            ])
            ->toolbarActions([
                ActionGroup::make([
                    BulkAction::make('verifySelected')
                        ->label('Verify Selected')
                        ->icon('heroicon-m-check-badge')
                        ->color('success')
                        ->requiresConfirmation()
                        ->action(function (Collection $records) {
                            $records->each(function (Subscriber $subscriber) {
                                $subscriber->update([
                                    'is_verified' => true,
                                    'verified_at' => now(),
                                ]);
                            });

                            Notification::make()
                                ->success()
                                ->title('Subscribers verified')
                                ->send();
                        }),

                    BulkAction::make('unsubscribeSelected')
                        ->label('Unsubscribe Selected')
                        ->icon('heroicon-m-x-circle')
                        ->color('danger')
                        ->requiresConfirmation()
                        ->action(function (Collection $records) {
                            $records->each(function (Subscriber $subscriber) {
                                $subscriber->update([
                                    'status' => 'unsubscribed',
                                    'unsubscribed_at' => now(),
                                ]);
                            });

                            Notification::make()
                                ->warning()
                                ->title('Subscribers unsubscribed')
                                ->send();
                        }),
                ])
                    ->label('Bulk Actions')
                    ->icon('heroicon-m-ellipsis-vertical')
                    ->size('sm')
                    ->color('gray')
                    ->button(),
            ])
            ->defaultSort('subscribed_at', 'desc')
            ->poll('30s')
            ->striped();
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('export')
                ->label('Export Subscribers')
                ->icon('heroicon-o-arrow-down-tray')
                ->color('gray')
                ->action(function () {
                    Notification::make()
                        ->info()
                        ->title('Export functionality coming soon!')
                        ->send();
                }),
        ];
    }
}
