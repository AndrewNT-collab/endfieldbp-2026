<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ItemResource\Pages;
use App\Models\Item;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ItemResource extends Resource
{
    protected static ?string $model = Item::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube';

    protected static ?string $navigationGroup = 'Factory Database';

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?int $navigationSort = 2;

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

            Forms\Components\FileUpload::make('image')
                ->label('Item Image')
                ->image()
                ->imageEditor()
                ->directory('items')
                ->columnSpanFull(),

            Forms\Components\TextInput::make('category')
                ->maxLength(255),

            Forms\Components\TextInput::make('source')
                ->maxLength(255),

            Forms\Components\TextInput::make('location')
                ->maxLength(255),

            Forms\Components\Textarea::make('description')
                ->rows(4)
                ->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('id')->sortable(),
            Tables\Columns\ImageColumn::make('image')->label('Image')->square(),
            Tables\Columns\TextColumn::make('name')->searchable()->sortable(),
            Tables\Columns\TextColumn::make('category')->searchable(),
            Tables\Columns\TextColumn::make('source')->searchable(),
            Tables\Columns\TextColumn::make('location')->searchable(),
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
            'index' => Pages\ListItems::route('/'),
            'create' => Pages\CreateItem::route('/create'),
            'edit' => Pages\EditItem::route('/{record}/edit'),
        ];
    }
}