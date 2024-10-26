<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Client;
use App\Models\Product;
use Illuminate\Support\Str;
use App\Models\ProductOrder;
use App\Models\SalonProduct;
use Illuminate\Http\Request;
use App\Mail\NotificationMail;
use App\Models\ProductOrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Gloudemans\Shoppingcart\Facades\Cart;

class SiteController extends Controller
{
    public function products()
    {
        $data['products'] = SalonProduct::with(['client','product'])->latest()->get();
        $data['popular_products'] = SalonProduct::with(['client','product'])->latest()->limit(5)->get();
        return view('site.products', $data);
    }

    public function product_details($title)
    {
        $array  = explode('-', $title);
        $id     = end($array);
        $data['product'] = SalonProduct::with('photos')->find($id);

        return view('site.product-details', $data);
    }

    public function services()
    {
        return view('site.services');
    }

    public function shops()
    {
        $data['salons'] = Client::orderBy('name')->get();
        return view('site.shops', $data);
    }

    public function cart()
    {
        $data['carts'] = Cart::content();
        return view('site.cart', $data);
    }

    public function storeCart(Request $request)
    {
        $product_id     = $request['product_id'];
        $quantity       = $request['quantity'];
        $product        = SalonProduct::with('product')->find($product_id);
        $product_name   = $product->product->name ?? '';
        $price          = $product->amount;
        $feature_photo  = $product->feature_photo;
        $uniqueID       = uniqid() . '-' . $product->client_id;

        $carts = Cart::content();
        $isDifferent = false;
        if($carts->count() > 0) {
            foreach($carts as $row) {
                $cartItem = explode('-', $row->id);
                if($cartItem[1] != $product->client_id) {
                    $isDifferent = true;
                }
            }
        }

        if(!$isDifferent) {
            Cart::add($uniqueID, $product_name, $quantity, $price, 1, ['photo' => $feature_photo, 'product_id' => $product_id]);
            return redirect()->to('products');
        }

        return redirect()->to('cart')->with('error', 'You already had items in other salon, do you wish to switch salon? Please remove the items on the cart first.');
    }

    public function deleteCartItem($rowId)
    {
        Cart::remove($rowId);

        return response()->json(200);
    }

    public function checkout()
    {
        $data['carts'] = Cart::content();
        $data['customer'] = User::find(auth()->user()->id);
        return view('site.checkout', $data);
    }

    public function storeCheckout(Request $request)
    {
        $carts = Cart::content();
        if(!auth()->check()) {
            $password = strtoupper(Str::random(10));
            $customer = new User();
            $customer->fname            = $request['fname'];
            $customer->lname            = $request['lname'];
            $customer->email            = $request['email'];
            $customer->contact_number   = $request['contact_number'];
            $customer->password         = bcrypt($password);
            $customer->address          = $request['street_name'];
            $customer->city             = $request['city'];
            $customer->zip_code         = $request['zip'];
            $customer->role             = 'Customer';
            $customer->save();
            
            // TODO::send notification email for customer password
            $message = "We created your account using the email " .$customer->email. " and your default password is " . $password;
            $content = ['message' => $message];
            Mail::to($customer->email)->send(new NotificationMail($customer, $content));
        } else {
            $customer = User::find(auth()->user()->id);
        }

        $client_id = 0;
        foreach($carts as $row) {
            $cartItem   = explode('-', $row->id);
            $client_id  = $cartItem[1];
            break;
        }

        $total_amount   = Cart::total();
        $order          = new ProductOrder();
        $order->invoice_number  = Str::random(10);
        $order->customer_id     = $customer->id;
        $order->payment_status  = 'Pending';
        $order->payment_method  = $request['payment_method'];
        $order->amount          = str_replace(',','',$total_amount);
        $order->client_id       = $client_id;
        $order->save();
        
        foreach ($carts as $cart) {
            $product    = SalonProduct::find($cart->options->product_id);
            $item       = new ProductOrderItem();
            $item->order_id     = $order->id;
            $item->product_id   = $cart->options->product_id;
            $item->client_id    = $product->client_id;
            $item->item_price   = $cart->total;
            $item->quantity     = $cart->qty;
            $item->save();
        }

        if(!auth()->check()) {
            Auth::loginUsingId($customer->id);
        }

        Cart::destroy();

        return redirect()->to('dashboard');
    }
}
