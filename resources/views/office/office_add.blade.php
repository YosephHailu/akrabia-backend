@extends('layouts.app')
@section('title', 'Office-add')
@section('content')
<style>
    .container {

        position: relative;
    }
</style>
<div class="container mt-5 shadow-lg p-3 mb-5 bg-white rounded">
    <a href="{{ route('office.index') }}" style="position: absolute; top: 40px; right: 50px; font-size: 40px;"><i
            class="ni ni-fat-remove"></i></a>

    @isset($office)
    <h1 class="h1 text-center my-4">{{ __('log.edit') }}</h1>
    <form action="{{ route('office.update', $office->id) }}" method="POST" enctype="multipart/form-data">
        <input type="hidden" value="PUT" name="_method">
        @else
        <h1 class="h1 text-center my-4">{{ __('log.register') }}</h1>
        <form action="{{ route('office.store') }}" method="POST" enctype="multipart/form-data">
            @endisset
            @csrf
            @include('layouts.alerts')

            <div class="row d-flex justify-content-center">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Phone">Office Name</label>
                        <input type="text" placeholder="Enter Name eg. Piyasa Arada branch"
                            class="form-control  @error('name') is-invalid  @enderror" name="name" @isset($office)
                            value="{{ $office->name ?? old('name') }}" @endisset />
                        @error('name')
                        <small class="d-block text-danger">{{ '* ' . $message }}</small>
                        @enderror
                    </div>

                </div>
            </div>

            <div class="row d-flex justify-content-center">
                <div class="col-md-6">
            <div class="form-group" >
                    <label for="region">Region</label>
                    <select class="form-control @error('region_id') is-invalid @enderror"
                        aria-label="Default select example" name="region_id">
                        <option value="" id="def_option" selected>Select one </option>
                        @foreach ($regions as $region)
                        <option value="{{ $region->id }}" @isset($office) {{ $office->region_id == $region->id ? ' selected' : '' }}
                            @endisset>
                            {{ $region->name }}
                        </option>
                        @endforeach
                    </select>
                    @error('region_id')
                    <small class="d-block text-danger">{{ '* ' . $message }}</small>
                    @enderror
            </div>
                </div>
            </div>

            <div class="row d-flex justify-content-center">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="manager">Manager name</label>
                        <input type="text" placeholder="Enter Name eg. DR. FirstName LastName"
                            class="form-control  @error('manager') is-invalid  @enderror" name="manager"
                            @isset($office) value="{{ $office->manager ?? old('manager') }}" @endisset />
                        @error('manager')
                        <small class="d-block text-danger">{{ '* ' . $message }}</small>
                        @enderror
                    </div>

                </div>
            </div>

            <div class="row d-flex justify-content-center">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Phone">Phone</label>
                        <input type="text" placeholder="Enter Name eg. 011 1254 58525"
                            class="form-control  @error('phone') is-invalid  @enderror" name="phone" @isset($office)
                            value="{{ $office->phone ?? old('phone') }}" @endisset />
                        @error('phone')
                        <small class="d-block text-danger">{{ '* ' . $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row d-flex justify-content-center">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Phone">Secondary Phone</label>
                        <input type="text" placeholder="Enter Name eg. 011 1254 58525"
                            class="form-control  @error('secondary_phone') is-invalid  @enderror" name="secondary_phone" @isset($office)
                            value="{{ $office->secondary_phone ?? old('secondary_phone') }}" @endisset />
                        @error('secondary_phone')
                        <small class="d-block text-danger">{{ '* ' . $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row d-flex justify-content-center">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="TVT Year">Establsement year</label>
                        <input type="text" placeholder="Enter Tvt Establsement year eg 1989"
                            class="form-control  @error('establishment_year') is-invalid  @enderror"
                            name="establishment_year" @isset($office)
                            value="{{ $office->establishment_year ?? old('establishment_year') }}" @endisset />
                        @error('establishment_year')
                        <small class="d-block text-danger">{{ '* ' . $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>


            <div class="row d-flex justify-content-center">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Uplaod Logo">{{ __('log.logo') }}</label>
                        <input type="file" class="form-control @error('logo') is-invalid @enderror" name="logo">

                        @error('logo')
                        <small class="d-block text-danger">{{ '* ' . $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row d-flex justify-content-center">
                <div class="col-md-6">
                    <div class="form-group has-danger">
                        <label for="Office Description">{{ __('Description') }}</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" rows="3"
                            placeholder="Enter Office Description "
                            name="description">{{ $office->description ?? old('description') }}</textarea>
                        @error('description')
                        <small class="d-block text-danger">{{ '* ' . $message }}</small>
                        @enderror
                    </div>

                </div>
            </div>

            <div class="row d-flex justify-content-center mb-5">
                <div class="col-md-6">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="status" id="statuscb" @isset($office)
                            @if ((old('_token') && old('status') !=null) || (old('_token')==null && $office->status))
                        checked
                        @endif
                        @endisset>
                        <label class="form-check-label" for="flexCheckChecked">
                            {{ __('log.status') }}
                        </label>
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

@push('js')
<script type="text/javascript">
    $(document).ready(function() {
        $('input[type=radio][name=bureau_type]').trigger('change')
        $('input[type=radio][id=office]').trigger('change')
    })

    $('input[type=radio][name=bureau_type]').on('change', function() {
        if($(this).val() == 'office' && $(this).is(':checked'))
            $("#minsterId").show();
        else
            $("#minsterId").hide();
    })

</script>
@endpush