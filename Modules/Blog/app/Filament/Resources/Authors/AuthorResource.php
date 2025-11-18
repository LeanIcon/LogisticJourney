<?php

declare(strict_types=1);

namespace Modules\Blog\Filament\Resources\Authors;

use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Modules\Blog\Filament\Resources\Authors\Pages\ManageAuthors;
use Modules\Blog\Models\Author;
use UnitEnum;

final class AuthorResource extends Resource
{
    protected static ?string $model = Author::class;

    protected static string|UnitEnum|null $navigationGroup = 'Content';

    protected static ?int $navigationSort = 30;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Author Information')
                    ->schema([
                        Select::make('user_id')
                            ->relationship('user', 'name')
                            ->label('Linked User Account')
                            ->nullable()
                            ->searchable()
                            ->helperText('Link to an existing user account'),

                        TextInput::make('name')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('slug')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true),

                        TextInput::make('email')
                            ->email()
                            ->maxLength(255)
                            ->nullable(),

                        FileUpload::make('avatar')
                            ->image()
                            ->directory('authors/avatars')
                            ->maxSize(1024)
                            ->helperText('Profile picture'),

                        Textarea::make('bio')
                            ->rows(4)
                            ->maxLength(1000)
                            ->nullable()
                            ->helperText('Author biography'),

                        TextInput::make('website')
                            ->url()
                            ->maxLength(255)
                            ->nullable()
                            ->helperText('Personal or company website'),

                        Toggle::make('is_guest')
                            ->label('Guest Author')
                            ->helperText('Mark as external/guest contributor'),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
                ForceDeleteAction::make(),
                RestoreAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageAuthors::route('/'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
