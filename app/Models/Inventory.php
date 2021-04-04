<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Inventory
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Inventory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Inventory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Inventory query()
 * @mixin \Eloquent
 * @property int $id
 * @property int|null $position
 * @property string|null $item
 * @property int|null $length
 * @property int|null $breadth
 * @property int|null $height
 * @property int|null $volume
 * @method static \Illuminate\Database\Eloquent\Builder|Inventory whereBreadth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inventory whereHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inventory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inventory whereItem($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inventory whereLength($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inventory wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inventory whereVolume($value)
 */
class Inventory extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'position', 'item', 'length', 'breadth', 'height', 'volume'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $table = 'inventory';
}
