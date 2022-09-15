<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SanadTypeResource\Pages;
use App\Filament\Resources\SanadTypeResource\RelationManagers;
use App\Models\SanadType;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SanadTypeResource extends Resource
{
    protected static ?string $model = SanadType::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationLabel = 'نوع السند';

    protected static ?string $pluralModelLabel = 'نوع السند';

    protected static ?string $modelLabel = 'سند';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make([
                    Forms\Components\TextInput::make('name')
                        ->required()
                        ->label('الاسم')
                        ->maxLength(255),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('الاسم'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('تاريخ الانشاء')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListSanadTypes::route('/'),
            'create' => Pages\CreateSanadType::route('/create'),
            'edit' => Pages\EditSanadType::route('/{record}/edit'),
        ];
    }
}
