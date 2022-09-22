<?php

namespace App\Http\Controllers;
use App\Models\Publication;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart()
    {
        return view('font-end.publication.cartview');
    }
 
    
    public function addToCart($id)
    {
        $product = Publication::findOrFail($id);
          
        $cart = session()->get('cart', []);
  
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->picture,
                "author" => $product->author,
                "preview" => $product->preview,
                "stock" => $product->stock,
            ];
        }
          
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }


    // public function sendemail(Request $request){
    //     \Mail::send('email.sendmail', array(
    //         'name' => $request->name,
    //         'email' =>$request->email ,
    //         // 'phone' => $input['phone'],
    //         // 'subject' => $input['subject'],
    //         // 'message' => $input['message'],
    //     ), function($message) use ($request){
    //         $message->from($request->email);
    //         $message->to('mujammelh111@gmail.com', 'Admin')->subject($request->get('name'));
    //     });
    //     dd('yes');

    // }

    // public function create()
    // {
    //     dd('yes');
    //     return view('email');
    // }

    // public function sendEmail(Request $request)
    // {
    //     $request->validate([
    //       'email' => 'required|email',
    //       'subject' => 'required',
    //       'name' => 'required',
    //       'content' => 'required',
    //     ]);

    //     $data = [
    //       'subject' => $request->subject,
    //       'name' => $request->name,
    //       'email' => $request->email,
    //       'content' => $request->content
    //     ];

    //     Mail::send('email-template', $data, function($message) use ($data) {
    //       $message->to($data['email'])
    //       ->subject($data['subject']);
    //     });

    //     return back()->with(['message' => 'Email successfully sent!']);
    // }
    public function sendemail (Request $request){
        // dd($request->payment);
        if ($request->payment!='Cash-On-Delivery') {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'phone' => 'required',
                'address' => 'required',
                'payment' => 'required',
                'txnid' => 'required',
            ]);  
        }else{
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'phone' => 'required',
                'address' => 'required',
                'payment' => 'required',
            ]); 
        }
        $cart = session()->get('cart');
        $cartarry = json_encode( $cart );
        $details = [
            'title' => 'Mail from Online Web Tutor',
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'payment' => $request->payment,
            'txnid' => $request->txnid??'Not found',
            'cart' => $cartarry ,
        ];
       
        Mail::to('mujammelh111@gmail.com')->send(new \App\Mail\MyTestMail($details));
        session()->forget('cart');
        return redirect()->route('publication')
        ->with('success','Your Order is successfully done.');
        
        
    }

}
