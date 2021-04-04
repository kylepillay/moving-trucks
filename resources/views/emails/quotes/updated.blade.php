@component('mail::message')
    Hi {{ $quote->user->name }}! Your requested quote has been updated!

    Please log into your account to view your updated quote.
    {{--@component('mail::button', ['url'  => env('APP_URL').'/admin/quotes/'.$quote->id])--}}
    {{--    {{ __('Open in Dashboard') }}--}}
    {{--@endcomponent--}}

    @component('mail::table')
        |    Details                     |                                              |
        |:-------------------------------|---------------------------------------------:|
        | Quote ID                       |               {{ $quote->quote_identifier }} |
        | Name                           |                            {{ $quote->user->name }} |
        | Email                          |                           {{ $quote->user->email }} |
        | Phone                          |                           {{ $quote->user->phone }} |
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
