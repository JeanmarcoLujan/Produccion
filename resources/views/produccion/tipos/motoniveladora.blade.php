@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Motoniveladora</h4></div>
                <div class="panel-body">
                    <div class="col-md-12">
                        <a onclick="openModal();" class="btn btn-primary">Datos</a>
                        <br>
                    </div>
                    <div id="alerta_success"></div>
                    <div class="col-md-6">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="info">
                                    <td colspan="2"><strong>Parámetros de entrada del equipo</strong></td>
                                </tr>
                                <tr>
                                    <td width="50%">Velocidad de avance (Km/h)</td>
                                    <td><strong id="v_avance"></strong></td>
                                </tr>
                                <tr>
                                    <td>Velocidad de retroceso (Km/h)</td>
                                    <td><strong id="v_retroceso"></strong></td>
                                </tr>
                                <tr>
                                    <td>Velocidad en 1ª marcha (Km/h)</td>
                                    <td><strong id="v_primera"></strong></td>
                                </tr>
                                <tr>
                                    <td>Largura de la lámina (m)</td>
                                    <td><strong id="largura_lamina"></strong></td>
                                </tr>
                                <tr>
                                    <td>Factor eficiencia</td>
                                    <td><strong id="f_eficiencia"></strong></td>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                    
                    <div class="col-md-6">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="info">
                                    <td colspan="2"><strong>Parámetros de entrada del terreno</strong></td>
                                </tr>
                                <tr>
                                    <td width="50%">Largura (m)</td>
                                    <td><strong id="ancho_v"></strong></td>
                                </tr>
                                <tr>
                                    <td>Longitud a ser regularizada (m)</td>
                                    <td><strong id="regularizada"></strong></td>
                                </tr>
                                <tr>
                                    <td>Espesura suelta de la capa (m)</td>
                                    <td><strong id="espesura_v"></strong></td>
                                </tr>
                                <tr>
                                    <td class="success">Número de pasadas (un solo sentido)</td>
                                    <td><strong id="num_pasadas"></strong></td>
                                </tr>
                                <tr>
                                    <td>-</td>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="info">
                                    <td colspan="2"><strong>Parámetros de salida</strong></td>
                                </tr>
                                <tr>
                                    <td width="50%">Tiempo efectivo (min)</td>
                                    <td><strong id="tiempo_efectivo"></strong></td>
                                </tr>
                                <tr>
                                    <td class="success">Producción (m3/h)</td>
                                    <td><strong id="produccion"></strong></td>
                                </tr>
                                <tr>
                                    <td class="success">Producción (tn/h)</td>
                                    <td><strong id="produccion_tn"></strong></td>
                                </tr>
                                <tr>
                                    <td>Aréa a ser regularizada por hora (m2/h)</td>
                                    <td><strong id="area_regularizada"></strong></td>
                                </tr>
                                <tr>
                                    <td>Aréa trabajada en 1ª marcha (m2/h)</td>
                                    <td><strong id="area_trabajada"></strong></td>
                                </tr>
                                <tr>
                                    <td>Número de unidades requeridas</td>
                                    <td><strong id="num_unidades"></strong></td>
                                </tr>
                            </thead>
                            <tbody></tbody>
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
                    <h4 class="modal-title" id="myModalLabel">Registro de datos de motoniveladora</h4>
                </div>
                <div id="alerta"></div>
                <input type="hidden" name="_token" id="token" value="{{csrf_token()}}">
                <form id="formMotoniveladora">
                    <div class="modal-body">

                        <h5><strong>Parámetros de entrada del equipo</strong></h5>
                        <input type="hidden" class="form-control" id="gmachine_id" name="gmachine_id" value="1">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="velocidad_avance" class="control-label">Velocidad de avance (km/h):</label>
                                <input type="text" class="form-control" name="velocidad_avance" id="velocidad_avance">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="velocidad_retroceso" class="control-label">Velocidad de retroceso (km/h):</label>
                                <input type="text" class="form-control" name="velocidad_retroceso" id="velocidad_retroceso">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="velocidad_primera" class="control-label">Velocidad en 1ª marcha (km/h):</label>
                                <input type="text" class="form-control" name="velocidad_primera" id="velocidad_primera">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="ancho_lamina" class="control-label">Largura de la lámina (m):</label>
                                <input type="text" class="form-control" name="ancho_lamina" id="ancho_lamina">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="factor_eficiencia" class="control-label">Factor de eficiencia:</label>
                                <input type="text" class="form-control" name="factor_eficiencia" id="factor_eficiencia">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="densidad_material" class="control-label">Densidad del material (tn/m3):</label>
                                <input type="text" class="form-control" name="densidad_material" id="densidad_material">
                            </div>
                        </div>
                        <h5><strong>Parámetros de entrada del terreno</strong></h5>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="ancho" class="control-label">Ancho (m):</label>
                                <input type="text" class="form-control" name="ancho" id="ancho">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="longitud_regularizada" class="control-label">Largo (m):</label>
                                <input type="text" class="form-control" name="longitud_regularizada" id="longitud_regularizada">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="espesura" class="control-label">Espesura suelta de la capa (m):</label>
                                <input type="text" class="form-control" name="espesura" id="espesura">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" id="register_motoniveladora">Registrar</button>
                    </div>
                </form>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection


