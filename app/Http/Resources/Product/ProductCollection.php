<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return $this->collection->map(function ($request) {
            return [
                
                'name' => $request->name,
                'discounts'      => $request->discounts,
                'totalPrice' => round((1 - ($request->discounts / 100)) * $request->price, 2),
                'rating' => $request->review->count() > 0 
                            ? round($request->review->sum('star') / $request->review->count(), 2) 
                            : 'No rating yet',
                'href' => [
                    'link' => route('products.show', $request->id)
                ]
            ];
        })->toArray();
    }
}