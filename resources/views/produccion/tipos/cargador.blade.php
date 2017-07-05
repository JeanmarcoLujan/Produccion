@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Cargadores</div>

                <div class="panel-body">
                    <div class="col-md-12">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                          Datos
                        </button>
                        <br>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="info">
                                    <td colspan="2"><strong>Parámetros de salida</strong></td>
                                </tr>
                                <tr>
                                    <td width="50%">Factor de carga de la tolva</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Tiempo debido al tamaño del material transportado</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Tiempo debido a la altura del material apilado</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Tiempo debido a los factores diversos</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Factor de eficiencia del material</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Tiempo de carga</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Tiempo de ciclo básico</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Tiempo de ciclo total</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td class="success">Producción (m3/h)</td>
                                    <td></td>
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
                    <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                </div>
                <form>
                    <div class="modal-body">
                        
                            <h4>Parámetros de entrada del equipo</h4>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="t_hojat" class="control-label">Capacidad del cucharón(m3):</label>
                                    <input type="text" class="form-control" id="t_hojat">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="t_capacidad" class="control-label">Distancia de transporte (m):</label>
                                    <input type="text" class="form-control" id="t_capacidad">
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="t_peso" class="control-label">Tipo de carga transportada:</label>
                                    <select class="form-control"></select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="t_peso" class="control-label">Tamaño de material transportado:</label>
                                    <select class="form-control"></select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="t_tiempo_fijo" class="control-label">Altura del material apilado:</label>
                                    <select class="form-control"></select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="t_factor_eficiencia" class="control-label">Motivos diversos de la operacion:</label>
                                    <select class="form-control"></select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="t_factor_eficiencia" class="control-label">Velocidad de transporte (Km/h):</label>
                                    <input type="text" class="form-control" id="t_factor_eficiencia">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="t_factor_eficiencia" class="control-label">Tipo de material transportado:</label>
                                    <select class="form-control"></select>
                                </div>
                            </div>
                            
                        
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary">Registrar</button>
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
        //$('#Registrar_datos_generales').on('click', registerMachine);
        listar_machines();
    });

    function function_name(argument) {
        var route = "http://localhost/hoapp/public/cargador";
        $('#datos_machines').empty();
        $.get(route, function(res){
            $(res).each(function(key,value){
                var html="";
                for (var i = 0; i < res.maquinarias.length ;  i++) {
                     html += '<tr>';
                        html += '<td>'+res.maquinarias[i].machine_id+'</td>';
                        html += '<td>'+res.maquinarias[i].code+'</td>';
                        html += '<td>'+res.maquinarias[i].machine+'</td>';
                        html += '<td>'+res.maquinarias[i].potencia+'</td>';
                        html += '<td>'+res.maquinarias[i].capacidad+'</td>';
                        html += '<td>'+res.maquinarias[i].peso+'</td>';
                        html += '<td>'+res.maquinarias[i].description+'</td>';
                        html += '<td> <button class="btn btn-info" onclick="editar_machine('+res.maquinarias[i].machine_id+','+"'"+res.maquinarias[i].code+"'"+','+"'"+res.maquinarias[i].machine+"'"+','+"'"+res.maquinarias[i].potencia+"'"+','+"'"+res.maquinarias[i].capacidad+"'"+','+"'"+res.maquinarias[i].peso+"'"+','+"'"+res.maquinarias[i].type_id+"'"+');">Editar</button> </td>';
                     html += '</tr>';

                }
                $('#datos_machines').append(html);
            });
        });
    }

</script>
@endsection
