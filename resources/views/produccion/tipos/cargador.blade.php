@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>{{$machine}}</h4></div>

                <div class="panel-body">
                    <div class="col-md-12">
                        <a onclick="openModal();" class="btn btn-primary">Datos</a>
                        <br>
                    </div>
                    <div id="alerta_success"></div>
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="info">
                                    <td colspan="2"><strong>Parámetros de salida</strong></td>
                                </tr>
                                <tr>
                                    <td width="50%">Factor de carga de la tolva</td>
                                    <td><strong id="tolva"></strong></td>
                                </tr>
                                <tr>
                                    <td>Tiempo debido al tamaño del material transportado</td>
                                    <td><strong id="tiempo_mat_transp"></strong></td>
                                </tr>
                                <tr>
                                    <td>Tiempo debido a la altura del material apilado</td>
                                    <td><strong id="tiempo_mat_altura"></strong></td>
                                </tr>
                                <tr>
                                    <td>Tiempo debido a los factores diversos</td>
                                    <td><strong id="factores_diversos"></strong></td>
                                </tr>
                                <tr>
                                    <td>Factor de eficiencia del material</td>
                                    <td><strong id="factor_efic"></strong></td>
                                </tr>
                                <tr>
                                    <td>Tiempo de carga</td>
                                    <td><strong id="tiempo_carga"></strong></td>
                                </tr>
                                <tr>
                                    <td>Tiempo de ciclo básico</td>
                                    <td><strong id="tiempo_ciclo_basico"></strong></td>
                                </tr>
                                <tr>
                                    <td>Tiempo de ciclo total</td>
                                    <td><strong id="tiempo_ciclo_total"></strong></td>
                                </tr>
                                <tr>
                                    <td class="success">Producción (m3/h)</td>
                                    <td><strong id="produccion"></strong></td>
                                </tr>
                                <tr>
                                    <td class="success">Producción (tn/h)</td>
                                    <td><strong id="produccion_tn"></strong></td>
                                </tr>
                            </thead>
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--MODAL -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Registro de un cargador</h4>
                </div>
                <div id="alerta"></div>
                <input type="hidden" name="_token" id="token" value="{{csrf_token()}}">
                <form id="formCargador">
                    <div class="modal-body">
                        
                            <h4>Parámetros de entrada del equipo</h4>
                            <input type="hidden" class="form-control" id="gmachine_id" name="gmachine_id" value="1">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="capacidad_cucharon" class="control-label">Capacidad del cucharón(m3):</label>
                                    <input type="text" class="form-control" name="capacidad_cucharon" id="capacidad_cucharon">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="distancia_transporte" class="control-label">Distancia de transporte (m):</label>
                                    <input type="text" class="form-control" name="distancia_transporte" id="distancia_transporte">
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="aloader_id" class="control-label">Tipo de carga transportada:</label>
                                    <select class="form-control" name="aloader_id" id="aloader_id"></select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="bloader_id" class="control-label">Tamaño de material transportado:</label>
                                    <select class="form-control" name="bloader_id" id="bloader_id"></select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cloader_id" class="control-label">Altura del material apilado:</label>
                                    <select class="form-control" name="cloader_id" id="cloader_id"></select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="dloader_id" class="control-label">Motivos diversos de la operacion:</label>
                                    <select class="form-control" name="dloader_id" id="dloader_id"></select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="velo_transporte" class="control-label">Velocidad de transporte (Km/h):</label>
                                    <input type="text" class="form-control" name="velo_transporte" id="velo_transporte">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="eloader_id" class="control-label">Tipo de material transportado:</label>
                                    <select class="form-control" name="eloader_id" id="eloader_id"></select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="factor_eficiencia" class="control-label">Factor de eficiencia del material:</label>
                                    <input type="text" class="form-control" name="factor_eficiencia" id="factor_eficiencia">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="densidad_material" class="control-label">Densidad del material (tn/hr):</label>
                                    <input type="text" class="form-control" name="densidad_material" id="densidad_material">
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" id="register_loader">Registrar</button>
                    </div>
                </form>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection

