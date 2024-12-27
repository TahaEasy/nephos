<?php

namespace App\Livewire;

use App\Models\Message;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use Usernotnull\Toast\Concerns\WireToast;

class Messages extends Component
{
    use WireToast;
    use WithPagination;
    use WithoutUrlPagination;

    public string $selectedValue = 'unread';

    public function render()
    {
        $messages = Message::where('user_id', '=', auth()->id())->where('is_seen', '=', $this->selectedValue === 'read' ? 1 : 0)->orderByDesc('created_at')->paginate(5);

        return view('livewire.messages', compact('messages'));
    }

    public function setValue($newValue = 'unread')
    {
        if ($newValue !== 'unread' && $newValue !== 'read' && !$newValue) {
            $this->selectedValue = 'unread';
            return $this->resetPage();
        }
        $this->selectedValue = $newValue;
        $this->resetPage();
    }

    public function message_seen(Message $message)
    {
        $message->is_seen = true;
        $message->update();
        $this->resetPage();
    }

    public function all_messages_seen()
    {
        foreach (auth()->user()->unseen_messages as $message) {
            $message->is_seen = true;
            $message->update();
        }
        $this->resetPage();
    }

    public function all_messages_delete()
    {
        foreach (auth()->user()->seen_messages as $message) {
            $message->delete();
        }
        $this->resetPage();
    }
}
