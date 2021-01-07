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


                            <form id="quoteForm">
                                <input type="hidden" id="CSRF" value="<?php echo csrf_token() ?>">

                                    <div id="step1" class="step_panel">
                                        <h2>Material:</h2>

                                        @foreach($materials as $material)
                                    <div class="mybutton matrial_btn @if(in_array($material->id, $cart_materials)) button_selected @endif" tag="{{$material->id}}"> <img src="{{$material->picture_url}}" onerror="this.src='{{ asset('img/frontend/form/MATRIAL_1.png') }}' "> <span>{{ $material->material_name }}</span></div>
                                        @endforeach
                                        <!-- 
                                        <div class="mybutton matrial_btn" tag="Quartz"> <img src="{{ asset('img/frontend/form/MATRIAL_1.png')}}"> <span>Quartz</span></div>

                                        <div class="mybutton matrial_btn" tag="Granite"> <img src="{{ asset('img/frontend/form/MATRIAL_2.png')}}"> <span>Granite</span></div>

                                        <div class="mybutton matrial_btn" tag="Marble"> <img src="{{ asset('img/frontend/form/MATRIAL_3.png')}}"> <span>Marble</span></div>

                                        <div class="mybutton matrial_btn" tag="Glass"> <img src="{{ asset('img/frontend/form/MATRIAL_3.png')}}"> <span>Glass</span></div>
                                        !-->
                                        <br><br>
                                        <button class="btn btn-dark" type="button" onclick="GoToStep(2)">
                                            Next Step
                                            <i class="fa fa-chevron-right"></i>
                                        </button>
                                    </div>

                                    <div id="step2" class="step_panel">
                                            <h2>Catalog</h2>

                                            <ul class="brightnesslist">
                                                 @foreach($brightnesses as $index=>$bightness)
                                                 <li class="@if($index==0) active @endif" tag="{{$bightness->id}}">{{$bightness->brightness_title}}</li>
                                                 @endforeach
                                            </ul>
                                           
                                            <div id="ajaxcatalogs"></div>
                                    
                                            <div class="btngroup">
                                                <button class="btn btn-dark" type="button" onclick="GoToStep(1)"><i class="fa fa-chevron-left"></i> Back</button>
                                            <button class="btn btn-dark" type="button" onclick="GoToStep(3)">Next Step
                                                <i class="fa fa-chevron-right"></i></button>
                                            </div>
                                    </div>

                                    <div id="step3" class="step_panel">

                                            <h2>Jobs:</h2>
                                            <button class="jobs_btn" type="button" tag="cutout">cutout</button>
                                            <button class="jobs_btn" type="button" tag="chopping board">chopping board</button>
                                            <button class="jobs_btn" type="button" tag="sink">sink</button>
                                            <button class="jobs_btn" type="button" tag="plug">plug</button>
                                            <br><br>

                                            <h2>Shape:</h2>




                                            <div class="mybutton shape_btn button_selected" onclick="select_shape('shape1', 1)"> <img src="{{ asset('img/frontend/form/A.png')}}"> <span>Shape 1</span></div>
                                            <div class="mybutton shape_btn" onclick="select_shape('shape2', 2)"> <img src="{{ asset('img/frontend/form/B.png')}}"> <span>Shape 2</span></div>
                                            <div class="mybutton shape_btn" onclick="select_shape('shape3', 3)"> <img src="{{ asset('img/frontend/form/U-CUT.png')}}"> <span>Shape 3</span></div>
                                             <div class="mybutton shape_btn" onclick="select_shape('shape4', 4)"> <img src="{{ asset('img/frontend/form/L-CUT-ISLAND.png')}}"> <span>Shape 4</span></div>

                                             <div class="form-group form-check">
                                                <input type="checkbox" class="form-check-input" id="nodimcheck">
                                                <label class="form-check-label">I don't have measurements yet</label>
                                              </div>



                                            <div id="dinputs" class="form-group">

                                                     <div class="row">
                                                         <div class="col">
                                                             <h3 class="text-center">A</h3>
                                                             <input id="title_0" value="A" type="hidden">
                                                            </div>
                                                         <div class="col-5">
                                                             <label id="label_width_0">Width: 0</label>
                                                             <input id="range_width_0" type="range" value="0" tag="0" class="custom-range range_width" min="1" max="5000">
                                                            </div>
                                                         <div class="col-5">
                                                             <label id="label_height_0">Height: 0</label>
                                                             <input id="range_height_0" type="range" value="0" tag="0" class="custom-range range_height" min="1" max="5000">
                                                            </div>
                                                     </div>

                                                <br>
                                            </div>

                                           <div class="btngroup">
                                                <button class="btn btn-dark" type="button" onclick="GoToStep(2)"><i class="fa fa-chevron-left"></i> Back</button>
                                            <button class="btn btn-dark" type="button" onclick="GoToStep(4)">Next Step
                                             <i class="fa fa-chevron-right"></i></button>
                                           </div>    



                                    </div>

                                    <div id="step4" class="step_panel">
                                            <p id="location">-</p>
                                            <br>
                                            @guest
                                            <div class="form-group">
                                                    <label for="Email">E-mail:</label>
                                                    <input id="email" class="form-control" type="text">
                                            </div>
                                            <div class="form-group">
                                                    <label for="Password">Password:</label>
                                                    <input id="password" class="form-control" type="password">
                                            </div>
                                            @endguest
                                            <div class="form-group">
                                                    <label>Additional Information:</label>
                                                    <textarea class="form-control" name="custom" id="custom" cols="100" rows="4"></textarea>
                                            </div>





                                            <br><br>



                                            <div class="form-group">
                                                <button class="btn btn-dark btn-block" type="button" onclick="showResults()">Get Quote</button>
                                            </div>
                                            <div class="form-group">
                                                <button data-toggle="modal" data-target="#socialdialog_facebook" class="btn btn-block btn-facebook" type="button"><i class="fab fa-facebook-f pull-left"></i>
                                                    SignUp With Facebook</button>
                                            </div>
                                            <div class="form-group">
                                                <button data-toggle="modal" data-target="#socialdialog_google" class="btn btn-block btn-google" type="button"><i class="fab fa-google pull-left"></i>
                                                    SignUp With Google</button>
                                            </div>

                                            <br><br>
                                            <button class="btn btn-dark" type="button" onclick="GoToStep(3)"><i class="fa fa-chevron-left"></i> Back</button>

                                    </div>

                                            <div id="result"></div>

                                        </form>

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
                              <p> Are you sure you don't want us to send you quotes to your e-mail address. You will receive 1 e-mail after 1 day, 3 days and 7 days, after which your e-mail address is automatically unsubcribed from alerts.</p>
                            </div>
                            <div class="modal-footer">
                              <a onclick="showResults('google')" type="button" class="btn btn-primary">Continue</a>
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            </div>
                          </div>
                        </div>
                      </div>
@endsection


