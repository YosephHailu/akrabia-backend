@extends('layouts.app')
@section('title', 'Admin-Dashboard')
@section('content')

<style>
    .bg-gray-light {
        background-color: #F8F9FE !important;
    }

    .bg-dark-light {
        background-color: #244067 !important;
    }

    .card {

        box-shadow: 0 0 10px 0 rgb(0, 38, 88, 0.5);

    }
</style>

<div class=" py-5">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row">
                <div class="col-xl-3 col-md-12">
                    <div class="card card-stats header">
                        <!-- Card body -->
                        <div class="card-body">
                            <a href="{{route('office.index')}}" class="">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-white mb-0">{{ __('Total Office') }}
                                        </h5>
                                        </h5>
                                        <span class="h2 font-weight-bold mb-0 text-white">{{
                                            App\Models\Office::count() }}</span>
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

                <div class="col-xl-3 col-md-6 ">
                    <div class="card card-stats header">
                        <!-- Card body -->
                        <div class="card-body">
                            <a href="{{route('staff.index')}}" class="">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-white mb-0">{{ __('Total Staffs')
                                            }}
                                        </h5>
                                        <span class="h2 font-weight-bold mb-0 text-white">{{ App\Models\Staff::count()
                                            }}</span>
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

                <div class="col-xl-3 col-md-6 ">
                    <div class="card card-stats header">
                        <!-- Card body -->
                        <div class="card-body">
                            <a href="{{route('complaint')}}" class="">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-white mb-0">{{ __('Total Complaints')
                                            }}
                                        </h5>
                                        <span class="h2 font-weight-bold mb-0 text-white">{{
                                            App\Models\Complaint::count() }}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div
                                            class="icon icon-shape bg-gradient-indigo text-white rounded-circle shadow">
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
</div>
<div class="container-fluid ">
    <div class="row">
        <div class="col-xl-8 mt-n5">
            <div class="card ">
                <div class="card-header bg-transparent">
                    <div class="row align-items-center">
                        <div class="col">
                            <h6 class="text-uppercase text-muted ls-1 mb-1"></h6>
                            <h5 class="h3 mb-0">{{ __('log.t_complaint') }}</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Chart -->
                    <div class="chart">
                        <canvas id="chart-barss" class="chart-canvas"></canvas>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="mb-0">{{ __('TOP RATED OFFICES') }}</h3>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <!-- Projects table -->
                            <table class="table align-items-center table-flush">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col" class="text-white">{{ __('Bureau Name') }}</th>
                                        <th scope="col" class="text-white text-center bg-dark-light">{{
                                            __('log.complaint') }}
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($topOffices->count() >= 1)
                                    @foreach ($topOffices as $topOffice)
                                    <tr>
                                        <th scope="row">
                                            {{ $topOffice->name }}
                                        </th>
                                        <td class="text-center bg-gray-light">
                                            {{ $topOffice->complaints->count() }}
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td>
                                            <p>No bureau inserted</p>
                                        </td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="mb-0">{{ __('TOP RATED STAFFS') }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <!-- Projects table -->
                            <table class="table align-items-center table-flush">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col" class="text-white">{{ __('Staff Name') }}</th>
                                        <th scope="col" class="text-white text-center bg-dark-light">
                                            {{ __('log.complaint') }} </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($topStaffs->count() >= 1)
                                    @foreach ($topStaffs as $topStaff)
                                    <tr>
                                        <th scope="row">
                                            {{ $topStaff->name }}
                                        </th>
                                        <td class="text-center bg-gray-light">
                                            {{ $topStaff->complaints->count() }}
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td>
                                            <p>No bureau inserted</p>
                                        </td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-4 text-center">
            <div class="row">
                <div class="col-4">
                    <div>
                        <canvas style="max-width: 250px !important" id="regionPiChart" width="100"
                            height="100"></canvas>
                    </div>
                    <h5 class="uppercase mt-2">Region Complaint share</h5>
                </div>

                <div class="col-4">
                    <div>
                        <canvas style="max-width: 250px !important" id="definedComplaintPiChart" width="100" height="100"></canvas>
                    </div>
                    <h5 class="uppercase mt-2">Defined Complaint share</h5>
                </div>

                <div class="col-4">
                    <div>
                        <canvas style="max-width: 250px !important" id="complaintTypePiChart" width="100"
                            height="100"></canvas>
                    </div>
                    <h5 class="uppercase mt-2">Type Complaint share</h5>
                </div>
            </div>

            <div class="card mt-5">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0 uppercase">{{ __('Top reported complaints') }}</h3>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col" class="text-white">{{ __('Staff Name') }}</th>
                                <th scope="col" class="text-white text-center bg-dark-light">
                                    {{ __('log.complaint') }} </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($definedComplaints->count() >= 1)
                            @foreach ($definedComplaints as $definedComplaint)
                            <tr>
                                <th scope="row" class="text-right">
                                    {{ $definedComplaint->complaint }}
                                </th>
                                <td class="text-center bg-gray-light">
                                    {{ $definedComplaint->complaints->count() }}
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td>
                                    <p>No bureau inserted</p>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection


@push('js')
<script>
    //
    // Variables
    //
    const rootApiUrl = "{{ url('/') }}/api";
    var $chart = $('#chart-barss');

    //
    // Methods
    //

    // Init chart
    function initChart($chart, labels, data) {

        // Create chart
        var ordersChart = new Chart($chart, {
            type: 'bar',
            data: {
                labels,
                datasets: [{
                    label: 'Complaints',
                    data
                }]
            }
        });

        // Save to jQuery object
        $chart.data('chart', ordersChart);
    }

    // Init chart
    if ($chart.length) {
        // initChart($chart);
        $.get(rootApiUrl + "/topComplaints", function(
                response) {
                console.log(response, 'top complaint')
                initChart($chart, response.labels, response.data)
                initPiChart(response.region_complaint_counts, response.region_labels, 'regionPiChart');
                initPiChart(response.defined_complaint_counts, response.defined_complaint_labels, 'definedComplaintPiChart');
                initPiChart(response.complaint_type_counts, response.complaint_type_labels, 'complaintTypePiChart');
            })
            .fail(function(error) {
                console.log(error)
            })
    }

    var MonthlyChart = (function() {

        // Variables
        var $chartGraph = $('#chart-monthly-dark');

        // Methods
        function init($chartGraph, $data, $labels) {

            var MonthlyChart = new Chart($chartGraph, {
                type: 'line',
                options: {
                    scales: {
                        yAxes: [{
                            gridLines: {
                                lineWidth: 1,
                                color: Charts.colors.gray[900],
                                zeroLineColor: Charts.colors.gray[900]
                            },
                            ticks: {
                                callback: function(value) {
                                    if (!(value % 10)) {
                                        return value;
                                    }
                                }
                            }
                        }]
                    },
                    tooltips: {
                        callbacks: {
                            label: function(item, data) {
                                var label = data.datasets[item.datasetIndex].label || '';
                                var yLabel = item.yLabel;
                                var content = '';

                                if (data.datasets.length > 1) {
                                    content += '' + label +
                                        ' Complaints';
                                }

                                content += ' ' + yLabel +
                                    ' Complaints';
                                return content;
                            }
                        }
                    }
                },
                data: {
                    labels: $labels,
                    datasets: [{
                        label: 'Performance',
                        data: $data
                    }]
                }
            });

            // Save to jQuery object
            $chartGraph.data('chart', MonthlyChart);
        };


        // Events

        if ($chartGraph.length) {
            $.get(rootApiUrl + "/last5Months", function(
                    response) {
                    console.log(response)
                    init($chartGraph, response.data, response.labels);
                })
                .fail(function(error) {
                    console.log(error)
                })
        }

    })();

    function initPiChart(data, labels, id) {
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