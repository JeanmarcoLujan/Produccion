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
                                    <label for="c_capacidad" class="control-label">Capacidad del cucharón(m3):</label>
                                    <input type="text" class="form-control" id="c_capacidad">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="c_distancia" class="control-label">Distancia de transporte (m):</label>
                                    <input type="text" class="form-control" id="c_distancia">
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="c_tipo_carga" class="control-label">Tipo de carga transportada:</label>
                                    <select class="form-control" id="c_tipo_carga"></select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="c_tamaño_material" class="control-label">Tamaño de material transportado:</label>
                                    <select class="form-control" id="c_tamaño_material"></select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="c_apilacion" class="control-label">Altura del material apilado:</label>
                                    <select class="form-control" id="c_apilacion"></select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="c_motivos_diversos" class="control-label">Motivos diversos de la operacion:</label>
                                    <select class="form-control" id="c_motivos_diversos"></select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="c_velocidad_transporte" class="control-label">Velocidad de transporte (Km/h):</label>
                                    <input type="text" class="form-control" id="c_velocidad_transporte">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="c_tipo_material" class="control-label">Tipo de material transportado:</label>
                                    <select class="form-control" id="c_tipo_material"></select>
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
        selects();
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
                $("#c_tipo_carga").append(htmla);

                var htmlb="";
                htmlb+="<option selected disabled>Seleccione tamaño de material</option>";
                for (var i = 0; i < res.tamaños_material.length; i++) {
                    htmlb+="<option value="+res.tamaños_material[i].bloader_id+">"+res.tamaños_material[i].descripcion+"</option>";
                }
                $("#c_tamaño_material").append(htmlb);

                var htmlc="";
                htmlc+="<option selected disabled>Seleccione altura del material apilado</option>";
                for (var i = 0; i < res.tiempos_apilacion.length; i++) {
                    htmlc+="<option value="+res.tiempos_apilacion[i].cloader_id+">"+res.tiempos_apilacion[i].descripcion+"</option>";
                }
                $("#c_apilacion").append(htmlc);

                var htmld="";
                htmld+="<option selected disabled>Seleccione motivos diversos de la operación</option>";
                for (var i = 0; i < res.tiempos_diversos.length; i++) {
                    htmld+="<option value="+res.tiempos_diversos[i].dloader_id+">"+res.tiempos_diversos[i].descripcion+"</option>";
                }
                $("#c_motivos_diversos").append(htmld);

                var htmle="";
                htmle+="<option selected disabled>Seleccione tipo de material transportado</option>";
                for (var i = 0; i < res.tipos_material.length; i++) {
                    htmle+="<option value="+res.tipos_material[i].eloader_id+">"+res.tipos_material[i].descripcion+"</option>";
                }
                $("#c_tipo_material").append(htmle);


            });
        });
    }

</script>
@endsection
