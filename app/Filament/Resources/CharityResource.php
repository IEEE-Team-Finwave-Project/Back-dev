<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CharityResource\Pages;
use App\Filament\Resources\CharityResource\RelationManagers;
use App\Models\Charity;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CharityResource extends Resource
{
    protected static ?string $model = Charity::class;

    protected static ?string $navigationIcon = 'healthicons-f-hiv-ind';

    public static function getNavigationBadge(): ?string
    {
        return static ::getModel()::query()->count();
    }

    public static function form(Form $form): Form
    {
        Section::make('Phones')
            ->statePath('phones');
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('phones')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('address')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('website')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('website')
                    ->searchable()
                ->limit(50),
                Tables\Columns\TextColumn::make('address')
                ->limit(50),
                Tables\Columns\TextColumn::make('phones')
                    ->searchable()
                    ->badge(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListCharities::route('/'),
            'create' => Pages\CreateCharity::route('/create'),
            'edit' => Pages\EditCharity::route('/{record}/edit'),
        ];
    }
}
