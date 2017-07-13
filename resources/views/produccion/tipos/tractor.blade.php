@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>{{$machine}}</h4></div>

                <div class="panel-body">
                    <!-- boton modal -->
                    <div class="col-md-12">
                        <a onclick="openModal();" class="btn btn-primary">Datos</a>
                        <br>
                    </div>
                    <br>
                    <div id="alerta_success"></div>
                    <div class="col-md-6">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="info">
                                    <td colspan="2"><strong>Parámetros de entrada del equipo</strong></td>
                                </tr>
                                <tr>
                                    <td width="50%">Hoja topadora</td>
                                    <td><strong id="hoja_tapadora_v"></strong></td>
                                </tr>
                                <tr>
                                    <td>Capacidad de hoja topadora (m3)</td>
                                    <td><strong id="capa_tapadora_v"></strong></td>
                                </tr>
                                <tr>
                                    <td>Peso Total (tn)</td>
                                    <td><strong id="peso_v"></strong></td>
                                </tr>
                                <tr>
                                    <td>Tiempo fijos de Ope.(min)</td>
                                    <td><strong id="tiempo_operacion_v"></strong></td>
                                </tr>
                                <tr>
                                    <td>Factor eficiencia</td>
                                    <td><strong id="factor_eficiencia_v"></strong></td>
                                </tr>
                                <tr>
                                    <td>-</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>-</td>
                                    <td></td>
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
                                    <td width="50%">Declive del terreno</td>
                                    <td><strong id="declive_terreno"></strong></td>
                                </tr>
                                <tr>
                                    <td>Densidad material (t/m3)</td>
                                    <td><strong id="densidad_material_v"></strong></td>
                                </tr>
                                <tr>
                                    <td>Distancia de transporte (m)</td>
                                    <td><strong id="distancia_transporte_v"></strong></td>
                                </tr>
                                <tr>
                                    <td>Coef. de rodamiento (Kg/t)</td>
                                    <td><strong id="coef_rodamiento_v"></strong></td>
                                </tr>
                                <tr>
                                    <td>Factor de conversion de volumen</td>
                                    <td><strong id="factor_conversion_v"></strong></td>
                                </tr>
                                <tr>
                                    <td>Coef. de adherencia</td>
                                    <td><strong id="coef_adherencia_v"></strong></td>
                                </tr>
                                <tr>
                                    <td>Coef. de friccion de carga</td>
                                    <td><strong id="coef_friccion_v"></strong></td>
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
                                    <td width="50%" >Esfuerzo máximo para la excavación (kg)</td>
                                    <td><strong id="esfuerzo"></strong></td>
                                </tr>
                                <tr>
                                    <td>Velocidad de excavación (km/h)</td>
                                    <td><strong id="vel_exc"></strong></td>
                                </tr>
                                <tr>
                                    <td>Resistemcia ofrecida al transporte en material (kg)</td>
                                    <td><strong id="resis_of_trans"></strong></td>
                                </tr>
                                <tr>
                                    <td>Velocidad de transporte de material (km/h)</td>
                                    <td><strong id="vel_transp"></strong></td>
                                </tr>
                                <tr>
                                    <td>Resistencia ofrecida al retorno en vacío (t)</td>
                                    <td><strong id="resis_of_return"></strong></td>
                                </tr>
                                <tr>
                                    <td>Velocidad de retorno en vacío (km/h)</td>
                                    <td><strong id="vel_return"></strong></td>
                                </tr>
                                <tr>
                                    <td>Tiempo de ciclo mínimo (min)</td>
                                    <td><strong id="tiempo_ciclo_min"></strong></td>
                                </tr>
                                <tr>
                                    <td>Aumento de volumen excavado</td>
                                    <td><strong id="aum_vol_exc"></strong></td>
                                </tr>
                                <tr>
                                    <td class="success">Producción máxima (m3/h)</td>
                                    <td><strong id="prod_max"></strong></td>
                                </tr>
                                <tr>
                                    <td class="success">Producción eficiente (m3/h)</td>
                                    <td><strong id="prod_efic"></strong></td>
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
                    <h4 class="modal-title" id="myModalLabel">DATOS DE TRACTOR</h4>
                </div>
                <input type="hidden" name="_token" id="token" value="{{csrf_token()}}">
                <form id="formTractor">
                    <div class="modal-body">

                        <h5><strong>Parámetros de entrada del equipo</strong></h5>
                        <div id="alerta"></div>
                        
                        <input type="hidden" class="form-control" name="gmachine_id" id="gmachine_id" value="1">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="hoja_tapadora" class="control-label">Hoja topadora:</label>
                                <input type="text" class="form-control" name="hoja_tapadora" id="hoja_tapadora" >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="capa_tapadora" class="control-label">Capacidad  de hoja topadora (m3):</label>
                                <input type="text" class="form-control" name="capa_tapadora" id="capa_tapadora">
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="peso" class="control-label">Peso total de tractor(tn):</label>
                                <input type="text" class="form-control" name="peso" id="peso">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tiempo_operacion" class="control-label">Tiempos fijos de operación(m3):</label>
                                <input type="text" class="form-control" name="tiempo_operacion" id="tiempo_operacion">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="factor_eficiencia" class="control-label">Factor eficiencia:</label>
                                <input type="text" class="form-control" name="factor_eficiencia" id="factor_eficiencia">
                            </div>
                        </div>
                        <hr>
                        <h5><strong>Parámetros de entrada del terreno</strong></h5>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="declive_terreno" class="control-label">Declive del terreno:</label>
                                <select class="form-control" name="declive_terreno" id="t_declive"></select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="densidad_material" class="control-label">Densidad del material (tn/m3):</label>
                                <input type="text" class="form-control" name="densidad_material" id="densidad_material">
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
                                <label for="factor_conversion" class="control-label">Factor de conversion de volumenes:</label>
                                <input type="text" class="form-control" name="factor_conversion" id="factor_conversion">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="coef_rodamiento" class="control-label">Coeficiente de rodamiento (Kg/tn):</label>
                                <input type="text" class="form-control" name="coef_rodamiento" id="coef_rodamiento">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="coef_adherencia" class="control-label">Coeficiente de adherencia:</label>
                                <input type="text" class="form-control" name="coef_adherencia" id="coef_adherencia">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="coef_friccion" class="control-label">Coeficiente de fricción de carga:</label>
                                <input type="text" class="form-control" name="coef_friccion" id="coef_friccion">
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" id="register_trator">Registrar</button>
                    </div>
                </form>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection

