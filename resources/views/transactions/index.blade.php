@extends('layouts.master')

@section('nama', 'Transactions List')

@push('css_after')
    <style>
        td {
            max-width: 0;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
    </style>
@endpush

@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session()->get('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>LIST TRANSACTION</h2>
                    </div>
                    <div class="col-sm-6" align="right">
                        <a href="{{ route('transactions.create') }}" class="btn btn-success">
                            <i class="fa fa-plus fa-fw" aria-hidden="true"></i>
                            <span>(+) Add New Transaction</span>
                        </a>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        {{-- <th>NO</th> --}}
                        <th>ID</th>
                        <th>KATEGORI</th>
                        <th>NOMINAL</th>
                        <th>TUJUAN</th>
                        <th>ACCOUNT ID</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($transactions as $transaction)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td><a href="{{ route('transactions.show', $transaction->id) }}">{{ $transaction->id}}</a></td>
                            {{-- <td>{{ $transaction->id }}</td> --}}
                            <td>{{ $transaction->kategori }}</td>
                            <td>{{ $transaction->nominal }}</td>
                            <td>{{ $transaction->tujuan }}</td>
                            <td>{{ $transaction->account_id}}</td>
                            <td><a href="{{ route('transactions.edit', $transaction->id) }}">
                                <button type="submit" class="btn btn-light ml-3">
                            </button></a>
                        </td>
                        </tr>
                    @empty
                        <tr>
                            <td align="center" colspan="6">No data yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
