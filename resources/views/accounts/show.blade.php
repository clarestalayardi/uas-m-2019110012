@extends('layouts.master')

@section('judul', $account->nama)

@section('content')
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-8">
                <h2>{{ $account->nama }}</h2>
            </div>
            <div class="col-md-4">
                <div class="float-right">
                    <div class="btn-group" role="group">
                        <a href="{{ route('accounts.edit', $account->id) }}" class="btn btn-primary ml-3">EDIT</a>
                        <form action="{{ route('accounts.destroy', $account->id) }}" method="POST">
                            <button type="submit" class="btn btn-danger ml-3">DELETE</button>
                            @method('DELETE')
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <h5>
            <span class="badge badge-primary">
                {{-- <i class="fa fa-star fa-fw"></i> ID: {{ $account->id }}<br> --}}
                <i class="fa fa-star fa-fw"></i> Jenis: {{ $account->jenis }}
            </span>
        </h5>
        <p>
        <hr>
    </div>
@endsection