@section('scripts_tractor')
<script type="text/javascript">
    $(document).ready(function () {
        $('#register_trator').on('click', register);
        selects();
        list_tractor();
    });

    function selects() {
        var route = "http://localhost/costohproduccion/public/select-tractor";
        $.get(route, function(res){
            $(res).each(function(key,value){
                //console.log(res);
                
                var html="";
                html+="<option selected disabled>Seleccione declive del terreno</option>";
                for (var i = 0; i < res.rampas.length; i++) {
                    html+="<option value="+res.rampas[i].ramp_id+">"+res.rampas[i].rampa+"</option>";
                }
                $("#t_declive").append(html);
                
            });
        });
    }

    function list_tractor() {
        var route = "http://localhost/costohproduccion/public/tractor/"+$('#gmachine_id').val();
        $.get(route, function(res){
            $(res).each(function(key,value){
                //console.log(res);

                $("#hoja_tapadora_v").empty();
                $("#capa_tapadora_v").empty();
                $("#peso_v").empty();
                $("#tiempo_operacion_v").empty();
                $("#factor_eficiencia_v").empty();
                $("#declive_terreno").empty();
                $("#densidad_material_v").empty();
                $("#distancia_transporte_v").empty();
                $("#coef_rodamiento_v").empty();
                $("#factor_conversion_v").empty();
                $("#coef_adherencia_v").empty();
                $("#coef_friccion_v").empty();
                $("#esfuerzo").empty();
                $("#vel_exc").empty();
                $("#resis_of_trans").empty();
                $("#vel_transp").empty();
                $("#resis_of_return").empty();
                $("#vel_return").empty();
                $("#tiempo_ciclo_min").empty();
                $("#aum_vol_exc").empty();
                $("#prod_max").empty();
                $("#prod_efic").empty();

                $("#hoja_tapadora_v").append(res.tractor[0].capa_tapadora);
                $("#capa_tapadora_v").append(res.tractor[0].capa_tapadora);
                $("#peso_v").append(res.tractor[0].peso);
                $("#tiempo_operacion_v").append(res.tractor[0].tiempo_operacion);
                $("#factor_eficiencia_v").append(res.tractor[0].factor_eficiencia);
                $("#declive_terreno").append(res.tractor[0].ramp.rampa);
                $("#densidad_material_v").append(res.tractor[0].densidad_material);
                $("#distancia_transporte_v").append(res.tractor[0].distancia_transporte);
                $("#coef_rodamiento_v").append(res.tractor[0].coef_rodamiento);
                $("#factor_conversion_v").append(res.tractor[0].factor_conversion);
                $("#coef_adherencia_v").append(res.tractor[0].coef_adherencia);
                $("#coef_friccion_v").append(res.tractor[0].coef_friccion);
                $("#esfuerzo").append(res.esfuerzo_max);
                $("#vel_exc").append(res.vel_exc);
                $("#resis_of_trans").append(res.resistencia_ofrec);
                $("#vel_transp").append(res.vel_trans);
                $("#resis_of_return").append(res.resistencia_ofrecida_retorno);
                $("#vel_return").append(res.vel_retorno);
                $("#tiempo_ciclo_min").append((res.tiempo_ciclo_min).toFixed(2));
                $("#aum_vol_exc").append(res.aumento_vol_excavado);
                $("#prod_max").append((res.produccion_max).toFixed(2));
                $("#prod_efic").append((res.produccion_eficiente).toFixed(2));
               
            });
        });
    }

    function recargar() {
        var route = "http://localhost/costohproduccion/public/tractor/"+$('#gmachine_id').val();
        $.get(route, function(res){
            $(res).each(function(key,value){
                $("#hoja_tapadora").val(res.tractor[0].hoja_tapadora);
                $("#capa_tapadora").val(res.tractor[0].capa_tapadora);
                $("#peso").val(res.tractor[0].peso);
                $("#tiempo_operacion").val(res.tractor[0].tiempo_operacion);
                $("#factor_eficiencia").val(res.tractor[0].factor_eficiencia);

                $("#t_declive").val(res.tractor[0].declive_terreno);
                $("#densidad_material").val(res.tractor[0].densidad_material); 
                $("#distancia_transporte").val(res.tractor[0].distancia_transporte);
                $("#factor_conversion").val(res.tractor[0].factor_conversion); 
                $("#coef_rodamiento").val(res.tractor[0].coef_rodamiento);
                $("#coef_adherencia").val(res.tractor[0].coef_adherencia); 
                $("#coef_friccion").val(res.tractor[0].coef_friccion); 


            });
        });
    }

    function register() {
        
        //console.log($('#formTractor').serializeArray());
        var sendData = toJSONString( document.getElementById( "formTractor" ) );
        console.log(sendData);
        var route = "http://localhost/costohproduccion/public/tractor";
        var type = 'POST';
        var token = $("#token").val();

        $.ajax({
            type        : type,
            headers     : {'X-CSRF-TOKEN': token},
            url         : route,
            data        : sendData, 
            dataType    : 'json', 
            success:function(result){
                document.getElementById("formTractor").reset();
                var successHtml = '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><ul><li>' + result.mensaje + '</li></ul></di>';
                $( '#alerta_success' ).html( successHtml ); 
                $('#myModal').modal('hide');
                list_tractor();
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

        

        //console.log(sendDatos);
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