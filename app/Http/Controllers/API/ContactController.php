<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(ContactRequest $request): JsonResponse
    {
        Contact::create($request->validated());
        return response()->json(['message' => 'we will contact you soon'], 201);
    }

}
