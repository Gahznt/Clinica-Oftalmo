@extends('adminlte::page')

@section('title', 'Novo Exame')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-3">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Novo Exame</h3>
                </div>
                <!-- /.card-header -->
                <form action="" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="exampleInputEmail1">Nome completo</label>
                                <input type="text" class="form-control" name="pacientename">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="exampleInputEmail1">Data Exame</label>
                                <input type="date" class="form-control" name="pacientename">
                            </div>
                            <div class="form-group col-sm-3">
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
                            <div class="form-group col-sm-3">
                                <label for="exampleInputPassword1">Tipo de Exame</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-diagnoses"></i></span>
                                    </div>
                                    <select class="custom-select form-control-border" id="exampleSelectBorder">
                                        <option value="consult1">Exame 1</option>
                                        <option value="consult2">Exame 2</option>
                                        <option value="consult3">Exame 3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="exampleFormControlFile1">Arquivo do Exame</label>
                                        <input type="file" class="form-control-file" name="boleto" id="exampleFormControlFile1">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="exampleInputEmail1">Médico</label>
                                <input type="text" class="form-control" name="pacientename">
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="exampleInputPassword1">Médico Laudo</label>
                                <input type="text" name="dataexame" class="form-control">
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="exampleInputPassword1">Médico Solicitante</label>
                                <input type="text" name="dataexame" class="form-control">
                            </div>
                        </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection