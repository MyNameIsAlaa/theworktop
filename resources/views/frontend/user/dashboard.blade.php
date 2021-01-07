@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )

@section('content')


@include('frontend.includes.header')

                    <div class="row p-3">
                        <div class="col col-md-3 order-1 order-sm-2 ">
                            <div class="card mb-4 bg-light">
                                <img class="card-img-top" src="{{ $logged_in_user->picture }}" alt="Profile Picture">

                                <div class="card-body">
                                    <h4 class="card-title">
                                        {{ $logged_in_user->name }}<br/>
                                    </h4>

                                    <p class="card-text">
                                        <small>
                                            <i class="fas fa-envelope"></i> {{ $logged_in_user->email }}<br/>
                                            <i class="fas fa-calendar-check"></i> @lang('strings.frontend.general.joined') {{ timezone()->convertToLocal($logged_in_user->created_at, 'F jS, Y') }}
                                        </small>
                                    </p>

                                    <p class="card-text">

                                        <a href="{{ route('frontend.user.account')}}" class="btn btn-primary btn-sm mb-1">
                                            <i class="fas fa-user-circle"></i> @lang('navs.frontend.user.account')
                                        </a>

                                        @can('view backend')
                                            &nbsp;<a href="{{ route('admin.dashboard')}}" class="btn btn-danger btn-sm mb-1">
                                                <i class="fas fa-user-secret"></i> @lang('navs.frontend.user.administration')
                                            </a>
                                        @endcan
                                    </p>
                                </div>
                            </div>
                        </div><!--col-md-4-->

                        <div class="col-md-9 order-2 order-sm-1">
                            <div class="row">
                                <div class="col">
                                    <div class="card mb-4">

                                        <div class="card-header">
                                            Your Quotes
                                        </div><!--card-header-->

                                        <div class="card-body table-responsive">

                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>#ID</th>
                                                        <th>Shape</th>
                                                        <th>Custom</th>
                                                        <th>Date Created</th>
                                                        <th>Options</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                   @foreach ($quotes as $quote)
                                                    <tr>
                                                        <td scope="row">{{$quote->id}}</td>
                                                        <td>{{$quote->shape}}</td>
                                                        <td>{{$quote->custom}}</td>
                                                        <td>{{$quote->created_at}}</td>
                                                        <td><button class="btn btn-sm btn-primary btn-icon">
                                                            <i class="fa fa-file-invoice"></i> More Info</button></td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>

                                        </div><!--card-body-->
                                        <div class="card-footer">
                                                {{ $quotes->links() }}
                                        </div>
                                    </div><!--card-->
                                </div><!--col-md-6-->
                            </div><!--row-->



                        </div><!--col-md-8-->
                    </div><!-- row -->


@endsection
