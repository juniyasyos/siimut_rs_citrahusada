<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class HeaderDasboard extends Widget
{
    protected static string $view = 'filament.widgets.header-dasboard';

    protected int|string|array $columnSpan = 'full';

    protected static ?int $sort = 1;
}
