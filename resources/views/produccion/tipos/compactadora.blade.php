@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading"><h5>Compatadora</h5></div>

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
                                    <td colspan="2"><strong>Parámetros de entrada del equipo</strong></td>
                                </tr>
                                <tr>
                                    <td width="50%">Ancho del rodillo (m)</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Velocidad del equipo (km/h)</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Factor de eficiencia</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Número de pasadas del rodillo</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Produccion del motoscraper (m3/h)</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Espesor de capa (m)</td>
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
                                    <td width="50%">Ancho total de rodillo (m)</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td class="success">Producción del compactador (m3/h)</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Corrección de las producciones (m3/h)</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Número de unidades</td>
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
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="co_ancho_rodillo" class="control-label">Ancho del rodillo (m):</label>
                                <input type="text" class="form-control" id="co_ancho_rodillo">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="co_vel_equipo" class="control-label">Velocidad del equipo (km/h):</label>
                                <input type="text" class="form-control" id="co_vel_equipo">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="co_factor_eficiencia" class="control-label">Factor de eficiencia:</label>
                                <input type="text" class="form-control" id="co_factor_eficiencia">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="co_numero_pasadas" class="control-label">Número de pasadas del rodillo:</label>
                                <input type="text" class="form-control" id="co_numero_pasadas">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="co_prod_motoscraper" class="control-label">Produccion del motoscraper (m3/h):</label>
                                <input type="text" class="form-control" id="co_prod_motoscraper">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="co_espesor_capa" class="control-label">Espesor de capa (m):</label>
                                <input type="text" class="form-control" id="co_espesor_capa">
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
