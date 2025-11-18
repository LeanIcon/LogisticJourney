<?php

declare(strict_types=1);

namespace Modules\Website\Filament\Clusters\Website\Resources\FormSubmissions\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Modules\Website\Models\Form;

final class FormSubmissionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('ID')
                    ->sortable()
                    ->searchable(),
                
                TextColumn::make('form.name')
                    ->label('Form Name')
                    ->sortable()
                    ->searchable()
                    ->badge()
                    ->color('info'),
                
                TextColumn::make('created_at')
                    ->label('Submitted At')
                    ->dateTime('M d, Y H:i')
                    ->sortable()
                    ->description(fn ($record) => $record->created_at->diffForHumans()),
                
                TextColumn::make('ip_address')
                    ->label('IP Address')
                    ->searchable()
                    ->toggleable(),
            ])
            ->filters([
                SelectFilter::make('form_id')
                    ->label('Form')
                    ->options(Form::pluck('name', 'id'))
                    ->searchable()
                    ->preload(),
            ])
            ->recordActions([
                ViewAction::make()
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}