<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\StoreInvestmentRequest;
use App\Http\Resources\InvestmentResource;
use App\Models\Investment;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\In;
use Symfony\Component\HttpFoundation\Response;

class InvestmentController extends Controller
{
    public function index()
    {
        $investments= Investment::with('user')->get();
        return InvestmentResource::collection($investments);
    }

    public function store(StoreInvestmentRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadImage($request->file('image'));
        }

        $investment=Investment::create($data);
        return new InvestmentResource($investment);
    }

    public function show(Investment $investment)
    {
        return new InvestmentResource($investment);
    }

    public function update(Investment $investment, StoreInvestmentRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadImage($request->file('image'));
        }

        $investment->update($data);
        return new InvestmentResource($investment);
    }

    public function destroy(Investment $investment)
    {
        $investment->delete();
        return response(null,Response::HTTP_NO_CONTENT);
    }

    private function uploadImage($file)
    {
        $name = 'investments/' . uniqid() . '.' . $file->extension();
        $file->storePubliclyAs('public', $name);

        return $name;
    }
}
