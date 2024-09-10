<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Deliver;
use App\Models\DeliveryRequest;
use App\Models\Orders;
use App\Models\Volunteers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeliverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $deliver_data = DeliveryRequest::all();

        return view('Users.Deliver.deliverOrder')->with([
            'deliveryData' => $deliver_data,
        ]);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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
