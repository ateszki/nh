<?php 

Admin::model(App\Accesorio::class)->title('Accesorios')->with()->filters(function ()
{
	
})->columns(function ()
{
	Column::string('codigo', 'Código');
	Column::string('nombre', 'Nombre');
	Column::string('categoria','Categoría');
	Column::string('tipo','Tipo');
	
})->form(function ()
{
	FormItem::text('codigo', 'Código');
	FormItem::text('nombre', 'Nombre');
	FormItem::textarea('descripcion', 'Descripcion');
	FormItem::CustomAccesorioCategoria();
	FormItem::CustomAccesorioTipo();
});