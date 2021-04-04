<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\QuoteLineItem
 *
 * @property int $id
 * @property int $quote_request_id
 * @property int $quantity
 * @property int $is_additional
 * @property int $inventory_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|QuoteLineItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|QuoteLineItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|QuoteLineItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|QuoteLineItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuoteLineItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuoteLineItem whereInventoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuoteLineItem whereIsAdditional($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuoteLineItem whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuoteLineItem whereQuoteRequestId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuoteLineItem whereUpdatedAt($value)
 * @mixin Eloquent
 * @property-read Inventory|null $inventoryItem
 * @property-read QuoteRequest $quote
 */
class QuoteLineItem extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'quote_request_id', 'quantity', 'is_additional', 'inventory_id'
    ];

    public function quote(): BelongsTo
    {
        return $this->belongsTo(QuoteRequest::class, 'quote_request_id');
    }

    public function inventoryItem(): BelongsTo
    {
        return $this->belongsTo(Inventory::class, 'inventory_id');
    }
}
