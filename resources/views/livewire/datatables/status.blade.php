<div>
@if($value === "Confirmed")
    <x-table-actions :color="'blue'" :text="$value" :row="$row" />
@elseif($value === "Pending")
    <x-table-actions :color="'red'" :text="$value" :row="$row" />
@elseif($value === "Complete")
    <x-table-actions :color="'gray'" :text="$value" :row="$row" />
@endif
</div>