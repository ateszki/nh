<?php

Admin::model(App\Ficha::class)->title('Fichas de tejido')->with()->filters(function ()
{

})->columns(function ()
{
	Column::string('numero', 'Número');
	Column::string('nombre', 'Nombre');
})->form(function ()
{
	FormItem::text('numero', 'Número');
	FormItem::text('nombre', 'Nombre');
	FormItem::CustomArchivoFicha();
	FormItem::CustomImagenFicha();
	
});