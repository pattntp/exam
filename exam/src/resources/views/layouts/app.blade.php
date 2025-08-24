<!DOCTYPE html>
<html>
<head>
    <title>Transactions</title>
</head>
<body>
    @if(session('success'))
        <div style="color: green">{{ session('success') }}</div>
    @endif

    @yield('content')
</body>
</html>
