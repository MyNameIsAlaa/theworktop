@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )

@section('content')


@include('frontend.includes.header')

                    <div class="row p-3">
                        <div class="col-md-9 order-2 order-sm-1">
                            <div class="row">
                                <div class="col">
                                    <div class="card mb-4">

                                        <div class="card-header">
                                            Your Favorites Materials
                                        </div><!--card-header-->

                                        <div class="card-body table-responsive">

                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>#ID</th>
                                                        <th>Image</th>
                                                        <th>Name</th>
                                                        <th>Options</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($favorites as $favorite)
                                                    <tr>
                                                    <td scope="row">{{$favorite->id}}</td>
                                                        <td>{{$favorite->catalog_name}}</td>
                                                        <td><img src="{{$favorite->picture_url}}" alt=""></td>
                                                    <td><a href="{{url('delete_favorite/' . $favorite->id )}}" class="btn btn-sm btn-danger btn-icon">
                                                            <i class="fa fa-trash-alt"></i> Delete</a></td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>

                                        </div><!--card-body-->
                                        <div class="card-footer">
                                                {{ $favorites->links() }}
                                        </div>
                                    </div><!--card-->
                                </div><!--col-md-6-->
                            </div><!--row-->



                        </div><!--col-md-8-->
                    </div><!-- row -->


@endsection
