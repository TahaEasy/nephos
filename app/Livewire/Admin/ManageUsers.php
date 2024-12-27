<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use Usernotnull\Toast\Concerns\WireToast;

class ManageUsers extends Component
{
    use WireToast;
    use WithPagination;
    use WithoutUrlPagination;

    public string $selectedStatus = 'all';
    public string $selectedOrderBy = 'updated_at';
    public string $searchName = '';
    public string $searchId = '';

    public function render()
    {
        $types = ['all', 'customers', 'sellers', 'banned'];
        if (!in_array($this->selectedStatus, $types)) {
            $this->selectedStatus = 'all';
        }

        $orderBys = ['updated_at', 'created_at', 'name', 'id'];
        if (!in_array($this->selectedOrderBy, $orderBys)) {
            $this->selectedOrderBy = 'all';
        }

        if (trim($this->searchId)) {
            $this->searchName = '';
            $users = User::where('id', '=', trim($this->searchId))->where('is_admin', '=', 0)->paginate(1);
        } else {
            if ($this->selectedStatus == 'customers') {
                $users = User::where(DB::raw('CONCAT(f_name, " ", l_name)'), 'LIKE', '%' . trim($this->searchName) . '%')->where('is_admin', '=', 0)->where('is_seller', '=', 0)->orderBy($this->selectedOrderBy === 'name' ? DB::raw('CONCAT(f_name, " ", l_name)') : $this->selectedOrderBy, $this->selectedOrderBy === 'name' ? 'asc' : 'desc')->paginate(5);
            }
            if ($this->selectedStatus == 'sellers') {
                $users = User::where(DB::raw('CONCAT(f_name, " ", l_name)'), 'LIKE', '%' . trim($this->searchName) . '%')->where('is_admin', '=', 0)->where('is_seller', '=', 1)->orderBy($this->selectedOrderBy === 'name' ? DB::raw('CONCAT(f_name, " ", l_name)') : $this->selectedOrderBy, $this->selectedOrderBy === 'name' ? 'asc' : 'desc')->paginate(5);
            }
            if ($this->selectedStatus == 'banned') {
                $users = User::where(DB::raw('CONCAT(f_name, " ", l_name)'), 'LIKE', '%' . trim($this->searchName) . '%')->where('is_admin', '=', 0)->orderBy($this->selectedOrderBy === 'name' ? DB::raw('CONCAT(f_name, " ", l_name)') : $this->selectedOrderBy, $this->selectedOrderBy === 'name' ? 'asc' : 'desc')->paginate(5);
                foreach ($users as $key => $user) {
                    if ($user->isNotBanned()) {
                        unset($users[$key]);
                    }
                }
            }
            if ($this->selectedStatus == 'all') {
                $users = User::where(DB::raw('CONCAT(f_name, " ", l_name)'), 'LIKE', '%' . trim($this->searchName) . '%')->where('is_admin', '=', 0)->orderBy($this->selectedOrderBy === 'name' ? DB::raw('CONCAT(f_name, " ", l_name)') : $this->selectedOrderBy, $this->selectedOrderBy === 'name' ? 'asc' : 'desc')->paginate(5);
            }
        }

        return view('livewire.admin.manage-users', compact('users'));
    }

    public function setStatus($newValue)
    {
        $types = ['all', 'customers', 'sellers', 'banned'];

        if (!in_array($newValue, $types)) {
            $this->selectedStatus = 'all';
            return $this->resetPage();
        }

        $this->selectedStatus = $newValue;
        $this->resetPage();
    }

    public function setOrderBy($newValue)
    {
        $orderBys = ['updated_at', 'created_at', 'name', 'id'];

        if (!in_array($newValue, $orderBys)) {
            $this->selectedOrderBy = 'all';
            return $this->resetPage();
        }

        $this->selectedOrderBy = $newValue;
        $this->resetPage();
    }

    public function reset_page()
    {
        $this->resetPage();
    }

    public function makeSeller(User $user)
    {
        $user->is_seller = 1;
        $user->update();
    }

    public function makeCustomer(User $user)
    {
        $user->is_seller = 0;
        $user->update();
    }

    public function banUser(User $user)
    {
        message('danger', 'حساب شما مسدود شد!', 'متاسفانه حساب شما به دلیل فعالیت های نامناسب مسدود شد!', $user->id);
        $user->ban();
        $user->update();
    }

    public function unbanUser(User $user)
    {
        message('success', 'حساب شما باز شد!', 'حساب شما پس از بررسی های دوباره از مسدودیت برداشته شد و میتوانید به روال عادی برگردید!', $user->id);
        $user->unban();
        $user->update();
    }
}
