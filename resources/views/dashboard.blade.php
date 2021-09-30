@extends('layouts.app', ['activePage' => 'dashboard', 'title' => 'Dashboard', 'navName' => 'Dashboard', 'activeButton'
=> 'laravel'])

@section('content')
    <style>
        @php
            $color1 = ['#ffadad', '#ffd6a5', '#fdffb6', '#caffbf', '#9bf6ff', '#a0c4ff', '#bdb2ff', '#ffc6ff'];
        @endphp
        @foreach ($cstr_data as $x => $item).my-custom-class-{{ $item->typename }} {
            fill: {{ $color1[$x] }};
        }

        @endforeach

    </style>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="card ">
                        <div class="card-header ">
                            <h4 class="card-title">{{ __('Container Size') }}</h4>
                            <p class="card-category">{{ __('Last Campaign Performance') }}</p>
                        </div>
                        <div class="card-body ">
                            <div id="chartPreferences" class="ct-chart ct-perfect-fourth"></div>
                            <div class="legend">
                                @php
                                    $loopcount = 0;
                                @endphp
                                @foreach ($cstr_data as $x => $item)
                                    @php
                                        $loopcount += $item->sum_type;
                                    @endphp
                                    <i class="fa fa-circle " style="color:{{ $color1[$x] }}"></i> {{ $item->typename }}
                                @endforeach
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card ">
                        <div class="card-header ">
                            <h4 class="card-title">{{ __('Users Behavior') }}</h4>
                            <p class="card-category">{{ __('24 Hours performance') }}</p>
                        </div>
                        <div class="card-body ">
                            <div id="chartHours" class="ct-chart"></div>
                        </div>
                        <div class="card-footer ">
                            <div class="legend">
                                <i class="fa fa-circle text-info"></i> {{ __('Open') }}
                                <i class="fa fa-circle text-danger"></i> {{ __('Click') }}
                                <i class="fa fa-circle text-warning"></i> {{ __('Click Second Time') }}
                            </div>
                            <hr>
                            <div class="stats">
                                <i class="fa fa-history"></i> {{ __('Updated 3 minutes ago') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card ">
                        <div class="card-header ">
                            <h4 class="card-title">{{ __('2017 Sales') }}</h4>
                            <p class="card-category">{{ __('All products including Taxes') }}</p>
                        </div>
                        <div class="card-body ">
                            <div id="chartActivity" class="ct-chart"></div>
                        </div>
                        <div class="card-footer ">
                            <div class="legend">
                                <i class="fa fa-circle text-info"></i> {{ __('Tesla Model S') }}
                                <i class="fa fa-circle text-danger"></i> {{ __('BMW 5 Series') }}
                            </div>
                            <hr>
                            <div class="stats">
                                <i class="fa fa-check"></i> {{ __('Data information certified') }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">

                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script type="text/javascript">
        $(document).ready(function() {
            // Javascript method's body can be found in assets/js/demos.js
            // demo.initDashboardPageCharts();
            // Chartist.Pie('#chartPreferences', {
            //     labels: [
            @foreach ($cstr_data as $chart)
                // {!! '"' . $loopcount * $chart->sum_type . '%", ' !!}
                // @endforeach
            //     ],
            //     series: [
            @foreach ($cstr_data as $chart)
                // {!! $loopcount * $chart->sum_type . ', ' !!}
                // @endforeach
            //     ]
            // });

            new Chartist.Pie('.ct-chart', {
                labels: [
                    @foreach ($cstr_data as $chart)
                        {!! '"' . number_format((100 / $loopcount) * $chart->sum_type, 0) . '%", ' !!}
                    @endforeach
                ],
                series: [
                    @foreach ($cstr_data as $chart)
                        {

                        value: {!! (100 / $loopcount) * $chart->sum_type !!},
                        labels: {!! '"' . $loopcount * $chart->sum_type . '%" ' !!},
                        className: 'my-custom-class-{{ $chart->typename }}',
                        meta: 'Meta One'
                        },

                    @endforeach
                ]
            });


        });
    </script>
@endpush
