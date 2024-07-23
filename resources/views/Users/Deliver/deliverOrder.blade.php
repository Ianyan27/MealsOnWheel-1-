@extends('Users.Deliver.layouts.app')

@section('title')
    Deliver
@endsection

@section('content')
<div class="container mt-4">
    <table class="table table-responsive table-hover">
        <thead class="thead-light">
            <tr>
                <th>No.</th>
                <th>Member Name</th>
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
                    <td>
                        <form action="{{ route('delivery#updateDelivery', $delivery->id) }}" method="GET">
                            <input type="text" name="deliver_name" value="{{ $delivery->deliver_name }}" class="form-control" readonly />
                            <button type="submit" class="btn btn-primary mt-2">Accept request</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('delivery#updateDelivery', $delivery->id) }}" method="GET">
                            <input type="text" name="start_delivery_time" value="{{ $delivery->start_delivery_time }}" class="form-control" readonly />
                            <button type="submit" class="btn btn-primary mt-2">Start</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('delivery#updateDelivery', $delivery->id) }}" method="GET">
                            <select name="delivery_status" class="form-control">
                                <option value="" {{ $delivery->delivery_status == '' ? 'selected' : '' }}></option>
                                <option value="Pick the meal" {{ $delivery->delivery_status == 'Pick the meal' ? 'selected' : '' }}>Pick up the meal</option>
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
@endsection
