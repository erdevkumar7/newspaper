@extends('admin.layout')

@section('page_content')

<!-- page content -->
<div class="right_col" role="main">
  <div class="row">
    <div class="col-md-4 col-sm-4">
      <div class="x_panel tile fixed_height_200">
        <div class="x_title">
          <h2>Total Alumni</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content tile_count">
          <div class=" tile_stats_count">
            <span class="count_top"><i class="fa fa-users"></i> Registration Completed</span>
            <div class="count green">{{$totalUsers}}</div>
            <span class="count_bottom"><a href="{{route('admin.alluser')}}"><i class="green">All alumni </i></a> that registerd on the portal</span>
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
            <div class="count green">1000</div>
            <span class="count_bottom"> We Have Organizer</span>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-4 col-sm-4">
      {{-- <div class="x_panel tile fixed_height_200">
        <div class="x_title">
          <h2>Total News-reader</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content tile_count">
          <div class=" tile_stats_count">
            <span class="count_top"><i class="fa fa-sitemap"></i> Total News-readers</span>
            <div class="count green">50000</div>
            <span class="count_bottom"><i class="green">24% </i> From last Month</span>
          </div>
        </div>
      </div> --}}
    </div>
  </div>
  <!-- /top tiles -->
</div>
<!-- /page content -->

@endsection