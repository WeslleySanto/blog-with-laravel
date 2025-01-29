<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreCommentFormRequest;

class CommentController extends Controller
{
    public function store(StoreCommentFormRequest $request)
    {
        $comment = $request->user()->comments()->create($request->all());

        return redirect()
                    ->route('show_posts', $comment->post_id)
                    ->withSuccess('Comentário realizado com sucesso!');
    }
}
