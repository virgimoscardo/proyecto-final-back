<?php
namespace App\Http\Controllers;

use App\Models\Formulario;
use App\Mail\MensjeContacto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
 

class FormularioApiController extends Controller
{
    public function storeApiMensaje(){
        $validator = Validator::make(request()->all(),[
            'name' => 'required | min:3',
            'email' => 'required ',
            'phone' => 'required',
            'message' => 'required'
        ],[
            'name.required' => 'Debe ingresar un nombre',
            'name.min' =>'El nombre debe tener como mínimo 3 caracteres',
            'email.required' =>'Debe ingresar un email',
            'phone.required' =>'Debe ingresar un número de teléfono',
            'message.required' =>'Debe ingresar un mensaje'
        ]);

        if ($validator -> fails()){
            return response ([
                'error'=>true,
                'data'=>$validator -> errors()
            ], 422);
        };
        
        /*dd(request()->all());*/
                
        $mensaje = Formulario::create([
            'name' => request()->name,
            'email' => request()->email,
            'phone' => request()->phone,
            'message' => request()->message
        ]);

        Mail::to('virgi.moscardo@gmail.com')->send(new MensjeContacto($mensaje));
        
        return response ([
            "meta" =>[
                "mensaje" => "Su mensaje fue enviado, nos comunicaremos con usted",
                "codigo" => 200
            ],
            'data' => $mensaje
        ], 200);

    }
}
