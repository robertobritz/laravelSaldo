@extends('adminlte::page')

@section('title', 'Confirmar tranferência de saldo')

@section('content_header')
    <h1 class="m-0 text-dark">Fazer Tranferência</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="">Saldo</a></li>
        <li class="breadcrumb-item"><a href="">Transferir</a></li>
        <li class="breadcrumb-item"><a href="">Confirmação</a></li>
    </ol>
@stop

@section('content')
    <div class="box"> 
        <div class="box-header">
            <h3>Confirmar tranferência de saldo</h3>
        </div>
        <div class="box-body">
           @include('admin.includes.alerts')

        <p><strong>Recebedor: </strong>{{ $sender->name }}</p>
        <p><strong>Seu saldo atual: </strong>{{ number_format($balance->amount, 2, ',', '') }}</p>
    
        <form method="POST" action="{{ route('transfer.finish') }}">
                @csrf
                <input type="hidden" name="sender_id" value='{{ $sender->id}}'>   


                <div class="form-group">
                    <input type="text" name="value" value='{{ old('sender') }}' placeholder="Valor:" class="form-control">   
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Transferir</button>
                </div>
            </form>    
        </div>
    </div>
@stop