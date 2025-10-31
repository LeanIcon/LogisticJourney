<?php

declare(strict_types=1);

namespace Modules\Website\Filament\Resources\Contacts\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

final class ContactsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->description(fn ($record) => $record->email),

                TextColumn::make('phone')
                    ->searchable()
                    ->toggleable()
                    ->icon('heroicon-m-phone')
                    ->placeholder('—'),

                TextColumn::make('source')
                    ->badge()
                    ->colors([
                        'primary' => 'website',
                        'success' => 'referral',
                        'info' => 'social_media',
                        'warning' => 'advertisement',
                    ])
                    ->sortable(),

                TextColumn::make('status')
                    ->badge()
                    ->colors([
                        'gray' => 'new',
                        'info' => 'contacted',
                        'warning' => 'qualified',
                        'success' => 'converted',
                        'danger' => 'closed',
                    ])
                    ->sortable(),

                TextColumn::make('assignedUser.name')
                    ->label('Assigned To')
                    ->sortable()
                    ->placeholder('Unassigned')
                    ->toggleable(),

                TextColumn::make('created_at')
                    ->label('Received')
                    ->dateTime('M j, Y')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'new' => 'New',
                        'contacted' => 'Contacted',
                        'qualified' => 'Qualified',
                        'converted' => 'Converted',
                        'closed' => 'Closed',
                    ]),

                SelectFilter::make('source')
                    ->options([
                        'website' => 'Website',
                        'referral' => 'Referral',
                        'social_media' => 'Social Media',
                        'advertisement' => 'Advertisement',
                        'event' => 'Event',
                        'direct' => 'Direct Contact',
                        'other' => 'Other',
                    ]),

                SelectFilter::make('assigned_to')
                    ->label('Assigned To')
                    ->relationship('assignedUser', 'name')
                    ->searchable()
                    ->preload(),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }
}
