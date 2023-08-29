<?php

namespace App\Filament\Resources\GroupsResource\RelationManagers;

use App\Models\Group;
use App\Models\GroupActing;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class ActingsRelationManager extends RelationManager
{
    protected static string $relationship = 'actings';

    protected static ?string $modelLabel = 'actuación';

    protected static ?string $pluralModelLabel = 'actuaciones';

    protected static ?string $title = 'Actuaciones';

    protected static ?string $navigationLabel = 'Actuaciones';

    protected static ?string $recordTitleAttribute = 'phase';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('group_id')
                    ->label('Grupo')
                    ->required()
                    ->options(Group::all()->pluck('name', 'id'))
                    ->searchable()
                    ->columnSpan(2),
                Forms\Components\Select::make('phase')
                    ->label('Fase')
                    ->options(GroupActing::PHASES)
                    ->required(),
                Forms\Components\TextInput::make('filename')
                    ->label('Fichero')
                    ->unique(table: GroupActing::class, ignoreRecord: true)
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('slug')
                    ->label('URL')
                    ->required()
                    ->maxLength(255)
                    ->hiddenOn('create'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('phase')
            ->columns([
                Tables\Columns\TextColumn::make('phase')->label('Fase'),
                Tables\Columns\TextColumn::make('filename')->label('Fichero'),
                Tables\Columns\TextColumn::make('slug')->label('URL'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
}
