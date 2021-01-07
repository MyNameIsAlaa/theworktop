@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <strong>Create new catalog:</strong>
            </div>
            <!--card-header-->
            <div class="card-body">
                <form action="{{route('admin.catalogs.create')}}" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Catalog Name:</label>
                        <input name="catalog_name" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Catalog Picture:</label>
                        <input id="picture" name="picture" type="file" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="Colors">Colors:</label>
                        <div class="form-control">
                            <div class="form-check form-check-inline">
                                @foreach ($colors as $color)
                                   <label class="form-check-label pr-4">
                                   <input  name="colors[]" class="form-check-input" type="checkbox" value="{{$color->id}}">
                                {{$color->color_name}}
                                  </label>
                                @endforeach
                        </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Material:</label>
                        <select class="form-control" name="material[]">
                           @foreach ($materials as $material)
                        <option value="{{$material->id}}">{{$material->material_name}}</option>
                           @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Wholesaler:</label>
                        <select class="form-control" name="wholesaler_id">
                             @foreach ($wholesalers as $wh)
                              <option value="{{$wh->id}}">{{$wh->wholesaler_name}}</option>
                             @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Brightness:</label>
                        <select class="form-control" name="brightness_id">
                             @foreach ($brightnesses as $br)
                            <option value="{{$br->id}}">{{$br->brightness_title}}</option>
                             @endforeach
                        </select>
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