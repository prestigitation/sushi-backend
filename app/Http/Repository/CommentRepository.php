<?php
namespace App\Http\Repository;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentRepository {
    public static function create(string $text)
    {
        $comment = new Comment();
        $comment->content = $text;
        $comment->user()->associate(Auth::user());
        return $comment->save();
    }
}
