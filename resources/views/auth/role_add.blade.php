@extends('layouts.app')
@section('title', 'Role')
@section('content')
    <style>
        .container {

            position: relative;
        }

    </style>
    <div class="container mt-5 shadow-lg p-3 mb-5 bg-white rounded">
        <a href="{{ route('role.index') }}"
            style="position: absolute; top: 40px; right: 50px; font-size: 40px;"><i class="ni ni-fat-remove"></i></a>

        @isset($roles)
            <h1 class="h1 text-center my-4">{{ __('log.edit') }}</h1>
            <form action="{{ route('role.update', $roles->id) }}" method="POST" enctype="multipart/form-data">
                <input type="hidden" value="PUT" name="_method">
            @else
                <h1 class="h1 text-center my-4">{{ __('log.register') }}</h1>
                <form action="{{ route('role.store') }}" method="POST" enctype="multipart/form-data">
        @endisset
                @csrf
                @include('layouts.alerts')
                <div class="row d-flex justify-content-center">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">{{ __('Role Name') }}</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Enter role name eg Region supervisor"
                            @isset($roles)
                            value="{{ $roles->name ?? old('name') }}" @endisset>

                            @error('name')
                                <small class="d-block text-danger">{{ '* ' . $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="description">{{ __('Description') }}</label>
                            <input  type="text" class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Enter role Description"
                            @isset($roles)
                                value="{{ $roles->description ?? old('description') }}" @endisset>

                            @error('description')
                                <small class="d-block text-danger">{{ '* ' . $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div class="row justify-content-center text-center ">
                    <div class="col-md-6">
                        <div class="form-group has-danger">
                            <button type="Submit" class="btn btn-primary">{{ __('log.send') }}</button>
                        </div>
                    </div>
                </div>
            </form>
    </div>
@endsection
