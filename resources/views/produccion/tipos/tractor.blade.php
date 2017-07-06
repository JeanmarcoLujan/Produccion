@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Tractor</div>

                <div class="panel-body">
                    <!-- boton modal -->
                    <div class="col-md-12">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                          Datos
                        </button>
                        <br>
                    </div>
                    <br>
                    <div class="col-md-6">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="info">
                                    <td colspan="2"><strong>Parámetros de entrada del equipo</strong></td>
                                </tr>
                                <tr>
                                    <td width="50%">Hoja topadora</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Capacidad de hoja topadora (m3)</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Peso Total (tn)</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Tiempo fijos de Ope.(min)</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Factor eficiencia</td>
                                    <td></td>
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
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Densidad material (t/m3)</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Distancia de transporte (m)</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Coef. de rodamiento (Kg/t)</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Factor de conversion de volumen</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Coef. de adherencia</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Coef. de friccion de carga</td>
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
                                    <td width="50%">Esfuerzo máximo para la excavación (kg)</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Velocidad de excavación (km/h)</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Resistemcia ofrecida al transporte en material (km/h)</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Resistencia ofrecida al retorno en vacío (t)</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Velocidad de retorno en vacío (km/h)</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Tiempo de ciclo mínimo (min)</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Aumento de volumen excavado</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td class="success">Producción máxima (m3/h)</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td class="success">Producción eficiente (m3/h)</td>
                                    <td></td>
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
                <form id="formTractor">
                    <div class="modal-body">

                        <h5><strong>Parámetros de entrada del equipo</strong></h5>
                        <input type="hidden" name="_token" id="token" value="{{csrf_token()}}">
                        <input type="hidden" class="form-control" name="gmachine_id" value="1">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="hoja_tapadora" class="control-label">Hoja topadora:</label>
                                <input type="text" class="form-control" name="hoja_tapadora" >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="capa_tapadora" class="control-label">Capacidad  de hoja topadora (m3):</label>
                                <input type="text" class="form-control" name="capa_tapadora" id="t_capacidad">
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="peso" class="control-label">Peso total de tractor(tn):</label>
                                <input type="text" class="form-control" name="peso">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tiempo_operacion" class="control-label">Tiempos fijos de operación(m3):</label>
                                <input type="text" class="form-control" name="tiempo_operacion">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="factor_eficiencia" class="control-label">Factor eficiencia:</label>
                                <input type="text" class="form-control" name="factor_eficiencia">
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
                                <input type="text" class="form-control" name="densidad_material">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="distancia_transporte" class="control-label">Distancia de transporte (m):</label>
                                <input type="text" class="form-control" name="distancia_transporte">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="factor_conversion" class="control-label">Factor de conversion de volumenes:</label>
                                <input type="text" class="form-control" name="factor_conversion">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="coef_rodamiento" class="control-label">Coeficiente de rodamiento (Kg/tn):</label>
                                <input type="text" class="form-control" name="coef_rodamiento">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="coef_adherencia" class="control-label">Coeficiente de adherencia:</label>
                                <input type="text" class="form-control" name="coef_adherencia">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="coef_friccion" class="control-label">Coeficiente de fricción de carga:</label>
                                <input type="text" class="form-control" name="coef_friccion">
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
        
    });

    function selects() {
        var route = "http://localhost/costohproduccion/public/select-tractor";
        $.get(route, function(res){
            $(res).each(function(key,value){
                console.log(res);
                
                var html="";
                html+="<option selected disabled>Seleccione declive del terreno</option>";
                for (var i = 0; i < res.rampas.length; i++) {
                    html+="<option value="+res.rampas[i].ramp_id+">"+res.rampas[i].rampa+"</option>";
                }
                $("#t_declive").append(html);
                
            });
        });
    }

    function register() {
        
        //console.log($('#formTractor').serializeArray());

        var json = toJSONString( document.getElementById( "formTractor" ) );
        var route = "http://localhost/costohproduccion/public/tractor";
        $.ajax({
            type        : type,
            headers     : {'X-CSRF-TOKEN': token},
            url         : route,
            data        : sendDatos, 
            dataType    : 'json', 
            success:function(result){
                document.getElementById("formMachine").reset();
                successHtml = '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><ul><li>' + result.mensaje + '</li></ul></di>';
                $( '#alerta' ).html( successHtml ); 
                listar_machines();
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

        return JSON.stringify( obj );
    }

</script>
@endsection