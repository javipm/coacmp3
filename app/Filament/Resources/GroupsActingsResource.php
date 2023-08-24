<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GroupsActingsResource\Pages;
use App\Models\Group;
use App\Models\GroupActing;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class GroupsActingsResource extends Resource
{
    protected static ?string $model = GroupActing::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';

    protected static ?string $modelLabel = 'actuación';

    protected static ?string $pluralModelLabel = 'actuaciones';

    protected static ?string $navigationLabel = 'Actuaciones';

    protected static ?string $recordTitleAttribute = 'phase';

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationGroup = 'Grupos';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()->columns(3)->schema([
                    Forms\Components\Select::make('group_id')
                        ->label('Grupo')
                        ->required()
                        ->options(Group::all()->pluck('name', 'id'))
                        ->searchable(),
                    Forms\Components\Select::make('phase')
                        ->label('Fase')
                        ->options([
                            'Preliminares',
                            'Cuartos',
                            'Semifinales',
                            'Final',
                        ])
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
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
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
            'index' => Pages\ListGroupsActings::route('/'),
            'create' => Pages\CreateGroupsActings::route('/create'),
            'edit' => Pages\EditGroupsActings::route('/{record}/edit'),
        ];
    }
}
