<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AuthorsResource\Pages;
use App\Models\Author;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use RalphJSmit\Filament\SEO\SEO;

class AuthorsResource extends Resource
{
    protected static ?string $model = Author::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $modelLabel = 'autor';

    protected static ?string $pluralModelLabel = 'autores';

    protected static ?string $navigationLabel = 'Autores';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()->columns(3)->schema([
                    Forms\Components\TextInput::make('name')
                        ->label('Nombre')
                        ->unique(table: Author::class, ignoreRecord: true)
                        ->required()
                        ->maxLength(255),
                    Forms\Components\Select::make('modalities')
                        ->label('Modalidades')
                        ->multiple()
                        ->relationship(name: 'modalities', titleAttribute: 'name')
                        ->preload()
                        ->required(),
                    Forms\Components\TextInput::make('slug')
                        ->label('URL')
                        ->required()
                        ->maxLength(255)
                        ->hiddenOn('create'),
                    Forms\Components\RichEditor::make('biography')->fileAttachmentsDisk('public')->fileAttachmentsDirectory('authors')->label('Biografía')->columnSpan('full'),
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
                Tables\Columns\ToggleColumn::make('is_featured')->label('Destacado'),
                Tables\Columns\TextColumn::make('slug')->label('URL'),
                Tables\Columns\TextColumn::make('modalities.name')->label('Modalidades')->badge()->separator(','),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('is_featured')
                    ->options([
                        true => 'Sí',
                        false => 'No',
                    ])
                    ->label('Destacado'),
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
            'index' => Pages\ListAuthors::route('/'),
            'create' => Pages\CreateAuthors::route('/create'),
            'edit' => Pages\EditAuthors::route('/{record}/edit'),
        ];
    }
}
