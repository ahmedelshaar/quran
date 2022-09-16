<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SheikhResource\Pages;
use App\Filament\Resources\SheikhResource\RelationManagers;
use App\Models\Country;
use App\Models\Sheikh;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SheikhResource extends Resource
{
    protected static ?string $model = Sheikh::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationLabel = 'الشيوخ';

    protected static ?string $pluralModelLabel = 'الشيوخ';

    protected static ?string $modelLabel = 'شيخ';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make([
                    Forms\Components\TextInput::make('name')
                        ->required()
                        ->label('الاسم')
                        ->datalist(
                            Sheikh::all()->pluck('name')->toArray()
                        )
                        ->maxLength(255),
                    Forms\Components\TextInput::make('nickname')
                        ->label('الكنية')
                        ->maxLength(255),
                    Forms\Components\Select::make('country_id')
                        ->label('الدولة')
                        ->searchable()
                        ->options(Country::all()->pluck('name', 'id')),
                    Forms\Components\Textarea::make('notes')->label('ملاحظات'),
                    Repeater::make('alajaza')
                        ->relationship('alajaza', 'sheikhs')
                        ->schema([
                            Select::make('sheikh')
                                ->name('الشيخ')
                                ->options(
                                    Sheikh::all()->pluck('name', 'id')
                                )
                                ->searchable()
                    ])
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('الاسم')->searchable(),
                Tables\Columns\TextColumn::make('country.name')->label('الدولة'),
                Tables\Columns\TextColumn::make('nickname')->label('الكنية'),
                Tables\Columns\TextColumn::make('count')->label('عدد الاجازات'),
                Tables\Columns\TextColumn::make('created_at')->label('تاريخ الانشاء')
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
            'index' => Pages\ListSheikhs::route('/'),
            'create' => Pages\CreateSheikh::route('/create'),
            'edit' => Pages\EditSheikh::route('/{record}/edit'),
        ];
    }

    public static function getGlobalSearchResultTitle(Model $record): string
    {
        return $record->name;
    }
}
