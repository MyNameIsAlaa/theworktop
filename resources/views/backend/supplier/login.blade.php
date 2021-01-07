@extends('frontend.layouts.app')


@section('content')
@include('frontend.includes.header')


    <section id="content">

			<div class="content-wrap">

				<div class="container clearfix">
                    <div class="col">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                    <div>{{$error}}</div>
                                @endforeach
                            </div>
                             @endif

                    </div>
                    <div class="col_one_third">
                            <form id="login-form" name="login-form" class="nobottommargin" action="<?php echo url('/supplier/login') ?>" method="post">
                                @csrf
                            <div class="row">
                                <h3>Login</h3>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="email">E-mail:</label>
                                        <input class="form-control" type="text" name="email">
                                    </div><!--form-group-->
                                </div><!--col-->
                            </div><!--row-->

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="password">Password:</label>
                                        <input class="form-control" type="password" name="password">
                                    </div><!--form-group-->
                                </div><!--col-->
                            </div><!--row-->

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <div class="checkbox">

                                        </div>
                                    </div><!--form-group-->
                                </div><!--col-->
                            </div><!--row-->

                            <div class="row">
                                <div class="col">
                                    <div class="form-group clearfix">
                                            <button class="button button-3d nomargin" id="register-form-submit" name="register-form-submit" value="register">Login</button>
                                    </div><!--form-group-->
                                </div><!--col-->
                            </div><!--row-->

                            <div class="row">
                                <div class="col">
                                    <div class="form-group text-right">
                                        <a href="{{ route('frontend.auth.password.reset') }}">@lang('labels.frontend.passwords.forgot_password')</a>
                                    </div><!--form-group-->
                                </div><!--col-->
                            </div><!--row-->
                        </form>

                    </div>

					<div class="col_two_third col_last nobottommargin">


						<h3>Don't have an Account? Register Now.</h3>




                        <form id="register-form" name="register-form" class="nobottommargin" action="<?php echo url('/supplier/signup') ?>" method="post">


                            @csrf

							<div class="col_half">
								<label for="register-form-first-name">First Name:</label>
								<input type="text" id="firstname" name="firstname" class="form-control" />
							</div>

							<div class="col_half col_last">
								<label for="register-form-last-name">Last Name:</label>
								<input type="text" id="lastname" name="lastname" class="form-control" />
							</div>

							<div class="clear"></div>

							<div class="col_half">
								<label for="email">E-mail:</label>
								<input type="text" id="email" name="email" class="form-control" />
							</div>

							<div class="col_half col_last">
								<label for="phone">Phone:</label>
								<input type="text" id="phone" name="phone" value="" class="form-control" />
							</div>

							<div class="clear"></div>

							<div class="col_half">
								<label for="password">Choose Password:</label>
								<input type="password" id="password" name="password" value="" class="form-control" />
							</div>

							<div class="col_half col_last">
								<label for="password">Re-enter Password:</label>
								<input type="password" id="confirm_password" name="confirm_password" value="" class="form-control" />
							</div>

							<div class="clear"></div>

							<div class="col_full nobottommargin">
								<button class="button button-3d nomargin" id="register-form-submit" name="register-form-submit" value="register">Register Now</button>
							</div>

						</form>

					</div>

				</div>

			</div>

		</section><!-- #content end -->


@endsection

