@extends('adminlte::page')

@section('title', 'Transferir Saldo')

@section('content_header')
    <h1 class="m-0 text-dark">Fazer Tranferência</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="">Saldo</a></li>
        <li class="breadcrumb-item"><a href="">Transferir</a></li>
    </ol>
@stop

@section('content')
    <div class="box"> 
        <div class="box-header">
            <h3>Transferir Saldo (Informe o Recebedor)</h3>
        </div>
        <div class="box-body">
           @include('admin.includes.alerts')

        <form method="POST" action="{{ route('transfer.store') }}">
                @csrf
                <div class="form-group">
                    <input type="text" name="sender" value='{{ old('sender') }}' placeholder="Informar quem irá receber a tranferencia (Nome ou e-mail)" class="form-control">   
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Próxima Etapa</button>
                </div>
            </form>    
        </div>
    </div>
@stop