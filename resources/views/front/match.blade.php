@extends('layouts.app')

@section('content')
@include('layouts.header')
<style type="text/css">
.check{
    opacity:1;
	color:yellow;
	border: 3px solid yellow;
	border-radius: 5px;
}
.box{
    margin-bottom:5px;
}
.arrow-down {
  width: 0; 
  height: 0; 
  border-left: 20px solid transparent;
  border-right: 20px solid transparent;
  
  border-top: 20px solid #f00;
}


.btn-team { 
    position: relative; min-width: 167px; padding: 8px 15px; border:none;
    border-radius: 3px; color: white; transition: all .3s; box-shadow: none;
    font-size: 12px;
}
.btn-team.left { background-color: #2E778A !important; }
.btn-team.left:hover, 
.btn-team.left.active { background-color: #14b9d5; color: white; box-shadow: none; }
.btn-team.left.active:after { 
    position: absolute; left: 50%; bottom: -14px; margin-left: -7px;
    content: ''; border: 7px solid transparent; border-top: 7px solid #14b9d5;
}
.btn-team.right { background-color: #863a3d; }
.btn-team.right:hover, 
.btn-team.right.active { background-color: #a74044; color: white; box-shadow: none; }
.btn-team.right.active:after {
    position: absolute; left: 50%; bottom: -14px; margin-left: -7px;
    content: ''; border: 7px solid transparent; border-top: 7px solid #a74044;  
}
</style>
<div id="app">
<div class="nk-main">
    <div class="nk-gap-2"></div>
	<div class="container">
		<div class="nk-gap-2"></div>
    	 <div class="row vertical-gap"> 	 	
    	 	<div class="container">
			    <ul class="nk-breadcrumbs">  
			        <li><a href="/">Home</a></li>		        
			        <li><span class="fa fa-angle-right"></span></li>			     
			        <li><span>Tournaments </span></li>			        
			    </ul>
			</div>
			
			<div class="col-lg-8">
				<div class="nk-match">
	                <div class="nk-match-team-left">
	                    <a href="#">
	                        <span class="nk-match-team-logo">
	                            <img src="/assets/images/teams/<?= $team1->logo ?>" alt="">
	                        </span>
	                        <span class="nk-match-team-name">
	                            <?= $team1->alias ?>
	                        </span>
	                    </a>
	                </div>
	                <div class="nk-match-status">
	                    <a href="#">
	                        <span class="nk-match-status-vs">VS</span>
	                        <span class="nk-match-score bg-dark-1">LIVE</span>
	                    </a>
	                </div>
	                <div class="nk-match-team-right">
	                    <a href="#">
	                        <span class="nk-match-team-name">
	                            <?= $team2->alias ?>
	                        </span>
	                        <span class="nk-match-team-logo">
	                            <img src="/assets/images/teams/<?= $team2->logo ?>" alt="">
	                        </span>
	                    </a>
	                </div>
	            </div>
	            <div class="nk-gap"></div>
				<div class="nk-tabs">
					 <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="#tabs-1-1" role="tab" data-toggle="tab">Match Winner</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tabs-1-2" role="tab" data-toggle="tab">Game 1 Winner</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tabs-1-3" role="tab" data-toggle="tab">First 10 Kills (Game 1)</a>
                        </li>
                         <li class="nav-item">
                            <a class="nav-link" href="#tabs-1-4" role="tab" data-toggle="tab">Game 2 Winner</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tabs-1-5" role="tab" data-toggle="tab">First 10 Kills (Game 2)</a>
                        </li>
                    </ul>
				</div>
	            <div class="responsive-embed responsive-embed-16x9" v-if="stream == 1">
	                <iframe src="{{$m->stream}}" frameborder="0" allowfullscreen="true" scrolling="no" height="378" width="620"></iframe>
	            </div>

	             <div class="nk-gap"></div>
		            <div class="nk-post-share">
		                <span class="h5">{{$m->event_name}}:</span>

		                <ul class="nk-social-links-2">
		                    <li><span class="nk-social-facebook" title="Share page on Facebook" data-share="facebook"><span class="fa fa-facebook"></span></span></li>
		                    <li><span class="nk-social-twitter" title="Share page on Twitter" data-share="twitter"><span class="fa fa-twitter"></span></span></li>
		
		                </ul>
		            </div>
		            <form method="post" action="/match/post">
		            <div class="nk-box-2 bg-dark-2" style="height: auto;">
						
							@csrf
							<input type="hidden" id="match_id" name="match_id" value="{{$m->id}}">
							<input type="hidden" id="m-team-id" name="team_id" value="0">
							<div class="row"> 
								<div class="col-lg-12">
								<div class="text-center">
										
										  <div class="form-group">	
											
											 <div class="row">
												<div class="col-lg-12">
													<div class="btn btn-team left  ib mr10" v-on:click="showStash(<?= $m->team1_odds ?>)" team-id="{{$team1->id}}" id="left" left="" global-sso-target="team">{{$team1->name}}（{{number_format($m->team1_odds,2)}}）</div>
													
													<div class="btn btn-team right ib" v-on:click="showStash(<?= $m->team2_odds ?>)" team-id="{{$team2->id}}" id="right" right="" global-sso-target="team">{{$team2->name}}（{{number_format($m->team2_odds,2)}}）</div>
												</div>
											</div>
											</div>
											<div class="clearfix"></div>
								</div>
								</div>
							</div>
							
							
    
						
		            </div>
		            
		            <div class="nk-gap"></div>
		            
		            	@if(Auth::check())
		            		<div v-if="stash == 1">
			            		<div class="nk-post-share">
			                		<span class="h5">STASH</span>
			                	</div>
								<div class="nk-box-2 bg-dark-2" style="height: auto; color: white;">
									<p>Points: {{$points}}</p>
									<div class="row">
										<div class="col-lg-4">
											<div class="text-center" style="margin-bottom: 10px;">
											<button type="button" style="margin-left: 0px !important;" class="nk-btn nk-btn-rounded nk-btn-color-dark-3 nk-btn-hover-color-info chip" @click="setBetValue(10)" chip-price="10">10</button>&nbsp;
											<button type="button" class="nk-btn nk-btn-rounded nk-btn-color-dark-3 nk-btn-hover-color-info chip" @click="setBetValue(50)" chip-price="50">50</button>&nbsp;
											<button type="button" class="nk-btn nk-btn-rounded nk-btn-color-dark-3 nk-btn-hover-color-info chip" @click="setBetValue(100)" chip-price="100">100</button>&nbsp;
											</div>
										</div>
										<div class="col-lg-5">
											<input type="text" name="bet" id="bet" autocomplete="off" style="display: inline; margin-bottom: 10px;" @keyup="getPv()" v-on:keypress="isNumber(event)" class="form-control" v-model="bet_value">								
										</div>
										<div class="col-lg-3">
											<div class="text-center">
												<button class="nk-btn nk-btn-outline nk-btn-color-success" style="display: inline;">Predict</button>
												
											</div>
										</div>
										
									</div>
									<div class="row mt-5">
											<div class="col-lg-12" style="color:white;">
												<p>Potential Value: @{{pv}}</p>
											</div>
									</div>
								</div>
							</div>
						@else
							<div v-if="stash == 1">
								<div class="nk-post-share">
			                		<span class="h5">STASH</span>
			                	</div>
								<div class="nk-box-2 bg-dark-2" style="height: auto; color: white;" v-if="stash == 1">
									<div class="text-center"><h3><a href="/login">Login</a> please before predicting.</h2></div>
								</div>
							</div>
						@endif
		    </form>
		    <matches></matches>
			</div><!-- col-8 -->
			<div class="col-lg-4">
				@include('layouts.sidebar')
			</div>
    	 </div>
		
		 <div class="nk-gap-4"></div>
		 

	</div>
	@include('layouts.footer')	
	@include('layouts.login-modal')
</div>
</div>
@include('layouts.scripts')

<script type="text/javascript">
	$(document).ready(function(e){	
		$("#left").on("click",function(){
			$("#right").removeClass('active');
			$(this).addClass('active');
			bet = $("#bet").val();
			match_id = $("#match_id").val();
			team_id = $(this).attr('team-id');
			$('#m-team-id').val(team_id);
		});

		$("#right").on("click",function(){
			$("#left").removeClass('active');
			$(this).addClass('active');
			bet = $("#bet").val();
			match_id = $("#match_id").val();
			team_id = $(this).attr('team-id');
			$('#m-team-id').val(team_id);

		});

		
		

		
	});
	
</script>
<script src="{{asset('js/app.js')}}"></script>
<script type="text/javascript">
	var app  = new Vue({
		el:"#app",
		data: {
			stash: 0,
			stream: 0,
			bet_value: '',
			odds: 0,
			pv: 0
		},
		methods: {
			showStash(new_odds){
				this.stash = 1;
				this.odds = new_odds;
				this.getPv();
			},
			getPv(){
				var res = this.odds * this.bet_value;
				this.pv = res.toFixed(2);
			},
			setBetValue(val){
				this.bet_value = val;
				this.getPv();
			}, 
			isNumber(evt){
			  evt = (evt) ? evt : window.event;
		      var charCode = (evt.which) ? evt.which : evt.keyCode;
		      if ((charCode > 31 && (charCode < 48 || charCode > 57)) && charCode !== 46) {
		        evt.preventDefault();
		      } else {
		      	if (this.bet_value.includes('.')){
		      		if (charCode == 46){
		      			evt.preventDefault();
		      		}else{
		      			return true;
		      			
		      		}
		      		
		      	}else{
		        	return true;

		    	}
		      }
			}
		}
	});
</script>
@endsection