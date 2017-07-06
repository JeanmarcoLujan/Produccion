@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Motoniveladora</h4></div>
                <div class="panel-body">
                    <div class="col-md-12">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                          Datos
                        </button>
                        <br>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="info">
                                    <td colspan="2"><strong>Parámetros de entrada del equipo</strong></td>
                                </tr>
                                <tr>
                                    <td width="50%">Velocidad de avance (Km/h)</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Velocidad de retroceso (Km/h)</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Velocidad en 1ª marcha (Km/h)</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Largura de la lámina (m)</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Factor eficiencia</td>
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
                                    <td width="50%">Largura (m)</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Longitud a ser regularizada (m)</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Espesura suelta de la capa (m)</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td class="success">Número de pasadas (un solo sentido)</td>
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
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="info">
                                    <td colspan="2"><strong>Parámetros de salida</strong></td>
                                </tr>
                                <tr>
                                    <td width="50%">Tiempo efectivo (min)</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Producción (m3/h)</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Aréa a ser regularizada por hora (m2/h)</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Aréa trabajada en 1ª marcha (m2/h)</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Número de unidades requeridas</td>
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
                <form>
                    <div class="modal-body">

                        <h5><strong>Parámetros de entrada del equipo</strong></h5>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="m_vel_avance" class="control-label">Velocidad de avance (km/h):</label>
                                <input type="text" class="form-control" id="m_vel_avance">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="m_vel_retroceso" class="control-label">Velocidad de retroceso (km/h):</label>
                                <input type="text" class="form-control" id="m_vel_retroceso">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="m_vel_primera" class="control-label">Velocidad en 1ª marcha (km/h):</label>
                                <input type="text" class="form-control" id="m_vel_primera">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="c_capacidad" class="control-label">Largura de la lámina (m):</label>
                                <input type="text" class="form-control" id="c_capacidad">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="c_capacidad" class="control-label">Factor de eficiencia:</label>
                                <input type="text" class="form-control" id="c_capacidad">
                            </div>
                        </div>
                        <h5><strong>Parámetros de entrada del terreno</strong></h5>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="c_capacidad" class="control-label">Largura (m):</label>
                                <input type="text" class="form-control" id="c_capacidad">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="c_capacidad" class="control-label">Longitus a ser regularizada(m):</label>
                                <input type="text" class="form-control" id="c_capacidad">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="c_capacidad" class="control-label">Espesura suelta de la capa (m):</label>
                                <input type="text" class="form-control" id="c_capacidad">
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
