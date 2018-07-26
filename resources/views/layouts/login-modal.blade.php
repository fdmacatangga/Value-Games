<div class="nk-modal modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="ion-android-close"></span>
                </button>

                <h4 class="mb-0"><span class="text-main-1">Sign</span> In</h4>

                <div class="nk-gap-1"></div>
                <form action="/login" method="post" class="nk-form text-white">
                    @csrf
                    <div class="row vertical-gap">
                        <div class="col-md-6">
                            Use username and password:

                            <div class="nk-gap"></div>
                            <input type="text" value="" name="username" class=" form-control" placeholder="Username">

                            <div class="nk-gap"></div>
                            <input type="password" value="" name="password" class="required form-control" placeholder="Password">
                        </div>
                        <div class="col-md-6">
                            Or social account:

                            <div class="nk-gap"></div>

                            <ul class="nk-social-links-2">
                                <li><a class="nk-social-facebook" href="#"><span class="fa fa-facebook"></span></a></li>
                                <li><a class="nk-social-twitter" href="/auth/twitter/login"><span class="fa fa-twitter"></span></a></li>
                                <li><a class="nk-social-steam" href="/auth/steam"><span class="fa fa-steam"></span></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="nk-gap-1"></div>
                    <div class="row vertical-gap">
                        <div class="col-md-6">
                            <button type="submit" class="nk-btn nk-btn-rounded nk-btn-color-white nk-btn-block">Sign In</button>
                        </div>
                        <div class="col-md-6">
                            <div class="mnt-5">
                                <small><a href="#">Forgot your password?</a></small>
                            </div>
                            <div class="mnt-5">
                                <small><a href="/signup">Not a member? Sign up</a></small>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>