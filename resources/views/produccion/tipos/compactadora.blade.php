@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Compatadora</h4></div>

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
                                    <td colspan="2"><strong>Parámetros de entrada del equipo</strong></td>
                                </tr>
                                <tr>
                                    <td width="50%">Ancho del rodillo (m)</td>
                                    <td><strong id="ancho"></strong></td>
                                </tr>
                                <tr>
                                    <td>Velocidad del equipo (km/h)</td>
                                    <td><strong id="velocidad"></strong></td>
                                </tr>
                                <tr>
                                    <td>Factor de eficiencia</td>
                                    <td><strong id="eficiencia"></strong></td>
                                </tr>
                                <tr>
                                    <td>Número de pasadas del rodillo</td>
                                    <td><strong id="num_pasadas"></strong></td>
                                </tr>
                                <tr>
                                    <td>Produccion del motoscraper (m3/h)</td>
                                    <td><strong id="motoscraper"></strong></td>
                                </tr>
                                <tr>
                                    <td>Espesor de capa (m)</td>
                                    <td><strong id="espesor"></strong></td>
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
                                    <td width="50%">Ancho total de rodillo (m)</td>
                                    <td><strong id="ancho_total"></strong></td>
                                </tr>
                                <tr>
                                    <td class="success">Producción del compactador (m3/h)</td>
                                    <td><strong id="produccion"></strong></td>
                                </tr>
                                <tr>
                                    <td class="success">Producción del compactador (tn/h)</td>
                                    <td><strong id="produccion_tn"></strong></td>
                                </tr>
                                <tr>
                                    <td>Número de unidades</td>
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
                    <h4 class="modal-title" id="myModalLabel">Registro de datos compactadora</h4>
                </div>
                <div id="alerta"></div>
                <input type="hidden" name="_token" id="token" value="{{csrf_token()}}">
                <form id="formCompactadora">
                    <div class="modal-body">

                        <h5><strong>Parámetros de entrada del equipo</strong></h5>
                        <input type="hidden" class="form-control" id="gmachine_id" name="gmachine_id" value="1">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ancho_rodillo" class="control-label">Ancho del rodillo (m):</label>
                                <input type="text" class="form-control" name="ancho_rodillo" id="ancho_rodillo">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="velocidad_avance" class="control-label">Velocidad del equipo (km/h):</label>
                                <input type="text" class="form-control" name="velocidad_avance" id="velocidad_avance">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="factor_eficiencia" class="control-label">Factor de eficiencia:</label>
                                <input type="text" class="form-control" name="factor_eficiencia" id="factor_eficiencia">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="n_rodillos" class="control-label">Número de pasadas del rodillo:</label>
                                <input type="text" class="form-control" name="n_rodillos" id="n_rodillos">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="produccion_moto" class="control-label">Produccion del motoscraper (m3/h):</label>
                                <input type="text" class="form-control" name="produccion_moto" id="produccion_moto">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="espesura_capa" class="control-label">Espesor de capa (cm):</label>
                                <input type="text" class="form-control" name="espesura_capa" id="espesura_capa">
                            </div>
                        </div>
                         <div class="col-md-12">
                            <div class="form-group">
                                <label for="densidad_material" class="control-label">Densidad del material(tn/m3):</label>
                                <input type="text" class="form-control" name="densidad_material" id="densidad_material">
                            </div>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" id="register_compactadora">Registrar</button>
                    </div>
                </form>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection


@section('scripts_compactadora')
<script type="text/javascript">
    $(document).ready(function () {
        $('#register_compactadora').on('click', register);
        list_compactadora();
    });

    function list_compactadora() {
        var route = "http://localhost/costohproduccion/public/compactadora/"+$('#gmachine_id').val();
        $.get(route, function(res){
            $(res).each(function(key,value){
               //console.log(res);

                $("#ancho").empty();
                $("#velocidad").empty();
                $("#eficiencia").empty();
                $("#num_pasadas").empty();
                $("#motoscraper").empty();
                $("#espesor").empty();
                $("#ancho_total").empty();
                $("#produccion").empty();
                $("#num_unidades").empty();
                $("#produccion_tn").empty();

                $("#ancho").append(res.compactadora[0].ancho_rodillo);
                $("#velocidad").append(res.compactadora[0].velocidad_avance);
                $("#eficiencia").append(res.compactadora[0].factor_eficiencia);
                $("#num_pasadas").append(res.compactadora[0].n_rodillos);
                $("#motoscraper").append(res.compactadora[0].produccion_moto);
                $("#espesor").append(res.compactadora[0].espesura_capa);
                $("#ancho_total").append(res.ancho_rodillo);
                $("#produccion").append(res.produccion);
                $("#num_unidades").append(res.numero_unidades);
                $("#produccion_tn").append(res.produccion_tn);
               
            });
        });
    }

    function recargar() {
        var route = "http://localhost/costohproduccion/public/compactadora/"+$('#gmachine_id').val();
        $.get(route, function(res){
            $(res).each(function(key,value){
               //console.log(res);  
                $("#ancho_rodillo").val(res.compactadora[0].ancho_rodillo);
                $("#velocidad_avance").val(res.compactadora[0].velocidad_avance);
                $("#factor_eficiencia").val(res.compactadora[0].factor_eficiencia);
                $("#n_rodillos").val(res.compactadora[0].n_rodillos);
                $("#produccion_moto").val(res.compactadora[0].produccion_moto);
                $("#espesura_capa").val(res.compactadora[0].espesura_capa);
                $("#densidad_material").val(res.compactadora[0].densidad_material);
               
            });
        });
    }


    function register() {
       var sendData = toJSONString( document.getElementById( "formCompactadora" ) );

        var route = "http://localhost/costohproduccion/public/compactadora";
        var type = 'POST';
        var token = $("#token").val();

        $.ajax({
            type        : type, 
            headers     : {'X-CSRF-TOKEN': token},
            url         : route,
            data        : sendData, 
            dataType    : 'json', 
            success:function(result){
                document.getElementById("formCompactadora").reset();
                var successHtml = '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><ul><li>' + result.mensaje + '</li></ul></di>';
                $( '#alerta_success' ).html( successHtml ); 
                $('#myModal').modal('hide');
                list_compactadora();
                
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
