<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\BlueprintResource\Pages;
use App\Models\Blueprint;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class BlueprintResource extends Resource
{
    protected static ?string $model = Blueprint::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationGroup = 'Factory Database';

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?int $navigationSort = 4;

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('name')
                ->required()
                ->maxLength(255),

            Forms\Components\Select::make('area_id')
                ->relationship('area', 'name')
                ->searchable()
                ->preload()
                ->label('Area'),

            Forms\Components\Select::make('result_item_id')
                ->relationship('resultItem', 'name')
                ->searchable()
                ->preload()
                ->label('Result Item'),

            // PERBAIKAN DI SINI: relasi diubah menjadi 'machines', tambah multiple()
            Forms\Components\Select::make('machines')
                ->relationship('machines', 'name')
                ->multiple()
                ->searchable()
                ->preload()
                ->label('Machines'),

            Forms\Components\TextInput::make('craft_time')
                ->numeric()
                ->label('Craft Time'),

            Forms\Components\FileUpload::make('image')
                ->image()
                ->imageEditor()
                ->directory('blueprints'),

            Forms\Components\Textarea::make('notes')
                ->rows(4)
                ->columnSpanFull(),

            Forms\Components\Repeater::make('materials')
                ->relationship()
                ->schema([
                    Forms\Components\Select::make('item_id')
                        ->relationship('item', 'name')
                        ->searchable()
                        ->preload()
                        ->required()
                        ->label('Material Item'),

                    Forms\Components\TextInput::make('amount')
                        ->numeric()
                        ->required()
                        ->minValue(1)
                        ->label('Amount'),
                ])  
                ->columns(2)
                ->defaultItems(1)
                ->addActionLabel('Add Material')
                ->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('id')->sortable(),
            Tables\Columns\TextColumn::make('name')->searchable()->sortable(),
            Tables\Columns\TextColumn::make('area.name')->label('Area')->searchable(),
            Tables\Columns\TextColumn::make('resultItem.name')->label('Result Item')->searchable(),
            
            // PERBAIKAN DI SINI: 'machine.name' diubah jadi 'machines.name' dan aku tambahkan ->badge() biar tampilannya cantik kalau mesinnya lebih dari 1
            Tables\Columns\TextColumn::make('machines.name')
                ->label('Machines')
                ->searchable()
                ->badge(),

            Tables\Columns\TextColumn::make('craft_time')->label('Time')->sortable(),
            Tables\Columns\ImageColumn::make('image'),
            Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable(),
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ])
        ->emptyStateActions([
            Tables\Actions\CreateAction::make(),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBlueprints::route('/'),
            'create' => Pages\CreateBlueprint::route('/create'),
            'edit' => Pages\EditBlueprint::route('/{record}/edit'),
        ];
    }
}