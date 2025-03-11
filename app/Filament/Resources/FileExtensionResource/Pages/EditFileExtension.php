<?php

namespace App\Filament\Resources\FileExtensionResource\Pages;

use App\Filament\Resources\FileExtensionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFileExtension extends EditRecord
{
    protected static string $resource = FileExtensionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
