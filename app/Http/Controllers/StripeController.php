<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Stripe;
  
class StripeController extends Controller
{
    public function index()
    {
        return view('checkout');
    }
     
      
    public function createCharge(Request $request)
    {
        // dd($request->all());
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => 5 * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Binaryboxtuts Payment Test"
        ]);
     
        return redirect('stripe')->with('success', 'Payment Successful!');
    }
}
