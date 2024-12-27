<?php

namespace App\Livewire\Admin;

use App\Models\Comment;
use App\Models\Scopes\CommentConfirmedScope;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use Usernotnull\Toast\Concerns\WireToast;

class ManageComments extends Component
{
    use WireToast;
    use WithPagination;
    use WithoutUrlPagination;

    public function render()
    {
        $unconfirmed_comments = Comment::withoutGlobalScope(CommentConfirmedScope::class)->orderBy('updated_at', 'desc')->where('confirmed_at', '=', null)->paginate(6, pageName: 'unconfirmed_comments');
        $comments = Comment::orderBy('updated_at', 'desc')->where('confirmed_at', '!=', null)->paginate(6, pageName: 'comments');

        return view('livewire.admin.manage-comments', compact('comments', 'unconfirmed_comments'));
    }

    public function delete_comment(Comment $comment)
    {
        message('danger', 'کامنت شما لغو شد!', 'متاسفانه کامنت شما برای محصول «' . $comment->product->name . '» بعد از بررسی تایید نشد و حذف شد. لطفا محتوا را چک کنید و دوباره کامنت بگذارید.', $comment->user->id);
        $comment->delete();
        toast()->success('کامنت مورد نظر با موفقیت حذف شد!', 'موفق!')->push();
        $this->resetPage('comments');
    }

    public function confirmComment($id)
    {
        $comment = Comment::withoutGlobalScope(CommentConfirmedScope::class)->where('id', '=', $id)->first();

        message('success', 'کامنت شما تایید شد!', 'کامنت شما برای محصول «' . $comment->product->name . '» بعد از بررسی تایید شد و قابل نمایش است.', $comment->user->id);
        $comment->confirmed_at = now();
        $comment->update();
        toast()->success('کامنت با موفقیت تایید و ثبت شد!', 'موفق!')->push();
        $this->resetPage('unconfirmed_comments');
    }

    public function cancelComment($id)
    {
        $comment = Comment::withoutGlobalScope(CommentConfirmedScope::class)->where('id', '=', $id)->first();

        message('danger', 'کامنت شما لغو شد!', 'متاسفانه کامنت شما برای محصول «' . $comment->product->name . '» بعد از بررسی تایید نشد و حذف شد. لطفا محتوا را چک کنید و دوباره کامنت بگذارید.', $comment->user->id);
        $comment->delete();
        toast()->success('کامنت با موفقیت لغو و حذف شد!', 'موفق!')->push();
        $this->resetPage('unconfirmed_comments');
    }
}