@section('scripts_motoniveladora')
<script type="text/javascript">
    $(document).ready(function () {
        $('#register_motoniveladora').on('click', register);
        list_motoniveladora();
    });

    function list_motoniveladora() {
        var route = "http://localhost/costohproduccion/public/motoniveladora/"+$('#gmachine_id').val();
        $.get(route, function(res){
            $(res).each(function(key,value){
               console.log(res);

               $("#v_avance").empty();
               $("#v_retroceso").empty();
               $("#v_primera").empty();
               $("#largura_lamina").empty();
               $("#f_eficiencia").empty();
               $("#ancho_v").empty();
               $("#regularizada").empty();
               $("#espesura_v").empty();
               $("#num_pasadas").empty();
               $("#tiempo_efectivo").empty();
               $("#produccion").empty();
               $("#area_regularizada").empty();
               $("#area_trabajada").empty();
               $("#num_unidades").empty();
               $("#produccion_tn").empty();

               $("#v_avance").append(res.motoniv[0].velocidad_avance);
               $("#v_retroceso").append(res.motoniv[0].velocidad_retroceso);
               $("#v_primera").append(res.motoniv[0].velocidad_primera);
               $("#largura_lamina").append(res.motoniv[0].ancho_lamina);
               $("#f_eficiencia").append(res.motoniv[0].factor_eficiencia);
               $("#ancho_v").append(res.motoniv[0].ancho);
               $("#regularizada").append(res.motoniv[0].longitud_regularizada);
               $("#espesura_v").append(res.motoniv[0].espesura);
               $("#num_pasadas").append(res.num_pasadas);
               $("#tiempo_efectivo").append(res.tiempo_efectivo);
               $("#produccion").append(res.produccion);
               $("#area_regularizada").append(res.area_regularizada);
               $("#area_trabajada").append(res.area_trabajada);
               $("#num_unidades").append(res.numero_unidades);
               $("#produccion_tn").append(res.produccion_tn);
            });
        });
    }

    function recargar() {
        var route = "http://localhost/costohproduccion/public/motoniveladora/"+$('#gmachine_id').val();
        $.get(route, function(res){
            $(res).each(function(key,value){
               console.log(res);
                $("#velocidad_avance").val(res.motoniv[0].velocidad_avance);
                $("#velocidad_retroceso").val(res.motoniv[0].velocidad_retroceso);
                $("#velocidad_primera").val(res.motoniv[0].velocidad_primera);
                $("#ancho_lamina").val(res.motoniv[0].ancho_lamina);
                $("#factor_eficiencia").val(res.motoniv[0].factor_eficiencia);
                $("#ancho").val(res.motoniv[0].ancho);
                $("#longitud_regularizada").val(res.motoniv[0].longitud_regularizada);
                $("#espesura").val(res.motoniv[0].espesura);
                $("#densidad_material").val(res.motoniv[0].densidad_material);
            });
        });
    }

    function register() {
        var sendData = toJSONString( document.getElementById( "formMotoniveladora" ) );

        var route = "http://localhost/costohproduccion/public/motoniveladora";
        var type = 'POST';
        var token = $("#token").val();

        $.ajax({
            type        : type,
            headers     : {'X-CSRF-TOKEN': token},
            url         : route,
            data        : sendData, 
            dataType    : 'json', 
            success:function(result){
                document.getElementById("formMotoniveladora").reset();
                var successHtml = '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><ul><li>' + result.mensaje + '</li></ul></di>';
                $( '#alerta_success' ).html( successHtml ); 
                $('#myModal').modal('hide');
                list_motoniveladora();
                
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
        recargar();
        $("#alerta").empty();
    }

</script>
@endsection