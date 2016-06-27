<html>
<body>
<h1>Nuevo contacto desde web nube</h1>
@foreach($request as $k => $r)
<div><b>{{$k}}</b> {{$r}}</div>
@endforeach
</body>
</html>