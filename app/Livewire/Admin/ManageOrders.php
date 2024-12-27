<?php

namespace App\Livewire\Admin;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use Usernotnull\Toast\Concerns\WireToast;

class ManageOrders extends Component
{
    use WireToast;
    use WithPagination;
    use WithoutUrlPagination;

    public string $searchId = '';

    public string $selectedStatus = 'waiting';
    public string $selectedOrderBy = 'updated_at';

    public function render()
    {
        $statuses = ["waiting", "in-progress", "sending", "delivered", "failure", "all"];
        if (!in_array($this->selectedStatus, $statuses)) {
            $this->selectedStatus = 'waiting';
        }

        $orderBys = ["updated_at", "created_at", "id"];
        if (!in_array($this->selectedOrderBy, $orderBys)) {
            $this->selectedOrderBy = 'updated_at';
        }

        if (trim($this->searchId)) {
            $orders = Order::where('id', '=', $this->searchId)->paginate(1);
        } else {
            if ($this->selectedStatus === 'all') {
                $orders = Order::orderByDesc($this->selectedOrderBy)->paginate(6);
            } else {
                $orders = Order::where('status', '=', $this->selectedStatus)->orderByDesc($this->selectedOrderBy)->paginate(6);
            }
        }

        return view('livewire.admin.manage-orders', compact('orders'));
    }

    public function setStatus($newValue)
    {
        $statuses = ["waiting", "in-progress", "sending", "delivered", "failure", "all"];

        if (!in_array($newValue, $statuses)) {
            $this->selectedStatus = 'waiting';
            return $this->resetPage();
        }

        $this->selectedStatus = $newValue;
        $this->resetPage();
    }

    public function setOrderBy($newValue)
    {
        $orderBys = ["updated_at", "created_at", "id"];

        if (!in_array($newValue, $orderBys)) {
            $this->selectedOrderBy = 'updated_at';
            return $this->resetPage();
        }

        $this->selectedOrderBy = $newValue;
        $this->resetPage();
    }

    public function updateOrder(Order $order)
    {
        if ($order->status === 'waiting') {
            $order->status = 'in-progress';
            $order->update();
            toast()->success('وضعیت سفارش به "درحال آماده سازی" تغییر یافت!', 'موفق!')->push();

            return $this->resetPage();
        }
        if ($order->status === 'in-progress') {
            $order->status = 'sending';
            $order->update();
            toast()->success('وضعیت سفارش به "درحال ارسال" تغییر یافت!', 'موفق!')->push();

            return $this->resetPage();
        }
        if ($order->status === 'sending') {
            $order->status = 'delivered';
            $order->update();
            toast()->success('وضعیت سفارش به "تکمیل" تغییر یافت!', 'موفق!')->push();

            return $this->resetPage();
        }
    }
}
