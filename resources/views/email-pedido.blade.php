<html>
<body>
<h1>Nuevo pedido desde web nube</h1>

@foreach($request as $k => $r)
<div><b>{{$k}}</b> {{$r}}</div>
@endforeach

<table border=1 cellpadding="2" cellspacing="0">
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