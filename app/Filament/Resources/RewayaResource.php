<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RewayaResource\Pages;
use App\Filament\Resources\RewayaResource\RelationManagers;
use App\Models\Rewaya;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RewayaResource extends Resource
{
    protected static ?string $model = Rewaya::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationLabel = 'روايات';

    protected static ?string $pluralModelLabel = 'روايات';

    protected static ?string $modelLabel = 'رواية';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make([
                    Forms\Components\TextInput::make('name')
                        ->label('اسم')
                        ->required()
                        ->maxLength(255),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('اسم'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()->label('تاريخ الانشاء'),
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
            'index' => Pages\ListRewayas::route('/'),
            'create' => Pages\CreateRewaya::route('/create'),
            'edit' => Pages\EditRewaya::route('/{record}/edit'),
        ];
    }
}
