<?php

namespace App\Http\Livewire;

use App\Mail\QuoteRequestRemind;
use App\Mail\QuoteRequestUpdated;
use App\Models\QuoteRequest;
use App\Models\QuoteStatus;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Str;

class Quotes extends LivewireDatatable
{
    public $model = QuoteRequest::class;
    public $exportable = true;
    public $route = '/admin/quotes';

    public function columns()
    {
        return [
            NumberColumn::name('id')->hide(),

            NumberColumn::name('identifier')
                ->label('ID'),

            Column::callback('id', 'getVersionCount')
                ->label('Version'),

            Column::name('user.name')
                ->label('Client')->filterable($this->users),

            DateColumn::callback('requested_date', 'getFormattedDate')
                ->label('Date')
                ->filterable(),

            Column::name('timeslot')
                ->label('Timeslot')
                ->filterable(['Morning', 'Midday', 'Afternoon', 'Flexible']),

            Column::callback('distance', 'getFormattedMileage')
                ->label('Mileage'),

            Column::callback('from_address', 'getShortenedAddress')
                ->label('Collection Address')->searchable(),

            Column::callback('to_address', 'getShortenedAddress')
                ->label('Delivery Address')->searchable(),
        ];
    }


    /**
     * The read function.
     *
     * @return QuoteRequest|Builder
     */
    public function builder(): QuoteRequest|Builder
    {
        if (Auth::user()->hasRole(['admin'])){
            return QuoteRequest::query();
        } else {
            return QuoteRequest::where('user_id', Auth::user()->id);
        }
    }

    public function getVersionCount(int $id): string
    {
        return QuoteRequest::findOrFail($id)->versions()->count();
    }

    public function getFormattedDate(string $requested_date): string
    {
        $formatted = new Carbon($requested_date);

        return $formatted->toFormattedDateString();
    }

    public function getShortenedAddress(string $address): string
    {
        $segments = Str::of($address)->split('/,+/')->all();

        return sizeof($segments) > 2 ? $segments[1].', '.$segments[2] : $segments[0];
    }

    public function getFormattedMileage(string $distance): string
    {
        return $distance.' KM';
    }

    /**
     * @return Collection
     */
    public function getStatusProperty(): Collection
    {
        return QuoteStatus::pluck('title');
    }

    /**
     * @return Collection
     */
    public function getUsersProperty(): Collection
    {
        return User::pluck('name');
    }
}