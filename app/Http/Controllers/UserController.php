<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\User;
use App\Http\Controllers\Controller;
use Auth;
use Validator;
use Illuminate\Http\Request;
class UserController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$user = Auth::user();

		return view('users.myaccount2', compact('user'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$success ="change was success";
		return view('users.update', compact('success'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */

	public function edit($id)
	{

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request )
	{

		$validator = Validator::make($request->all(), [
			'name' => 'required|max:255',
			'emails' => 'required|emails|max:255|unique:users',

		]);

		if ($validator->fails()) {
			return redirect('user/index')
				->withErrors($validator)
				->withInput();
		}

		$user = User::findOrFail($id);
		if($user->activated) {
			$user->name = $request->name;
			$user->email = $request->email;
			$user->save();
			return redirect('user/show');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$user = User::findOrFail($id);
		$comments = Comment::where('user_id', '=', $id)->delete();
		$user->delete();
		$message = "Ваш эккаунт успешно удален";
		return view('users.show', compact ('message'));
	}

}