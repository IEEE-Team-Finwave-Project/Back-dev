<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StatisticResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'category_percentage'=>$this->category_percentage,
            'category'=>$this->category->name,
            ];
    }
}
