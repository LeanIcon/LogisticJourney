<?php

declare(strict_types=1);

namespace Modules\Blog\Filament\Resources\CaseStudies\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

final class CaseStudyInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                /* -----------------------------------------
                 | OVERVIEW SECTION
                 -----------------------------------------*/
                Section::make('Case Study Overview')
                    ->description('Summary details of this case study')
                    ->schema([
                        TextEntry::make('title')
                            ->copyable()
                            ->icon('heroicon-o-document-text'),

                        TextEntry::make('client_name')
                            ->label('Client')
                            ->icon('heroicon-o-user'),

                        TextEntry::make('industry')
                            ->label('Industry')
                            ->icon('heroicon-o-briefcase'),

                        TextEntry::make('location')
                            ->label('Location')
                            ->icon('heroicon-o-map-pin'),

                        TextEntry::make('status')
                            ->badge()
                            ->color(fn (string $state): string => match ($state) {
                                'published' => 'success',
                                'draft' => 'gray',
                                default => 'gray',
                            }),

                        TextEntry::make('is_featured')
                            ->label('Featured')
                            ->badge()
                            ->formatStateUsing(fn (bool $state): string => $state ? 'Yes' : 'No')
                            ->color(fn (bool $state): string => $state ? 'success' : 'gray'),
                    ])
                    ->columns(3),

                /* -----------------------------------------
                 | PROJECT DETAILS SECTION
                 -----------------------------------------*/
                Section::make('Project Details')
                    ->description('Important information about this engagement')
                    ->schema([
                        TextEntry::make('engagement_type')
                            ->label('Engagement Type')
                            ->icon('heroicon-o-briefcase'),

                        TextEntry::make('implementation_period')
                            ->label('Implementation Period')
                            ->icon('heroicon-o-clock'),

                        TextEntry::make('solution')
                            ->label('Solution Delivered')
                            ->icon('heroicon-o-light-bulb'),

                        TextEntry::make('excerpt')
                            ->label('Excerpt')
                            ->limit(160),
                    ])
                    ->columns(2),
                    
                /* -----------------------------------------
                | CONTENT FIELDS (Collapsible)
                -----------------------------------------*/
                Section::make('Introduction')
                    ->collapsible()
                    ->collapsed()
                    ->schema([
                        TextEntry::make('introduction')
                            ->html()
                            ->prose()
                            ->columnSpanFull(),
                    ])
                    ->columnSpanFull(),

                Section::make('The Problem')
                    ->collapsible()
                    ->collapsed()
                    ->schema([
                        TextEntry::make('the_problem')
                            ->html()
                            ->prose()
                            ->columnSpanFull(),
                    ])
                    ->columnSpanFull(),

                Section::make('The Solution')
                    ->collapsible()
                    ->collapsed()
                    ->schema([
                        TextEntry::make('the_solution')
                            ->html()
                            ->prose()
                            ->columnSpanFull(),
                    ])
                    ->columnSpanFull(),

                Section::make('The Result')
                    ->collapsible()
                    ->collapsed()
                    ->schema([
                        TextEntry::make('the_result')
                            ->html()
                            ->prose()
                            ->columnSpanFull(),
                    ])
                    ->columnSpanFull(),

                Section::make('The Road Ahead')
                    ->collapsible()
                    ->collapsed()
                    ->schema([
                        TextEntry::make('the_road_ahead')
                            ->html()
                            ->prose()
                            ->columnSpanFull(),
                    ])
                    ->columnSpanFull(),

            ]);
    }
}
