<?php

namespace App\Models\Service;

use App\Filament\Helpers\Translatable;
use App\Helpers\HasAuthor;
use App\Helpers\HasMedia;
use App\Helpers\HasSeo;
use App\Helpers\HasSlug;
use App\Helpers\HasStatus;
use App\Helpers\HasTimestamps;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Service extends Model implements Auditable
{
    use HasFactory, HasStatus, HasAuthor, \OwenIt\Auditing\Auditable, \App\Helpers\HasTranslations, Translatable, HasTimestamps, HasMedia, HasSlug, HasSeo;

    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];

    public $translationModel = ServiceLang::class;

    public array $translatedAttributes = [
        'title', 'second_title', 'description'
    ];

    public function steps(){
        return $this->hasMany(ServiceStep::class);
    }
}
