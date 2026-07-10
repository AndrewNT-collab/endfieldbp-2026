<?php

namespace App\Filament\Admin\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class BlogPostsChart extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Test', '123'),
        ];
    }
}