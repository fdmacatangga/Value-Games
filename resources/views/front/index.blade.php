@extends('layouts.app')

@section('content')
@include('layouts.header')
<div class="nk-main" id="app">
    <div class="nk-gap-2"></div>
	<div class="container">
		@include('layouts.banner')
		<div class="nk-gap-2"></div>
	    <div class="row vertical-gap">
	        <div class="col-lg-4">
	            <div class="nk-feature-1">
	                <div class="nk-feature-icon">
	                    <img src="/assets/images/category/dota2.png" style="height: 64px; width: 64px;" alt="">
	                </div>
	                <div class="nk-feature-cont">
	                    <h3 class="nk-feature-title"><a href="#">DOTA 2</a></h3>
	                    <h4 class="nk-feature-title text-main-1"><a href="#">View Games</a></h4>
	                </div>
	            </div>
	        </div>
	        <div class="col-lg-4">
	            <div class="nk-feature-1">
	                <div class="nk-feature-icon">
	                    <img src="/assets/images/category/csgo.png" style="height: auto; width: 250px;" alt="">
	                </div>
	                <div class="nk-feature-cont">
	                    <h3 class="nk-feature-title"><a href="#">CSGO</a></h3>
	                    <h4 class="nk-feature-title text-main-1"><a href="#">View Games</a></h4>
	                </div>
	            </div>
	        </div>
	        <div class="col-lg-4">
	            <div class="nk-feature-1">
	                <div class="nk-feature-icon">
	                    <img src="/assets/images/category/sports.png" style="height: 64px; width: 64px;" alt="">
	                </div>
	                <div class="nk-feature-cont">
	                    <h3 class="nk-feature-title"><a href="#">Sports</a></h3>
	                    <h4 class="nk-feature-title text-main-1"><a href="#">View Games</a></h4>
	                </div>
	            </div>
	        </div>
	    </div>

	     <div class="nk-gap-2"></div>
    	 <div class="row vertical-gap">
			<div class="col-lg-8">
				 <!-- START: Latest Matches -->
	            <div class="nk-gap-2"></div>
	            <h3 class="nk-decorated-h-2"><span><span class="text-main-1">Latest</span> Matches</span></h3>
	            <div class="nk-gap"></div>
	            <div class="row">
	                <div class="col-md-4">
	                    <div class="nk-match-score bg-dark-3">
	                        Now Playing
	                    </div>
	                    <div class="nk-gap-2"></div>
	                    <div class="nk-widget-match p-0">
	                        <div class="nk-widget-match-teams">
	                            <div class="nk-widget-match-team-logo">
	                                <img src="assets/images/team-1.jpg" alt="">
	                            </div>
	                            <div class="nk-widget-match-vs">VS</div>
	                            <div class="nk-widget-match-team-logo">
	                                <img src="assets/images/team-2.jpg" alt="">
	                            </div>
	                        </div>
	                    </div>
	                    <div class="nk-gap-2"></div>
	                    <p>As she said this she looked down at her hands and was surprised to see.</p>
	                    <a href="tournaments.php" class="nk-btn nk-btn-rounded nk-btn-color-main-1">Match Details</a>
	                </div>
	                <div class="col-md-8">
	                    <div class="responsive-embed responsive-embed-16x9">
	                        <iframe src="https://player.twitch.tv/?channel=womboxcombo&autoplay=false" frameborder="0" allowfullscreen="true" scrolling="no" height="378" width="620"></iframe>
	                    </div>
	                </div>
	            </div>
				<div class="nk-gap"></div>
				<?php //dd($matches); ?>
				@foreach($matches as $m)
				<?php
					$team1 = \App\Teams::where('id',$m->team1)->first();
					$team2 = \App\Teams::where('id',$m->team2)->first();
				?>
				<div @mouseover="hover(<?= $m->id ?>)" @mouseout="hover(<?= $m->id ?>)">
					<div class="nk-match mb10">
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
			                    <?php

			                    ?>
			                    <a href="/match/<?= $m['id']; ?>">
			                        <span class="nk-match-status-vs">VS</span>
			                        <span class="nk-match-status-date"><?= date('F j, Y, h:i ',strtotime($m->date)) ?></span>
			                        <span>
			                            <b><?= $m->event_name ?></b>
			                        </span>
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
			        <div class="submatches hidden" id="row<?= $m->id ?>" >
						<div class="row">
							<div class="col-lg-12">
								<div style="background-color: #1C5263; margin-bottom: 5px; margin-top: 5px; padding:5px; display: flex; justify-content: space-between;  align-items:center; color: #fff; font-weight: bold;">
									<div style="margin-left: 30px; vertical-align: middle; ">
										Team 1
									</div>
									<div>
										Match Winner
									</div>
									<div style="margin-right: 30px;">
										Team 2
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<div style="background-color: #1C5263; margin-bottom: 5px;  padding:5px; display: flex; justify-content: space-between;  align-items:center; color: #fff; font-weight: bold;">
									<div style="margin-left: 30px; vertical-align: middle; ">
										Team 1
									</div>
									<div>
										First 10 kills
									</div>
									<div style="margin-right: 30px;">
										Team 2
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				@endforeach
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
        
@include('layouts.scripts')
<script src="{{asset('js/app.js')}}"></script>
{{-- <script src="https://unpkg.com/vue@2.1.3/dist/vue.js"></script> --}}
<script type="text/javascript">
	var app = new Vue({
		el:"#app",
		data:{
			hide:true
		},
		methods:{
			hover(row){
				console.log(row);
				var x = document.getElementById("row"+row);
				if (this.hide == true){
					this.hide = false;
					x.classList.remove('hidden');
				}else{
					this.hide = true; 
					x.classList.add('hidden');
				}
			}
		}
	});
</script>
@endsection