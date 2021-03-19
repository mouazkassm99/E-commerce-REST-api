<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(User $user){

        if(!$user->cart){
            $this->createNewCartForUser($user->id);
            $user = $user->fresh();
        }

        return response()->json($user->cart->products, 200);
    }

    public function updateCart(Request $request, User $user){

        if(!$user->cart){
            $this->createNewCartForUser($user->id);
            $user->refresh();
        }

        $products = $request->products;

        foreach ($products as $product){
            if(!Product::find($product['product_id'])){
                return response()->json(['message'=>'the product with id '. $product['product_id'] . ' does not exist in the products list'], 404);
            }
        }

        $user->cart->products()->sync($products);
        $user->refresh();
        return response()->json($user->cart->products, 200);


    }


    public function emptyCart(User $user){

        $user->cart->products()->sync([]);
        $user->refresh();
        return response()->json($user->cart->products, 200);

    }

    private function createNewCartForUser($userId){
        $cart = new Cart([
            'user_id'=>$userId
        ]);
        $cart->save();
    }
}
