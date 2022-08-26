@section('title', 'General Table')
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Your Points</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Your Points</li>
          <li class="breadcrumb-item active">General Table</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
{{--
    <div class="row">
      <div class="col-md-10 mx-auto">
        @foreach ($porSemana as $semana)
            <li>Semana{{$loop->index + 1}}</li><li>{{ $semana }}</li>
        @endforeach
      </div>
    </div>
--}}

{{--
    <!-- <script>
        var app = @json($array);
    </script>

    <script>
        var app = {{ Js::from($array) }};
    </script>

 -->
 --}}
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Points per week</h5>

              <!-- Line Chart -->
              <div id="lineChart"></div>

              <script>
                
                let porSemana = {{ Js::from($porSemana) }};

                document.addEventListener("DOMContentLoaded", () => {
                  new ApexCharts(document.querySelector("#lineChart"), {
                    series: [{
                      name: "Acumuled point",
                      data: porSemana[1],
                      // data: [10, 41, 35, 51,]
                    }],
                    chart: {
                      height: 350,
                      type: 'line',
                      zoom: {
                        enabled: false
                      }
                    },
                    dataLabels: {
                      enabled: false
                    },
                    stroke: {
                      curve: 'straight'
                    },
                    grid: {
                      row: {
                        colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                        opacity: 0.5
                      },
                    },
                    xaxis: {
                      categories: porSemana[0],
                      // categories: ['Sem1', 'Sem2', 'Sem3', 'Sem4'],
                    }
                  }).render();
                });
              </script>
              <!-- End Line Chart -->

            </div>
          </div>
        </div>

        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Points per day</h5>

              <!-- Area Chart -->
              <div id="areaChart"></div>

              <script>
                let porDia = {{ Js::from($porDia) }};
                document.addEventListener("DOMContentLoaded", () => {
                  const series = {
                    "monthDataSeries1": {
                      "prices": porDia[1],
                      "dates": porDia[0],
                    },
                  }
                  new ApexCharts(document.querySelector("#areaChart"), {
                    series: [{
                      name: "Acumuled point",
                      data: series.monthDataSeries1.prices
                    }],
                    chart: {
                      type: 'area',
                      height: 350,
                      zoom: {
                        enabled: false
                      }
                    },
                    dataLabels: {
                      enabled: false
                    },
                    stroke: {
                      curve: 'straight'
                    },
                    subtitle: {
                      text: 'Acumuled point',
                      align: 'left'
                    },
                    labels: series.monthDataSeries1.dates,
                    xaxis: {
                      type: 'datetime',
                    },
                    yaxis: {
                      opposite: true
                    },
                    legend: {
                      horizontalAlign: 'left'
                    }
                  }).render();
                });
              </script>
              <!-- End Area Chart -->

            </div>
          </div>
        </div>

    </section>
</main><!-- End #main -->