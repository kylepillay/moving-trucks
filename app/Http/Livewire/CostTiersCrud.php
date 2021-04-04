<?php

namespace App\Http\Livewire;

use App\Models\CostTiers;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use JetBrains\PhpStorm\ArrayShape;
use Livewire\Component;
use Livewire\WithPagination;

class CostTiersCrud extends Component
{
    use WithPagination;

    public bool $modalFormVisible = false;
    public bool $modalConfirmDeleteVisible = false;
    public int|null $modelId = null;
    public string $query = '';
    public int $perPage = 10;

    /**
     * Put your custom public properties here!
     */

    public float $minimum_charge = 0;
    public float $cost_per_km = 0;
    public string $label = '';

    /**
     * The validation rules
     *
     * @return string[]
     */
    #[ArrayShape(['minimum_charge' => "string", 'cost_per_km' => "string", 'label' => "string"])] public function rules(): array
    {
        return [
            'minimum_charge' => 'required|numeric',
            'cost_per_km' => 'required|numeric',
            'label' => 'required|string'
        ];
    }

    /**
     * Loads the model data
     * of this component.
     *
     * @return void
     */
    public function loadModel()
    {
        $data = CostTiers::find($this->modelId);
        $this->cost_per_km = $data->cost_per_km;
        $this->minimum_charge = $data->minimum_charge;
        $this->label = $data->label;
    }

    /**
     * The data for the model mapped
     * in this component.
     *
     * @return string[]
     */
    public function modelData(): array
    {
        return [
            'minimum_charge',
            'cost_per_km',
            'label'
        ];
    }

    /**
     * The create function.
     *
     * @return void
     */
    public function create()
    {
        $this->validate();
        CostTiers::create($this->modelData());
        $this->modalFormVisible = false;
        $this->reset();
    }

    /**
     * The read function.
     *
     * @return LengthAwarePaginator
     */
    public function read(): LengthAwarePaginator
    {
        $query = '%'.$this->query.'%';

        return CostTiers::where('label','like', $query)->paginate($this->perPage);
    }

    /**
     * The update function
     *
     * @return void
     */
    public function update()
    {
        $this->validate();
        CostTiers::find($this->modelId)->update($this->modelData());
        $this->modalFormVisible = false;
    }

    /**
     * The delete function.
     *
     * @return void
     */
    public function delete()
    {
        CostTiers::destroy($this->modelId);
        $this->modalConfirmDeleteVisible = false;
        $this->resetPage();
    }

    /**
     * Shows the create modal
     *
     * @return void
     */
    public function createShowModal()
    {
        $this->resetValidation();
        $this->reset();
        $this->modalFormVisible = true;
    }

    /**
     * Shows the form modal
     * in update mode.
     *
     * @param int $id
     * @return void
     */
    public function updateShowModal(int $id)
    {
        $this->resetValidation();
        $this->reset();
        $this->modalFormVisible = true;
        $this->modelId = $id;
        $this->loadModel();
    }

    /**
     * Shows the delete confirmation modal.
     *
     * @param int $id
     * @return void
     */
    public function deleteShowModal(int $id)
    {
        $this->modelId = $id;
        $this->modalConfirmDeleteVisible = true;
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.cost-tiers-crud', [
            'data' => $this->read(),
        ]);
    }
}