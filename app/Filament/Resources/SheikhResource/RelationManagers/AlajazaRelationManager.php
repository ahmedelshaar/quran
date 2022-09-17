<?php

namespace App\Filament\Resources\SheikhResource\RelationManagers;

use App\Models\Rewaya;
use App\Models\SanadType;
use App\Models\Sheikh;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AlajazaRelationManager extends RelationManager
{
    protected static string $relationship = 'alajaza';

    protected static ?string $title = "الاجازات";

    protected static ?string $recordTitleAttribute = 'id';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make([
                    Repeater::make('sheikhs')
                        ->schema([
                            Select::make('sheikhs')
                                ->name('الشيخ')
                                ->options(
                                    Sheikh::all()->pluck('name', 'id')
                                )
                        ])
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
                Tables\Columns\TextColumn::make('sheikh.name')->label('اسم الشيخ'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
}
