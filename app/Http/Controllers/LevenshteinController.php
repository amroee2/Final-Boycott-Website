<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class LevenshteinController extends Controller
{
    public function calculateDistance(String $s1)
    {
        
        $array =[];
        $products = Product::all();
        foreach ($products as $product){
            $parts = explode(" ", $product->ar_name );
            foreach ($parts as $part){
                $distance = $this->levenshteinDistance($s1, $part);
                if ($distance == 1){
                    return $part;
                } 
            }
        }
        return $s1;
    }

    private function levenshteinDistance($s1, $s2)
    {
        $length1 = mb_strlen($s1, 'UTF-8');
        $length2 = mb_strlen($s2, 'UTF-8');

        $distance = [];

        for ($i = 0; $i <= $length1; $i++) {
            $distance[$i] = [$i];
        }

        for ($j = 0; $j <= $length2; $j++) {
            $distance[0][$j] = $j;
        }

        for ($i = 1; $i <= $length1; $i++) {
            for ($j = 1; $j <= $length2; $j++) {
                $cost = (mb_substr($s1, $i - 1, 1, 'UTF-8') != mb_substr($s2, $j - 1, 1, 'UTF-8')) ? 1 : 0;
                $distance[$i][$j] = min(
                    $distance[$i - 1][$j] + 1, // deletion
                    $distance[$i][$j - 1] + 1, // insertion
                    $distance[$i - 1][$j - 1] + $cost // substitution
                );
            }
        }

        return $distance[$length1][$length2];
    }
}
