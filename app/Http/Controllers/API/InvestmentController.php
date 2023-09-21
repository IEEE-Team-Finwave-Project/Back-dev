<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\StoreInvestmentRequest;
use App\Http\Requests\UpdateInvestmentRequest;
use App\Http\Resources\InvestmentResource;
use App\Models\Investment;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Symfony\Component\HttpFoundation\Response;

class InvestmentController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $investments = Investment::with('user')->get();
        return InvestmentResource::collection($investments);
    }
    public function store(StoreInvestmentRequest $request): InvestmentResource
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadImage($request->file('image'));
        }

        $investment=Investment::create($data);
        return new InvestmentResource($investment);
    }
    public function show(Investment $investment): InvestmentResource
    {
        return new InvestmentResource($investment);
    }
    public function update(Investment $investment, UpdateInvestmentRequest $request): InvestmentResource
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadImage($request->file('image'));
        }

        $investment->update($data);
        return new InvestmentResource($investment);

    }
    public function destroy(Investment $investment): Application|Response|ResponseFactory
    {
        $investment->delete();
        return response(null,Response::HTTP_NO_CONTENT);
    }
    private function uploadImage($file): string
    {
        $name = 'investments/' . uniqid() . '.' . $file->extension();
        $file->storePubliclyAs('public', $name);

        return $name;
    }
    public function search(Request $request): AnonymousResourceCollection
    {
        $query = $request->input('query');

        $investments = Investment::where('title', 'LIKE', "%$query%")
            ->orWhere('description', 'LIKE', "%$query%")
            ->get();

        return InvestmentResource::collection($investments);
    }

}
