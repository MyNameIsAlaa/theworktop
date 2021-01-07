@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                   Quotes Statistics
                </div><!--card-header-->
                <div class="card-body">
                    <canvas id="canvas"></canvas>
                </div><!--card-body-->
            </div><!--card-->
        </div><!--col-->
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                   Latest 10 Quotes
                </div><!--card-header-->
                <div class="card-body">

                    <table class="table table table-responsive-sm table-sm">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>USER</th>
                            <th>Materials</th>
                            <th>Date Posted</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($latest_quotes as $quote)
                                <tr>
                                <td>{{ $quote->id }}</td>
                                  <td>{{ $quote->user->email }}</td>
                                  <td>
                                      @foreach($quote->materials as $material)
                                        {{ $material->material_name }},
                                      @endforeach
                                  </td>
                                <td>{{ $quote->created_at }}</td>
                                <td>
                                    <a href="{{ url('/supplier/quotes/'.$quote->id)}}" class="btn btn-primary"><i class="icon-book-open"></i></a>
                                </td>
                                </tr>
                          @endforeach
                        </tbody>
                      </table>
                </div><!--card-body-->
            </div><!--card-->
        </div>
    </div><!--row-->

    <style>
        canvas{
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
        }
        </style>
    <script>
		var config = {
            type: 'line',
			data: {
				labels: [ @foreach($quotes_chart as $data)
                       '{{ $data->date }}',
                        @endforeach],
				datasets: [{
					label: 'Quotes',
					fill: true,
					backgroundColor: "#688aff99",
					borderColor: "#2052ffcc",
					data: [
                        @foreach($quotes_chart as $data)
                        {{ $data->quotes }},
                        @endforeach
					],
				}]
			},
			options: {
				responsive: true,
				title: {
					display: true,
					text: 'Daily Quotes'
				},
				tooltips: {
					mode: 'index',
					intersect: false,
				},
				hover: {
					mode: 'nearest',
					intersect: true
				},
				scales: {
					xAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Day'
						}
					}],
					yAxes: [{
                        display: true,
						scaleLabel: {
							display: true,
                            labelString: 'Value',
                        },
                        ticks: {
                          beginAtZero:true,
                          stepSize: 1
                        }
					}]
				}
			}
		};

		window.onload = function() {
			var ctx = document.getElementById('canvas').getContext('2d');
			window.myLine = new Chart(ctx, config);
		};
	</script>
@endsection
