<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomePageController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $user_type = optional($user)->user_type;
        $viewPage = $user_type == '1' ? 'admin.adminpage' : 'home.userpage';
        $order_number = Order::whereNotIn('status', ['cancelled', 'delivered'])->where('user_id', Auth::id())->count();
        $cart_number = Cart::where('user_id', Auth::id())->count();
        $usernumber = User::all()->count();
        $pending = Order::where('status', 'pending')->count();
        $confirmed = Order::where('status', 'delivered')->count();
        $capital = Order::where('status', 'delivered')->pluck('calculated_column')->sum();

        return view($viewPage,compact('cart_number', 'order_number', 'usernumber', 'pending', 'confirmed', 'capital'));
    }

    public function addToCart(Request $request)
    {
        $user_id = Auth::id();
        $name = $request->query('name');
        $price = $request->query('price');
        $img = $request->query('img');




        $new = new Cart();
        $new -> name = $name;
        $new -> price = $price;
        $new -> user_id = $user_id;
        $new -> img = $img;

        $new->save();

        Alert::success('success !, Cart updated succesfully');
        $cart = Cart::where('user_id', Auth::id())->get();
        $cart_number = Cart::where('user_id', Auth::id())->count();
        $order_number = Order::where('user_id', Auth::id())->count();




        return view('home.cart', compact('cart', 'cart_number', 'order_number'));
    }
    public function Cart()
    {
        $cart = Cart::where('user_id', Auth::id())->get();
        $cart_number = Cart::where('user_id', Auth::id())->count();
        $order_number = Order::whereNotIn('status', ['cancelled', 'delivered'])->where('user_id', Auth::id())->count();


        return view('home.cart', compact('cart', 'cart_number', 'order_number'));
    }
    public function checkout(Request $request)
    {
        // Retrieve item IDs and quantities from the request
        $entryIds = $request->input('entry_id');
        $quantities = $request->input('quantity');

        // Assuming you have a relationship between orders and items
        // You can iterate over the items and store them in the orders table
        foreach ($entryIds as $index => $entryId) {
            // Retrieve the cart entry
            $cartEntry = Cart::find($entryId);

            // Retrieve the item details from the cart entry
            $itemId = $cartEntry->id; // Assuming 'id' is the primary key of your Cart model
            $itemName = $cartEntry->name;
            $itemPrice = $cartEntry->price;

            // Create an Order model instance and save it to the database
            $order = new Order();
            $order -> user_id = Auth::id();
            $order->item_id = $itemId;
            $order->name = $itemName;
            $order->price = $itemPrice;
            $order->quantity = $quantities[$index];

            // Save the order
            $order->save();

            $cartEntry->delete();
        }





        // Redirect to a thank you page or any other desired page
        return redirect()->route('shipping');
    }

    public function Order()
    {
        $cart_number = Cart::where('user_id', Auth::id())->count();
        $order_number = Order::whereNotIn('status', ['cancelled', 'delivered'])->where('user_id', Auth::id())->count();
        $order = Order::where('user_id', Auth::id())
            ->whereNotIn('status', ['cancelled', 'delivered'])
            ->get();
        $ordersum = Order::whereNotIn('status', ['cancelled', 'delivered'])->where('user_id', Auth::id())->pluck('calculated_column')->sum();





        return view('home.order',compact('cart_number','order', 'order_number', 'ordersum') );
    }

    public function shipping()
    {
        $order_number = Order::whereNotIn('status', ['cancelled', 'delivered'])->where('user_id', Auth::id())->count();
        $cart_number = Cart::where('user_id', Auth::id())->count();
        $county = User::where('id', Auth::id())->value('county');
        $estate = User::where('id', Auth::id())->value('estate');
        $road = User::where('id', Auth::id())->value('road');
        $phone = User::where('id', Auth::id())->value('phone');


        return view('home.shipping', compact('cart_number', 'order_number','county', 'estate', 'road', 'phone'));
    }

    public function shipping_address(Request $request)
    {
        $county = $request->address;
        $estate =$request ->city;
        $road =$request ->country;
        $phone =$request ->phone;



        $user_id = Auth::id();

        $user = User::find($user_id);

        $user -> county =$county;
        $user -> estate =$estate;
        $user -> road =$road;
        $user -> phone =$phone;


        $user->save();

        return redirect()->back();


    }
    public function currentshipping(Request $request)
    {
        // Get the authenticated user's ID
        $user_id = Auth::id();

        // Get the county, estate, and road from the request
        $county = $request->query('city');
        $estate = $request->query('estate');
        $road = $request->query('road');
        $phone = $request->query('phone');

        // Check if any of the shipping address fields are empty
        if (empty($county) || empty($estate) || empty($road) || empty($phone)) {
            // Redirect back with an error message
            Alert::error('please, update shipping address');
            return redirect()->back();
        }

        // Update the orders with the same user_id
        Order::where('user_id', $user_id)->update([
            'county' => $county,
            'estate' => $estate,
            'road' => $road,
            'phone_number' => $phone,
        ]);

        // Return the view with the updated data
        return redirect()->route('Order');
    }

    public function privacy()
    {
        $cart_number = Cart::where('user_id', Auth::id())->count();
        $order_number = Order::whereNotIn('status', ['cancelled', 'delivered'])->where('user_id', Auth::id())->count();
        return view('home.privacy', compact('cart_number', 'order_number'));
    }

    public function faqs()
    {
        $cart_number = Cart::where('user_id', Auth::id())->count();
        $order_number = Order::whereNotIn('status', ['cancelled', 'delivered'])->where('user_id', Auth::id())->count();
        return view('home.faqs', compact('cart_number', 'order_number'));
    }
    public function sitemap()
    {
        $cart_number = Cart::where('user_id', Auth::id())->count();
        $order_number = Order::whereNotIn('status', ['cancelled', 'delivered'])->where('user_id', Auth::id())->count();
        return view('home.sitemap', compact('cart_number', 'order_number'));
    }
    public  function about()
    {
        $cart_number = Cart::where('user_id', Auth::id())->count();
        $order_number = Order::whereNotIn('status', ['cancelled', 'delivered'])->where('user_id', Auth::id())->count();
        return view('home.about', compact('cart_number', 'order_number'));
    }

    public function removecart(Request $request)
    {

        $id = $request -> query('entry_id');

        $entry = Cart::find($id);
        $entry -> delete();



        return redirect()->route('Cart');
    }

    public function removeorder(Request $request)
    {
        $id = $request->query('entry_id');

        // Check if $id is valid
        if (!$id) {
            return redirect()->route('Order')->with('error', 'Invalid order ID');
        }

        $order = Order::find($id);

        // Check if order is found
        if (!$order) {
            return redirect()->route('Order')->with('error', 'Order not found');
        }

        $name = "cancelled";
        $order->status = $name;
        $order->save();

        return redirect()->route('Order');
    }







}
