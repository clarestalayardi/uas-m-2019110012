@extends('layouts.master')

@section('title', 'Add New Accounts')

@section('content')
    <h2>NEW ACCOUNT</h2>

    <form action="{{ route('accounts.store') }}" method="POST">
        @csrf
        <div class="row">
            {{-- ID --}}
            <div class="col-md-6 mb-3">
                <label for="id">ID</label>
                <input type="text" class="form-control @error('id') is-invalid @enderror" name="id" id="id"
                    value="{{ old('id') }}">
                @error('id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- NAMA --}}
            <div class="col-md-6 mb-3">
                <label for="nama">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                    id="nama" value="{{ old('nama') }}">
                @error('nama')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        {{-- JENIS --}}
            <div class="row">
            <label class="col-sm-2 col-form-label">JENIS</label>
                <div class="col-sm-4">
                    <select class="form-control" id="jenis" name="jenis" required>
                        <option selected="selected" disabled>...</option>
                        <option value="Personal">Personal</option>
                        <option value="Bisnis">Bisnis</option>
                    </select>
                    @error('jenis')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
            </div>
            <br>
        <button class="btn btn-primary btn-lg btn-block" type="submit">ADD</button>
    </form>
@endsection
