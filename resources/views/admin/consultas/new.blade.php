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
                                <label for="exampleInputEmail1">Nome completo</label>
                                <input type="text" class="form-control" placeholder="Nome do paciente" name="pacientename">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="exampleInputPassword1">Unidade</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-clinic-medical"></i></span>
                                    </div>
                                    <select class="custom-select form-control-border" id="exampleSelectBorder">
                                        <option value="consult1">Consultorio 1</option>
                                        <option value="consult2">Consultorio 2</option>
                                        <option value="consult3">Consultorio 3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-sm-12">
                                <label>Queixa do paciente</label>
                                <div class="input-group-prepend">
                                    <textarea class="form-control" rows="7" name="queixapaciente"></textarea>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="exampleInputEmail1">Medicação</label>
                                <input type="text" class="form-control" placeholder="Medicação que já vem tomando.." name="pacientename">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="exampleInputPassword1">Nova receita</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Receitar novo medicamento" name="pacientename">
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