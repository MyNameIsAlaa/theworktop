@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    ID#{{$quote->id}}
                </div><!--card-header-->
                <div class="card-body">
                   <div class="row">
                       <div class="col-4"><b>Username:</b></div>
                       <div class="col-6">{{$quote->user->email}}</div>
                   </div>
                   <div class="row">
                        <div class="col-4"><b>Date Posted:</b></div>
                        <div class="col-8">{{ $quote->created_at }}</div>
                    </div>
                    <div class="row">
                         <div class="col-4"><b>materials:</b></div>
                         <div class="col-8">
                             @foreach($quote->materials as $material)
                               {{$material->material_name}},
                             @endforeach
                        </div>
                    </div>
                    <div class="row">
                            <div class="col-4"><b>Catalogs:</b></div>
                            <div class="col-8">
                                @foreach($quote->catalogs as $catalog)
                                  {{$catalog->catalog_name}},
                                @endforeach
                           </div>
                       </div>
                    <div class="row">
                            <div class="col-4"><b>Shape:</b></div>
                            <div class="col-8">{{ $quote->shape }}</div>
                    </div>
                    <div class="row">
                         <div class="col-4"><b>Dimensions:</b></div>
                         <div class="col-8">
                              <table class="table">
                                  <thead>
                                      <tr>
                                          <th>Title</th>
                                          <th>Height</th>
                                          <th>Width</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                        @foreach($quote->dimensions as $dimensions)
                                            <tr>
                                                <td scope="row">{{$dimensions->title}}</td>
                                                <td>{{$dimensions->height}}</td>
                                                <td>{{$dimensions->width}}</td>
                                            </tr>
                                        @endforeach
                                  </tbody>
                              </table>
                         </div>
                    </div>

                    <a class="btn btn-primary btn-lg" href="{{ url()->previous() }}">Retrun</a>
                </div><!--card-body-->
            </div><!--card-->
        </div><!--col-->
    </div><!--row-->
@endsection
