<?php

namespace App\Http\Controllers;

use App\Models\TempProduct;
use Illuminate\Http\Request;

class TempProductController extends Controller
{
    public function update(Request $request){{
        $data = $request->validate([
            'id' => ['required'],
            'ar_name' => ['required'],
            'barcode' => ['required'],
            'sub_category' => ['required'],
            'category' => ['required'],
            'boycott' => ['required'],
        ]);
        $product= TempProduct::findOrFail($data['id']);
        $product -> update($data);
        return redirect('/products');
        }
    }

    public function destroy(Request $request){
        $product_id = $request['id'];
        $product = TempProduct::find($product_id);
        $product->delete();
        return redirect('/products');
    }
    public function store(Request $request){
        $data = $request->validate([
            'ar_name' => ['required'],
            'barcode' => ['required'],
            'boycott' => ['required'],
        ]);        
        // dd($data);
        $temp = TempProduct::create($data);
        return redirect('/products');
    }
}
