<?php

namespace App\Models\Slider;

use App\Helpers\HasAuthor;
use App\Helpers\HasMedia;
use App\Helpers\HasStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Slider\SliderSlide
 *
 * @property int $id
 * @property int $user_id
 * @property int $slider_id
 * @property int|null $image_id
 * @property string|null $link
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $mobile_image_id
 * @property-read \App\Models\User $author
 * @property-read \Awcodes\Curator\Models\Media|null $image
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|SliderSlide active()
 * @method static \Illuminate\Database\Eloquent\Builder|SliderSlide newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SliderSlide newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SliderSlide query()
 * @method static \Illuminate\Database\Eloquent\Builder|SliderSlide whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SliderSlide whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SliderSlide whereImageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SliderSlide whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SliderSlide whereMobileImageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SliderSlide whereSliderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SliderSlide whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SliderSlide whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SliderSlide whereUserId($value)
 * @mixin \Eloquent
 */
class SliderSlide extends Model
{
    use HasFactory, HasAuthor, HasStatus, HasMedia;

    protected $guarded = [
        'id', 'created_at', 'updated_at',
    ];
}
