@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))




@section('content')

@include('frontend.includes.header')
@include('frontend.includes.slider')


            <!-- Content
            ============================================= -->
            <section id="content">

                    <div class="content-wrap notoppadding clearfix">

                        <div class="section nobg gray">
                            <div class="container">
                                 <div class="row center">
                                     <div class="col-4">
                                         <img src="{{ asset('/img/frontend/icon-bulb.png') }}">
                                         <h2>dream</h2>
                                         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse, quae quasi, necessitatibus facilis, vel nemo ipsum ipsam dolor blanditiis voluptate repellat odio obcaecati nulla nam illo quos facere tempore itaque.</p>
                                     </div>
                                     <div  class="col-4">
                                         <img src="{{ asset('/img/frontend/icon-calender.png') }}">
                                         <h2>select</h2>
                                         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse, quae quasi, necessitatibus facilis, vel nemo ipsum ipsam dolor blanditiis voluptate repellat odio obcaecati nulla nam illo quos facere tempore itaque.</p>
                                     </div>
                                     <div class="col-4">
                                         <img src="{{ asset('/img/frontend/icon-home.png') }}">
                                         <h2>reality</h2>
                                         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse, quae quasi, necessitatibus facilis, vel nemo ipsum ipsam dolor blanditiis voluptate repellat odio obcaecati nulla nam illo quos facere tempore itaque.</p>
                                     </div>
                                 </div>
                            </div>
                        </div>

                        <div class="section nobg">
                            <div class="container">
                                <div class="row">
                                    <div class="col-7 center">
                                        <img src="{{ asset('/img/frontend/image01.jpg') }}" alt="">
                                        <h2>Choosing The Perfect WorkTop</h2>
                                        <p class="font-italic">Explorer our expert advice</p>
                                    </div>
                                    <div class="col-5">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="banner center">
                                                    <h2>Our Warranty Promise</h2>
                                                    <p class="font-italic">Explorer our signture stone collection. Explorer our signture stone collection. Explorer our signture stone collection.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 center">
                                                    <img src="{{ asset('/img/frontend/image02.jpg') }}" alt="">
                                                    <h2>Inspiration by Qitchens</h2>
                                                    <p class="font-italic">Explorer our signture stone collection.</p>
                                            </div>
                                        </div>
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


