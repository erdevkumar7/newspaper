@extends('admin.layout')

@section('page_content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-4 col-sm-4">
                <div class="x_panel tile fixed_height_200">
                    <div class="x_title">
                        <h2>Total Registration</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content tile_count">
                        <div class=" tile_stats_count">
                            <span class="count_top"><i class="fa fa-users green"></i> All Registration Completed</span>
                            <div class="count green">{{ $totalUsers }}</div>
                            <span class="count_bottom"><a href="{{ route('admin.alluser') }}"><i class="green">All alumni
                                    </i></a> that registerd on the portal</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-4">
                <div class="x_panel tile fixed_height_200">
                    <div class="x_title">
                        <h2>Total Registration From MP Navodaya</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content tile_count">
                        <div class=" tile_stats_count">
                            <span class="count_top"><i class="fa fa-registered green"></i> Registration From Madhya
                                Pradesh</span>
                            <div class="count green">{{ $totalMPUsers }}</div>
                            <span class="count_bottom"><i class="green">MP alumni
                                </i> that registerd on the portal</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-4">
                <div class="x_panel tile fixed_height_200">
                    <div class="x_title">
                        <h2>Total Registration from other Navodaya</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content tile_count">
                        <div class=" tile_stats_count">
                            <span class="count_top"><i class="fa fa-users green"></i> Registration From Other
                                Navodaya</span>
                            <div class="count green">{{ $totalOthertUsers }}</div>
                            <span class="count_bottom"><a href="{{ route('admin.otherStateUser') }}"><i class="green">
                                        Other State</i></a> Alumni registerd on the portal</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="row">
            <div class="col-md-4 col-sm-4">
                <div class="x_panel tile fixed_height_200">
                    <div class="x_title">
                        <h2>Total Verified Navodaya</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content tile_count">
                        <div class=" tile_stats_count">
                            <span class="count_top"><i class="fa fa-check-square-o green"></i> Verified by organiser</span>
                            <div class="count green">{{ $verifiedUsers }}</div>
                            <span class="count_bottom"><i class="green">Verified alumni
                                </i> on the portal</span>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="row mp-jnvs">
            <div class="col-md-12 col-sm-12 m-2">
                <h2>Madhya Pradesh JNV-wise Registration Statistics :-</h2>
            </div>
            @foreach ($districtStats as $stat)
                <div class="col-md-3 col-sm-3 jnv-sec">
                    <div class="x_panel">
                        <div class="x_title">
                            <a href="{{ route('admin.jnvWiseUser', $stat->district) }}">
                                <h2>{{ $stat->district }} - {{ $stat->user_count }}</h2>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- /page content -->
@endsection
