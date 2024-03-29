<?php

namespace App\Http\Controllers;

use App\Models\Alias;
use App\Models\Barcode;
use App\Models\Product;
use App\Models\TempProduct;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;
use PhpOffice\PhpSpreadsheet\IOFactory;

class ProductController extends Controller
{
    public function update(Request $request){{
        // dd($request);
        $data = $request->validate([
            'id' => ['required'],
            'ar_name' => ['required'],
            'barcode' => ['required'],
            'sub_category' => ['required'],
            'category' => ['required'],
            'boycott' => ['required'],
        ]);
        // dd($data);
        $barcodeElement = Barcode::findOrFail($data['id']);
        // dd($barcodeElement);
        $barcodeElement->update(['barcode'=>$data['barcode']]);
        $product= Product::findOrFail($data['id']);
        // dd($product);
        unset($data['barcode']);
        // dd($data);
        $product -> update($data);
        return redirect('/perm_products');
        }
    }

    public function destroy(Request $request){
        $product_id = $request['id'];
        $product = Product::find($product_id);
        $product->delete();
        return redirect('/perm_products');
    }

    public function store(Request $request){
        $data = $request->validate([
            'ar_name' => ['required'],
            'barcode' => ['required'],
            'sub_category' => ['required'],
            'category' => ['required'],
            'boycott' => ['required'],
        ]);        
        $product = Product::create($data);
        $id = $request['id'];
        // $data2['alias_name'] = $request['type1'];
        // $data2['alias_name2'] = $request['type2'];
        // $aliases = Alias::create($data);
        $temp = TempProduct::find($id);
        $temp->delete();
        return redirect('/products');
    }

}
