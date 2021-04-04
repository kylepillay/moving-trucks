<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Mpociot\Versionable\VersionableTrait;

/**
 * App\Models\QuoteRequest
 *
 * @property int $id
 * @property string $quote_id
 * @property string|null $name
 * @property string|null $collection_address_description
 * @property string|null $delivery_address_description
 * @property int $date_is_flexible
 * @property int $use_form
 * @property string|null $items_list
 * @property int|null $make_additional_stop
 * @property string|null $additional_stop_address
 * @property int $plastic_covers
 * @property int $bubble_wrap
 * @property string|null $special_instructions
 * @property string|null $phone
 * @property string|null $email
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|QuoteRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|QuoteRequest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|QuoteRequest query()
 * @method static \Illuminate\Database\Eloquent\Builder|QuoteRequest whereAdditionalStopAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuoteRequest whereBubbleWrap($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuoteRequest whereCollectionAddressDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuoteRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuoteRequest whereDateIsFlexible($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuoteRequest whereDeliveryAddressDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuoteRequest whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuoteRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuoteRequest whereItemsList($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuoteRequest whereMakeAdditionalStop($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuoteRequest whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuoteRequest wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuoteRequest wherePlasticCovers($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuoteRequest whereQuoteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuoteRequest whereSpecialInstructions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuoteRequest whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuoteRequest whereUseForm($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\QuoteLineItem[] $lineItems
 * @property-read int|null $line_items_count
 * @property string $quote_identifier
 * @property string $client_transport_request_id
 * @method static \Illuminate\Database\Eloquent\Builder|QuoteRequest whereClientTransportRequestId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuoteRequest whereQuoteIdentifier($value)
 * @property string|null $collection_or_delivery_stop
 * @method static \Illuminate\Database\Eloquent\Builder|QuoteRequest whereCollectionOrDeliveryStop($value)
 * @property string|null $from_address
 * @property string|null $to_address
 * @property string|null $requested_date
 * @property string|null $distance
 * @property float|null $price
 * @property string|null $terms
 * @method static \Illuminate\Database\Eloquent\Builder|QuoteRequest whereDistance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuoteRequest whereFromAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuoteRequest wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuoteRequest whereRequestedDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuoteRequest whereTerms($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuoteRequest whereToAddress($value)
 * @property-read \App\Models\User $user
 * @property int $user_id
 * @method static \Illuminate\Database\Eloquent\Builder|QuoteRequest whereUserId($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\QuoteLineItem[] $additionalStopLineItems
 * @property-read int|null $additional_stop_line_items_count
 * @property string|null $timeslot
 * @property int|null $status
 * @method static \Illuminate\Database\Eloquent\Builder|QuoteRequest whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuoteRequest whereTimeslot($value)
 * @property string|null $identifier
 * @property-write mixed $reason
 * @property-read \Illuminate\Database\Eloquent\Collection|\Mpociot\Versionable\Version[] $versions
 * @property-read int|null $versions_count
 * @method static \Illuminate\Database\Eloquent\Builder|QuoteRequest whereIdentifier($value)
 * @property int|null $volume
 * @method static \Illuminate\Database\Eloquent\Builder|QuoteRequest whereVolume($value)
 * @property int $status_id
 * @method static \Illuminate\Database\Eloquent\Builder|QuoteRequest whereStatusId($value)
 */
class QuoteRequest extends Model
{
    use HasFactory, VersionableTrait;

    protected $fillable = [
        'user_id',
        'from_address',
        'to_address',
        'requested_date',
        'distance',
        'quote_identifier',
        'timeslot',
        'client_transport_request_id',
        'collection_address_description',
        'delivery_address_description',
        'date_is_flexible',
        'use_form',
        'items_list',
        'make_additional_stop',
        'additional_stop_address',
        'plastic_covers',
        'bubble_wrap',
        'special_instructions',
        'identifier',
        'volume',
        'status_id'
    ];

    public function lineItems(): HasMany
    {
        return $this->hasMany(QuoteLineItem::class);
    }

    public function additionalStopLineItems(): HasMany
    {
        return $this->hasMany(QuoteLineItem::class)->where('is_additional', true);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(QuoteStatus::class, 'status_id');
    }

    public function formattedDate(): string
    {
        $formatted = new \Carbon\Carbon($this->requested_date);

        return $formatted->format('l jS \\of F Y');
    }
}
