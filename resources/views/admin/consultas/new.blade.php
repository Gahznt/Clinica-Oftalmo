@extends('adminlte::page')

@section('title', 'Nova Consulta')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-3">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Nova Consulta</h3>
                </div>
                <!-- /.card-header -->
                <form action="" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="exampleInputEmail1">Paciente</label>
                                <input type="text" class="form-control" value="{{$paciente_infos->name}}" readonly>
                            </div>
                            <div class="form-group col-sm-12">
                                <label>Queixa do paciente</label>
                                <div class="input-group-prepend">
                                    <textarea class="form-control" rows="7" name="queixapaciente"></textarea>
                                </div>
                            </div>
                            <a class="btn btn-primary mt-3 text-light">Solicitar exame</a>
                        </div>
                    </div>
            </div>
            <!-- /.card-body -->
            <button type="submit" class="btn btn-primary">Salvar</button>
            </form>

        </div>
    </div>
</div>
</div>
@endsection