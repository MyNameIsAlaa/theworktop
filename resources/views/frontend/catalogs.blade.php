@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))




@section('content')

@include('frontend.includes.header')

<!-- Content
            ============================================= -->
<section id="content">

    <div class="content-wrap notoppadding clearfix">



        <div class="section nobg">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div id="form_msg" class="alert alert-danger" style="display:none; width:100%">
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-12">


                        <ul class="matrials_list">
                            <li tag="all" class="@if(count($cart_materials) == 0) active @endif">All</li>
                            @foreach($materials as $material)
                            <li class="@if(in_array($material->id, $cart_materials)) active @endif" tag="{{$material->id}}">{{$material->material_name}}</li>
                         @endforeach
                        </ul>

                    <ul class="brightnesslist">
                         @foreach($brightnesses as $index=>$bightness)
                         <li class="@if($index==0) active @endif" tag="{{$bightness->id}}">{{$bightness->brightness_title}}</li>
                         @endforeach
                    </ul>
                                           
                    <div id="ajaxcatalogs"></div>
                    
                     

                    </div>
                </div>
            </div>
        </div>


    </div>

</section><!-- #content end -->

<div id="socialdialog_google" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p> Are you sure you don't want us to send you quotes to your e-mail address. You will receive 1 e-mail
                    after 1 day, 3 days and 7 days, after which your e-mail address is automatically unsubcribed from
                    alerts.</p>
            </div>
            <div class="modal-footer">
                <a onclick="showResults('google')" type="button" class="btn btn-primary">Continue</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
@endsection
