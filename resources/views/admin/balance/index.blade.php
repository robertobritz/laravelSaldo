@extends('adminlte::page')
@section('title', 'Saldo')
@section('content_header')
    <h1 class="m-0 text-dark">Saldo</h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="">Saldo</a></li>
    </ol>
@stop
@section('content')
    <div class="col-12">
            <a href="" class="btn btn-primary"><i class="fas fa-cart-plus"></i> Recarregar</a></i>
            <a href="" class="btn btn-danger"><i class="fas fa-cart-arrow-down"></i> Sacar</a>
            <div class="card">
                <div class="card-body">
                        <div class="small-box bg-green">
                        <div class="inner">
                        <h3>R$ {{ number_format($amount, 2, ',', '') }}</h3>
                        </div>
                        <div class="icon">
                            <i class="fas fa-money-bill-wave"></i>
                        </div>
                        <a href="#" class="small-box-footer">Histórico<i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                </div>
        </div>
    </div>
@stop
