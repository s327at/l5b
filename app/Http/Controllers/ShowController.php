<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Moictati;
use App\Models\Comment;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Validator;
class ShowController extends Controller {

     public function index()
    {
        $moistat = DB::table('moictati')
            ->select(DB::raw("substring(coderz, 1, 170) as coderz, DATE_FORMAT(datetime, '%d.%m.%Y') as datetime, tag,  id"))->orderBy('id', 'desc')->get();

        $lar=$ang=$ubu=0;

        foreach( $moistat as $mois ) {

            switch ($mois->tag) {
                case "Laravel":
                $lar=$lar+1;
                    break;
                case "AngularJS":
                    $ang=$ang+1;
                    break;
                case "Ubuntu":
                    $ubu=$ubu+1;
                    break;
            }
        }


        return view('ctati.hello1', compact('moistat', 'lar', 'ang', 'ubu'));


    }

    public function show($id)
    {
        $com = Moictati::find($id)->comments()->where('moderated', '=', 1)->get();
        $ct = Moictati::find($id);
        if (Auth::check()){
            $user = Auth::user();
            $uid = $user->getAuthIdentifier();


            return view('ctati.ctctcomment', compact('com', 'ct','uid'));
        } else {

            return view('ctati.ctctcomment_a', compact('com', 'ct'));
        }

    }

    public function naiti(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'naiti' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('/')
                ->withErrors($validator)
                ->withInput();
        }

        $input = $request->naiti;
        $input='%'.$input.'%';
        $vibor = DB::table('moictati')->where('coderz', 'like', $input)->get();
        return view('ctati.hello1_vibor', compact('vibor'));

    }

    public function showCtatiTag($tag)
    {

        $ctat = Moictati::where('tag', '=', $tag)->get();

        if (Auth::check()){
            $user = Auth::user();
            $uid = $user->getAuthIdentifier();


            return view('ctati.ctati_tag_user_zareg', compact('ctat', 'uid'));
        } else {

            return view('ctati.ctati_tag', compact('ctat'));
        }

    }

}
