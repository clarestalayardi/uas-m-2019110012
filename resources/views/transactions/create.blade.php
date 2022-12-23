@extends('layouts.master')

@section('title', 'Add New Transaction')

@section('content')
    <h2>NEW TRANSACTION</h2>

    <form action="{{ route('transactions.store') }}" method="POST">
        @csrf
        <div class="row">
            {{-- KATEGORI --}}
            <div class="col-md-6 mb-3">
                <label for="kategori">Kategori</label>
                <input type="text" class="form-control @error('kategori') is-invalid @enderror" name="kategori"
                    id="kategori" value="{{ old('kategori') }}">
                @error('kategori')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row">
            {{-- NOMINAL --}}
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="nominal">Nominal</label>
                    <input type="number" class="form-control @error('nominal') is-invalid @enderror" name="nominal" id="nominal"
                        min="1" max="1000000" value="{{ old('nominal') }}">
                    @error('nominal')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

            {{-- TUJUAN --}}
            <div class="col-md-6 mb-3">
                <label for="tujuan">Tujuan</label>
                <input type="text" class="form-control @error('tujuan') is-invalid @enderror" name="tujuan"
                    id="tujuan" value="{{ old('tujuan') }}">
                @error('tujuan')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

             {{-- ACCOUNT ID --}}
             <div class="col-md-6 mb-3">
                <label for="accountid">Account ID</label>
                <input type="text" class="form-control @error('accountid') is-invalid @enderror" name="accountid"
                    id="accountid" value="{{ old('accountid') }}">
                @error('accountid')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
            <br>
        <button class="btn btn-primary btn-lg btn-block" type="submit">ADD</button>
    </form>
@endsection
