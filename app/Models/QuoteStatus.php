<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\QuoteStatus
 *
 * @method static \Illuminate\Database\Eloquent\Builder|QuoteStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|QuoteStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|QuoteStatus query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $title
 * @property string $action_label
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|QuoteStatus whereActionLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuoteStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuoteStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuoteStatus whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuoteStatus whereUpdatedAt($value)
 * @property string $color
 * @method static \Illuminate\Database\Eloquent\Builder|QuoteStatus whereColor($value)
 */
class QuoteStatus extends Model
{
    use HasFactory;

    protected $table = 'quote_status';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'status_label'
    ];
}
