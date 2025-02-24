<?php

namespace App\Forms\Components;

use App\Models\Kelas;
use Filament\Forms\Components\Select;



class KelasIdSelect extends Select
{


public static function make(string $name): static
{
    return parent::make($name)
        ->label('Major')
        ->prefixIcon('heroicon-o-building-library')
        ->prefixIconColor('primary')
        ->searchable()
        ->native(false)
        ->options(fn()=> Kelas::all()->pluck('major', 'id'));
}

}
