<aside class="nk-sidebar nk-sidebar-right nk-sidebar-sticky">
              
@if(Auth::check())
<?php
   $prediction = \App\Prediction::with(['match.getTeam1','user'])->where('user_id',Auth::user()->id)->latest()->first();
   $p = \App\User::where('id',Auth::user()->id)->get(['points'])->first();
?>
@if($prediction)
<table class="nk-table">
    <thead>
        <tr>
            <th colspan="2">Account Details</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>Points</th>
            <th>Latest Active Predictions </th>
            
        </tr>
        <tr>
            <td class="text-center"><strong>{{$p->points}}</strong></td>
            <td>{{$prediction->match->getTeam1->name}} vs {{$prediction->match->getTeam2->name}}</td>
            
        </tr>
        
    </tbody>
</table>
<div class="nk-gap"></div>
@endif
@endif
{{-- <div class="nk-widget nk-widget-highlighted">
    <h4 class="nk-widget-title"><span><span class="text-main-1">Top 3</span> Recent</span></h4>
    <div class="nk-widget-content">

            <div class="nk-widget-post">
                <a href="blog-article.php" class="nk-post-image">
                    <img src="/assets/images/post-1-sm.jpg" alt="">
                </a>
                <h3 class="nk-post-title"><a href="blog-article.php">Smell magic in the air. Or maybe barbecue</a></h3>
                <div class="nk-post-date"><span class="fa fa-calendar"></span> Sep 18, 2018</div>
            </div>

            <div class="nk-widget-post">
                <a href="blog-article.php" class="nk-post-image">
                    <img src="/assets/images/post-2-sm.jpg" alt="">
                </a>
                <h3 class="nk-post-title"><a href="blog-article.php">Grab your sword and fight the Horde</a></h3>
                <div class="nk-post-date"><span class="fa fa-calendar"></span> Sep 5, 2018</div>
            </div>

            <div class="nk-widget-post">
                <a href="blog-article.php" class="nk-post-image">
                    <img src="/assets/images/post-3-sm.jpg" alt="">
                </a>
                <h3 class="nk-post-title"><a href="blog-article.php">We found a witch! May we burn her?</a></h3>
                <div class="nk-post-date"><span class="fa fa-calendar"></span> Aug 27, 2018</div>
            </div>

    </div>
</div> --}}

<div class="nk-widget nk-widget-highlighted">
    <h4 class="nk-widget-title"><span><span class="text-main-1">Next</span> Matches</span></h4>
    <div class="nk-widget-content">
        <div class="nk-widget-match">
            <a href="#">
                <span class="nk-widget-match-left">
                    <span class="nk-widget-match-teams">
                        <span class="nk-widget-match-team-logo">
                            <img src="/assets/images/team-1.jpg" alt="">
                        </span>
                        <span class="nk-widget-match-vs">VS</span>
                        <span class="nk-widget-match-team-logo">
                            <img src="/assets/images/team-2.jpg" alt="">
                        </span>
                    </span>
                    <span class="nk-widget-match-date">CS:GO - Apr 28, 2018 8:00 pm</span>
                </span>
                <span class="nk-widget-match-right">
                    <span class="nk-match-score">
                        Upcoming
                    </span>
                </span>
            </a>
        </div>

        <div class="nk-widget-match">
            <a href="#">
                <span class="nk-widget-match-left">
                    <span class="nk-widget-match-teams">
                        <span class="nk-widget-match-team-logo">
                            <img src="/assets/images/team-3.jpg" alt="">
                        </span>
                        <span class="nk-widget-match-vs">VS</span>
                        <span class="nk-widget-match-team-logo">
                            <img src="/assets/images/team-2.jpg" alt="">
                        </span>
                    </span>
                    <span class="nk-widget-match-date">LoL - Apr 24, 2018 7:20 pm</span>
                </span>
                <span class="nk-widget-match-right">
                    <span class="nk-match-score">
                        Upcoming
                    </span>
                </span>
            </a>
        </div>

        <div class="nk-widget-match">
            <a href="#">
                <span class="nk-widget-match-left">
                    <span class="nk-widget-match-teams">
                        <span class="nk-widget-match-team-logo">
                            <img src="/assets/images/team-1.jpg" alt="">
                        </span>
                        <span class="nk-widget-match-vs">VS</span>
                        <span class="nk-widget-match-team-logo">
                            <img src="/assets/images/team-4.jpg" alt="">
                        </span>
                    </span>
                    <span class="nk-widget-match-date">Dota 2 - Apr 12, 2018 6:40 pm</span>
                </span>
                <span class="nk-widget-match-right">
                    <span class="nk-match-score bg-dark-1">
                        0 : 0
                    </span>
                </span>
            </a>
        </div>
    </div>
</div>


            </aside>