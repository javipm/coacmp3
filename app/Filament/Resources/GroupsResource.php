<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GroupsResource\Pages;
use App\Filament\Resources\GroupsResource\RelationManagers;
use App\Models\Group;
use App\Models\Modality;
use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use RalphJSmit\Filament\SEO\SEO;

class GroupsResource extends Resource
{
    protected static ?string $model = Group::class;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $modelLabel = 'grupo';

    protected static ?string $pluralModelLabel = 'grupos';

    protected static ?string $navigationLabel = 'Grupos';

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?int $navigationSort = 1;

    protected static string | \UnitEnum | null $navigationGroup = 'Agrupaciones';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                \Filament\Schemas\Components\Section::make()->columns(3)->schema([
                    Forms\Components\TextInput::make('name')
                        ->label('Nombre')
                        ->unique(table: Group::class, ignoreRecord: true)
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('year')
                        ->label('Año')
                        ->alphaNum()
                        ->required()
                        ->length(4)
                        ->columnSpan(1),
                    Forms\Components\Select::make('modality_id')
                        ->label('Modalidad')
                        ->required()
                        ->options(Modality::all()->pluck('name', 'id'))
                        ->searchable(),
                    Forms\Components\TextInput::make('city')
                        ->label('Ciudad')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('director')
                        ->label('Director')
                        ->maxLength(255)
                        ->columnStart(1),
                    Forms\Components\Select::make('authors_lyrics_id')
                        ->label('Autores de las letras')
                        ->multiple()
                        ->relationship(name: 'authorsLyrics', titleAttribute: 'name')
                        ->preload(),
                    Forms\Components\Select::make('authors_music_id')
                        ->label('Autores de la música')
                        ->multiple()
                        ->relationship(name: 'authorsMusic', titleAttribute: 'name')
                        ->preload(),
                    Forms\Components\TextInput::make('slug')
                        ->label('URL')
                        ->required()
                        ->maxLength(255)
                        ->hiddenOn('create')
                        ->columnStart(1),
                    Forms\Components\Toggle::make('is_featured')
                        ->label('Destacado')
                        ->inline(false),
                    Forms\Components\RichEditor::make('description')->label('Descripción')->columnSpan('full'),
                ]),
                \Filament\Schemas\Components\Section::make('SEO')->schema([
                    SEO::make(),
                ])->hiddenOn('create'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\IconColumn::make('is_completed')->label('Relleno')->boolean(),
                Tables\Columns\ToggleColumn::make('is_featured')->label('Destacado'),
                Tables\Columns\TextColumn::make('name')->label('Nombre')->searchable(),
                Tables\Columns\TextColumn::make('year')->label('Año'),
                Tables\Columns\TextColumn::make('modality.name')->label('Modalidad'),
                Tables\Columns\TextColumn::make('director')->label('Director'),
                Tables\Columns\TextColumn::make('city')->label('Ciudad'),
                Tables\Columns\TextColumn::make('authorsLyrics.name')->label('Autores letra')->listWithLineBreaks()->searchable(),
                Tables\Columns\TextColumn::make('authorsMusic.name')->label('Autores música')->listWithLineBreaks()->searchable(),
                Tables\Columns\TextColumn::make('slug')->label('URL'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('is_completed')
                    ->options([
                        true => 'Sí',
                        false => 'No',
                    ])
                    ->label('Relleno'),
                Tables\Filters\SelectFilter::make('is_featured')
                    ->options([
                        true => 'Sí',
                        false => 'No',
                    ])
                    ->label('Destacado'),
                Tables\Filters\SelectFilter::make('modality_id')
                    ->multiple()
                    ->label('Modalidad')
                    ->options(Modality::all()->pluck('name', 'id')),
                Tables\Filters\SelectFilter::make('year')
                    ->multiple()
                    ->label('Año')
                    ->options(Group::all()->pluck('year', 'year')),
            ])
            ->actions([
                \Filament\Actions\EditAction::make(),
            ])
            ->bulkActions([
                \Filament\Actions\BulkActionGroup::make([
                    \Filament\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                \Filament\Actions\CreateAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\ActingsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGroups::route('/'),
            'create' => Pages\CreateGroups::route('/create'),
            'edit' => Pages\EditGroups::route('/{record}/edit'),
        ];
    }

    public static function getWidgets(): array
    {
        return [
            GroupsResource\Widgets\StatsOverview::class,
        ];
    }
}
