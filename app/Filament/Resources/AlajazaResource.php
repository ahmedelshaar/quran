<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AlajazaResource\Pages;
use App\Filament\Resources\AlajazaResource\RelationManagers;
use App\Models\Alajaza;
use App\Models\Rewaya;
use App\Models\SanadType;
use App\Models\Sheikh;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AlajazaResource extends Resource
{
    protected static ?string $model = Alajaza::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    protected static ?string $navigationLabel = 'الاجازات';

    protected static ?string $pluralModelLabel = 'الاجازات';

    protected static ?string $modelLabel = 'الاجازة';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make([
                    Forms\Components\Select::make('sheikh_id')
                        ->label('اسم الشيخ')
                        ->searchable()
                        ->required()
                        ->options(Sheikh::all()->pluck('name', 'id')),
                    Repeater::make('sheikhs')
                        ->schema([
                            Select::make('sheikhs')
                                ->name('الشيخ')
                                ->options(
                                    Sheikh::all()->pluck('name', 'id')
                                )
                                ->searchable()
                        ])
                        ->required()
                    ->label('الشيوخ'),
                    Forms\Components\Select::make('sanad_type_id')
                        ->label('نوع السند')
                        ->searchable()
                        ->options(SanadType::all()->pluck('name', 'id')),
                    Forms\Components\Select::make('rewaya_id')
                        ->label('رواية')
                        ->searchable()
                        ->options(Rewaya::all()->pluck('name', 'id')),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('sheikh.name')->label('اسم الشيخ')->searchable(),
                Tables\Columns\TextColumn::make('sanad_type.name')->label('نوع السند'),
                Tables\Columns\TextColumn::make('rewaya.name')->label('نوع الرواية'),
                Tables\Columns\TextColumn::make('count')->label('العدد'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->label('تاريخ الانشاء'),
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
            'index' => Pages\ListAlajazas::route('/'),
            'create' => Pages\CreateAlajaza::route('/create'),
            'edit' => Pages\EditAlajaza::route('/{record}/edit'),
        ];
    }

}
