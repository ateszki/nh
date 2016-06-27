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
FormItem::register('CustomLista', function (\Eloquent $model)
      {
        $options="";
        $listas = \DB::select("select distinct lista as lista from item_precios order by lista");
        foreach($listas as $lista){
          $options .="<option value='".$lista->lista."'>".$lista->lista."</option>";
        }
        return '<div class="form-group"><label for="lista">Lista</label><select class="form-control"  name="lista">'.$options.'</select></div>';
      });
FormItem::register('CustomAccesorioCategoria', function (\Eloquent $model)
      {
        
        return '<div class="form-group"><label for="categoria">Categoría</label><select class="form-control"  name="categoria">
            <option value=""></option>
            <option value="Agujas">Agujas</option>
            <option value="Otros">Otros</option>
        </select></div>';
      });
FormItem::register('CustomAccesorioTipo', function (\Eloquent $model)
      {
        
        return '<div class="form-group"><label for="tipo">Tipo</label><select class="form-control"  name="tipo">
            <option value=""></option>
            <option value="Crochet">Crochet</option>
            <option value="Tricot">Tricot</option>
            <option value="Otros">Otros</option>
        </select></div>';
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