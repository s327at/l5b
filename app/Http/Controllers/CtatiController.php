<?php

namespace App\Http\Controllers;
use App\Models\Moictati;
use DB;
use Illuminate\Http\Request;
use Validator;
use App\User;
class CtatiController extends Controller {

	/*
	 |--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/


	public function getAdmin()
	{
		return route('auth.logout');
	}
	
	public function edit($id)
	{
		$ctatia = Moictati::find($id);
		if (is_null($ctatia))
		{
			return Redirect::route('admin');
		}
		return view('ctati.editctati', compact('ctatia'));
	}
	
	public function destroy($id)
	{
		Moictati::find($id)->delete();
		return route('admin');
	}

	public function create()
	{
				return view('ctati.addctati');
	}
						
	public function store(Request $request)
    {


        $validator = Validator::make($request->all(), [

            'coderz' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('ctati/create')
                ->withErrors($validator)
                ->withInput();
        }
        $ctat = new Moictati();


            $ctat->coderz = $request->coderz;
            $ctat->tag = $request->tag;

            $ctat->save();
            return redirect()->route('admin');


    }
						
    public function update($id, Request $request)
    {

                            $validator = Validator::make($request->all(), [
                                'coderz' => 'required',
                            ]);

                            if ($validator->fails()) {
                                return redirect()->route('blog.ctati.edit')
                                    ->withErrors($validator)
                                    ->withInput();
                            }

                            $ctatia = Moictati::findOrFail($id);
                            $ctatia->coderz = $request->coderz;
                            $ctatia->save();
                            return redirect()->route('admin');



    }


    public function getctatiAdmin()
    {


        $moistat = DB::table('moictati')
            ->select(DB::raw(" coderz, DATE_FORMAT(datetime, '%d.%m.%Y') as datetime, tag,  id"))->orderBy('id', 'desc')->get();

        return view("ctati.redctati", compact('moistat'));
    }


    public  function show()
    {

    }
}

