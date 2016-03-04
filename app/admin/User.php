<?php

Admin::model(App\User::class)->title('Usuarios')->with()->filters(function ()
{

})->columns(function ()
{
	Column::string('id', 'Id');
	Column::string('name', 'Name');
	Column::string('email', 'Email');
	Column::string('razsoc', 'Razsoc');
	Column::string('lista', 'Lista');
})->form(function ()
{
	FormItem::text('name', 'Name');
	FormItem::text('email', 'Email');
	FormItem::password('password', 'Password (dejar vacía para no modificar)');
	FormItem::text('razsoc', 'Razsoc');
	FormItem::text('lista', 'Lista');
	FormItem::CustomRememberToken();
});