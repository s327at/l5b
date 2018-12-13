<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Policies\CommentPolicy;
class CommentsController extends Controller {

	/**
	 * Display a listing of comments
	 *
	 * @return Response
	 */
	public function index()
	{
		$user = Auth::user();
		$uid = $user->getAuthIdentifier();
		$comments = Comment::where('user_id', '=', $uid)->get();
		return view('comments.index', compact('comments'));
	}

	/**
	 * Show the form for creating a new comment
	 *
	 * @return Response
	 */
	public function create()
	{

		return View::make('comments.create');
	}

	/**
	 * Store a newly created comment in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$validator = Validator::make($request->all(), [

			'body' => 'required',
		]);

		if ($validator->fails()) {
			return redirect('comments/create')
				->withErrors($validator)
				->withInput();
		}
		$comment = new Comment();
		$user = User::findOrFail($request->user_id);
			$comment->body = $request->body;
			$comment->moictati_id = $request->moictati_id;
			$comment->user_id = $request->user_id;
			$comment->moderated = 0;
			$comment->save();
			return redirect()->route('comments.index');
    }

	/**
	 * Display the specified comment.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$comment = Comment::findOrFail($id);
		return view('comments.show', compact('comment'));
	}

	/**
	 * Show the form for editing the specified comment.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $user = Auth::user();
        $comment = Comment::find($id);
	    if ($user->can('edit', $comment)) {

            return view('comments.edit', compact('comment'));
        }
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$validator = Validator::make($request->all(), [
			'body' => 'required',
		]);

		if ($validator->fails()) {
			return redirect('comments/edit')
				->withErrors($validator)
				->withInput();
		}

		$comment = Comment::findOrFail($id);
		$comment->body = $request->body;
		$comment->save();
		return redirect()->route('comments.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $user = Auth::user();
        $comment = Comment::find($id);
        if ($user->can('destroy', $comment)) {
            Comment::destroy($id);
            return redirect()->route('comments.index');
        }
	}

}
