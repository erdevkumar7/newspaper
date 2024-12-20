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
                            <span class="count_bottom"><a href="{{ route('admin.mpUser') }}"><i class="green">MP alumni
                                    </i></a> that registerd on the portal</span>
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

        <div class="row">
            <div class="col-md-4 col-sm-4">
                <div class="x_panel tile fixed_height_200">
                    <div class="x_title">
                        <h2>Total Verified Alumni</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content tile_count">
                        <div class=" tile_stats_count">
                            <span class="count_top"><i class="fa fa-check-square-o green"></i> Verified alumni</span>
                            <div class="count green">{{ $verifiedUsers }}</div>
                            <span class="count_bottom"><a href="{{ route('admin.verifiedUser') }}"><i
                                        class="green">Verified alumni
                                    </i></a> on the portal</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-4">
                <div class="x_panel tile fixed_height_200">
                    <div class="x_title">
                        <h2>Not-Verified Alumni</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content tile_count">
                        <div class=" tile_stats_count">
                            <span class="count_top"><i class="fa fa-user-times green"></i> Not-verified alumni</span>
                            <div class="count green">{{ $NotVerifiedUsers }}</div>
                            <span class="count_bottom"><a href="{{ route('admin.NotVerifiedUser') }}"><i
                                        class="green">Not-verified alumni
                                    </i></a> on the portal</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-4">
                <div class="x_panel tile fixed_height_200">
                    <div class="x_title">
                        <h2>Total Registered Volunteer</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content tile_count">
                        <div class=" tile_stats_count">
                            <span class="count_top"><i class="fa fa-sitemap green"></i> Registered Volunteer</span>
                            <div class="count green">{{ $totalOrgamizers }}</div>
                            <span class="count_bottom"><a href="{{ route('admin.allOrganizer') }}"><i class="green">All
                                        volunteer
                                    </i></a> that suport Event</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mp-jnvs">
            <div class="col-md-12 col-sm-12 m-2">
                <h2 style="color: #17a2b8; font-size:1.5em">Madhya Pradesh JNV-wise Registration Statistics :-</h2>
            </div>
            @foreach ($districtStats as $stat)
                <div class="col-md-3 col-sm-3 jnv-sec">
                    <div class="x_panel">
                        <div class="x_title">
                            <a href="{{ route('admin.jnvWiseUser', [$stat->district, 'all']) }}">
                                <h2>{{ $stat->district }} - {{ $stat->user_count }}</h2>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row mp-jnvs">
            <div class="col-md-12 col-sm-12 m-2">
                <h2 style="color: #17a2b8; font-size:1.5em">District-wise Verified Registration Statistics:-</h2>
            </div>
            @if ($districtVerifiedUserCount->isEmpty())
                <div class="col-md-12 col-sm-12 jnv-sec">
                    <div class="x_panel">
                        <div class="x_title">
                            <p class="text-center">Verified Alumni Not Found</p>
                        </div>
                    </div>
                </div>
            @else
                @foreach ($districtVerifiedUserCount as $stat)
                    <div class="col-md-3 col-sm-3 jnv-sec">
                        <div class="x_panel">
                            <div class="x_title">
                                <a href="{{ route('admin.jnvWiseUser', [$stat->district, 1]) }}">
                                    <h2>{{ $stat->district }} - {{ $stat->verified_user_count }}</h2>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    <!-- /page content -->
@endsection