@section('scripts_produccion')
<script type="text/javascript">
    $(document).ready(function () {
        $('#register_loader').on('click', register);
        selects();
        list_cargador();
    });

    function selects() {
        var route = "http://localhost/costohproduccion/public/select-cargador";
        $('#datos_machines').empty();
        $.get(route, function(res){
            $(res).each(function(key,value){
                //console.log(res);
                var htmla="";
                htmla+="<option selected disabled>Seleccione tipo de carga</option>";
                for (var i = 0; i < res.tipos_carga.length; i++) {
                    htmla+="<option value="+res.tipos_carga[i].aloader_id+">"+res.tipos_carga[i].descripcion+"</option>";
                }
                $("#aloader_id").append(htmla);

                var htmlb="";
                htmlb+="<option selected disabled>Seleccione tamaño de material</option>";
                for (var i = 0; i < res.tamaños_material.length; i++) {
                    htmlb+="<option value="+res.tamaños_material[i].bloader_id+">"+res.tamaños_material[i].descripcion+"</option>";
                }
                $("#bloader_id").append(htmlb);

                var htmlc="";
                htmlc+="<option selected disabled>Seleccione altura del material apilado</option>";
                for (var i = 0; i < res.tiempos_apilacion.length; i++) {
                    htmlc+="<option value="+res.tiempos_apilacion[i].cloader_id+">"+res.tiempos_apilacion[i].descripcion+"</option>";
                }
                $("#cloader_id").append(htmlc);

                var htmld="";
                htmld+="<option selected disabled>Seleccione motivos diversos de la operación</option>";
                for (var i = 0; i < res.tiempos_diversos.length; i++) {
                    htmld+="<option value="+res.tiempos_diversos[i].dloader_id+">"+res.tiempos_diversos[i].descripcion+"</option>";
                }
                $("#dloader_id").append(htmld);

                var htmle="";
                htmle+="<option selected disabled>Seleccione tipo de material transportado</option>";
                for (var i = 0; i < res.tipos_material.length; i++) {
                    htmle+="<option value="+res.tipos_material[i].eloader_id+">"+res.tipos_material[i].descripcion+"</option>";
                }
                $("#eloader_id").append(htmle);


            });
        });
    }

    function list_cargador() {
        var route = "http://localhost/costohproduccion/public/cargador/"+$('#gmachine_id').val();
        $.get(route, function(res){
            $(res).each(function(key,value){
               // console.log(res);

               $("#tolva").empty();
                $("#tiempo_mat_transp").empty();
                $("#tiempo_mat_altura").empty();
                $("#factores_diversos").empty();
                $("#factor_efic").empty();
                $("#tiempo_carga").empty();
                $("#tiempo_ciclo_basico").empty();
                $("#tiempo_ciclo_total").empty();
                $("#produccion").empty();    
                 $("#produccion_tn").empty();   
               

                $("#tolva").append(res.factor_tolva);
                $("#tiempo_mat_transp").append(res.tiempo_tamaño_material);
                $("#tiempo_mat_altura").append(res.tiempo_altura_material);
                $("#factores_diversos").append(res.tiempo_factores);
                $("#factor_efic").append(res.factor_eficiencia);
                $("#tiempo_carga").append(res.tiempo_carga);
                $("#tiempo_ciclo_basico").append(res.tiempo_ciclo_basico);
                $("#tiempo_ciclo_total").append(res.tiempo_ciclo_total);
                $("#produccion").append(res.produccion);   
                $("#produccion_tn").append(res.produccion_tn);     
               
            });
        });
    }

    function recargar() {
        var route = "http://localhost/costohproduccion/public/cargador/"+$('#gmachine_id').val();
        $.get(route, function(res){
            $(res).each(function(key,value){
               // console.log(res);
               
                $("#capacidad_cucharon").val(res.cargador[0].capacidad_cucharon);
                $("#distancia_transporte").val(res.cargador[0].distancia_transporte);
                $("#aloader_id").val(res.cargador[0].aloader_id);
                $("#bloader_id").val(res.cargador[0].bloader_id);
                $("#cloader_id").val(res.cargador[0].cloader_id);
                $("#dloader_id").val(res.cargador[0].dloader_id);
                $("#velo_transporte").val(res.cargador[0].velo_transporte);
                $("#eloader_id").val(res.cargador[0].eloader_id);
                $("#factor_eficiencia").val(res.cargador[0].factor_eficiencia);               
               $("#densidad_material").val(res.cargador[0].densidad_material); 
            });
        });
    }


    function register() {
        var sendData = toJSONString( document.getElementById( "formCargador" ) );

        var route = "http://localhost/costohproduccion/public/cargador";
        var type = 'POST';
        var token = $("#token").val();

        $.ajax({
            type        : type,
            headers     : {'X-CSRF-TOKEN': token},
            url         : route,
            data        : sendData, 
            dataType    : 'json', 
            success:function(result){
                document.getElementById("formCargador").reset();
                var successHtml = '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><ul><li>' + result.mensaje + '</li></ul></di>';
                $( '#alerta_success' ).html( successHtml ); 
                $('#myModal').modal('hide');
                list_cargador();
            },
            error : function(jqXhr) {
                var errors = jqXhr.responseJSON; 
                errorsHtml = '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><ul>';
                $.each( errors, function( key, value ) {
                    errorsHtml += '<li>' + value[0] + '</li>';
                });
                errorsHtml += '</ul></di>';
                $( '#alerta' ).html( errorsHtml );
            }
        });
    }


    function toJSONString( form ) {
        var obj = {};
        var elements = form.querySelectorAll( "input, select" );
        for( var i = 0; i < elements.length; ++i ) {
            var element = elements[i];
            var name = element.name;
            var value = element.value;

            if( name ) {
                obj[ name ] = value;
            }
        }

        return ( obj );
    }

    function openModal(argument) {
        $("#myModal").modal('show');
        //document.getElementById("formCargador").reset();
        recargar();
        $("#alerta").empty();
    }

</script>
@endsection
