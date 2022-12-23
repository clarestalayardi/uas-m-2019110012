<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Account;
use Faker\Factory as Faker;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $alltransactions = transaction::with('account')->orderByDesc('created_at')->get();
        $transactions = transaction::all();
        return view('transactions.index', compact('transactions','alltransactions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $faker = Faker::create('id_ID');
        $saya = $faker->randomElement(['Pendanaan ', 'Pembiayaan']);
        $randomName = $faker->name();
        $accounts = Account::all();
        return view('transactions.create', compact('accounts','saya','randomName'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'kategori'      => 'required',
            'nominal'       => 'required',
            'tujuan'        => 'required',
            'account_id'    => 'required'
        ];

        $validated = $request->validate($rules);

        transaction::create($validated);

        $request->session()->flash('success',"Data akun telah berhasil ditambahkan!");
        return redirect()->route('transactions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(transaction $transaction)
    {
        //
        $accounts=account::all();
        return view('transactions.show', compact('accounts','transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(transaction $transaction)
    {
        //
        $accounts = account::all();
        return view('transactions.edit', compact('transaction','accounts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, transaction $transaction)
    {
        $rules = [
            'kategori'      => 'required',
            'nominal'       => 'required',
            'tujuan'        => 'required',
            'account_id'    => 'required'
        ];

        $validated = $request->validate($rules);
        $transaction::where('id', [$transaction->id])->update($validated);

        $request->session()->flash('success',"Data akun telah berhasil diupdate!");
        return redirect()->route('transactions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(transaction $transaction)
    {
        //
        $transaction->delete();
        return redirect()->route('transactions.index')->with('success',"Data telah berhasil dihapus!");
    }
}
