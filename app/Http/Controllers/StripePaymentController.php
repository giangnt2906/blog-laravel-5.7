<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;
use Illuminate\Support\Facades\Session;
use App\Post;

class StripePaymentController extends Controller
{
    //
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe($id)
    {
        $post = Post::find($id);
        return view('pages.stripe')->with('post', $post);
        // return view('posts.show');
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request, $id)
    {
        try {

            // Find post from id and update Donated field for that Post
            $post = Post::find($id);
            $post->donated = $post->donated + $_POST['amount'];

            $amount = $_POST['amount'];
            Stripe::setApiKey("sk_test_6OMgG9TCfY4B2C12JBiQTlMm00F9gX3Doh");

            // $customer = Customer::create(array(
            //     'email' => $request->stripeEmail,
            //     'source'  => $request->stripeToken
            // ));

            Charge::create([
                // 'customer' => $customer->id,
                "amount" => $amount * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment"
            ]);

            Session::flash('success', 'Payment successful!');
            $post->save();

            return back();
            // return redirect('/posts/{{id}}');
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }
}
