<?php

namespace App\Models\Project;

use App\Filament\Helpers\Translatable;
use App\Helpers\HasAuthor;
use App\Helpers\HasMedia;
use App\Helpers\HasStatus;
use App\Helpers\WeightedModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * App\Models\Project\ProjectFeature
 *
 * @property int $id
 * @property int $user_id
 * @property int $project_id
 * @property int $weight
 * @property int $status
 * @property string|null $published_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \App\Models\User $author
 * @property-read \Awcodes\Curator\Models\Media|null $image
 * @property-read \App\Models\Project\ProjectFeatureLang|null $translation
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Project\ProjectFeatureLang> $translations
 * @property-read int|null $translations_count
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectFeature active()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectFeature listsTranslations(string $translationField)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectFeature newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectFeature newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectFeature notTranslatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectFeature orWhereTranslation(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectFeature orWhereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectFeature orderByTranslation(string $translationField, string $sortMethod = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectFeature query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectFeature translated()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectFeature translatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectFeature translations()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectFeature whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectFeature whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectFeature whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectFeature wherePublishedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectFeature whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectFeature whereTranslation(string $translationField, $value, ?string $locale = null, string $method = 'whereHas', string $operator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectFeature whereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectFeature whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectFeature whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectFeature whereWeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectFeature withTranslation(?string $locale = null)
 * @mixin \Eloquent
 */
class ProjectFeature extends WeightedModel implements Auditable
{
    use HasFactory, HasStatus, HasAuthor, \OwenIt\Auditing\Auditable, \App\Helpers\HasTranslations, Translatable, HasMedia;

    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];

    public $translationModel = ProjectFeatureLang::class;

    public array $translatedAttributes = [
        'title',
    ];
}
