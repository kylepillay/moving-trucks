<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CostTiers
 *
 * @property int $id
 * @property string $label
 * @property int $minimum_charge
 * @property int $cost_per_km
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CostTiers newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CostTiers newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CostTiers query()
 * @method static \Illuminate\Database\Eloquent\Builder|CostTiers whereCostPerKm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CostTiers whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CostTiers whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CostTiers whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CostTiers whereMinimumCharge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CostTiers whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CostTiers extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'minimum_charge',
        'cost_per_km',
        'label'
    ];
}
