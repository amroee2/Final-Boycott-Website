<?php

use App\Models\Alias;
use App\Models\Barcode;
use App\Models\Message;
use App\Models\Product;
use App\Models\TempProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LevenshteinController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// api 1
Route::get('/barcode/{barcode}',function($barcode){
    DB::table('score')->where('id', 1)->increment('score');
 

     
    $barcodeElement = Barcode::where('barcode','like',$barcode)->get();
    dd($barcodeElement);
    // $element = Product::findOrFail('id','like',$barcodeElement->id);
    if($barcodeElement)
        return response()->json(Product::find($barcodeElement->id));
    else
        return response()->json("Not Found!");
    // response() 

});


// api 2
Route::get('/search/{product}', function($product) {
    DB::table('score')->where('id', 1)->increment('score');
    //initialize queries
    $queryResults = [];
    $searchTerm = $product;
    $query = Product::query();
    $query2 = Product::query();
    $queryFirst = Product::query();

    $splitWords = explode(' ', $searchTerm);
    $results= [];
    //check for full name first
    $queryFirst->where(function($q) use ($searchTerm) {
            $q->orWhere('ar_name', 'like', $searchTerm. '%');
    });
    $results = $queryFirst->get();
    //handle full name
    if (!$results->isEmpty()) {
        
        $queryResults[] = $results; // Store the entire query result in the array

        
        return $results;
    }
    else{
        foreach($splitWords as $words){
            //find the alias
            $wordsSearched = Alias::where('alias_name', 'like', '%' . $words . '%')->first();
            if($wordsSearched){
                $aliases = Alias::where('index', $wordsSearched->index)->get();
                if($aliases->count() > 0) { //if there are aliases
                    $query->where(function($q) use ($aliases) {
                        foreach($aliases as $alias) { 
                            //check if the alias is in the beginning of the name
                            $q->orWhere('ar_name', 'like', $alias->alias_name . '%');
                        }
                    });
                    $results = $query->orderByRaw("CASE WHEN ar_name LIKE '$words%' THEN 1 ELSE 2 END")
                    ->get();

                    if(!$query->exists()){    
                        $query2->where(function($q) use ($aliases) {
                            foreach($aliases as $alias) { 
                            //else for check if the alias is in the beginning of the name
                                $q->orWhere('ar_name', 'like', '%' . $alias->alias_name . '%');
                            }
                        });
                        $results = $query2->orderByRaw("CASE WHEN ar_name LIKE '%$words%' THEN 1 ELSE 2 END")
                        ->get();  
                    }
                }
                
                if(count($results)!=0){
                    $queryResults[] = $results; // Store the entire query result in the array
                }                }
            else {
                //if no aliases, check for name instantly
                $tempProducts = Product::where('ar_name','like', '%'. $words . '%')->get();
                if(count($tempProducts)!=0){
                    $queryResults[] = $tempProducts; // Store the entire query result in the array
                }                }
        }
        //leven
        if (empty($queryResults)) {
            $levenWords = [];
            $levenshteinController = new LevenshteinController();
            $splitWords = explode(' ', $searchTerm);
            // dd($splitWords);
        foreach($splitWords as $word){
                $word = $levenshteinController->calculateDistance($word);
                array_push($levenWords, $word);
                //get the similar word
        }

        //same code as above, repeating process
        foreach($levenWords as $words){
            $wordsSearched = Alias::where('alias_name', 'like', '%' . $words . '%')->first();
            if($wordsSearched){
                $aliases = Alias::where('index', $wordsSearched->index)->get();
                if($aliases->count() > 0) { 
                    $query->where(function($q) use ($aliases) {
                        foreach($aliases as $alias) { 
                            $q->orWhere('ar_name', 'like', $alias->alias_name . '%');
                        }
                    });
                    $results = $query->orderByRaw("CASE WHEN ar_name LIKE '%$words%' THEN 1 ELSE 2 END")
                    ->get();

                    if(!$query->exists()){    
                        $query2->where(function($q) use ($aliases) {
                            foreach($aliases as $alias) { 
                                $q->orWhere('ar_name', 'like', '%' . $alias->alias_name . '%');
                            }
                        });
                        $results = $query2->orderByRaw("CASE WHEN ar_name LIKE '%$words%' THEN 1 ELSE 2 END")
                        ->get();  
                    }
                }
                
                $queryResults[] = $results; // Store the entire query result in the array    
                return $results;
            }
            else {
                $tempProducts = Product::where('ar_name','like', '%'. $words . '%')->get();
                $queryResults[] = $tempProducts; // Store the entire query result in the array
                return  $tempProducts;

            }
        }

        }
    }
//intersection handling 
    if (!empty($queryResults)) {
        $intersectionResults = $queryResults[0];
        foreach ($queryResults as $result) {
            if (!$result->isEmpty()) {
                $intersectionResults = $result;
                break;
            }
        }    
        // Find the intersection of subsequent sets of results
        for ($i = 1; $i < count($queryResults); $i++) {
            $intersectionResults = $intersectionResults->intersect($queryResults[$i]);
        }
        return $intersectionResults;
    }
    return $tempProducts;
});


// api 3
Route::get('categories',function(){
    return response()->json(Product::distinct()->get('category'));
    
});
// api 4
Route::get('subCategories/{category}',function($category){
    return response()->json(Product::distinct()->where('category','like',$category)->get('sub_category'));
});

// api 5
Route::get('products/{subCategory}',function($subCategory){
    return response()->json(Product::where('sub_category','like',$subCategory)->get('ar_name'));
});

// api 6
Route::post('/tempProduct' ,function (Request $request){
    $data = $request->validate([
        'ar_name' => ['required'],
        'barcode' => ['required'],
        'boycott' => ['required'],
    ]);        
    // dd($data);
    $temp = TempProduct::create($data);
    return response()->json('message',"Temp Element added successfully!");
    // return redirect('/products');
});

// api 7
Route::post('/storeMessage',function(Request $request){

   
    $data = $request->validate([
        'name' => ['required'],
        'phone' => ['required'],
        'message' => ['required'],
    ]);      

    $message = Message::create($data);
    return response()->json("Element added successfully!");
    // return redirect('/messages');
});