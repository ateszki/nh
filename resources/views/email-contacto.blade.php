<html>
<body>
<h1>Nuevo contacto desde web nube</h1>
@foreach($request as $k => $r)
@if($k != "_token")
<p><b>{{ucfirst($k)}}:</b><br>{{$r}}</p>
@endif
@endforeach
</body>
</html>