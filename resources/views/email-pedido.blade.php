<html>
<head>
	<style>
		td,th {
			border:solid 1px black;
		}
	</style>
</head>
<body>
<h1>Nuevo pedido desde web nube</h1>

@foreach($request as $k => $r)
@if($k != "_token")
<p><b>{{ucfirst($k)}}:</b><br>{{$r}}</p>
@endif
@endforeach

<table cellpadding="2" cellspacing="0" width="100%">
<thead>
<tr>
<th>Imagen</th>
<th>Item</th>
<th>Cod.</th>
<th>Cantidad</th>
<tr>
</thead>
<tbody>
@foreach($rows as $row)
<tr>
<td><img src="{{URL::to('prodimag/'.$row->id.'-D.jpg')}}" width="100px" height="100px"></td>
<td>{{$row->name}}</td>
<td>{{$row->id}}</td>
<td>{{$row->qty}}</td>
</tr>
@endforeach
</tbody>
</table>
</body>
</html>