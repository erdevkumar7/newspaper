@extends('admin.layout')

@section('page_content')

<!-- page content -->
<div class="right_col" role="main">
  <div class="row">
    <div class="col-md-4 col-sm-4">
      <div class="x_panel tile fixed_height_200">
        <div class="x_title">
          <h2>Total Users</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content tile_count">
          <div class=" tile_stats_count">
            <span class="count_top"><i class="fa fa-users"></i> Total Users</span>
            <div class="count green">{{$totalUsers}}</div>
            <span class="count_bottom"><i class="green">4% </i> From last Week</span>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-4 col-sm-4">
      <div class="x_panel tile fixed_height_200">
        <div class="x_title">
          <h2>Total News-paper</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content tile_count">
          <div class=" tile_stats_count">
            <span class="count_top"><i class="fa fa-sitemap"></i> Total News-paper</span>
            <div class="count green">1000</div>
            <span class="count_bottom"><i class="green">4% </i> From last Week</span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /top tiles -->
</div>
<!-- /page content -->

@endsection