@extends('layouts.master')

@section('nama', 'Edit Transaction')

@section('content')
    <h2>UPDATE NEW ACCOUNT</h2>
    <form action="{{ route('transactions.update', ['transaction' => $transaction->id]) }}" method="POST">
        @method('PATCH')
        @csrf
        <div class="row">
            {{-- KATEGORI --}}
            <div class="col-md-6 mb-3">
                <label for="kategori">KATEGORI</label>
                <input type="text" class="form-control @error('kategori') is-invalid @enderror" name="kategori" id="kategori"
                    value="{{ old('kategori') ?? $transaction->kategori}}">
                @error('kategori')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- NOMINAL --}}
            <div class="col-md-6 mb-3">
                <label for="nominal">NOMINAL</label>
                <input type="text" class="form-control @error('nominal') is-invalid @enderror" name="nominal"
                    id="nominal" value="{{ old('nominal') ?? $transaction->nominal }}">
                @error('nominal')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>


        <div class="row">
            {{-- TUJUAN --}}
            <div class="col-md-6 mb-3">
                <label for="tujuan">TUJUAN</label>
                <input type="text" class="form-control @error('tujuan') is-invalid @enderror" name="tujuan"
                    id="tujuan" value="{{ old('tujuan') ?? $transaction->tujuan }}">
                @error('tujuan')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        {{-- ACCOUNT ID --}}
        <div class="col-md-6 mb-3">
            <label for="account_id">ACCOUNT ID</label>
            <input type="text" class="form-control @error('account_id') is-invalid @enderror" name="account_id"
                id="account_id" value="{{ old('account_id') ?? $transaction->account_id }}">
            @error('account_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
        <button class="btn btn-primary btn-lg btn-block" type="submit">UPDATE</button>
    </form>
@endsection
