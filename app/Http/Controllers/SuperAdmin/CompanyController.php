<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Company;
use App\Customer;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterStoreRequest;
use App\Site;
use App\Type;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('superAdmin.companies');
    }


    public function store(RegisterStoreRequest $request){

        // Remove password_confirmation field to user array

        $user = new User([
            'name' => $request->username,
            'email' => $request->useremail,
            'username' => $request->userusername,
            'address' => $request->useraddress,
            'phone' => $request->userphone,
            'password' => bcrypt($request->userpassword),
            'is_admin' => 2,
            'role_id' => 5
        ]);

        $company = new Company([
            'name' => $request->companyname,
            'slug' => $this->makeSlug($request->companyname),
            'email' => $request->companyemail,
            'phone1' => $request->companyphone1,
            'phone2' => $request->companyphone2,
            'town' => $request->companytown,
            'street' =>$request->companystreet,
        ]);


        $site = new Site([
            'name' => $request->sitename,
            'slug' => $this->makeSlug($request->sitename),
            'email' => $request->siteemail,
            'phone1' => $request->sitephone1,
            'phone2' => $request->sitephone2,
            'town' => $request->sitetown,
            'street' =>$request->sitestreet,
        ]);
        if($request->step != 'last'){
            return response()->json([
                "message" => "Operation success!",
            ], 200);
        }
        DB::transaction(function () use($user, $company, $site){
            $user->save();
                $company->user_id = $user->id;
                $company->save();
                    $site->company_id = $company->id;
                    $site->save();

        });

        $customers = Customer::create([
            'name' => 'Passager',
            'street' => $site->street,
            'town' => $site->town,
            'site_id' => $site->id
        ]);

        // Attach snack with his type of subscription
        $type = \App\Type::findOrFail($request->type);
        $company->types()->attach($type->id,[
            'end_date' => Carbon::now()->addDays($type->duration),
        ]);

        return response()->json([
            "message" => "Operation success!",
        ], 201);
    }

    public function subscriptionUpdate(Request $request, Company $company){


        // $verif = null;
        $type = Type::find($request->type);

        $remainingDays = $company->subscription()->remainingDays;

        if($remainingDays > 0){
            // $duration = Carbon::now()->addDays($remainingDays + $type->duration);
            // DB::table('subscriptions')->insert([
                //     'company_id' => $company->id,
                //     'type_id' => $type->id,
                //     'end_date' => $duration
                // ]);

                // $company->types()->attach($type->id, [
                //     'end_date' => Carbon::now()->addDays($remainingDays + $type->duration)
                // ]);

                $company->types()->sync([$type->id => ['end_date' => Carbon::now()->addDays($remainingDays + $type->duration)]]);

            // $verif = $company->subscription()->remainingDays;
        } else {
            // $duration = Carbon::now()->addDays($type->duration);
            // DB::table('subscriptions')->insert([
            //     'company_id' => $company->id,
            //     'type_id' => $type->id,
            //     'end_date' => $duration
            // ]);
            $company->types()->attach($type->id, [
                'end_date' => Carbon::now()->addDays($type->duration)
            ]);
            // $verif = $company->subscription()->remainingDays;
        }

        // $test = [
        //     'type' => $type->title,
        //     'remainingDays' => $remainingDays,
        //     'company' =>  $company->name,
        //     'verif' => $verif,
        //     'last' => $company->types->last()
        // ];
        // dd($test);
        // flashy()->success("L'abonnement a été mis à jour avec succès!");

        $newCompany = Company::whereId($company->id)->first();
        // dd($test->subscription()->remainingDays);
        return response()->json([
            'remainingDays' => $newCompany->subscription()->remainingDays,
            'percentage' => $newCompany->subscription()->percentage
        ]);
    }

    public function update(Request $request, Company $company){

        $company->update($request->only('name','email','phone1','phone2','street','town'));
        $logo = $request->file('logo');
        if($logo){
            $path = 'template/assets/static/companies/'.$company->activity->name.'/';
            $fileName = $company->slug.'.'.$logo->extension();
            $name = $path.$fileName;
            $logo->move($path,$name);
            $company->logo = $name;
            $company->save();
        }

        return 'success';
    }

    public function updateState(Company $company){
        if ($company->is_active == 0){
            $company->is_active = 1;
        } else {
            $company->is_active = 0;
        }

        $company->save();
        return 'success';
    }
}
