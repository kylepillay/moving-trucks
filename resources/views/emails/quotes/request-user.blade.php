@component('mail::message')
Hi {{ $user->name }}! This mail is a confirmation that you have made a request for a quote. The details are listed below.

There is no need for you to respond to this mail, you will be contacted shortly with an update on your request.
{{--@component('mail::button', ['url'  => env('APP_URL').'/admin/quotes/'.$quote->id])--}}
{{--    {{ __('Open in Dashboard') }}--}}
{{--@endcomponent--}}

@component('mail::table')
|    Details                     |                                              |
|:-------------------------------|---------------------------------------------:|
| Quote ID                       |               {{ $quote->quote_identifier }} |
| Name                           |                            {{ $user->name }} |
| Email                          |                           {{ $user->email }} |
| Phone                          |                           {{ $user->phone }} |
| Date                           |                 {{ $quote->requested_date }} |
| Timeslot                       |                       {{ $quote->timeslot }} |
| Collection Address             |                   {{ $quote->from_address }} |
| Collection Address Description | {{ $quote->collection_address_description }} |
| Delivery Address               |                     {{ $quote->to_address }} |
| Delivery Address Description   |   {{ $quote->delivery_address_description }} |
| Mileage                        |                    {{ $quote->distance }} KM |
@endcomponent
@if(sizeof($quote->lineItems()->get()) > 0)

@component('mail::panel')
## Selected Items
@component('mail::table')
| Item                           |  Quantity                                         |
|:-------------------------------|--------------------------------------------------:|
@foreach($quote->lineItems()->get() as $lineItem)
@if($lineItem->quantity > 0)
| {{ $lineItem->inventoryItem->item }}   |   {{ $lineItem->quantity > 0 }} |
@endif
@endforeach
@endcomponent
@endcomponent
@endif

@if($quote->items_list)

@component('mail::table')
### Additional Items:
{{ $quote->items_list }}
### Special Instructions:
{{ $quote->special_instructions }}
@endcomponent
@endif

@endcomponent
