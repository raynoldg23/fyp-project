<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\CustomerRecord;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $customer_id;  

    public function deleteCustomer($customer_id)
    {
        $this->customer_id = $customer_id;
    }
    
    public function destroyCustomer()
    {
        $customers = CustomerRecord::find($this->customer_id);
        $customers->delete();
        session()->flash('message', 'Category Deleted');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function render()
    {
        $customers = CustomerRecord::orderBy('id', 'DESC')->paginate(5);
        return view('livewire.admin.category.index',['customers' => $customers]);
    }
}
