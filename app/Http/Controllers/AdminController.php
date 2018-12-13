<?php

namespace App\Http\Controllers;
use App\User;
use App\Models\Comment;
class AdminController extends Controller
{
    public function showcomment()
    {
        $comments = Comment::where('moderated', '=', NULL)->get();
        return view('admin.commen', compact('comments'));
    }

    public function alluser()
    {
        $alluser = User::all();
        return view('admin.alluser', compact ('alluser'));
    }

    public function moderate($id)
    {
        $comment_mod = Comment::findOrFail($id);
        $comment_mod->moderated = true;
        $comment_mod->save();

    }

    public function banuser($id)
    {

        $user = User::findOrFail($id);
        if (!$user->activated) {
            // User is Banned
        } else {
            // User is not Banned
            $user->activated = 0;
            $user->save();
            // $info ='забанен';
            $alluser = User::all();
            return view('admin.alluser', compact('alluser'));
        }
    }

    public function unban($id)
    {
        $user = User::findOrFail($id);
        if ($user->activated) {
            // User is Banned
        } else {
            // User is not Banned
            $user->activated = 1;
            $user->save();
            $alluser = User::all();
            return view('admin.alluser', compact('alluser'));
        }

    }

    public function adminpanel()
    {
    return view ('layouts.layout_admin');
    }
}