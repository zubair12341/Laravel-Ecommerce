<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Stripe;
use App\Models\Order;

class StripeController extends Controller
{

    public function index($id)
    {
        $order=Order::find($id);
        return view('front.stripe.index',['order'=>$order]);
    }

    public function stripePost(Request $request)
    {
       // dd($request->all());
        $order=Order::find($request->order_id);
        try
        {

            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        
            Stripe\Charge::create ([
                    "amount" => $order->grand_total * 100,
                    "currency" => "usd",
                    "source" => $request->stripeToken,
                    "description" => "Test payment from Multi Vender Ecommerce." 
            ]);
            $order->order_status= "New";
            $order->save();

            $orderDetails = Order::with('orders_products')->where('id', $order->id)->first()->toArray();
            $email = auth()->user()->email; // Retrieving The Authenticated User: https://laravel.com/docs/9.x/authentication#retrieving-the-authenticated-user

            // The email message data/variables that will be passed in to the email view
            $messageData = [
                'email'        => $email,
                'name'         => auth()->user()->name, // Retrieving The Authenticated User: https://laravel.com/docs/9.x/authentication#retrieving-the-authenticated-user
                'order_id'     => $order->id,
                'orderDetails' => $orderDetails
            ];

            \Illuminate\Support\Facades\Mail::send('emails.order', $messageData, function ($message) use ($email) { // Sending Mail: https://laravel.com/docs/9.x/mail#sending-mail    // 'emails.order' is the order.blade.php file inside the 'resources/views/emails' folder that will be sent as an email    // We pass in all the variables that order.blade.php will use    // https://www.php.net/manual/en/functions.anonymous.php
                $message->to($email)->subject('Order Placed - MultiVendorEcommerceApplication.com.eg');
            });


        }
        catch(\Exception $e)
        {
            return redirect()->back()->with('error_message', $e->getMessage());
        }
      
        // Session::flash('success', 'Payment successful!');
              
        return redirect('thanks');
    }
}
