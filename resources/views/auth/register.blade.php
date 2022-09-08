@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center mt-5">

        <div class="col-md-8">
            <div class="card">
                <a href="{{ route('accounts') }}"
                    style="position: absolute; top: 40px; right: 50px; font-size: 40px;"><i
                        class="ni ni-fat-remove"></i></a>
                <div class="card-body">
                    @include('layouts.alerts')
                    @isset($user)
                    <h1 class="h1 text-center my-4"> {{ __('log.edit') }}</h1>

                    <form action="{{ route('account.update', $user->id) }}" method="POST">
                        <input type="hidden" value="PUT" name="_method">
                        @else
                        <h1 class="h1 text-center my-4"> {{ __('log.register') }}</h1>
                        <form method="POST" action="{{ route('register') }}">
                            @endisset
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('log.u_name')
                                    }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" placeholder="Type Name"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ $user->name ?? old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('log.u_email')
                                    }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" placeholder="Type Email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ $user->email ?? old('email') }}" required autocomplete="email"
                                        @isset($user) disabled @endisset>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('log.u_role')
                                    }}</label>

                                <div class="col-md-6">
                                    <select name="role_id" class=" form-control" id=""
                                        aria-label="Default select example">
                                        <option value="">Select Role </option>
                                        @foreach ($roles as $role)
                                        <option value="{{ $role->id}}" @isset($user)
                                            {{ $user->role_id == $role->id ? ' selected' : '' }}
                                        @endisset >
                                            {{$name}}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('role_id')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('User Region')
                                    }}</label>

                                <div class="col-md-6">
                                    <select name="region_id" class=" form-control" id=""
                                        aria-label="Default select example">
                                        <option value="">Select Region </option>
                                        @foreach ($regions as $region)
                                        <option value="{{ $region->id}}"  @isset($user)
                                            {{ $user->region_id == $region->id ? ' selected' : '' }}
                                        @endisset>
                                            {{$region->name}}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('region_id')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('log.pass')
                                    }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" placeholder="Type Password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-5">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{
                                    __('log.con_pass') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" placeholder="Confirm Password" type="password"
                                        class="form-control" name="password_confirmation" autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('log.send') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
