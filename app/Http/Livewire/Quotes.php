<?php

namespace App\Http\Livewire;

use App\Models\QuoteRequest;
use App\Models\QuoteStatus;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Str;

class Quotes extends LivewireDatatable
{
    public bool $exportable = true;
    public string $route = '/admin/quotes';

    private function matchColor (string $status_id): string
    {
        return match ($status_id) {
            "1" => 'red',
            "2" => 'green',
            "3" => 'gray',
        };
    }

    public function columns(): array
    {
        return [
            NumberColumn::name('id')->hide(),

            NumberColumn::callback(['identifier', 'status_id'], function ($identifier, $status_id)
            {
                $color = $this->matchColor($status_id);

                return view('partials.colored-status-text')->with([
                    'text' => $identifier,
                    'color' => $color
                ]);
            })->label('ID'),

            Column::callback(['id', 'status_id'], function ($id, $status_id)
            {
                $color = $this->matchColor($status_id);

                return view('partials.colored-status-text')->with([
                    'text' => QuoteRequest::findOrFail($id)->versions()->count(),
                    'color' => $color
                ]);
            })->label('Version'),

            Column::callback(['user.name', 'status_id'], function ($userName, $status_id)
            {
                $color = $this->matchColor($status_id);

                return view('partials.colored-status-text')->with([
                    'text' => $userName,
                    'color' => $color
                ]);
            })->label('Client')->filterable($this->users),

            DateColumn::callback(['requested_date', 'status_id'], function ($requested_date, $status_id)
            {
                $color = $this->matchColor($status_id);

                $formatted = new Carbon($requested_date);

                return view('partials.colored-status-text')->with([
                    'text' => $formatted->toFormattedDateString(),
                    'color' => $color
                ]);
            })->label('Date')->filterable(),

            Column::callback(['timeslot', 'status_id'], function ($timeslot, $status_id)
            {
                $color = $this->matchColor($status_id);

                return view('partials.colored-status-text')->with([
                    'text' => $timeslot,
                    'color' => $color
                ]);
            })->label('Timeslot')
                ->filterable(['Morning', 'Midday', 'Afternoon', 'Flexible']),

            Column::callback(['distance', 'status_id'], function ($distance, $status_id)
            {
                $color = $this->matchColor($status_id);

                return view('partials.colored-status-text')->with([
                    'text' => $distance,
                    'color' => $color
                ]);
            })->label('Mileage'),

            Column::callback(['from_address', 'status_id'], function ($from_address, $status_id)
            {
                $color = $this->matchColor($status_id);

                $segments = Str::of($from_address)->split('/,+/')->all();

                return view('partials.colored-status-text')->with([
                    'text' => sizeof($segments) > 2 ? $segments[1].', '.$segments[2] : $segments[0],
                    'color' => $color
                ]);
            })->label('Collection Address')->searchable(),

            Column::callback(['to_address', 'status_id'], function ($to_address, $status_id)
            {

                $color = $this->matchColor($status_id);

                $segments = Str::of($to_address)->split('/,+/')->all();

                return view('partials.colored-status-text')->with([
                    'text' => sizeof($segments) > 2 ? $segments[1].', '.$segments[2] : $segments[0],
                    'color' => $color
                ]);
            })->label('Delivery Address')->searchable(),
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