<?php

namespace App\Models;

use App\Filament\Helpers\Translatable;
use App\Helpers\HasAuthor;
use App\Helpers\HasMedia;
use App\Helpers\HasSection;
use App\Helpers\HasStatus;
use App\Helpers\WeightedModel;
use App\Models\Block\BlockFeature;
use App\Models\Block\BlockLang;
use App\Models\Dropdown\Dropdown;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;

/**
 * App\Models\Testimonial
 *
 * @property int $id
 * @property string|null $image_id
 * @property string $title
 * @property string|null $description
 * @property int $rate
 * @property int $user_id
 * @property string $published_at
 * @property int $status
 * @property int $weight
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \App\Models\User $author
 * @property-read array|null $section_ids
 * @property-read \Awcodes\Curator\Models\Media|null $image
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Section> $sections
 * @property-read int|null $sections_count
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Testimonial active()
 * @method static \Illuminate\Database\Eloquent\Builder|Testimonial newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Testimonial newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Testimonial query()
 * @method static \Illuminate\Database\Eloquent\Builder|Testimonial section($section)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimonial whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimonial whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimonial whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimonial whereImageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimonial wherePublishedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimonial whereRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimonial whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimonial whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimonial whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimonial whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimonial whereWeight($value)
 * @mixin \Eloquent
 */
class Testimonial extends WeightedModel implements \OwenIt\Auditing\Contracts\Auditable
{
    use HasFactory, HasAuthor, Auditable, HasStatus, HasSection, HasMedia;

    protected $guarded = ['id', 'created_at', 'updated_at'];


    public array $upload_attributes = [
        'image_id'
    ];
}
