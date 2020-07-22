<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Contact;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contacts.formContact');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre'    => 'required|max:30',
            'apellido'  => 'required|max:30',
            'correo'    => 'required|unique:contacts,email|email|max:40',
            'direccion' => 'required|max:300',
            'movil'     => 'required|numeric',
            'imagen'    => 'nullable|image|max:2048',
            'puesto'    => 'required|max:25',
            'sexo'      => 'required|max:1',
        ]);

        if ($validator->fails()) {
            return redirect()->action('ContactController@create')->withErrors($validator)->withInput();
        } else {
            if(is_null($request->file('imagen'))) {
                if($request->sexo == 'M') {
                    $nombre_imagen = 'masculino.png';
                } else {
                    $nombre_imagen = 'femenino.png';
                }
            } else {
                $archivo = $request->file('imagen');
                $nombre_imagen = time().$archivo->getClientOriginalName();
                Storage::disk('images')->put($nombre_imagen,  \File::get($archivo));
            }
            
            $contact = new Contact;
                $contact->name      = $request->nombre;
                $contact->username  = $request->apellido;
                $contact->email     = $request->correo;
                $contact->address   = $request->direccion;
                $contact->cellphone = $request->movil;
                $contact->image     = $nombre_imagen;
                $contact->job_title = $request->puesto;
                $contact->sex       = $request->sexo;
                $contact->user_id   = \Auth::user()->id;
            $confirm = $contact->save();

            if($confirm) {
                return redirect()->action('HomeController@index')->with('message', 'Se creo el contacto correctamente.');
            } else {
                return redirect()->action('ContactController@create')->with('error', 'Error al crear el contacto, intentar nuevamente.');
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contacto = Contact::find($id);
        if(is_null($contacto)) {
            return redirect()->action('HomeController@index');
        } else {
            return view('contacts.formUpdateContact', ['contacto' => $contacto]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $contacto = Contact::find($id);

        if(is_null($contacto)) {
            return redirect()->action('HomeController@index');
        } else{
            $validator = Validator::make($request->all(), [
                'nombre'    => 'required|max:30',
                'apellido'  => 'required|max:30',
                'correo'    => 'required|email|max:40',
                'direccion' => 'required|max:300',
                'movil'     => 'required|numeric',
                'imagen'    => 'nullable|image|max:2048',
                'puesto'    => 'required|max:25',
                'sexo'      => 'required|max:1',
            ]);
    
            if ($validator->fails()) {
                return redirect()->action('ContactController@edit', ['contacto' => $contacto])->withErrors($validator)->withInput();
            } else {
                //funcionalidad
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contacto = Contact::find($id);
        if(is_null($contacto)) {
            return redirect()->action('HomeController@index');
        } else {
            $contacto->delete();
            return redirect()->action('HomeController@index')->with('message', 'Se elimino el contacto correctamente.');
        }
    }
}
