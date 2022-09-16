<?php

namespace App\Filament\Resources\DashboardResource\StateOverview;

use App\Models\Alajaza;
use App\Models\Country;
use App\Models\Rewaya;
use App\Models\SanadType;
use App\Models\Sheikh;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StateOverview extends BaseWidget
{

    protected function getCards(): array
    {
        return [
            Card::make('عدد الشيوخ', Sheikh::all()->count()),
            Card::make('عدد الاجازات', Alajaza::all()->count()),
            Card::make('عدد الدول', Country::all()->count()),
            Card::make('عدد الرويات', Rewaya::all()->count()),
            Card::make('عدد انواع السند', SanadType::all()->count()),
        ];
    }
}
