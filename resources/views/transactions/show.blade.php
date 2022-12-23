@extends('layouts.master')

@section('judul', $transasction->nama)

@section('content')
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-8">
                <h2>{{ $transaction->nama }}</h2>
            </div>
            <div class="col-md-4">
                <div class="float-right">
                    <div class="btn-group" role="group">
                        <a href="{{ route('transactions.edit', $transaction->id) }}" class="btn btn-primary ml-3">EDIT</a>
                        <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST">
                            <button type="submit" class="btn btn-danger ml-3">DELETE</button>
                            @method('DELETE')
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <p>
            <hr>
    </div>
    <p>
    <ul class="list-inline">
        <li class="list-inline-item">
            <i class="fa fa-th-large fa-fw"></i>
            <em>{{ 'Nominal: ' . $transaction->nominal }}</em>
        </li><br>
        <li class="list-inline-item">
            <i class="fa fa-calendar fa-fw"></i>
            {{ 'Tujuan: ' . $transaction->tujuan }}
        </li><br>
    </ul>
    </p><br><br><br><br>
@endsection
