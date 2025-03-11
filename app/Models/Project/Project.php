<?php

namespace App\Models\Project;

use App\Filament\Helpers\Translatable;
use App\Helpers\HasAuthor;
use App\Helpers\HasMedia;
use App\Helpers\HasSeo;
use App\Helpers\HasSlug;
use App\Helpers\HasStatus;
use App\Helpers\HasTimestamps;
use App\Helpers\WeightedModel;
use App\Models\Dropdown\Dropdown;
use Awcodes\Curator\Models\Media;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * App\Models\Project\Project
 *
 * @property int $id
 * @property int $user_id
 * @property int|null $image_id
 * @property int $weight
 * @property string $slug
 * @property int $status
 * @property string|null $published_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \App\Models\User $author
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Dropdown> $categories
 * @property-read int|null $categories_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Project\ProjectFeature> $features
 * @property-read int|null $features_count
 * @property-read \Awcodes\Curator\Models\Media|null $image
 * @property-read \Awcodes\Curator\Models\Media|null $media
 * @property-read \App\Models\Seo\Seo $seo
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Project\ServiceStep> $steps
 * @property-read int|null $steps_count
 * @property-read \App\Models\Project\ProjectLang|null $translation
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Project\ProjectLang> $translations
 * @property-read int|null $translations_count
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Project active()
 * @method static \Illuminate\Database\Eloquent\Builder|Project listsTranslations(string $translationField)
 * @method static \Illuminate\Database\Eloquent\Builder|Project newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Project newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Project notTranslatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Project orWhereTranslation(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Project orWhereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Project orderByTranslation(string $translationField, string $sortMethod = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|Project query()
 * @method static \Illuminate\Database\Eloquent\Builder|Project translated()
 * @method static \Illuminate\Database\Eloquent\Builder|Project translatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Project translations()
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereImageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project wherePublishedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereTranslation(string $translationField, $value, ?string $locale = null, string $method = 'whereHas', string $operator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereWeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project withTranslation(?string $locale = null)
 * @mixin \Eloquent
 */
class Project extends WeightedModel implements Auditable
{
    use HasFactory, HasStatus, HasAuthor, \OwenIt\Auditing\Auditable, \App\Helpers\HasTranslations, Translatable, HasTimestamps, HasMedia, HasSlug, HasSeo;

    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];

    public $translationModel = ProjectLang::class;

    public array $translatedAttributes = [
        'title', 'information', 'description'
    ];

    public function features(){
        return $this->hasMany(ProjectFeature::class);
    }

    public function steps(){
        return $this->hasMany(ProjectStep::class);
    }

    public function categories(){
        return $this->belongsToMany(Dropdown::class, 'projects_categories', 'project_id', 'category_id')
            ->with('translations');
    }

    public function images(){
        return $this->belongsToMany(Media::class, 'project_images', 'project_id', 'image_id');
    }
}
