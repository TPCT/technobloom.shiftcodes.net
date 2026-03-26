<?php

namespace App\Models\Service;

use App\Filament\Helpers\Translatable;
use App\Helpers\HasAuthor;
use App\Helpers\HasMedia;
use App\Helpers\HasStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * App\Models\Project\ProjectStep
 *
 * @property int $id
 * @property int $user_id
 * @property int $project_id
 * @property int|null $image_1_id
 * @property int|null $image_2_id
 * @property int $status
 * @property string|null $published_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \App\Models\User $author
 * @property-read \Awcodes\Curator\Models\Media|null $image
 * @property-read \App\Models\Project\ServiceStepLang|null $translation
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Project\ServiceStepLang> $translations
 * @property-read int|null $translations_count
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceStep active()
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceStep listsTranslations(string $translationField)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceStep newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceStep newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceStep notTranslatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceStep orWhereTranslation(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceStep orWhereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceStep orderByTranslation(string $translationField, string $sortMethod = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceStep query()
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceStep translated()
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceStep translatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceStep translations()
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceStep whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceStep whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceStep whereImage1Id($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceStep whereImage2Id($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceStep whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceStep wherePublishedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceStep whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceStep whereTranslation(string $translationField, $value, ?string $locale = null, string $method = 'whereHas', string $operator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceStep whereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceStep whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceStep whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceStep withTranslation(?string $locale = null)
 * @mixin \Eloquent
 */
class ServiceStep extends Model implements Auditable
{
    use HasFactory, HasStatus, HasAuthor, \OwenIt\Auditing\Auditable, \App\Helpers\HasTranslations, Translatable, HasMedia;

    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];

    public $translationModel = ServiceStepLang::class;

    public array $translatedAttributes = [
        'title', 'second_title', 'description'
    ];}
