<?php

namespace App\Models\TeamMember;

use App\Filament\Helpers\Translatable;
use App\Helpers\HasAuthor;
use App\Helpers\HasMedia;
use App\Helpers\HasStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * App\Models\TeamMember\TeamMember
 *
 * @property int $id
 * @property int $user_id
 * @property int|null $image_id
 * @property string|null $facebook
 * @property string|null $linkedin
 * @property string|null $instagram
 * @property string|null $youtube
 * @property int $weight
 * @property int $status
 * @property string|null $published_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \App\Models\User $author
 * @property-read \Awcodes\Curator\Models\Media|null $image
 * @property-read \App\Models\TeamMember\TeamMemberLang|null $translation
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\TeamMember\TeamMemberLang> $translations
 * @property-read int|null $translations_count
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|TeamMember active()
 * @method static \Illuminate\Database\Eloquent\Builder|TeamMember listsTranslations(string $translationField)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamMember newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TeamMember newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TeamMember notTranslatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamMember orWhereTranslation(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamMember orWhereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamMember orderByTranslation(string $translationField, string $sortMethod = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|TeamMember query()
 * @method static \Illuminate\Database\Eloquent\Builder|TeamMember translated()
 * @method static \Illuminate\Database\Eloquent\Builder|TeamMember translatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamMember translations()
 * @method static \Illuminate\Database\Eloquent\Builder|TeamMember whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamMember whereFacebook($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamMember whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamMember whereImageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamMember whereInstagram($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamMember whereLinkedin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamMember wherePublishedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamMember whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamMember whereTranslation(string $translationField, $value, ?string $locale = null, string $method = 'whereHas', string $operator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder|TeamMember whereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamMember whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamMember whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamMember whereWeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamMember whereYoutube($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamMember withTranslation(?string $locale = null)
 * @mixin \Eloquent
 */
class TeamMember extends model implements Auditable
{
    use HasFactory, HasStatus, HasAuthor, \OwenIt\Auditing\Auditable, \App\Helpers\HasTranslations, Translatable, HasMedia;

    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];

    public $translationModel = TeamMemberLang::class;

    public array $translatedAttributes = [
        'title',
        'position'
    ];
}