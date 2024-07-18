<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Deliver;
use App\Models\Volunteers;
use Carbon\Carbon;
use App\Models\DeliveryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeliveryController extends Controller
{
    public function AllDeliveryForOrder()
    {
        $deliver_data = DeliveryRequest::all();

        return view('Users.Deliver.deliverOrder')->with([
            'deliveryData' => $deliver_data,
        ]);
    }

    public function updateDelivery(Request $request, $id)
    {
        //find selected delivery
        $delivery_selected = DeliveryRequest::where('id', $id)->first();

        //save selected delivery
        $date = Carbon::now();
        if ($delivery_selected->start_delivery_time == null) {
            $delivery_selected->start_delivery_time = $date;
        }
        if ($delivery_selected->deliver_id == null) {
            $deliver_data = Deliver::where('user_id', Auth::id())->first();
            // var_dump($deliver_data->user->name);
            $delivery_selected->deliver_name = $deliver_data->user->name;
            $delivery_selected->deliver_id = $deliver_data->deliver_id;
        }
        $delivery_selected->delivery_status = $request->input('delivery_status');
        $delivery_selected->save();

        return redirect()->route('deliver#index')->with('status', 'Delivery updated successfully.');
    }
}
