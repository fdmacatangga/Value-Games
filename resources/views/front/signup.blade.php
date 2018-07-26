@extends('layouts.app')

@section('content')
<div class="nk-main">
    <div class="nk-fullscreen-block">
	    
	    <div class="nk-fullscreen-block-middle">
	        <div class="container text-center">
	            <div class="row">
	                <div class="col-md-6 offset-md-3 col-lg-6 offset-lg-3">
	                	<div class="nk-box-2 bg-dark-2" >
	                    	<h3 class="mb-0"><span class="text-main-1">Sign</span> Up</h3>

			                <div class="nk-gap-1"></div>
			                <form method="post" action="/signup" class="nk-form text-white">
			                	@csrf
			                    <div class="row vertical-gap">
			                        <div class="col-md-6">
			                            Register account

			                            <div class="nk-gap"></div>
			                            <input type="text" value="" name="username" class=" form-control" placeholder="Username">

			                            <div class="nk-gap"></div>
			                            <input type="password" value="" name="password" class="required form-control" placeholder="Password">

			                            <div class="nk-gap"></div>
			                            <input type="password" value="" name="password2" class="required form-control" placeholder="Confirm Password">
			                        </div>
			                        <div class="col-md-6">
			                            Or social account:

			                            <div class="nk-gap"></div>
										<div class="text-center">
				                            <ul class="nk-social-links-2 nk-social-links-center" style="text-align: center !important;">
				                                <li><a class="nk-social-facebook" href="#"><span class="fa fa-facebook"></span></a></li>
				                                <li><a class="nk-social-google-plus" href="#"><span class="fa fa-google-plus"></span></a></li>
				                                <li><a class="nk-social-steam" href="/auth/steam"><span class="fa fa-steam"></span></a></li>
				                            </ul>
			                        	</div>
			                        </div>
			                    </div>

			                    <div class="nk-gap-1"></div>
			                    <div class="row vertical-gap">
			                        <div class="col-md-6">
			                            <button type="submit" class="nk-btn nk-btn-rounded nk-btn-color-white nk-btn-block">	Sign Up
			                            </button>
			                        </div>
			                        <div class="col-md-6">
			                            <div class="mnt-5">
			                                <small><a href="#">Forgot your password?</a></small>
			                            </div>
			                            <div class="mnt-5">
			                                <small><a href="#">Not a member? Sign up</a></small>
			                            </div>
			                        </div>
			                    </div>
			                </form>
	                	</div>
	                </div>
	            </div>
	            <div class="nk-gap-3"></div>
	        </div>
	    </div>
	    
	</div>
</div>
<div class="nk-page-background-fixed" style="background-image: url('/assets/images/bg-fixed-3.jpg');"></div>
@include('layouts.scripts')
@endsection