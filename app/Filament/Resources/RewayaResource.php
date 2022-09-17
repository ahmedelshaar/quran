<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RewayaResource\Pages;
use App\Filament\Resources\RewayaResource\RelationManagers;
use App\Helper\CheckPermission;
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
    use CheckPermission;

    public static function getNameTable()
    {
        return 'rewayas.';
    }

    protected static ?string $model = Rewaya::class;

    protected static ?string $navigationIcon = 'heroicon-o-heart';

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
                        ->datalist(
                            Rewaya::all()->pluck('name')->toArray()
                        )
                        ->maxLength(255),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('اسم')->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make()
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
            'view' => Pages\ViewRewaya::route('/{record}'),
        ];
    }
}
