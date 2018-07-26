@extends('layouts.app')

@section('content')
@include('layouts.header')
<div class="nk-main">
    <div class="nk-gap-2"></div>
	<div class="container">
		<div id="app">
		@include('layouts.banner')
		<div class="nk-gap-2"></div>
    	 <div class="row vertical-gap">
			<div class="col-lg-8">
				<div class="nk-box-2 bg-dark-2" style="height: auto; color: white;">
					<form class="nk-form" method="post">
						@csrf
						<div class="row">
							<div class="col-lg-12">
								<div class="form-group">
									<label>Trade Url</label>
									<input type="text" name="tradeurl" class="form-control" placeholder="Trade Url">

								</div>
								<div class="form-group">
									<label>Email</label>
									<input type="email" name="email" class="form-control" placeholder="Email">

								</div>
							</div>
						</div>
					</form>

				</div>
			
			</div><!-- col-8 -->
			<div class="col-lg-4">
				@include('layouts.sidebar')
			</div>
    	 </div>
		
		 <div class="nk-gap-4"></div>
		 
		</div>
	</div>
	@include('layouts.footer')	
	@include('layouts.login-modal')
</div>

@include('layouts.scripts')
<script src="{{asset('js/app.js')}}"></script>
<script type="text/javascript">
	var app = new Vue({
		el:"#app"
	});
</script>
@endsection 