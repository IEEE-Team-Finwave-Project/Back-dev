<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GoalResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'title'=>$this->title,
            'description'=>$this->description,
            'amount_of_money'=>$this->amount_of_money,
            'money_limit'=>$this->money_limit,
            'user_id'=>$this->user->name,
        ];
    }
}
