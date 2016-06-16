<?php

Admin::model(App\ColorOrden::class)->title('Orden de colores')->with()->filters(function ()
{
})->columns(function ()
{
	Column::string('id', 'Id');
	Column::string('codigo', 'Codigo');

})->form(function ()
{
	FormItem::text('id', 'Id')->attributes(["readonly"=>"readonly"]);
	FormItem::text('codigo', 'Codigo');
	FormItem::textarea('ordenes', 'Ordenes');
});