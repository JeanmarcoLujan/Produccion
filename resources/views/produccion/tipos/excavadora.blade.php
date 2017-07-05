@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Excavadora o Retroexcavadora</h4></div>

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
                                    <td>Tiempo de ciclo (seg)</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Produccion horaria (m3/h)</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Largura mínima (m)</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Profundidad de excavación (m)</td>
                                    <td></td>
                                </tr>

                                <tr>
                                    <td class="success">Producción lineal (m/h)</td>
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
                                    <label for="e_capacidad" class="control-label">Capacidad del cucharón(m3):</label>
                                    <input type="text" class="form-control" id="e_capacidad">
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="e_tipo_cucharon" class="control-label">Tipo de carga del cucharón:</label>
                                    <select class="form-control" id="e_tipo_cucharon"></select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="e_factor_conv" class="control-label">Factor de conversión de volumen:</label>
                                    <input type="text" class="form-control" id="e_factor_conv">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="e_factor_efic" class="control-label">Factor de eficiencia:</label>
                                    <input type="text" class="form-control" id="e_factor_efic">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="e_tipo_exc" class="control-label">Tipos de excavación:</label>
                                    <select class="form-control" id="e_tipo_exc"></select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="e_tipo_tuberia" class="control-label">Tipos de tubería:</label>
                                    <select class="form-control" id="e_tipo_tuberia"></select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="e_profundidad" class="control-label">Profundidad de la excavación (m):</label>
                                     <input type="text" class="form-control" id="e_profundidad">
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

@section('scripts_excavadora')
<script type="text/javascript">
    $(document).ready(function () {
        //$('#Registrar_datos_generales').on('click', registerMachine);
        selects();
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
                    htmlc+="<option value="+res.tipos_tuberia[i].cexcavator_id+">"+res.tipos_tuberia[i].longitud+"</option>";
                }
                $("#e_tipo_tuberia").append(htmlc);


            });
        });
    }

</script>
@endsection
