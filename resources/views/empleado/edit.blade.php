@extends('template.header')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Editar Empleado</h2>
        </div>
        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-info">
                    <strong>Hay errores en el formulario</strong><br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('empleado.update', $empleado->id) }}" method="POST" name="formEmpleado" id="formEmpleado">
                @csrf
                <input type="hidden" name="id" id="id" value="{{ $empleado->id }}">
                <div class="form-group row">
                    <label for="nombre" class="col-sm-3 col-form-label"><span class="float-right font-weight-bold">Nombre completo *</span></label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $empleado->nombre }}" placeholder="Nombre completo del empleado">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-3 col-form-label"><span class="float-right font-weight-bold">Correo electrónico *</span></label>
                    <div class="col-sm-9">
                    <input type="email" class="form-control" id="email" name="email" value="{{ $empleado->email }}" placeholder="Correo electrónico">
                    </div>
                </div>
                <fieldset class="form-group">
                    <div class="row">
                    <legend class="col-form-label col-sm-3 pt-0"><span class="float-right font-weight-bold">Sexo *</span></legend>
                    <div class="col-sm-9">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sexo" id="sexoM" value="{{ $empleado->sexo == 'M' ? 'M' : "" }}" {{ $empleado->sexo == 'M' ? 'checked' : '' }}>
                            <label class="form-check-label" for="sexo">
                                Masculino
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sexo" id="sexoF" value="{{ $empleado->sexo == 'F' ? 'F' : "" }}" {{ $empleado->sexo == 'F' ? 'checked' : '' }}>
                            <label class="form-check-label" for="sexo">
                                Femenino
                            </label>
                        </div>
                    </div>
                    </div>
                </fieldset>
                <div class="form-group row">
                    <label for="area" class="col-sm-3 col-form-label"><span class="float-right font-weight-bold">Área *</span></label>
                    <div class="col-sm-9">
                        <select class="custom-select" name="area_id" id="area_id">
                            <option value="">Seleccione un área</option>
                            @foreach ($areas as $area)
                                <option value="{{ $area->id }}" {{ $empleado->area_id == $area->id ? 'selected' : '' }}>{{ $area->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="descripcion" class="col-sm-3 col-form-label"><span class="float-right font-weight-bold">Descripción *</span></label>
                    <div class="col-sm-9">
                        <textarea class="form-control" id="descripcion" name="descripcion" rows="3" placeholder="Descripción de la experiencia del empleado">{{ $empleado->descripcion }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="boletin" name="boletin" value="{{ $empleado->boletin == 1 ? 1 : 0 }}" {{ $empleado->boletin == 1 ? 'checked' : '' }}>
                            <label class="form-check-label" for="boletin">
                                Deseo recibir boletín informativo
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    @if ($roles)
                        <label for="roles" class="col-sm-3 col-form-label"><span class="float-right font-weight-bold">Roles *</span></label>
                        <div class="col-sm-9">
                            @foreach ($roles as $rol)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="roles" name="roles[]" value="{{ $rol->rol_id }}" checked>
                                    <label class="form-check-label" for="roles">
                                        {{ $rol->nombre }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="form-group row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                    <button type="submit" class="btn btn-success">Actualizar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop

@section('scripts')
    <script>
        $(document).ready(function(){
            $('#sexoM').change(function(){
                if($(this).is(':checked')){
                    $('#sexoF').val('');
                    $('#sexoM').val('M');
                }
            });

            $('#sexoF').change(function(){
                if($(this).is(':checked')){
                    $('#sexoF').val('F');
                    $('#sexoM').val('');
                }
            });

            $('#boletin').change(function(){
                if($(this).is(':checked')){
                    $('#boletin').val(1);
                    $('#boletin').addAttr('checked');
                }else{
                    $('#boletin').val(0);
                    $('#boletin').removeAttr('checked');
                }
            });
        });

        // Validar formulario con JQuery
        $(function() {
            $("form[name='formEmpleado']").validate({
                rules: {
                    nombre: {
                        required: true,
                        minlength: 3
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    sexo: {
                        required: true
                    },
                    area_id: {
                        required: true
                    },
                    descripcion: {
                        required: true,
                        minlength: 10
                    },
                    roles: {
                        required: true
                    }
                },
                messages: {
                    nombre: "Por favor, introduzca el nombre completo del empleado",
                    email: "Por favor, introduce una dirección de correo electrónico válida",
                    sexo: "Por favor, seleccione el sexo",
                    area_id: "Por favor, seleccione un área",
                    descripcion: "Por favor, escriba una descripción de la experiencia del empleado",
                    roles: "Por favor, seleccione al menos un rol"
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        });
    </script>
@endsection
