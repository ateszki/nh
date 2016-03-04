<?php
use SleepingOwl\Admin\Columns\Column\BaseColumn;


FormItem::register('CustomArchivoFicha', function (\Eloquent $model)
  		{
  			return '<div class="form-group"><label for="archivo">Archivo</label><input class="form-control"  accept=".pdf" type="file" name="archivo"></div>';
  		});
FormItem::register('CustomImagenFicha', function (\Eloquent $model)
  		{
  			return '<div class="form-group"><label for="imagen">Imagen</label><input class="form-control"  accept=".jpg,.png,.gif" type="file" name="imagen"></div>';
  		});
FormItem::register('CustomRememberToken', function (\Eloquent $model)
  		{
  			return '<input type="hidden" name="remember_token">';
  		});


class EstadoColumn extends BaseColumn
{

    public function render($instance, $totalCount)
    {
        $estados = ['P'=>'Pendiente','I'=>'Ingresado','C'=>'Cancelado'];
        $clases = ['P'=>'success','I'=>'info','C'=>'danger'];
        $content = $estados[$instance->estado];
        return "<td class='".$clases[$instance->estado]." text-center' valign='middle'>".$content."</td>";
    }


}
Column::register('Estado','EstadoColumn');