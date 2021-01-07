@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                        <strong>@lang('strings.backend.quotes.title')</strong>

                </div><!--card-header-->
                <div class="card-body">

                        <table class="table table-responsive-sm">
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
                                  @foreach($quotes as $quote)

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
                                            <div class="btn-group" role="group" aria-label="quote actions">
                                            <a href="{{ url('/supplier/quotes/'.$quote->id)}}" class="btn btn-primary"><i class="icon-book-open"></i></a>
                                                <button class="btn btn-secondary" type="button"><i class="icon-star"></i></button>
                                                <button class="btn btn-secondary" type="button"><i class="icon-info"></i></button>
                                             </div>
                                        </td>
                                        </tr>
                                  @endforeach
                                </tbody>
                              </table>

                              {{ $quotes->links() }}


                </div><!--card-body-->
            </div><!--card-->
        </div><!--col-->
    </div><!--row-->
@endsection
