@extends('layouts.master')

@section('title', 'Account List')

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
                        <h2>LIST ACCOUNT</h2>
                    </div>
                    <div class="col-sm-6" align="right">
                        <a href="{{ route('accounts.create') }}" class="btn btn-success">
                            <i class="fa fa-plus fa-fw" aria-hidden="true"></i>
                            <span>(+) Add New Account</span>
                        </a>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>ID</th>
                        <th>NAMA</th>
                        <th>JENIS</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($accounts as $account)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td><a href="{{ route('accounts.show', $account->id) }}">{{ $account->id }}</a></td>
                            {{-- <td>{{ $account->id }}</td> --}}
                            <td>{{ $account->nama }}</td>
                            <td>{{ $account->jenis }}</td>
                            <td><a href="{{ route('accounts.edit', $account->id) }}">
                                <button type="submit" class="btn btn-light ml-3"  >
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
