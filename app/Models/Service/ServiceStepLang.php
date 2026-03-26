<?php

namespace App\Models\Service;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * App\Models\Project\ProjectStepLang
 *
 * @property int $id
 * @property int $parent_id
 * @property string $language
 * @property string $title
 * @property string $description
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceStepLang newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceStepLang newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceStepLang query()
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceStepLang whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceStepLang whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceStepLang whereLanguage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceStepLang whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceStepLang whereTitle($value)
 * @mixin \Eloquent
 */
class ServiceStepLang extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;

    protected $table = "service_steps_lang";
    public $timestamps = false;
    protected $guarded = [
        'id'
    ];
}
