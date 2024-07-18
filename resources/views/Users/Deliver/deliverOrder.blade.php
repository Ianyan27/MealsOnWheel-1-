@extends('Users.Customer.layouts.app')

@section('title')
    Deliver
@endsection

@section('content')
    <div class="container">

        <body>
            <table class="table table-responsive table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Member Name</th>
                        <th>Meal Name</th>
                        <th>Order date</th>
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
                            <td><?php echo $date; ?></td>
                            <td><?php echo $time; ?></td>
                            <td>
                                <form action="{{ route('delivery#updateDelivery', $delivery->id) }}" method="GET">
                                    <input type="text" name="deliver_name" value="{{ $delivery->deliver_name }}" readonly />
                                    <button type="submit" class="btn btn-primary">Accept request</button>
                                </form>
                            </td>
                            <td>
                                <form action="{{ route('delivery#updateDelivery', $delivery->id) }}" method="GET">
                                    <input type="text" name="start_delivery_time"
                                        value="{{ $delivery->start_delivery_time }}" readonly />
                                    <button type="submit" class="btn btn-primary">Start</button>
                                </form>
                            </td>
                            <td>
                                <form action="{{ route('delivery#updateDelivery', $delivery->id) }}" method="GET">
                                    {{-- <input type="text" name="delivery_status" value="{{ $delivery -> delivery_status }}" /> --}}
                                    <select name="delivery_status" value="{{ $delivery->delivery_status }}">
                                        <option value=""></option>
                                        <option value="Pick the meal"
                                            {{ $delivery->delivery_status == 'Pick the meal' ? 'selected' : '' }}>Pick up
                                            the meal</option>
                                        <option value="On the way to destination"
                                            {{ $delivery->delivery_status == 'On the way to destination' ? 'selected' : '' }}>
                                            On the way to destination</option>
                                        <option value="Arrived at destination"
                                            {{ $delivery->delivery_status == 'Arrived at destination' ? 'selected' : '' }}>
                                            Arrived at destination</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary">Send Status</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </body>
    </div>
@endsection
