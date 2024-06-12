<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name'          => $this->name,
            'description'   => $this->detail,
            'price'         => $this->price,
            'stock'         => $this->stock == 0 ? ' Out Of Stock': $this->stock,
            'discounts'      => $this->discounts,
            'totalPrice'      => round(( 1-($this->discounts/100) )*$this->price,2),
            'rating'         =>$this->review->count() > 0 ? round($this->review->sum('star')/
            $this->review->count(),2):'No rating Yet',
            'href' => [
                'review' => route('reviews.index', $this->id)
            ],

        ];
    }
}
