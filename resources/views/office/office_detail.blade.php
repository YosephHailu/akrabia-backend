@extends('layouts.app')
@section('title', 'Staff detail')
@section('content')

<div class="row px-3 pl-6">
    <div class="col-6 py-3">

        <div class="mt-3 mb-3 text-center">
            <h2><b>STAFFS</b></h2>
        </div>

        <div class="row">
            @foreach ($office->staffs as $staff)
            <div class="col-6">
                <a href="{{ route('staff.show', $staff->id) }}" class=" text-dark">
                    <div class="card card-body">
                        <div class="card-subtitle"><b>{{ $staff->name }}</b>
                        </div>
                        <div class="d-flex">
                            <small class=""> <i class="mr-1 fa fa-user"></i> {{ $staff->position }}</small>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
    <div class="col-6 relative  mt-6">
        <div class="row">
            <div class="col-6 text-center">
                <div class="text-center">
                    <canvas style="max-width: 250px !important" id="definedComplaintPiChart" class="mx-auto" width="100"
                        height="100"></canvas>
                </div>
                <h5 class="uppercase mt-2">Defined Complaint share</h5>
            </div>

            <div class="col-4 text-center">
                <div>
                    <canvas style="max-width: 250px !important" class="mx-auto" id="complaintTypePiChart" width="100"
                        height="100"></canvas>
                </div>
                <h5 class="uppercase mt-2">Type Complaint share</h5>
            </div>
        </div>

        <div class="row pr-6 mt-5">
            <div class="col-xl-6 col-md-12">
                <div class="card card-stats shadow-lg">
                    <!-- Card body -->
                    <div class="card-body">
                        <a href="#complaint" class="">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase  mb-0">{{ __('Total Engagements') }}
                                    </h5>
                                    </h5>
                                    <span class="h2 font-weight-bold mb-0 ">{{ $office->complaints()->count() }}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                        <i class="ni ni-building"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-md-6 ">
                <div class="card card-stats shadow-lg">
                    <!-- Card body -->
                    <div class="card-body">
                        <a href="#complaint" class="">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase  mb-0">{{ __('Total Complaints')
                                        }}
                                    </h5>
                                    <span class="h2 font-weight-bold mb-0 ">{{
                                        $office->complaints()->where('complaint_type', 'complaint')->count() }}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-blue text-white rounded-circle shadow">
                                        <i class="ni ni-building"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-11 mx-auto">

    <div class="mt-6 mb-3 text-center">
        <h2><b>COMPLAINT</b></h2>
    </div>

    <div class="row">
        @foreach ($office->complaints as $complaint)
        <div class="col-4">
            <div class="card card-body">
                <div class="card-subtitle"><b>{{ $complaint->full_name }}</b> <small
                        class="px-1 bg-{{($complaint->complaint_type == " question") ? "success" :
                        (($complaint->complaint_type == "complaint") ? "danger text-white":
                        "primary text-white")}}">{{$complaint->complaint_type}}</small> </div>
                <div>{{$complaint->definedComplaint->complaint ?? $complaint->custom_complaint}}</div>
                <div class="d-flex">

                    <small class=""> <i class="mr-1 fa fa-user"></i> {{ $complaint->complaintable->region->name }}
                    </small>

                    <small class="pl-3"><i class="mr-1 fa fa-clock"></i>{{
                        Carbon\Carbon::parse($complaint->created_at)->diffForHumans()
                        }}</small>

                    <small class="pl-3">
                        <i class="fa fa-building"></i>
                        {{ $complaint->complaintable->name }} <b>Branch</b>
                    </small>
                </div>
                <p class="text-muted mb-0">{{ $complaint->complaint_description }}</p>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection

@push('js')
<script>
    hideSideNav();
    //
    // Variables
    //
    const rootApiUrl = "{{ url('/') }}/api";

    // Init chart
    (function() {
        $.get(rootApiUrl + "/office-graph-data/{{$office->id}}", function(
                response) {
                console.log(response, 'top complaint')
                initPiChart(response.defined_complaint_counts, response.defined_complaint_labels, 'definedComplaintPiChart');
                initPiChart(response.complaint_type_counts, response.complaint_type_labels, 'complaintTypePiChart');
            })
            .fail(function(error) {
                console.log(error)
            })
    })()

    function initPiChart(data, labels, id) {
        console.log('id', data)
        var ctx = document.getElementById(id).getContext('2d');
        data = {
            datasets: [{
                data: data,
                backgroundColor: ["#a3c7c9","#889d9e","#647678", "#a3c7a9","#849d9e","#647673","#547678", "#a3c7c9","#a2c7c8","#b3c7b9", "#53c7c9","#889d9e","#647678", "#a3887c9",],
            }],

            // These labels appear in the legend and in the tooltips when hovering different arcs
            labels: labels,
        };

        var myPieChart = new Chart(ctx,{
            type: 'pie',
            data: data,
            options: {}
        });
    }
</script>

@endpush