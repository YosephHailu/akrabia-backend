@extends('layouts.app')
@section('title', 'Account-Detail')
@section('content')
<style>
    .container {
        position: relative;
    }
</style>
<div class=" mt-5 shadow-lg p-3 mb-5 bg-white rounded col-10 mx-auto">
    <div class="row px-4">
        <a href="{{ route('register') }}" class="btn btn-default btn-round"
            style="position: absolute; top: 10px; right: 20px">{{ __('log.add') }}</a>
        <div class="col-md-8">
            <h1 style=" color: #0072f5;
            font-family: 'Raleway',sans-serif; font-size: 25px; font-weight: 800;
             text-align: left; text-transform: uppercase;">{{ __('log.u_detail') }}</h1>
        </div>
        <div class="table-responsive">

            <table class="table table-hover">
                <thead class="thead-light">
                    <tr>
                        <th class="text-center text-dark"><b>#</b></th>
                        <th class="text-dark"> <b>{{ __('log.u_name') }}</b> </th>
                        <th class="text-dark"> <b>{{ __('log.u_role') }}</b> </th>
                        <th class="text-dark"> <b>{{ __('log.u_email') }}</b> </th>
                        <th class="text-dark"> <b>{{ __('region') }}</b></th>
                        <th class="text-dark"> <b>{{ __('log.status') }}</b></th>
                        <th class="text-center text-dark">Action</th>
                    </tr>
                </thead>
                <tbody class="list">
                    @foreach ($users as $user)
                    <tr>
                        <td class="text-center">{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->name ?? ""}}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->region->name ?? ''}}</td>
                        <td> <span class="badge badge-dot">
                                @if ($user->is_active == 1)
                                <i class="bg-success"></i>
                            </span>
                            @else
                            <i class="bg-warning"></i></span>
                            @endif
                            {{ $user->is_active == 1 ? 'Active' : 'Inactive' }}
                        </td>
                        <td class="pt-1 text-right" style="max-width: 150px">
                            @if($user->is_active)
                            <a href="{{ route('account.update.status', $user->id) }}" class="btn btn-danger">{{
                                __('Deactivate') }}</a>
                            @else
                            <a href="{{ route('account.update.status', $user->id) }}" class="btn btn-success">{{
                                __('Activate') }}</a>
                            @endif
                            <a href="{{ route('account.edit', $user->id) }}" class="btn btn-primary">{{
                                __('log.edit')}}</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="d-flex justify-content-center mt-5">
                {{ $users->links() }}
            </div>

        </div>
        @endsection
