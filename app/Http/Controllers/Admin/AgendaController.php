<?php

namespace App\Http\Controllers\Admin;

use App\Agenda;
use App\Http\Controllers\Controller;
use App\Team;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function teams()
    {

        return view('admin.teams');
    }

    public function addTeam(Request $request){

        if(!Team::where('site_id', $request->site)->where('day', $request->day)->where('start', $request->start)->where('end', $request->end)->first()){
            $team = Team::create([
                'site_id' => $request->site,
                'day' => $request->day,
                'start' => $request->start,
                'end' => $request->end
           ]);
    
           foreach ($request->employees as $key => $user_id) {
                if(!$team->users->contains($user_id)){
                    $team->users()->attach($user_id);
                }
           }

           flashy()->success("L'équipe a été ajoutée avec succès");
           return 'success';
        }

        return 'error';
    }

    public function attachUserToTeam(Request $request, Team $team){
        
        if(!$team->users->contains($request->user_id)){
            $team->users()->attach($request->user_id);

            return 'success';
        }

        return 'error';
    }


    public function detachUserToTeam(Request $request, Team $team){
        
        if($team->users->contains($request->user_id)){
            $team->users()->detach($request->user_id);

            return 'success';
        }

        return 'error';
    }

    public function destroyTeam(Team $team){

        $team->users()->detach();
        $team->delete();

        return 'success';
    }
}
