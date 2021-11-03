@extends('adminlte::page')
@section('title', 'Prontuario')

@section('content_header')
<h1>
    Prontuario
</h1>

@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="{{url('storage/images/user.png')}}" alt="User profile">
                    </div>

                    <h3 class="profile-username text-center">{{$paciente_infos->name}}</h3>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>CPF</b> <a class="float-right">{{$paciente_infos->cpf}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Sexo</b> <a class="float-right">{{$paciente_infos->sexo}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Telefone</b> <a class="float-right">{{$paciente_infos->telefone}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Dt. Nascimento</b> <a class="float-right">{{date("d/m/Y", strtotime($paciente_infos->dat_nascimento ))}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Convenio:</b> <a class="float-right">{{$paciente_infos->convenio}}</a>
                        </li>
                        <li class="list-group-item">
                            <b><i class="fas fa-map-marker-alt mr-1"></i>Endereço:</b>
                            <p class="float-right">{{$paciente_infos->endereco}}</p>
                        </li>
                    </ul>
                </div>
                <!-- /.card-body -->
            </div>

        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Consultas</a></li>
                        <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Exames</a></li>
                        <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Editar informações</a></li>
                    </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content">
                        <div class="active tab-pane" id="activity">
                            <!-- Post -->
                            <a class="btn btn-sm btn-success text-light" href="{{route('agendamento', $paciente_infos->id)}}">Agendar nova consulta</a>
                            <hr>
                            <p class="lead">Historico de consultas</p>
                            @foreach ($consultas as $consulta)
                            <div class="card card-dark collapsed-card">
                                <div class="card-header">
                                    <h3 class="card-title">Consulta - <b>{{date("d/m/Y", strtotime($consulta->inicio))}}</b></h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body bg-secondary">
                                    <b>Data da consulta:</b> {{date("d/m/Y", strtotime($consulta->inicio))}} <b>Horário:</b> {{date("H:i", strtotime($consulta->inicio))}}
                                    <hr>
                                    Queixa do paciente: <p>{{$consulta->queixa}}</p>
                                    <hr>
                                    Diagnostico: <p>{{$consulta->diagnostico}}</p>
                                    <hr>
                                    Refração Dinâmica
                                    <div class="container">
                                        <div class="row">
                                            OD:
                                            <div class="col-2 border ml-1" align="center">
                                            {{$consulta->rdod}}
                                            </div>
                                            <div class="col-2 border" align="center">
                                            
                                            </div>
                                            <div class="col-2 border" align="center">
                                            
                                            </div>
                                        </div>
                                        <div class="row">
                                            OE:
                                            <div class="col-2 border ml-1" align="center">
                                            {{$consulta->rdoe}}
                                            </div>
                                            <div class="col-2 border" align="center">
                                                
                                            </div>
                                            <div class="col-2 border" align="center">
                                                
                                            </div>
                                        </div>
                                        <div class="row">
                                            AD:
                                            <div class="col-2 border ml-1" align="center">
                                            {{$consulta->rdad}}
                                            </div>
                                            <div class="col-2 border" align="center">
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    Refração Estática
                                    <div class="container">
                                        <div class="row">
                                            OD:
                                            <div class="col-2 border ml-1" align="center">
                                            {{$consulta->reod}}
                                            </div>
                                            <div class="col-2 border" align="center">
                                                
                                            </div>
                                            <div class="col-2 border" align="center">
                                                
                                            </div>
                                        </div>
                                        <div class="row">
                                            OE:
                                            <div class="col-2 border ml-1" align="center">
                                            {{$consulta->reoe}}
                                            </div>
                                            <div class="col-2 border" align="center">
                                                
                                            </div>
                                            <div class="col-2 border" align="center">
                                                
                                            </div>
                                        </div>
                                        <div class="row">
                                            AD:
                                            <div class="col-2 border ml-1" align="center">
                                            {{$consulta->read}}
                                            </div>
                                            <div class="col-2 border" align="center">
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            @endforeach
                        </div>
                        <!--                          /Exames                              -->
                        <div class="tab-pane" id="timeline">
                            <!-- The timeline -->
                            <div class="timeline timeline-inverse">
                                <!-- timeline time label -->
                                <div class="time-label">
                                    <span class="bg-danger">
                                        10 Feb. 2014
                                    </span>
                                </div>
                                <!-- /.timeline-label -->
                                <!-- timeline item -->
                                <div>
                                    <i class="fas fa-envelope bg-primary"></i>

                                    <div class="timeline-item">
                                        <span class="time"><i class="far fa-clock"></i> 12:05</span>

                                        <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                                        <div class="timeline-body">
                                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                            weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                                            quora plaxo ideeli hulu weebly balihoo...
                                        </div>
                                        <div class="timeline-footer">
                                            <a href="#" class="btn btn-primary btn-sm">Read more</a>
                                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- END timeline item -->
                                <!-- timeline item -->
                                <div>
                                    <i class="fas fa-user bg-info"></i>

                                    <div class="timeline-item">
                                        <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                                        <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                                        </h3>
                                    </div>
                                </div>
                                <!-- END timeline item -->
                                <!-- timeline item -->
                                <div>
                                    <i class="fas fa-comments bg-warning"></i>

                                    <div class="timeline-item">
                                        <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                                        <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                                        <div class="timeline-body">
                                            Take me to your leader!
                                            Switzerland is small and neutral!
                                            We are more like Germany, ambitious and misunderstood!
                                        </div>
                                        <div class="timeline-footer">
                                            <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- END timeline item -->
                                <!-- timeline time label -->
                                <div class="time-label">
                                    <span class="bg-success">
                                        3 Jan. 2014
                                    </span>
                                </div>
                                <!-- /.timeline-label -->
                                <!-- timeline item -->
                                <div>
                                    <i class="fas fa-camera bg-purple"></i>

                                    <div class="timeline-item">
                                        <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                                        <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                                        <div class="timeline-body">
                                            <img src="https://placehold.it/150x100" alt="...">
                                            <img src="https://placehold.it/150x100" alt="...">
                                            <img src="https://placehold.it/150x100" alt="...">
                                            <img src="https://placehold.it/150x100" alt="...">
                                        </div>
                                    </div>
                                </div>
                                <!-- END timeline item -->
                                <div>
                                    <i class="far fa-clock bg-gray"></i>
                                </div>
                            </div>
                        </div>
                        <!-- /.tab-pane -->

                        <div class="tab-pane" id="settings">
                            <form action="{{ route('pacientes-edit', $paciente_infos->id) }}" method="POST" class="form-horizontal">
                                @csrf
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Nome</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nome" value="{{$paciente_infos->name}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Dt. Nascimento</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name="data_nascimento" value="{{$paciente_infos->dat_nascimento}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" name="sexo">Sexo</label>
                                    <div class="col-sm-3">
                                        <select class="form-control" name="sexo">
                                            <option value="{{$paciente_infos->sexo}}"></option>
                                            <option value="Masculino">Masculino</option>
                                            <option value="Feminino">Feminino</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputName2" class="col-sm-2 col-form-label">CPF</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="cpf" value="{{$paciente_infos->cpf}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputName2" class="col-sm-2 col-form-label">Endereço</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="endereco" value="{{$paciente_infos->endereco}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputName2" class="col-sm-2 col-form-label">Telefone</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="telefone" value="{{$paciente_infos->telefone}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputName2" class="col-sm-2 col-form-label">Convenio</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="convenio">
                                            <option value="{{$paciente_infos->convenio}}"></option>
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
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-danger">Salvar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div><!-- /.container-fluid -->
@endsection