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
                                    <td>Tiempo de ciclo (seg)</td>
                                    <td><strong id="tiempo_ciclo"></strong></td>
                                </tr>
                                <tr>
                                    <td>Produccion horaria (m3/h)</td>
                                    <td><strong id="prod_horaria"></strong></td>
                                </tr>
                                <tr>
                                    <td>Produccion horaria (tn/h)</td>
                                    <td><strong id="produccion_tn"></strong></td>
                                </tr>
                                <tr>
                                    <td>Largura mínima (m)</td>
                                    <td><strong id="largura_min"></strong></td>
                                </tr>
                                <tr>
                                    <td>Profundidad de excavación (m)</td>
                                    <td><strong id="profundidad"></strong></td>
                                </tr>

                                <tr>
                                    <td class="success">Producción lineal (m/h)</td>
                                    <td><strong id="prod_lineal"></strong></td>
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
                    <h4 class="modal-title" id="myModalLabel">Registro de Excavadora o Retroexcavadora</h4>
                </div>
                <div id="alerta"></div>
                 <input type="hidden" name="_token" id="token" value="{{csrf_token()}}">
                <form id="formExcadora">
                    <div class="modal-body">
                        
                            <h4><strong>Parámetros de entrada del equipo</strong></h4>
                            <input type="hidden" class="form-control" id="gmachine_id" name="gmachine_id" value="1">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="capacidad_cucharon" class="control-label">Capacidad del cucharón(m3):</label>
                                    <input type="text" class="form-control" id="capacidad_cucharon" name="capacidad_cucharon">
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="e_tipo_cucharon" class="control-label">Tipo de carga del cucharón:</label>
                                    <select class="form-control" id="e_tipo_cucharon" name="aexcavator_id"></select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="factor_conver_vol" class="control-label">Factor de conversión de volumen:</label>
                                    <input type="text" class="form-control" id="factor_conver_vol" name="factor_conver_vol">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="factor_eficiencia" class="control-label">Factor de eficiencia:</label>
                                    <input type="text" class="form-control" id="factor_eficiencia" name="factor_eficiencia">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="e_tipo_exc" class="control-label">Tipos de excavación:</label>
                                    <select class="form-control" id="e_tipo_exc" name="bexcavator_id"></select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="e_tipo_tuberia" class="control-label">Tipos de tubería:</label>
                                    <select class="form-control" id="e_tipo_tuberia" name="cexcavator_id"></select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="profundidad_exc" class="control-label">Profundidad de la excavación (m):</label>
                                     <input type="text" class="form-control" id="profundidad_exc" name="profundidad_exc">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="densidad_material" class="control-label">Densidad del material (tn/m3):</label>
                                     <input type="text" class="form-control" id="densidad_material" name="densidad_material">
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" id="register_excavator">Registrar</button>
                    </div>
                </form>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection

@section('scripts_excavadora')
<script type="text/javascript">
    $(document).ready(function () {
        $('#register_excavator').on('click', register);
        selects();
        list_excavador();
    });


    function selects() {
        var route = "http://localhost/costohproduccion/public/select-exc";
        //$('#datos_machines').empty();
        $.get(route, function(res){
            $(res).each(function(key,value){
                //console.log(res);
                var htmla="";
                htmla+="<option selected disabled>Seleccione tipo de carga del cucharón</option>";
                for (var i = 0; i < res.tipos_carga.length; i++) {
                    htmla+="<option value="+res.tipos_carga[i].aexcavator_id+">"+res.tipos_carga[i].descripcion+"</option>";
                }
                $("#e_tipo_cucharon").append(htmla);

                var htmlb="";
                htmlb+="<option selected disabled>Seleccione tipo de excavación</option>";
                for (var i = 0; i < res.tipos_excavacion.length; i++) {
                    htmlb+="<option value="+res.tipos_excavacion[i].bexcavator_id+">"+res.tipos_excavacion[i].descripcion+"</option>";
                }
                $("#e_tipo_exc").append(htmlb);

                var htmlc="";
                htmlc+="<option selected disabled>Seleccione tipo de tubería</option>";
                for (var i = 0; i < res.tipos_tuberia.length; i++) {
                    htmlc+="<option value="+res.tipos_tuberia[i].cexcavator_id+">"+res.tipos_tuberia[i].pulgadas+"</option>";
                }
                $("#e_tipo_tuberia").append(htmlc);


            });
        });
    }

    function list_excavador() {
        var route = "http://localhost/costohproduccion/public/exc-retroexc/"+$('#gmachine_id').val();
        $.get(route, function(res){
            $(res).each(function(key,value){
               //console.log(res);
                $("#tolva").empty();
                $("#tiempo_ciclo").empty();
                $("#prod_horaria").empty();
                $("#largura_min").empty();
                $("#profundidad").empty();
                $("#prod_lineal").empty();   

                $("#tolva").append(res.tolva);
                $("#tiempo_ciclo").append(res.tiempo_ciclo);
                $("#prod_horaria").append(res.produccion_horaria);
                $("#largura_min").append(res.largura_min);
                $("#profundidad").append(res.profundidad);
                $("#prod_lineal").append(res.produccion_lineal);    
                $("#produccion_tn").append(res.produccion_tn);            
               
            });
        });
    }

    function recargar() {
        var route = "http://localhost/costohproduccion/public/exc-retroexc/"+$('#gmachine_id').val();
        $.get(route, function(res){
            $(res).each(function(key,value){
               

                $("#capacidad_cucharon").val(res.excavadora[0].capacidad_cucharon);
                $("#e_tipo_cucharon").val(res.excavadora[0].aexcavator_id);
                $("#factor_conver_vol").val(res.excavadora[0].factor_conver_vol);
                $("#factor_eficiencia").val(res.excavadora[0].factor_eficiencia);
                $("#e_tipo_exc").val(res.excavadora[0].bexcavator_id);
                $("#e_tipo_tuberia").val(res.excavadora[0].cexcavator_id);
                $("#profundidad_exc").val(res.excavadora[0].profundidad_exc); 
                $("#densidad_material").val(res.excavadora[0].densidad_material); 
               
            });
        });
    }

    function register() {
        var sendData = toJSONString( document.getElementById( "formExcadora" ) );
        console.log(sendData);
        var route = "http://localhost/costohproduccion/public/exc-retroexc";
        var type = 'POST';
        var token = $("#token").val();

        $.ajax({
            type        : type,
            headers     : {'X-CSRF-TOKEN': token},
            url         : route,
            data        : sendData, 
            dataType    : 'json', 
            success:function(result){
                document.getElementById("formExcadora").reset();
                var successHtml = '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><ul><li>' + result.mensaje + '</li></ul></di>';
                $( '#alerta_success' ).html( successHtml ); 
                $('#myModal').modal('hide');
                list_excavador();
                
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
