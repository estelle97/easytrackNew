<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Company;
use App\Customer;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterStoreRequest;
use App\Site;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('superAdmin.customers');
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
            'end_date' => Carbon::now()->addMonth($type->duration),
        ]);

        return response()->json([
            "message" => "Operation success!",
        ], 201);
    }
}
