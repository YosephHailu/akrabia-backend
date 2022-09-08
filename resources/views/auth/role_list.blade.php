@extends('layouts.app')
@section('title', 'TVT Type-Detail')
@section('content')
 <style>
      .container{
        
        position: relative;
     }

 </style>
<div class="container mt-5 shadow-lg p-1 mb-1 bg-white rounded">
    <div class="col-md-12">
        <a href="{{ route('role.create') }}" class="btn btn-default btn-round" style="text-align: right; top: 40px; left: 88%">{{__('log.add')}}</a>
                        <h1 style=" color: #0072f5; 
                            font-family: 'Raleway',sans-serif; font-size: 25px; font-weight: 800; 
                            text-align: left; text-transform: uppercase;">{{ __('Roles') }}
                        </h1> 
        </div>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                    <th class="text-center text-dark"><b>#</b></th>
                    <th class="text-dark"> <b>{{__('Role')}}</b></th>
                    <th class="text-right text-dark">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                <tr>
                    <td class="text-center">{{ $role->id}}</td>
                    <td> {{$name}}</td> 
                    <td class="pt-0 text-right"><a href="{{route('role.edit', $role->id)}}" class="btn btn-primary">{{__('log.edit')}}</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center mt-5">
            {{ $roles->links()}}
        </div>
    </div>
@endsection