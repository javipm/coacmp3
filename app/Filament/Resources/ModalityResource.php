<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ModalityResource\Pages;
use App\Models\Modality;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use RalphJSmit\Filament\SEO\SEO;

class ModalityResource extends Resource
{
    protected static ?string $model = Modality::class;

    protected static ?string $navigationIcon = 'heroicon-o-list-bullet';

    protected static ?string $modelLabel = 'modalidad';

    protected static ?string $pluralModelLabel = 'modalidades';

    protected static ?string $navigationLabel = 'Modalidades';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()->columns(2)->schema([
                    Forms\Components\TextInput::make('name')
                        ->label('Nombre')
                        ->unique(table: Modality::class, ignoreRecord: true)
                        ->required()
                        ->maxLength(255),
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
                Tables\Columns\TextColumn::make('slug')->label('URL'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([])
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
            'index' => Pages\ListModalities::route('/'),
            'create' => Pages\CreateModality::route('/create'),
            'edit' => Pages\EditModality::route('/{record}/edit'),
        ];
    }
}
