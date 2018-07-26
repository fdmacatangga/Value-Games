<header class="nk-header nk-header-opaque">



<!-- START: Top Contacts -->
<div class="nk-contacts-top">
    <div class="container">
        <div class="nk-contacts-left" style="margin-top: 10px;">
            <ul class="nk-social-links">
                
                <li><a class="nk-social-twitch" href="#"><span class="fa fa-twitch"></span></a></li>
                <li><a class="nk-social-steam" href="#"><span class="fa fa-steam"></span></a></li>
                <li><a class="nk-social-facebook" href="#"><span class="fa fa-facebook"></span></a></li>
                <li><a class="nk-social-google-plus" href="#"><span class="fa fa-google-plus"></span></a></li>
                <li><a class="nk-social-twitter" href="#" target="_blank"><span class="fa fa-twitter"></span></a></li>

            </ul>
        </div>
        <div class="nk-contacts-right">
            <ul class="nk-contacts-icons">


                <li>
                    @if(Auth::check())
                        @if(Auth::user()->steam_id)
                           <img src="{{Auth::user()->avatar}}" style="border-radius: 50%; height: 35px; vertical-align: middle; border:yellow 2px solid;"> <a href="#" style="font-size:14px;"><b style="margin-left: 5px; margin-right: 10px; vertical-align: middle; ">{{Auth::user()->personaname}}</b></a>
                        @else
                            @if(Auth::user()->provider!='normal' && Auth::user()->provider!='')  
                                <img src="{{Auth::user()->avatar}}" style="border-radius: 50%; height: 35px; vertical-align: middle; border:yellow 2px solid;"> 
                                <span style="vertical-align: middle; font-size:14px;">                                
                                        {{Auth::user()->personaname}}                                
                                </span>
                            @else
                                <img src="/assets/images/male.png" style="border-radius: 50%; height: 35px; vertical-align: middle; border:yellow 2px solid;"> 
                                <span style="vertical-align: middle; font-size:14px;">                                
                                        {{Auth::user()->useraname}}                                
                                </span>
                            @endif
                        @endif
                    @else
                            <a href="#" data-toggle="modal" data-target="#modalLogin">
                                <span class="fa fa-user"></span>
                            </a>
                    @endif
                </li>


            </ul>
        </div>
    </div>
</div>
<!-- END: Top Contacts -->


    <!--
        START: Navbar

        Additional Classes:
            .nk-navbar-sticky
            .nk-navbar-transparent
            .nk-navbar-autohide
    -->
    <!-- <nav class="nk-navbar nk-navbar-top nk-navbar-sticky nk-navbar-autohide"> -->
    <nav class="nk-navbar nk-navbar-top  nk-navbar-autohide">
        <div class="container">
            <div class="nk-nav-table">

                <a href="/" class="nk-nav-logo">
                    <img src="/assets/images/vg.png" alt="GoodGames" width="199">
                </a>

                <ul class="nk-nav nk-nav-right d-none d-lg-table-cell" data-nav-mobile="#nk-nav-mobile">
        <li> <a href="/">Home</a></li>
        <li class=" nk-drop-item">
            <a href="/match-list">
                Matches

            </a>
            <ul class="dropdown">

                    <li>
                        <a href="/match-list">
                            All Matches

                        </a>
                    </li>
                    <li >
                        <a href="/match-list/dota">
                            Dota
                        </a>
                    </li>
                    <li >
                        <a href="/match-list/csgo">
                            CSGO
                        </a>
                    </li>
                    <li >
                        <a href="/match-list/sports">
                            Sports
                        </a>
                    </li>

            </ul>
        </li>

        <li>
            <a href="/market">
                Market

            </a>
        </li>

        <li>
            <a href="/trades">Trades</a>
        </li>
        
        <li class=" nk-drop-item">
            <a href="/profile/my-account">
                My Account

            </a>
            <ul class="dropdown">

                    <li>
                        <a href="/my-backpack">
                            Backpack

                        </a>
                    </li>
                    <li>
                        <a href="/steam-inventory">
                            Steam Inventory

                        </a>
                    </li>
                    <li >
                        <a href="/my-predictions">
                            My Predictions
                        </a>
                    </li>
                    <li >
                        <a href="/my-trades">
                            My Trades
                        </a>
                    </li>
                    <li >
                        <a href="/my-settings">
                            My Settings
                        </a>
                    </li>

        </ul>
        </li>
        @if(!Auth::check())
        <li class=" nk-drop-item">
            <a href="#">
                Sign Up / Sign In

            </a>
            <ul class="dropdown">

                        <li>
                            <a href="/login">Sign In</a>
                        </li>            
                        <li>
                            <a href="/signup">Sign Up</a>
                        </li>
                        

            </ul>
        </li>
        
        @else
        <li>
            <a href="/signout">Sign Out</a>
        </li>
        @endif
</ul>
                <ul class="nk-nav nk-nav-right nk-nav-icons">

                        <li class="single-icon d-lg-none">
                            <a href="#" class="no-link-effect" data-nav-toggle="#nk-nav-mobile">
                                <span class="nk-icon-burger">
                                    <span class="nk-t-1"></span>
                                    <span class="nk-t-2"></span>
                                    <span class="nk-t-3"></span>
                                </span>
                            </a>
                        </li>


                </ul>
            </div>
        </div>
    </nav>
    <!-- END: Navbar -->

</header>
<div id="nk-nav-mobile" class="nk-navbar nk-navbar-side nk-navbar-right-side nk-navbar-overlay-content d-lg-none">
    <div class="nano">
        <div class="nano-content">
            <a href="/" class="nk-nav-logo">
                <img src="/assets/images/logo.png" alt="" width="120">
            </a>
            <div class="nk-navbar-mobile-content">
                <ul class="nk-nav">
                    <!-- Here will be inserted menu from [data-mobile-menu="#nk-nav-mobile"] -->
                </ul>
            </div>
        </div>
    </div>
</div>