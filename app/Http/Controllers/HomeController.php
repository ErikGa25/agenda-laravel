<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contactos =  DB::table('contacts')
                                ->select('id', 'name', 'username', 'email', 'address', 'cellphone', 'image', 'job_title', 'sex')
                                ->orderBy('id', 'desc')
                                ->simplePaginate(5);

        return view('contacts.listContact', ['contactos' => $contactos]);
    }

    public function getImage($fileimage) {
        $exists = Storage::disk('images')->exists($fileimage);

        if($exists) {
            $photo = Storage::disk('images')->get($fileimage);
            return new response($photo, 200);
        } else {
            return redirect()->action('HomeController@index');
        }
    }
}
