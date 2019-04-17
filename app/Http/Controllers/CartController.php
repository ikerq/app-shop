<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;
use App\Mail\NewOrder;
use Mail;

class CartController extends Controller
{
    public function update(){
        
        $client = auth()->user(); 
        $cart = $client->cart;
        $cart->status = 'Pending';
        $cart->order_date = Carbon::now();
        $cart->save();

        $admins = User::where('admin', true)->get();
        // Descomentar la linea 23 para ver como quedaria el body del correos
        // return new NewOrder($client, $cart);
        // Descomentar la linea 25 en caso de tener configurado el envio de correos
        // Mail::to($admins)->send(new NewOrder($client, $cart));

        $notification = 'Tu pedido ha sido registrado exitosamente! Te contactaremos pronto vía mail!';
        return back()->with(compact('notification'));
    }
}
