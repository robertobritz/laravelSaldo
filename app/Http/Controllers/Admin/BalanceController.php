<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BalanceController extends Controller
{
    public function index()
    {
        $balance = auth()->user()->balance; //Autenticado, usuário, função balance criada em User.php
        $amount = $balance ? $balance->amount : 0; // Se não tiver nada no 'amount' retorna 0, se não retornaria 'null'
        return view('admin.balance.index', compact('amount')); // mandapra view index e manda a variaável 'amaunt'
    }
}
