<?php

namespace App\Livewire\Admin\User;

use App\Models\Comment;
use App\Models\User;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use Usernotnull\Toast\Concerns\WireToast;

class Comments extends Component
{
    use WireToast;
    use WithPagination;
    use WithoutUrlPagination;

    public User $user;

    public function render()
    {
        $unconfirmed_comments = Comment::where('user_id', '=', $this->user->id)->orderBy('updated_at', 'desc')->where('confirmed_at', '=', null)->paginate(6, pageName: 'unconfirmed_comments');
        $comments = Comment::where('user_id', '=', $this->user->id)->orderBy('updated_at', 'desc')->where('confirmed_at', '!=', null)->paginate(6, pageName: 'comments');

        return view('livewire.admin.user.comments', compact('comments', 'unconfirmed_comments'));
    }

    public function delete_comment(Comment $comment)
    {
        message('danger', 'کامنت شما لغو شد!', 'متاسفانه کامنت شما برای محصول «' . $comment->product->name . '» بعد از بررسی تایید نشد و حذف شد. لطفا محتوا را چک کنید و دوباره کامنت بگذارید.', $comment->user->id);
        $comment->delete();
        toast()->success('کامنت مورد نظر با موفقیت حذف شد!', 'موفق!')->push();
        $this->resetPage('comments');
    }

    public function confirmComment(Comment $comment)
    {
        message('success', 'کامنت شما تایید شد!', 'کامنت شما برای محصول «' . $comment->product->name . '» بعد از بررسی تایید شد و قابل نمایش است.', $comment->user->id);
        $comment->confirmed_at = now();
        $comment->update();
        toast()->success('کامنت با موفقیت تایید و ثبت شد!', 'موفق!')->push();
        $this->resetPage('unconfirmed_comments');
    }

    public function cancelComment(Comment $comment)
    {
        message('danger', 'کامنت شما لغو شد!', 'متاسفانه کامنت شما برای محصول «' . $comment->product->name . '» بعد از بررسی تایید نشد و حذف شد. لطفا محتوا را چک کنید و دوباره کامنت بگذارید.', $comment->user->id);
        $comment->delete();
        toast()->success('کامنت با موفقیت لغو و حذف شد!', 'موفق!')->push();
        $this->resetPage('unconfirmed_comments');
    }
}
