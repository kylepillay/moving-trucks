
@component('mail::button', ['url'  => env('APP_URL').'/admin/quotes/'.$quote->id])
    {{ __('Open in Dashboard') }}
@endcomponent
Details<br><br>
Quote ID                       : {{ $quote->quote_identifier }}<br>
Name                           : {{ $user->name }}<br>
Email                          : {{ $user->email }}<br>
Phone                          : {{ $user->phone }}<br>
Date                           : {{ $quote->requested_date }}<br>
Timeslot                       : {{ $quote->timeslot }}<br>
Collection Address             : {{ $quote->from_address }}<br>
Collection Address Description : {{ $quote->collection_address_description }}<br>
Delivery Address               : {{ $quote->to_address }}<br>
Delivery Address Description   : {{ $quote->delivery_address_description }}<br>
Mileage                        : {{ $quote->distance }} KM<br>
Volume                         : {{ $volumeTotal }}<br><br><br>

@if(sizeof($quote->lineItems()->get()) > 0)
Selected Items<br><br>
@foreach($quote->lineItems()->get() as $lineItem)
    @if($lineItem->quantity > 0)
        {{ $lineItem->inventoryItem->item }}: {{ $lineItem->quantity > 0 }}<br>
    @endif
@endforeach
@endif

@if($quote->items_list)
    <br><br>
    Additional Items: {{ $quote->items_list }}<br>
    Special Instructions: {{ $quote->special_instructions }}<br>
    Volume Total: {{ $total }}
@endif