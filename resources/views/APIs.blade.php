<!DOCTYPE html>
<html>
<head>
    <title>API Routes</title>
</head>
<body>
    <h1>API Routes</h1>
    <table border="2px">
        <tr>
            <th>Method</th>
            <th>URI</th>
        </tr>
        @foreach ($routes as $method => $routeList)
            <tr>
                <td>{{ strtoupper($method) }}</td>
                <td>
                    @foreach ($routeList as $route)
                        {{ $route->uri() }}<br>
                    @endforeach
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>
