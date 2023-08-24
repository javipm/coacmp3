<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GroupsResource\Pages;
use App\Models\Group;
use App\Models\Modality;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use RalphJSmit\Filament\SEO\SEO;

class GroupsResource extends Resource
{
    protected static ?string $model = Group::class;

    protected static ?string $navigationIcon = 'heroicon-o-musical-note';

    protected static ?string $modelLabel = 'grupo';

    protected static ?string $pluralModelLabel = 'grupos';

    protected static ?string $navigationLabel = 'Grupos';

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationGroup = 'Grupos';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()->columns(3)->schema([
                    Forms\Components\TextInput::make('name')
                        ->label('Nombre')
                        ->unique(table: Group::class, ignoreRecord: true)
                        ->required()
                        ->maxLength(255),
                    Forms\Components\Select::make('authors_lyrics')
                        ->label('Autores de las letras')
                        ->multiple()
                        ->relationship(name: 'authorsLyrics', titleAttribute: 'name')
                        ->preload()
                        ->required(),
                    Forms\Components\Select::make('authors_music')
                        ->label('Autores de la música')
                        ->multiple()
                        ->relationship(name: 'authorsMusic', titleAttribute: 'name')
                        ->preload()
                        ->required(),
                    Forms\Components\Select::make('modality_id')
                        ->label('Modalidad')
                        ->required()
                        ->options(Modality::all()->pluck('name', 'id'))
                        ->searchable(),
                    Forms\Components\TextInput::make('year')
                        ->label('Año')
                        ->alphaNum()
                        ->required()
                        ->length(4)
                        ->columnSpan(1),
                    Forms\Components\TextInput::make('slug')
                        ->label('URL')
                        ->required()
                        ->maxLength(255)
                        ->hiddenOn('create'),
                    Forms\Components\RichEditor::make('description')->label('Descripción')->columnSpan('full'),
                ]),
                Forms\Components\Section::make('SEO')->schema([
                    SEO::make(),
                ])->hiddenOn('create'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('Nombre')->searchable(),
                Tables\Columns\TextColumn::make('year')->label('Año'),
                Tables\Columns\TextColumn::make('modality.name')->label('Modalidad'),
                Tables\Columns\TextColumn::make('authorsLyrics.name')->label('Autores letra')->listWithLineBreaks()->searchable(),
                Tables\Columns\TextColumn::make('authorsMusic.name')->label('Autores música')->listWithLineBreaks()->searchable(),
                Tables\Columns\TextColumn::make('slug')->label('URL'),
            ])
            ->filters([
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
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
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
            'index' => Pages\ListGroups::route('/'),
            'create' => Pages\CreateGroups::route('/create'),
            'edit' => Pages\EditGroups::route('/{record}/edit'),
        ];
    }
}
