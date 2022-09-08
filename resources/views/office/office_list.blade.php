@extends('layouts.app')
@section('title', 'Bureaus')
@section('content')


<style>
    .container {

        position: relative;
    }
</style>
<div class="container mt-5 shadow-lg p-3 mb-5 bg-white rounded col-md-10">
    <div class="d-flex">
        <div>
            <h1 style=" color: #0072f5; font-family: 'Raleway',sans-serif; font-size: 25px; font-weight: 800; ">{{
                __('OFFICES') }}
            </h1>
        </div>

        <form action="{{ url('office') }}" class="form-inline justify-content-center mb-2 mx-auto col-8">
            <select class="form-control mx-3 @error('office_type_id') is-invalid @enderror" aria-label="Default select example"
                name="office_type_id">
                <option value="" selected>Select one </option>
                @foreach ($officeTypes as $officeType)
                <option value="{{ $officeType->id }}" @isset($office) {{ $office->office_type_id == $officeType->id ? ' selected' :
                    '' }}
                    @endisset>
                    {{ $officeType->name }}
                </option>
                @endforeach
            </select>

            <div class="form-group">
                <input type="text" class="form-control col-md-12" name="q" placeholder="Search by name">
            </div>

            <div class="pl-1">
                <button type="Submit" class="btn btn-primary">{{ __('log.search') }}</button>
            </div>
        </form>

        <div class="mb-2 ml-auto">
            <a href="{{ route('office.create') }}" class="btn btn-default btn-round">{{ __('log.add new') }}</a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover text-left">
            <thead class="thead-dark">
                <tr>
                    <th class="text-light"><b>Region</b></th>
                    <th class="text-light"> <b>Name</b></th>
                    <th class="text-light"> <b>Phone</b></th>
                    <th class="text-light"> <b>Year</b></th>
                    <th class="text-light"> <b>Status</b></th>
                    <th class="text-light"> <b>Address</b></th>
                    <th class="text-light"> <b>Action</b></th>
                </tr>
            </thead>
            <tbody>
                @if ($offices->count() >= 1)
                @foreach ($offices->groupBy('officeType_id') as $index => $officeType_offices )
                <tr>
                    <td colspan="7" style="background-color: rgba(110, 110, 110, .1)">
                        {{$officeType_offices->first()->officeType->name ?? ""}}</td>
                </tr>
                @foreach ($officeType_offices as $office)

                <tr>
                    <td></td>
                    <td>
                        {{ $office->name }} <br>
                    </td>
                    <td> {{ $office->phone }} <br>
                        <small>{{ $office->secondary_phone }}</small>
                    </td>
                    <td> {{ $office->establishment_year }} </td>
                    <td> <span class="badge badge-dot">
                            @if ($office->status) <i class="bg-success"></i> </span> Active
                        @else
                        <i class="bg-warning"></i></span> Inactive
                        @endif
                    </td>
                    <td> {{ Str::limit($office->address, 40, '...') }} </td>
                    <td class="pt-1 text-left">
                        <a href="{{ route('office.edit', $office->id) }}"
                            class="btn btn-primary">{{ __('log.edit') }}</a>
                            <a href="{{ route('office.show', $office->id) }}" class="btn btn-white hover:bg-blue">{{
                                __('log.detail') }}</a>
                        </td>
                </tr>
                @endforeach
                @endforeach
                @else
                <td class="">No data available</td>
                @endif
            </tbody>
        </table>
        <div class="d-flex justify-content-center mt-5">
            {{ $offices->links() }}
        </div>

    </div>

    @endsection