<?php

Admin::model(App\Pedido::class)->title('Pedidos')->with()->filters(function ()
{
	ModelItem::filter('user_id')->as('cliente')->title()->from(App\User::class, 'razsoc');
})->columns(function ()
{
	Column::string('id', 'Id');
	Column::string('user.razsoc', 'Cliente')->append(Column::filter('cliente')->value('user_id'));
	Column::string('total', 'Total');
	Column::string('created_at','Fecha');
	Column::Estado('estado','Estado')->sortable(false);
	Column::action('show', 'Detalle')->icon('fa-list')->style('short')->url('pedido_lineas?pedido=:id');

})->form(function ()
{
	FormItem::text('id', 'Id')->attributes(["readonly"=>"readonly"]);
	FormItem::select('user_id', 'Cliente')->list('App\User')->attributes(["disabled"=>"true"]);
	FormItem::text('total', 'Total')->attributes(["readonly"=>"readonly"]);
	FormItem::text('created_at', 'Fecha')->attributes(["readonly"=>"readonly"]);
	FormItem::select('estado','Estado')->list(['P'=>'Pendiente','I'=>'Ingresado','C'=>'Cancelado']);
});