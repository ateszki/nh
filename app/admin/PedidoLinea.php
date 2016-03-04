<?php

Admin::model(App\PedidoLinea::class)->title('Líneas Pedido')->with()->filters(function ()
{
	ModelItem::filter('pedido_id')->as('pedido')->title()->from(App\Pedido::class, 'id');
})->columns(function ()
{
	Column::string('id', 'Id');
	Column::string('pedido_id','Pedido')->append(Column::filter('pedido')->value('pedido_id'));
	Column::string('codigo','Cod.');
	Column::string('descripcion','Item');
	Column::string('precio','Precio');
	Column::string('cantidad','Cant.');
	Column::string('subtotal','Importe');
});