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
}
