<?php

namespace App\Livewire;

use Livewire\Component;
use Usernotnull\Toast\Concerns\WireToast;

class TrackMessages extends Component
{
    use WireToast;

    public $unseen_messages;
    public $currentUrl;

    public function mount()
    {
        $this->currentUrl = url()->current();
    }

    public function render()
    {
        return view('livewire.track-messages');
    }

    public function trackUserMessages()
    {
        $this->unseen_messages = auth()->user()->unseen_messages;
        foreach ($this->unseen_messages as $message) {
            if (!$message->is_alerted) {
                if ($this->currentUrl !== route('dashboard')) {
                    toast()->info('شما یک پیام جدید با عنوان «' . $message->title . '» دارید، میتوانید از قسمت حساب کاربری پیام ها را مشاهده کنید')->push();
                }
                $message->is_alerted = 1;
                $message->update();
            }
        }
    }
}
