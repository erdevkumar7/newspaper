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
                            <span class="count_top"><i class="fa fa-users"></i> Registration Completed</span>
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
                            <span class="count_top"><i class="fa fa-users"></i> Registration From MP</span>
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
                        <h2>Total Organizer</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content tile_count">
                        <div class=" tile_stats_count">
                            <span class="count_top"><i class="fa fa-sitemap"></i> Registered Organizer</span>
                            <div class="count green">{{ $totalOrgamizers }}</div>
                            <span class="count_bottom"><a href="{{ route('admin.allOrganizer') }}"><i class="green">All
                                        organizer
                                    </i></a> that supoorts Events</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mp-jnvs">
            <div class="col-md-12 col-sm-12 m-2">
                <h2>Madhya Pradesh JNV-wise Registration Statistics :-</h2>
            </div>
            @foreach ($districtStats as $stat)
                <div class="col-md-3 col-sm-3 jnv-sec">
                    <div class="x_panel">
                        <div class="x_title">
                            <a href="{{route('admin.jnvWiseUser', $stat->district)}}"><h2>{{ $stat->district }} - {{ $stat->user_count }}</h2></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- <div class="row" id="mp-navodaya">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                             
                                <h2>Registration Statistics of Madhya Pradesh JNVs </h2>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name of JNV</th>
                                            <th>Registration Completed</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($districtStats->isEmpty())
                                            <tr>
                                                <td colspan="3" class="text-center">No Distict-Alumni Available</td>
                                            </tr>
                                        @else
                                            @foreach ($districtStats as $stat)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $stat->district }}</td>
                                                    <td>{{ $stat->user_count }}</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}


    </div>
    <!-- /page content -->
@endsection
