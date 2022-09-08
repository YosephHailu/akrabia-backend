@extends('layouts.auth.app')

@section('content')

<style>
    body{
        background: linear-gradient(90deg, rgba(1, 2, 58, 0.4), rgba(36, 147, 221, 0.4));
    }
</style>

<div class="content mt-5 pt-5 text-center shadow-lg p-3 mb-5 rounded">
    
    <div class="col-md-4 mx-auto">
        <!-- Login Tab Content -->
        <div class="account-content">
            <div class="row align-items-center justify-content-center">
                <div class="mb-0">
                    <form method="POST" action="{{ route('login', app()->getLocale()) }}" style="width: 350px">
                        @csrf
                        <div class="card mb-0">
                            <div class="card-body">
                                <div class="text-center mb-5">
                                    <i
                                        class="icon-reading icon-2x text-slate-300 border-slate-300 border-3 rounded-round p-3 mb-3 mt-1"></i>
                                    <h5 class="mb-0">{{ __('LOGIN')}}</h5>
                                    <span class="d-block text-muted">{{ __('credentials')}} </span>
                                </div>

                                <div class="form-group form-group-feedback form-group-feedback-left">
                                    <input type="email" class="form-control" placeholder="Type your Email" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    <div class="form-control-feedback">
                                        <i class="icon-user text-muted"></i>
                                    </div>
                                    @error('email')
                                        <span class="d-block text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group form-group-feedback form-group-feedback-left">
                                    <input type="password" class="form-control" placeholder="Type your Password"
                                        name="password" required autocomplete="current-password">
                                    <div class="form-control-feedback">
                                        <i class="icon-lock2 text-muted"></i>
                                    </div>
                                    @error('password')
                                        <span class="d-block text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <input type="hidden" id="SecurityToken" name="_security_token">

                                    <button type="submit" class="btn btn-primary btn-block btn-auth-login">Sign in <i
                                            class="icon-circle-right2 ml-2"></i></button>
                                </div>

                            
                               

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /Login Tab Content -->
        <br><br>
    </div>
</div>
