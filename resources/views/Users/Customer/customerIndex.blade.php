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
        <button type="submit" class="btn pt-0 pb-1 px-0 nav-link text-dark" style="button:focus { outline: none; }" >  <i class="fas fa-sign-out-alt" ></i> Logout </button>
    </form>
    <h1>Customer Index</h1>
</body>
</html>