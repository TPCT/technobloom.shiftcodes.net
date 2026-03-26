<?php

namespace App\Filament\Components;

use App\Filament\Helpers\HasRelationship;
use Saade\FilamentAdjacencyList\Forms\Components\AdjacencyList as BaseAdjacencyList;

class AdjacencyList extends BaseAdjacencyList
{
    use HasRelationship;
}