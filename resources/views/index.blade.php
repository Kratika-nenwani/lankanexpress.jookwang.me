@extends('index_main')
@section('csscontent')
    
@endsection
@section('content')
     <!-- HEADER -->
     <div class="header">
        <div class="container-fluid">

          <!-- Body -->
          <div class="header-body">
            <div class="row align-items-end">
              <div class="col">

                <!-- Pretitle -->
                <h6 class="header-pretitle">
                  Overview
                </h6>

                <!-- Title -->
                <h1 class="header-title">
                  Dashboard
                </h1>

              </div>
              <div class="col-auto">

                <!-- Button -->
                <!--<a href="#!" class="btn btn-primary lift">-->
                <!--  Create Report-->
                <!--</a>-->

              </div>
            </div> <!-- / .row -->
          </div> <!-- / .header-body -->

        </div>
      </div> <!-- / .header -->

      <!-- CARDS -->
      <div class="container-fluid">
        <!--<div class="row">-->
        <!--  <div class="col-12 col-lg-6 col-xl">-->

            <!-- Value  -->
        <!--    <div class="card">-->
        <!--      <div class="card-body">-->
        <!--        <div class="row align-items-center gx-0">-->
        <!--          <div class="col">-->

                    <!-- Title -->
        <!--            <h6 class="text-uppercase text-body-secondary mb-2">-->
        <!--              Value-->
        <!--            </h6>-->

                    <!-- Heading -->
        <!--            <span class="h2 mb-0">-->
        <!--              $24,500-->
        <!--            </span>-->

                    <!-- Badge -->
        <!--            <span class="badge text-bg-success-subtle mt-n1">-->
        <!--              +3.5%-->
        <!--            </span>-->
        <!--          </div>-->
        <!--          <div class="col-auto">-->

                    <!-- Icon -->
        <!--            <span class="h2 fe fe-dollar-sign text-body-secondary mb-0"></span>-->

        <!--          </div>-->
        <!--        </div>-->
                <!-- / .row -->
        <!--      </div>-->
        <!--    </div>-->

        <!--  </div>-->
        <!--  <div class="col-12 col-lg-6 col-xl">-->

            <!-- Hours -->
        <!--    <div class="card">-->
        <!--      <div class="card-body">-->
        <!--        <div class="row align-items-center gx-0">-->
        <!--          <div class="col">-->

                    <!-- Title -->
        <!--            <h6 class="text-uppercase text-body-secondary mb-2">-->
        <!--              Total hours-->
        <!--            </h6>-->

                    <!-- Heading -->
        <!--            <span class="h2 mb-0">-->
        <!--              763.5-->
        <!--            </span>-->

        <!--          </div>-->
        <!--          <div class="col-auto">-->

                    <!-- Icon -->
        <!--            <span class="h2 fe fe-briefcase text-body-secondary mb-0"></span>-->

        <!--          </div>-->
        <!--        </div> -->
                <!-- / .row -->
        <!--      </div>-->
        <!--    </div>-->

        <!--  </div>-->
        <!--  <div class="col-12 col-lg-6 col-xl">-->

            <!-- Exit -->
        <!--    <div class="card">-->
        <!--      <div class="card-body">-->
        <!--        <div class="row align-items-center gx-0">-->
        <!--          <div class="col">-->

                    <!-- Title -->
        <!--            <h6 class="text-uppercase text-body-secondary mb-2">-->
        <!--              Exit %-->
        <!--            </h6>-->

                    <!-- Heading -->
        <!--            <span class="h2 mb-0">-->
        <!--              35.5%-->
        <!--            </span>-->

        <!--          </div>-->
        <!--          <div class="col-auto">-->

                    <!-- Chart -->
        <!--            <div class="chart chart-sparkline">-->
        <!--              <canvas class="chart-canvas" id="sparklineChart"></canvas>-->
        <!--            </div>-->

        <!--          </div>-->
        <!--        </div> -->
                <!-- / .row -->
        <!--      </div>-->
        <!--    </div>-->

        <!--  </div>-->
        <!--  <div class="col-12 col-lg-6 col-xl">-->

            <!-- Time -->
        <!--    <div class="card">-->
        <!--      <div class="card-body">-->
        <!--        <div class="row align-items-center gx-0">-->
        <!--          <div class="col">-->

                    <!-- Title -->
        <!--            <h6 class="text-uppercase text-body-secondary mb-2">-->
        <!--              Avg. Time-->
        <!--            </h6>-->

                    <!-- Heading -->
        <!--            <span class="h2 mb-0">-->
        <!--              2:37-->
        <!--            </span>-->

        <!--          </div>-->
        <!--          <div class="col-auto">-->

                    <!-- Icon -->
        <!--            <span class="h2 fe fe-clock text-body-secondary mb-0"></span>-->

        <!--          </div>-->
        <!--        </div> -->
                <!-- / .row -->
        <!--      </div>-->
        <!--    </div>-->

        <!--  </div>-->
        <!--</div> -->
        <!-- / .row -->
        <!--<div class="row">-->
        <!--  <div class="col-12 col-xl-8">-->

            <!-- Convertions -->
        <!--    <div class="card">-->
        <!--      <div class="card-header">-->

                <!-- Title -->
        <!--        <h4 class="card-header-title">-->
        <!--          Conversions-->
        <!--        </h4>-->

                <!-- Caption -->
        <!--        <span class="text-body-secondary me-3">-->
        <!--          Last year comparision:-->
        <!--        </span>-->

                <!-- Switch -->
        <!--        <div class="form-check form-switch">-->
        <!--          <input class="form-check-input" type="checkbox" id="cardToggle" data-toggle="chart" data-target="#conversionsChart" data-trigger="change" data-action="add" data-dataset="1">-->
        <!--          <label class="form-check-label" for="cardToggle"></label>-->
        <!--        </div>-->

        <!--      </div>-->
        <!--      <div class="card-body">-->

                <!-- Chart -->
        <!--        <div class="chart">-->
        <!--          <canvas id="conversionsChart" class="chart-canvas"></canvas>-->
        <!--        </div>-->

        <!--      </div>-->
        <!--    </div>-->
        <!--  </div>-->
        <!--  <div class="col-12 col-xl-4">-->

            <!-- Traffic -->
        <!--    <div class="card">-->
        <!--      <div class="card-header">-->

                <!-- Title -->
        <!--        <h4 class="card-header-title">-->
        <!--          Traffic Channels-->
        <!--        </h4>-->

                <!-- Tabs -->
        <!--        <ul class="nav nav-tabs nav-tabs-sm card-header-tabs">-->
        <!--          <li class="nav-item" data-toggle="chart" data-target="#trafficChart" data-trigger="click" data-action="toggle" data-dataset="0">-->
        <!--            <a href="#" class="nav-link active" data-bs-toggle="tab">-->
        <!--              All-->
        <!--            </a>-->
        <!--          </li>-->
        <!--          <li class="nav-item" data-toggle="chart" data-target="#trafficChart" data-trigger="click" data-action="toggle" data-dataset="1">-->
        <!--            <a href="#" class="nav-link" data-bs-toggle="tab">-->
        <!--              Direct-->
        <!--            </a>-->
        <!--          </li>-->
        <!--        </ul>-->

        <!--      </div>-->
        <!--      <div class="card-body">-->

                <!-- Chart -->
        <!--        <div class="chart chart-appended">-->
        <!--          <canvas id="trafficChart" class="chart-canvas" data-toggle="legend" data-target="#trafficChartLegend"></canvas>-->
        <!--        </div>-->

                <!-- Legend -->
        <!--        <div id="trafficChartLegend" class="chart-legend"></div>-->

        <!--      </div>-->
        <!--    </div>-->
        <!--  </div>-->
        <!--</div> -->
        <!-- / .row -->
        
       
@endsection

@section('jscontent')
    
@endsection