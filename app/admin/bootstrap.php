<?php

/*
 * Describe you custom columns and form items here.
 *
 * There is some simple examples what you can use:
 *
 *		Column::register('customColumn', '\Foo\Bar\MyCustomColumn');
 *
 * 		FormItem::register('customElement', \Foo\Bar\MyCustomElement::class);
 *
 * 		FormItem::register('otherCustomElement', function (\Eloquent $model)
 * 		{
 *			AssetManager::addStyle(URL::asset('css/style-to-include-on-page-with-this-element.css'));
 *			AssetManager::addScript(URL::asset('js/script-to-include-on-page-with-this-element.js'));
 * 			if ($model->exists)
 * 			{
 * 				return 'My edit code.';
 * 			}
 * 			return 'My custom element code';
 * 		});
 */

FormItem::register('CustomArchivoFicha', function (\Eloquent $model)
  		{
  			return '<div class="form-group"><label for="archivo">Archivo</label><input class="form-control"  accept=".pdf" type="file" name="archivo"></div>';
  		});
FormItem::register('CustomImagenFicha', function (\Eloquent $model)
  		{
  			return '<div class="form-group"><label for="imagen">Imagen</label><input class="form-control"  accept=".jpg,.png,.gif" type="file" name="imagen"></div>';
  		});