<?php

namespace App\Models\Project;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * App\Models\Project\ProjectFeatureLang
 *
 * @property int $id
 * @property int $parent_id
 * @property string $language
 * @property string $title
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectFeatureLang newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectFeatureLang newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectFeatureLang query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectFeatureLang whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectFeatureLang whereLanguage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectFeatureLang whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectFeatureLang whereTitle($value)
 * @mixin \Eloquent
 */
class ProjectFeatureLang extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;

    protected $table = "project_features_lang";
    public $timestamps = false;
    protected $guarded = [
        'id'
    ];}
