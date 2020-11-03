<?php

namespace App\Http\Controllers\API;

use App\Agenda;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Employee;
use App\Site;
use App\Team;
use App\Company;
use App\Notification;
use App\User;

class AgendaController extends Controller
{
    public function sites() {
        if(Auth::user()->is_admin == 2) {
            $company = Company::where('user_id', Auth::user()->id)->first();
            $sites = Site::where('company_id', $company->id)->get();
            $response = [
                'success' => true,
                'data' => $sites,
                'message' => 'site l\'utilisateur ' . Auth::user()->name
            ];

            return response()->json($response, 200);
        } else {
            $employee = Employee::where('user_id', Auth::user()->id)->first();
            $site = Site::find($employee->site_id);
            $response = [
                'success' => true,
                'data' => $site,
                'message' => 'site l\'utilisateur ' . Auth::user()->name
            ];

            return response()->json($response, 200);
        }
    }
   public function index($id) {
       $teams = Team::where('site_id', $id)->orderBy('day', 'ASC')->get()->groupBy('day');
       $result = [];
       foreach ($teams as $team) {
        array_push($result, sizeof($team));
       }
       $response = [
            'success' => true,
            'data' => $result,
            'message' => 'Toutes les equipes'
        ];

        return response()->json($response, 200);
   }

   public function details($id, $siteId) {
       $teams = Team::where('day', $id)->where("site_id", $siteId)->orderBy('day', 'ASC')->get();
       $result = [];
       foreach ($teams as $team) {
            $users = [];
            foreach($team->users() as $id) {
                $user = User::find($id);
                array_push($users, $user);
            }
            $team->users = $team->users();
       }
        foreach ($teams as $team) {
            array_push($result, $team);
        }
        $response = [
            'success' => true,
            'data' => $result,
            'message' => 'Equipe ' . $id
        ];

        return response()->json($response, 200);
   }

   public function store(Request $request) {

   }

   public function update(Request $request, $id) {

   }

   public function destroy($id) {
       $team = Team::find($id);
       $team->status = 0;
       $team->save();

        $response = [
            'success' => true,
            'data' => $team,
            'message' => 'Equipe bloquee'
        ];

        return response()->json($response, 200);
   }



   // Wiltek Agenda's methods

   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function teams()
    {

        return view('admin.agenda');
    }

    /**
     * Store a new team in a resource storage
     *
     * @param  \Illuminate\Http\Request  $request
     * @param Integer site
     * @param Integer day
     * @param String start [Format - hh:mm]
     * @param String end [Format - hh:mm]
     *
     * @return \Illuminate\Http\Response
     */
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

                    Notification::addUserToTeamAlert($team->site, User::find($user_id));
                }
           }

            return response()->json([
                'message' => 'success'
            ], 201);
        }

        return response()->json([
            'message' => 'Cette équipe existe déja'
        ], 403);
    }

    /**
     * Add new user to an existing team
     *
     * @param  \Illuminate\Http\Request  $request
     * @param Integer user_id
     * @param \App\Team team
     *
     * @return \Illuminate\Http\Response
     */
    public function attachUserToTeam(Request $request, Team $team){

        if(!$team->users->contains($request->user_id)){
            $team->users()->attach($request->user_id);

            Notification::addUserToTeamAlert($team->site, User::find($request->user_id));

            return response()->json([
                'message' => 'success'
            ]);
        }

        return response()->json([
            'message' => 'cet utilisateur appartient déja à cette équipe',
        ], 403);
    }


    /**
     * Remove user to an existing team
     *
     * @param  \Illuminate\Http\Request  $request
     * @param Integer user_id
     * @param \App\Team team
     *
     * @return \Illuminate\Http\Response
     */
    public function detachUserToTeam(Request $request, Team $team){

        if($team->users->contains($request->user_id)){
            $team->users()->detach($request->user_id);

            Notification::addUserToTeamAlert($team->site, User::find($request->user_id));

            return response()->json([
                'message' => 'success'
            ]);
        }

        return response()->json([
            'message' => 'Cet utilisateur n\'appartient pas à cette équipe',
        ], 403);
    }

    /**
     * Delete an existing team
     *
     * @param \App\Team team
     *
     * @return \Illuminate\Http\Response
     */
    public function destroyTeam(Team $team){

        $team->users()->detach();
        $team->delete();

        return response()->json([
            'message' => 'success'
        ], 200);
    }
}
