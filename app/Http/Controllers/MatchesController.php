<?php

namespace App\Http\Controllers;

use \Illuminate\Http\Request;
//use DB;
use App\Matches;
use App\Teams;
use App\Prediction;
use App\User;
use Auth;
use Toastr;
class MatchesController extends Controller
{
    
    public function index(){   	
    	$matches = Matches::where('status','upcoming')->orderBy('date','asc')->get();
		return view('front.index',compact('matches'));
    }
    public function match($id,$title = null){
        $_SESSION['match'][$id] = "1";
    	$m = Matches::where('id',$id)->first();
    	$team1 = Teams::where('id',$m->team1)->first();
    	$team2 = Teams::where('id',$m->team2)->first();
        if (Auth::check()){
            $points = User::find(Auth::user()->id)->points;    
        }else{
            $points = 0;
        }
        
        
    	return view('front.match',compact('m','team1','team2','points'));
    }

    public function error404(){
        return view('front.error404');
    }

    public function signup(){
        return view('front.signup');
    }
    public function savePrediction(Request $request){
            $matches = Matches::where('id',$request->input('match_id'))->first();
            if($matches->status == "upcoming"){
                if ($matches->team1 == $request->input('team_id') || $matches->team2 == $request->input('team_id')){
                    $points = $this->getBalance(Auth::user()->id);
                    if ($request->input('bet') <= $points && $request->input('bet') != 0){
                            $prediction = Prediction::where([
                                ['match_id','=',$request->input('match_id')],
                                ['user_id','=',Auth::user()->id]
                            ])->get();
                            // dd($prediction->count());
                            if ($prediction->count()){
                                $prediction = $prediction->first();
                                if ($prediction->team_id == $request->input('team_id')){
                                    $new_points = $prediction->amount + $request->input('bet');
                                    $prediction->amount = $new_points;
                                    $prediction->save();
                                    $this->updatePoints($request->input('bet'));
                                    Toastr::success('Prediction placed, Good luck.',NULL, ["positionClass" => "toast-top-right"]);
                                    return redirect('match/'.$request->input('match_id'));
                                }else{
                                    Toastr::error('You already have predicted for the opposing team.',NULL, ["positionClass" => "toast-top-right"]);
                                    return redirect('match/'.$request->input('match_id'));
                                }
                            }else{
                                $p = new Prediction();
                                $p->user_id = Auth::user()->id;
                                $p->amount =  $request->input('bet');
                                $p->team_id = $request->input('team_id');
                                $p->match_id = $request->input('match_id');
                                $p->save();
                                $error = 0;
                                $this->updatePoints($request->input('bet'));
                                Toastr::success('Prediction placed, Good luck.',NULL, ["positionClass" => "toast-top-right"]);
                                return redirect('match/'.$request->input('match_id'));
                            }
                    }else{
                        $error = 1;
                    }
                }else{
                    $error = 2;
                }
            }else{
                $error = 3;
            }

            if ($error != 0)
                return redirect('/');

            
    }

    public function getBalance($user_id){
        $points = User::where('id',$user_id)->first()->points;
        return $points;
    }

    public function updatePoints($bet){
        $u = User::where('id',Auth::user()->id)->first();
        $updated_points = $u->points - $bet;
        $u->points = $updated_points;
        $u->save(); 
    }

    protected function subtractAmount($amount){
        //test
    }
    
}
