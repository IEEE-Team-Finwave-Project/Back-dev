<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InvestmentResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'title'=>$this->title,
            'price'=>$this->price,
            'image'=>$this->image,
            'description'=>$this->description,
            'user'=>$this->user->name,
        ];
    }
}
