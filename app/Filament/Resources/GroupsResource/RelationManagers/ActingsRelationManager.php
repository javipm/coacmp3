<?php

namespace App\Filament\Resources\GroupsResource\RelationManagers;

use App\Models\Group;
use App\Models\GroupActing;
use Filament\Forms;
use Filament\Schemas\Schema;
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

    public function form(Schema $schema): Schema
    {
        return $schema
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
                \Filament\Actions\CreateAction::make(),
            ])
            ->actions([
                \Filament\Actions\EditAction::make(),
                \Filament\Actions\DeleteAction::make(),
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
}
