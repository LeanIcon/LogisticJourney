<?php

declare(strict_types=1);

namespace Modules\Website\Filament\Resources\Contacts;

use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Modules\Website\Filament\Resources\Contacts\Pages\CreateContact;
use Modules\Website\Filament\Resources\Contacts\Pages\EditContact;
use Modules\Website\Filament\Resources\Contacts\Pages\ListContacts;
use Modules\Website\Filament\Resources\Contacts\Pages\ViewContact;
use Modules\Website\Filament\Resources\Contacts\Schemas\ContactForm;
use Modules\Website\Filament\Resources\Contacts\Schemas\ContactInfolist;
use Modules\Website\Filament\Resources\Contacts\Tables\ContactsTable;
use Modules\Website\Models\Contact;

final class ContactResource extends Resource
{
    protected static ?string $model = Contact::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return ContactForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ContactInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ContactsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListContacts::route('/'),
            'create' => CreateContact::route('/create'),
            'view' => ViewContact::route('/{record}'),
            'edit' => EditContact::route('/{record}/edit'),
        ];
    }
}
