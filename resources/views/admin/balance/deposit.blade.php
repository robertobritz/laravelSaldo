@extends('adminlte::page')

@section('title', 'Nova Recarga')

@section('content_header')
    <h1 class="m-0 text-dark">Fazer Recarga</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="">Saldo</a></li>
        <li class="breadcrumb-item"><a href="">Depositar</a></li>
    </ol>
@stop

@section('content')
    <div class="box"> 
        <div class="box-header">
            <h3>Fazendo Recarga</h3>
        </div>
        <div class="box-body">
           @include('admin.includes.alerts')

        <form method="POST" action="{{ route('deposit.store') }}">
                @csrf
                <div class="form-group">
                    <input type="text" name="value" placeholder="Valor Recarga" class="form-control">   
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Recarregar</button>
                </div>
            </form>    
        </div>
    </div>
@stop