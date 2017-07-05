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
                    <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                </div>
                <div class="modal-body">
                    <form>
                        <h4>Parámetros de entrada del equipo</h4>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="t_hojat" class="control-label">Hoja topadora:</label>
                                <input type="text" class="form-control" id="t_hojat">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="t_capacidad" class="control-label">Capacidad  de hoja topadora (m3):</label>
                                <input type="text" class="form-control" id="t_capacidad">
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="t_peso" class="control-label">Peso total de tractor(tn):</label>
                                <input type="text" class="form-control" id="t_peso">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="t_tiempo_fijo" class="control-label">Tiempos fijos de operación(m3):</label>
                                <input type="text" class="form-control" id="t_tiempo_fijo">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="t_factor_eficiencia" class="control-label">Factor eficiencia:</label>
                                <input type="text" class="form-control" id="t_factor_eficiencia">
                            </div>
                        </div>
                        <hr>
                        <h4>Parámetros de entrada del terreno</h4>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="t_declive" class="control-label">Declive del terreno:</label>
                                <input type="text" class="form-control" id="t_declive">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="t_densidad_material" class="control-label">Densidad del material (tn/m3):</label>
                                <input type="text" class="form-control" id="t_densidad_material">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="t_dist_transporte" class="control-label">Distancia de transporte (m):</label>
                                <input type="text" class="form-control" id="t_dist_transporte">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="t_coef_rodamiento" class="control-label">Coeficiente de rodamiento (Kg/t):</label>
                                <input type="text" class="form-control" id="t_coef_rodamiento">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="t_factor_convvolumen" class="control-label">Factor de conversion de volumenes:</label>
                                <input type="text" class="form-control" id="t_factor_convvolumen">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="t_coef_adherencia" class="control-label">Coeficiente de adherencia:</label>
                                <input type="text" class="form-control" id="t_coef_adherencia">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="t_coef_friccion" class="control-label">Coeficiente de fricción de carga:</label>
                                <input type="text" class="form-control" id="t_coef_friccion">
                            </div>
                        </div>
                    </form>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary">Registrar</button>
                </div>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
