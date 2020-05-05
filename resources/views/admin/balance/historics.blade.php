@extends('adminlte::page')
@section('title', 'Histórico de Movimentações')
@section('content_header')
    <h1 class="m-0 text-dark">Saldo</h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="">Histórico</a></li>
    </ol>
@stop
@section('content')
    <div class="col-12">
           
            <div class="card">
                @include('admin.includes.alerts')
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Valor</th>
                                    <th>Tipo</th>
                                    <th>Data</th>
                                    <th>?Sender?</th>
                                <tr>
                        </thead>
                        <tbody>
                            @forelse ($historics as $historic)
                            <tr>
                                <th>{{$historic->id}}</th>
                                <th>{{number_format($historic->amount, 2, ',', '.')}}</th>
                                <th>{{$historic->type}}</th>
                                <th>{{$historic->date}}</th>
                                <th>{{$historic->user_id_transaction}}</th>
                            <tr>
                            @empty  
                            @endforelse    
                    </tbody>

                    </table>
                </div>
        </div>
    </div>
@stop
