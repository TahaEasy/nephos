<?php

namespace App\Livewire\Forms;

use App\Models\Comment;
use Livewire\Component;
use Usernotnull\Toast\Concerns\WireToast;

class CreateComment extends Component
{
    use WireToast;

    public $rating;
    public $content;
    public int $productId;

    public function render()
    {
        return view('livewire.forms.create-comment');
    }

    public function submit()
    {
        $this->validate([
            'content' => 'required|min:10|max:500',
            'rating' => 'required|integer|min:1|max:5',
        ], [
            'content.required' => 'لطفا در کادر چیزی بنویسید!',
            'rating.required' => 'حتما یکی از ستاره ها را انتخاب کنید!',
            'rating.min' => 'لطفا مقدار ستاره را تغییر ندهید!',
            'rating.max' => 'لطفا مقدار ستاره را تغییر ندهید!',
        ]);

        $this->content = strip_tags(nl2br($this->content), '<br>');

        $comment = new Comment();
        $comment->content = $this->content;
        $comment->rating = $this->rating;
        $comment->user_id = auth()->id();
        $comment->product_id = $this->productId;

        $comment->save();

        $this->content = null;
        $this->rating = null;
        return toast()->info('نظر شما ثبت شد و پس از تایید نهایی در سایت نمایش داده میشود!', 'موفق!')->push();
    }
}
