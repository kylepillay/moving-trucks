<?php

namespace App\Http\Livewire;

use App\Models\Inventory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use JetBrains\PhpStorm\ArrayShape;
use Livewire\Component;
use Livewire\WithPagination;

class InventoryCrud extends Component
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

    public string|null $item = null;
    public int|null $position, $length, $breadth, $height, $volume = null;

    /**
     * The validation rules
     *
     * @return string[]
     */
    #[ArrayShape(['position' => "string", 'item' => "string"])] public function rules()
    {
        return [
            'position' => 'integer:required',
            'item' => 'string:required'
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
        $data = Inventory::find($this->modelId);
        $this->position = $data->position;
        $this->item = $data->item;
        $this->length = $data->length;
        $this->breadth = $data->breadth;
        $this->height = $data->height;
        $this->volume = $data->volume;
    }

    /**
     * The data for the model mapped
     * in this component.
     *
     * @return array
     */
    public function modelData(): array
    {
        return [
            'position', 'item', 'length', 'breadth', 'height', 'volume'
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
        Inventory::create($this->modelData());
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

        return Inventory::where('item','like', $query)->paginate($this->perPage);
    }

    /**
     * The update function
     *
     * @return void
     */
    public function update()
    {
        $this->validate();
        Inventory::find($this->modelId)->update($this->modelData());
        $this->modalFormVisible = false;
    }

    /**
     * The delete function.
     *
     * @return void
     */
    public function delete()
    {
        Inventory::destroy($this->modelId);
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
     * @param  int $id
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
     * @param  int $id
     * @return void
     */
    public function deleteShowModal(int $id)
    {
        $this->modelId = $id;
        $this->modalConfirmDeleteVisible = true;
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.inventory-crud', [
            'data' => $this->read(),
        ]);
    }
}