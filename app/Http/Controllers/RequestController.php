<?php

namespace App\Http\Controllers;

use App\Models\Request as AppRequest;
use Illuminate\Http\Request;
use App\Http\Resources\RequestResource;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $r = new AppRequest;
        if (isset($request->status)) {
            $r = $r->where('status', $request->status);
        }
        if (isset($request->startDate)) {
            $r = $r->whereDate('created_at', '>=', $request->startDate);
        }

        if (isset($request->endDate)) {
            $r = $r->whereDate('created_at', '<=', $request->endDate);
        }

        return RequestResource::collection($r->paginate(4));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "message" => "required",
        ]);

        $r = new AppRequest;
        $r->user_id = auth()->user()->id;
        $r->status = 'Active';
        $r->message = $request->message;

        $r->save();

        return response()->json([
            "status" => true,
            "message" => "Request add succesfully"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
