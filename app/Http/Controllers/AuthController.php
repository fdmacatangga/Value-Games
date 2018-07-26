<?php

namespace App\Http\Controllers;

use SteamServiceProvider;
use Invisnik\LaravelSteamAuth\SteamAuth;
use App\User;
use Auth;
use  Illuminate\Http\Request;
use Toastr;
use Socialite;
class AuthController extends Controller
{
    /**
     * The SteamAuth instance.
     *
     * @var SteamAuth
     */
    protected $steam;

    /**
     * The redirect URL.
     *
     * @var string
     */
    protected $redirectURL = '/';

    /**
     * AuthController constructor.
     * 
     * @param SteamAuth $steam
     */
    public function __construct(SteamAuth $steam)
    {
        $this->steam = $steam;
    }

    /**
     * Redirect the user to the authentication page
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function redirectToSteam()
    {
        return $this->steam->redirect();
    }

    /**
     * Get user info and log in
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function handle()
    {
        if ($this->steam->validate()) {
            $info = $this->steam->getUserInfo();

            if (!is_null($info)) {
                $user = $this->findOrNewUser($info);

                Auth::login($user, true);
                //dd($info);
                return redirect($this->redirectURL); // redirect to site
            }
        }
        return $this->redirectToSteam();
    }

    /**
     * Getting user by info or created if not exists
     *
     * @param $info
     * @return User
     */
    protected function findOrNewUser($info)
    {
        $user = User::where('steam_id', $info->steamID64)->first();

        if (!is_null($user)) {
            return $user;
        }

        $user = new User;
        $user->personaname = $info->personaname;
        $user->profileurl = $info->profileurl;
        $user->avatar_full = $info->avatarfull;
        $user->avatar = $info->avatar;
        $user->avatar_medium = $info->avatarmedium;
        $user->steam_id = $info->steamID64;
        $user->provider = 'steam';
        $user->status = 1;
        $user->save();
        return $user; 
    }

    public function login(){
        if (Auth::check()){
        	return redirect('/');
        }else{
        	return view('front.signin');
        }
    }

    public function logout(){
    	Auth::logout();
    	return redirect('/');
    }

    public function save(Request $request){
        $this->validate(request(),[
            'username' => 'required',
            'password' => 'required',
            'password2' => 'required'
        ]);
        $dated = date('Y-m-d h:i:s');
        // $user = User::create(request(['username','password']));
        if ($request->password == $request->password2){
            $count = User::where('username', $request->username)->count();
            if ($count == 0):
                $user = new User;
                $user->username = $request->username;
                $user->password = bcrypt($request->password);
                $user->dated = $dated;
                $user->save();
                Toastr::success('User added successfully',NULL, ["positionClass" => "toast-top-right"]);
                Auth::login($user,true);
                return redirect('/');
            else:
                Toastr::error('Username already in use.', NULL, ["positionClass" => "toast-top-right"]);            
                return redirect('/signup');    
            endif;
            
        }else{
            Toastr::error('Unidentical Password', NULL, ["positionClass" => "toast-top-right"]);            
            return redirect('/signup');
        }
    }

    public function checklogin(Request $request){
        $credentials = $request->only('username', 'password');
         if (Auth::attempt($credentials,true)) {
            // Authentication passed...
            return redirect('/');
        }else{
            Toastr::error('Unidentical Password', NULL, ["positionClass" => "toast-top-right"]);            
            return redirect('/login');   
        }
    }


    //socialite
      /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('twitter')->redirect();
    }
    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('twitter')->user();
        $provider = 'twitter';
        //$user = $this->findOrNewSocialUser($user,$provider);
        //user
        //dd($user->getId());
        $user_id = $user->getId();
        $email = $user->getEmail();
        $avatar = $user->getAvatar();
        $name = $user->getName();
        $u = User::where('provider_id', $user->getId())->first();

        if (!is_null($u)) {
            //return $user;
        }else{
                $u = new User();
            
                $u->provider = $provider;
                $u->provider_id = $user_id;
                $u->email = $email;
                $u->personaname = $name;
                $u->avatar = $avatar;
                $u->avatar_medium = $avatar;
                $u->status = 1;
                $u->save();
            
        }


        //
        Auth::login($u, true);
        //dd($info);
        return redirect($this->redirectURL); // redirect to site
        // $user->token;
    }


  

}
?>