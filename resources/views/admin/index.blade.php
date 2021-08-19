@extends('adminlte::page')

@section('title', 'Painel')

@section('content_header')
<div class="container">
    <div class="callout callout-info">
        <h1>Olá, <b>{{Auth::user()->name}}</b></h1>
    </div>
</div>
@endsection

@section('content')


@endsection