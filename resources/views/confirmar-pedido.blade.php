@extends('nube')
@section('contenido')
<!-- breadcrumbs -->
      <div class="breadcrumbs bg_grey_light_2 fs_medium fw_light">
        <div class="container color_dark">
          <a href="{{URL::to('/')}}" class="sc_hover">Home</a> / <span class="color_light">Confirmación de Pedido</span>
        </div>
      </div>
            
      <!-- main content -->
      <div class="page_section_offset">
        <div class="container numbered_title_init">
          <h2 class="fw_light second_font color_dark m_bottom_27 tt_uppercase">Pedido Enviado</h2>
                    
          <!-- ingreso clientes -->
          <section class="m_bottom_35 m_xs_bottom_30">            
                        
            <hr class="divider_bg m_bottom_23">
                        
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 m_xs_bottom_30 second_font t_align_c">
                <mark class="fs_large bg_transparent scheme_color d_block m_bottom_5">Su Pedido ha sido enviado con éxito!</mark>
                                <mark class="fs_large bg_transparent scheme_color d_block m_bottom_20">Código de su Pedido: #{{$pedido->id}}</mark>
                <p class="m_bottom_35">Nos pondremos en contacto con usted a la brevedad <br/> Muchas Gracias. Nube Hilados</p> 
                                <a href="{{URL::to('/hilados')}}" class="button_type_3 t_align_c grey state_2 tr_all second_font fs_medium tt_uppercase m_top_15">Realizar otro pedido</a>              
              </div>
                        </div>
          </section>
        </div>
      </div>
@endsection