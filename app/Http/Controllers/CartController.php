<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;
use App\CartDetail;
use App\Product;
use App\Mail\NewOrder;
use Mail;

class CartController extends Controller
{
    public function update(){
        
        //1ero actualizamos el stock de productos
        $this->updateProductStock();

        //2do guardamos el pedido.
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

    public function updateProductStock(){

        $details = auth()->user()->cart->details;

        foreach($details as $detail){
            $product = Product::find($detail->product_id);
            $product->stock = $product->stock - $detail->quantity;
            $product->save();//UPDATE STOCK
        }
    }
}
