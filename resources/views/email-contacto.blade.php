<html>
<body>
<h1>Nuevo contacto desde web nube</h1>
@foreach($request as $k => $r)
@if($k != "_token")
<div><b>{{$k}}</b> {{$r}}</div>
@endif
@endforeach
</body>
</html>