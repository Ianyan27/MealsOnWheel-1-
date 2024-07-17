<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="{{ route('logout') }}" method="post">
        @csrf
        <button type="submit" class="btn pt-0 pb-1 px-0 nav-link text-dark" style="button:focus { outline: none; }"> <i
                class="fas fa-sign-out-alt"></i> Logout </button>
    </form>
    <h1>Deliver Index</h1>

    <body>
        <table class="table table-responsive table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Partner Name</th>
                    <th>Meal Name</th>
                    <th>Order Date</th>
                    <th>Order Time</th>
                    <th>Menu Preparation Status</th>
                    <th>Assigned Rider</th>
                    <th>Delivery Status</th>
                    <th>Confirm Receive</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <td>{{ $orderData->id }}</td>
                    <td>{{ $orderData->order_menu_restaurant }}</td>
                    <td>{{ $orderData->order_menu_name }}</td>
                    <?php
                    $str = $orderData->created_at;
                    $newstr = explode(' ', $str);
                    $date = $newstr[0];
                    $time = $newstr[1];
                    ?>
                    <td><?php echo $date; ?></td>
                    <td><?php echo $time; ?></td>
                    <td>{{ $orderData->order_cooking_status }}</td>
                    <td>{{ $deliverData->volunteer_name }}</td>
                    <td>{{ $deliverData->delivery_status }}</td>
                    <td>
                        <form action="{{ route('member#updateMemberOrder', $orderData->id) }}" method="GET">
                            <input type="text" name="order_received_status"
                                value="{{ $orderData->order_received_status }}" readonly />
                            <button type="submit" class="btn btn-primary">Received?</button>
                        </form>
                    </td>
                </tr>

            </tbody>
        </table>
    </body>
</body>

</html>
