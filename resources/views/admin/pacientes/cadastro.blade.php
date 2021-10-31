@extends('adminlte::page')

@section('title', 'Cadastro de Paciente')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-3">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Cadastro de Paciente</h3>
                </div>
                <form action="{{route('cadastro-de-paciente-post')}}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="exampleInputPassword1">Nome Completo</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-user"></i></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="nome" required>
                                </div>
                            </div>
                            <div class="form-group col-sm-3">
                                <label for="exampleInputEmail1">Data de Nascimento</label>
                                <input type="date" class="form-control" name="data_nascimento" required>
                            </div>
                            <div class="form-group col-sm-3">
                                <label for="exampleInputPassword1">Sexo</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-venus-mars"></i></span>
                                    </div>
                                    <select class="custom-select form-control-border" name="sexo" id="exampleSelectBorder" required>
                                        <option value="Masculino">Masculino</option>
                                        <option value="Feminino">Feminino</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="exampleInputPassword1">CPF</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-id-card"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="cpf" required>
                                </div>
                            </div>
                            <div class="form-group col-sm-5">
                                <label for="exampleInputPassword1">Endereço</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="endereco" required>
                                </div>
                            </div>
                            <div class="form-group col-sm-3">
                                <label for="exampleInputPassword1">Telefone</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="telefone" required>
                                </div>
                            </div>
                            <div class="form-group col-sm-3">
                                <label for="exampleInputPassword1">Convênio</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-file-medical-alt"></i></span>
                                    </div>
                                    <select class="custom-select form-control-border" name="convenio" id="exampleSelectBorder" required>
                                        <option value=""></option>
                                        <option value="Particular">Particular</option>
                                        <option value="Allianz">Allianz</option>
                                        <option value="Amil">Amil</option>
                                        <option value="Cabesp">Cabesp</option>
                                        <option value="Cassi">Cassi</option>
                                        <option value="ExtremaMedic">ExtremaMedic</option>
                                        <option value="Gama Saude">Gama Saúde</option>
                                        <option value="Nosamed">Nosamed</option>
                                        <option value="Porto Seguro">Porto Seguro</option>
                                        <option value="SabespRevs">SabespRevs</option>
                                        <option value="Saude Caixa">Saúde Caixa</option>
                                        <option value="Serpram">Serpram</option>
                                        <option value="Sul America">Sul América</option>
                                        <option value="Unimed Sul Mineira">Unimed Sul Mineira</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{route('pacientes')}}" class="btn btn-danger" onclick="return confirm('Deseja mesmo cancelar este cadastro?')">Cancelar</a>
                        <button type="submit" class="btn btn-success">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection