<?php

namespace App\Http\Controllers;

use App\Models\account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts = account::all();
        return view('accounts.index', compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('accounts.create');
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
            'id'    => 'required|unique:accounts|digits:16',
            'nama'  => 'required',
            'jenis' => 'required'
        ];

        $validated = $request->validate($rules);
        account::create($validated);

        $request->session()->flash('success',"Data akun dengan nama {$validated['nama']} sukses ditambahkan!");
        return redirect()->route('accounts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(account $account)
    {
        $accounts=account::all();
        return view('accounts.show', compact('account'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(account $account)
    {
        //
        return view('accounts.edit', compact('account'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, account $account)
    {
        //
        {
            $rules = [
                'id'    => 'required|digits:16',
                'nama'  => 'required',
                'jenis' => 'required',
            ];
            $validated = $request->validate($rules);
            $account::where('id', [$account->id])->update($validated);

            $request->session()->flash('success',"Data dengan nama {$validated['nama']} sukses diupdate!");
            return redirect()->route('accounts.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(account $account)
    {
        $account->delete();
        return redirect()->route('accounts.index')->with('success',"Data telah berhasil dihapus!");
    }
}
