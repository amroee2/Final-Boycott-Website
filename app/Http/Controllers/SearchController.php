<?php

namespace App\Http\Controllers;

use App\Models\Alias;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class SearchController extends Controller
{
    function queryHandler($levenWords, $query, $query2, $searchTerm, $queryResults){
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
                if(count($results)!=0){
                    $queryResults[] = $results; // Store the entire query result in the array
                }
                // Create a paginator manually
                $tempProducts = self::paginator($results);
                // Append the search term to the pagination links
                $tempProducts->appends(['search' => $searchTerm]);
            }
            else {
                $tempProducts = Product::where('ar_name','like', '%'. $words . '%')->get();
                if(count($tempProducts)!=0){
                    $queryResults[] = $tempProducts; // Store the entire query result in the array
                }
                $tempProducts = self::paginator($tempProducts);
                $tempProducts->appends(['search' => $searchTerm]);
            }
        }
        return [$tempProducts, $queryResults];
    }
    function paginator($results){
        $perPage = 10;
        $page = request()->input('page', 1); // Get the current page from the request, default to 1 if not provided
        $total = $results->count(); // Get the total number of items
        $start = ($page - 1) * $perPage; // Calculate the start index of the items for the current page
        $items = $results->slice($start, $perPage); // Get the items for the current page
        $tempProducts = new LengthAwarePaginator($items, $total, $perPage, $page, [
            'path' => \Illuminate\Pagination\Paginator::resolveCurrentPath(),
            'pageName' => 'page',
        ]);
        
        // Append the search term to the pagination links
        return $tempProducts;
    }
    function intersecting($queryResults, $searchTerm){
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
                if (!$queryResults[$i]->isEmpty()) {
                    $intersectionResults = $intersectionResults->intersect($queryResults[$i]);
                }
            }
        }
        $tempProducts = self::paginator($intersectionResults);
        $tempProducts->appends(['search' => $searchTerm]);
        return $tempProducts;
    }
    function search(){
    //initialize queries
        $queryResults = [];
        $searchTerm = request('search');
        $query = Product::query();
        $query2 = Product::query();
        $queryFirst = Product::query();

        if ($searchTerm) {
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

                $tempProducts = self::paginator($results);
                
                // Append the search term to the pagination links
                $tempProducts->appends(['search' => $searchTerm]);
                return view('perm_products')->with('tempProducts', $tempProducts);
            }
            else{
                [$tempProducts, $queryResults] = self::queryHandler($splitWords, $query, $query2, $searchTerm, $queryResults);
                //leven
                if (empty($queryResults)) {
                    $levenWords = [];
                    $levenshteinController = new LevenshteinController();
                    $splitWords = explode(' ', $searchTerm);
                foreach($splitWords as $word){
                        $word = $levenshteinController->calculateDistance($word);
                        array_push($levenWords, $word);
                        //get the similar word
                }
                //same code as above, repeating process
                [$tempProducts, $queryResults] = self::queryHandler($levenWords, $query, $query2, $searchTerm, $queryResults);
                }
            }
        }
        else{
            //no search, returns all
            $tempProducts = Product::simplePaginate(10)->appends(['search' => $searchTerm]);
            return view('perm_products')->with('tempProducts', $tempProducts);
        }
        //intersection handling 
        $tempProducts = self::intersecting($queryResults, $searchTerm);
        return view('perm_products')->with('tempProducts', $tempProducts);
    }
}
