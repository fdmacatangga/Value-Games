<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Matches;
use App\Teams;
class AjaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function selectTeam(Request $request){
        $matches = Matches::find($request->input('match_id'))->first();
        if($matches->status == "upcoming"){
            if ($matches->team1 == $request->team_id || $matches->team2 == $request->team_id){
                if ($matches->team1 == $request->team_id){
                    echo $value = $request->input('bet') * $matches->team1_odds;
                }else{
                    echo $value = $request->input('bet') * $matches->team2_odds;
                }
            }else{
                $error = 1;
            }
        }else{
            $error = 1;
        }
    }


    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
