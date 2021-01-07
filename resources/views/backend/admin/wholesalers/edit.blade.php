@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <strong>@lang('strings.backend.dashboard.welcome')</strong>
            </div>
            <!--card-header-->
            <div class="card-body">
            <form action="{{ url('admin/wholesalers/edit/' . $wholesaler->id )}}" method="POST">
                    <div class="form-group">
                        <label for="">Wholesaler Name:</label>
                    <input name="wholesaler_name" type="text" class="form-control" 
                    value="{{ $wholesaler->wholesaler_name }}">
                    </div>
                    <div class="form-group">
                        @csrf
                        <input class="btn btn-primary" type="submit" value="Save">
                    </div>
                </form>
            </div>
        </div>
        <!--card-body-->
    </div>
    <!--card-->
</div>
<!--col-->
</div>
<!--row-->
@endsection