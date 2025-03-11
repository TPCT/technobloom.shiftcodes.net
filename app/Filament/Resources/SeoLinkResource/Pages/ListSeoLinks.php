<?php

namespace App\Filament\Resources\SeoLinkResource\Pages;

use App\Filament\Resources\SeoLinkResource;
use CactusGalaxy\FilamentAstrotomic\Resources\Pages\Record\ListTranslatable;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSeoLinks extends ListRecords
{
    use ListTranslatable;

    protected static string $resource = SeoLinkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
