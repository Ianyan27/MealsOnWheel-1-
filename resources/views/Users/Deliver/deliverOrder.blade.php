@extends('Users.Deliver.layouts.app')

@section('title')
    Deliver
@endsection

@section('content')
<div class="container mt-4">
    <div class="text-center mb-4">
        <h3 class="display-6">Delivery Orders</h3>
    </div>

    <!-- Check if there are any delivery orders -->
    @if($deliveryData && count($deliveryData) > 0)
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>No.</th>
                        <th>Caregiver Name</th>
                        <th>Meal Name</th>
                        <th>Order Date</th>
                        <th>Order Time</th>
                        <th>Rider</th>
                        <th>Start Delivery Time</th>
                        <th>Delivery Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($deliveryData as $delivery)
                        <tr>
                            <td>{{ $delivery->id }}</td>
                            <td>{{ $delivery->caregiver_name }}</td>
                            <td>{{ $delivery->delivery_meal_name }}</td>
                            <?php
                            $str = $delivery->created_at;
                            $newstr = explode(' ', $str);
                            $date = $newstr[0];
                            $time = $newstr[1];
                            ?>
                            <td>{{ $date }}</td>
                            <td>{{ $time }}</td>
                            <!-- Rider Section -->
                            <td>
                                <form action="{{ route('delivery#updateDelivery', $delivery->id) }}" method="GET">
                                    <input type="text" name="deliver_name" value="{{ $delivery->deliver_name }}" class="form-control-plaintext" readonly />
                                    <button type="submit" class="btn btn-success mt-2">Accept Request</button>
                                </form>
                            </td>
                            <!-- Start Delivery Time -->
                            <td>
                                <form action="{{ route('delivery#updateDelivery', $delivery->id) }}" method="GET">
                                    <input type="text" name="start_delivery_time" value="{{ $delivery->start_delivery_time }}" class="form-control-plaintext" readonly />
                                    <button type="submit" class="btn btn-info mt-2">Start</button>
                                </form>
                            </td>
                            <!-- Delivery Status -->
                            <td>
                                <form action="{{ route('delivery#updateDelivery', $delivery->id) }}" method="GET">
                                    <select name="delivery_status" class="form-select">
                                        <option value="" {{ $delivery->delivery_status == '' ? 'selected' : '' }}></option>
                                        <option value="Pick the meal" {{ $delivery->delivery_status == 'Pick the meal' ? 'selected' : '' }}>Pick the meal</option>
                                        <option value="On the way to destination" {{ $delivery->delivery_status == 'On the way to destination' ? 'selected' : '' }}>On the way to destination</option>
                                        <option value="Arrived at destination" {{ $delivery->delivery_status == 'Arrived at destination' ? 'selected' : '' }}>Arrived at destination</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary mt-2">Send Status</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <!-- No orders message -->
        <div class="alert alert-warning text-center" role="alert">
            <h4>No pending orders available.</h4>
            <p>Currently, there are no deliveries assigned to you. Please check back later for updates.</p>
        </div>
    @endif
</div>
@endsection
