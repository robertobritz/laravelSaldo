<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MoneyValidationFormRequest;
use App\Models\Balance;
use App\User;
use Illuminate\Http\Request;

class BalanceController extends Controller
{
    public function index()
    {
        $balance = auth()->user()->balance; //Autenticado, usuário, função balance criada em User.php
        $amount = $balance ? $balance->amount : 0; // Se não tiver nada no 'amount' retorna 0, se não retornaria 'null'
        return view('admin.balance.index', compact('amount')); // mandapra view index e manda a variaável 'amaunt'
    }

    public function deposit()
    {
        return view('admin.balance.deposit');
    }

    public function depositStore(MoneyValidationFormRequest $request) 
    {   
        $balance = auth()->user()->balance()->firstOrCreate([]);
        $response = $balance->deposit($request->value); // já estava funcionando com visto antes, agora colocamos este retorno em uma variável

        if($response['success'])
            return redirect()
                ->route('admin.balance')
                ->with('success', $response['message']);

        return redirect()
                ->back()
                ->with('erro', $response['message']); //variavel erro da página
    }

    public function withdraw()
    {
        return view('admin.balance.withdraw');
    }

    public function withdrawStore(MoneyValidationFormRequest $request) 
    {   
        $balance = auth()->user()->balance()->firstOrCreate([]);
        $response = $balance->withdraw($request->value); // Função que criaremos dentro da nossa model BALANCE

        if($response['success'])
            return redirect()
                ->route('admin.balance')
                ->with('success', $response['message']);

        return redirect()
                ->back()
                ->with('erro', $response['message']); //variavel erro da página
    }

    public function transfer()
    {
        return view('admin.balance.transfer');
    }

    public function transferStore(Request $request, User $user) //inclui a model User para buscarmos os usuários

        {
            if (!$sender = $user->getSender($request->sender))
                return redirect()
                    ->back()
                    ->withInput()
                    ->with('error', 'Usuário informado não foi localizado');
            
            if ($sender->id === auth()->user()->id)
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Não é possível transferir para você mesmo');

            $balance = auth()->user()->balance; // método balance dentro da model user
            return view('admin.balance.transfer-confirm', compact('sender', 'balance'));
        
        }

    public function transferFinish(Request $request, User $user)
    {
        if (!$sender =$user->find($request->sender_id))
                return redirect()
                    ->route('balance.transfer')
                    ->with('success', 'Recebedor não encontrado!');

        $balance = auth()->user()->balance()->firstOrCreate([]);

        $response = $balance->tranfer($request->value, $sender); // Função que criaremos dentro da nossa model BALANCE

        if($response['success'])
            return redirect()
                ->route('admin.balance')
                ->with('success', $response['message']);

        return redirect()
                ->back()
                ->with('erro', $response['message']); //variavel erro da página
    }

    public function historic()
    {
        $historics = auth()->user()->historics()->get(); //historics criada função dentro de user 
    
        return view('admin.balance.historics', compact('historics'));
    }
    

}