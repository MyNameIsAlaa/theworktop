@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))




@section('content')

@include('frontend.includes.header')

<!-- Content
            ============================================= -->
<section id="content">

    <div id="catalog_page" class="content-wrap notoppadding clearfix">
        <div class="row">
            <div class="col-md-12 p-4">
                Home / Catalog / {{$catalog[0]->material_name}} / {{$catalog[0]->brightness_title}}
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">

                <div class="main_image">
                    <img src="{{$catalog[0]->picture_url}}" onerror="this.src='https://placeimg.com/640/480/tech?{{$catalog[0]->id}}'">
                </div>


            </div>
            <div class="col-md-7">
                <div class="row">
                    <div class="col-md-9">
                        <h2>{{$catalog[0]->catalog_name}}</h2>

                        <table class="table">
                            <tbody>
                                <tr>
                                    <td scope="row">Material</td>
                                    <td>{{$catalog[0]->material_name}}</td>
                                </tr>
                                <tr>
                                    <td scope="row">Colors</td>
                                    <td>
                                        @foreach($colors as $color)
                                        {{$color->color_name}},
                                        @endforeach
                                    </td>
                                </tr>
                            </tbody>
                        </table>


    <div class="btnwrap">
        <div id="add_btn_{{$catalog[0]->id}}" class="addtocard addtocardbtn" tag="{{$catalog[0]->id}}">
            <i class="far fa-plus-square"></i>
            Add To Quote
        </div>
        <div id="done_btn_{{$catalog[0]->id}}" class="addtocardbtn_done" tag="{{$catalog[0]->id}}">
            <i class="far fa-check-square"></i>
            Added To Quote
        </div>
        <div class="fav_btn" tag="{{$catalog[0]->id}}">
            <i class="fa fa-heart"></i>
            Add To Favorite
        </div>

    </div>



                    </div>
                </div>
            </div>
        </div>

    </div>

</section><!-- #content end -->

@if($inCart)
  <script>
  document.getElementById("add_btn_{{$catalog[0]->id}}").style.display = 'none';
  document.getElementById("done_btn_{{$catalog[0]->id}}").style.display = 'inline-block';
  </script>
@endif

@endsection