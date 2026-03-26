<?php

namespace App\Models\Project;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * App\Models\Project\ProjectLang
 *
 * @property int $id
 * @property int $parent_id
 * @property string $language
 * @property string $title
 * @property string|null $information
 * @property string|null $description
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectLang newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectLang newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectLang query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectLang whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectLang whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectLang whereInformation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectLang whereLanguage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectLang whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectLang whereTitle($value)
 * @mixin \Eloquent
 */
class ProjectLang extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;

    protected $table = "projects_lang";
    public $timestamps = false;
    protected $guarded = [
        'id'
    ];
}
