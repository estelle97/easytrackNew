<?php

use App\Company;
use App\Employee;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Super Administrator',
                'username' => 'superAdmin',
                'email' => 'superadmin@easytrack.com',
                'phone' => '123456789',
                'password' => bcrypt('password'),
                'is_admin' => '3',
                'address' => 'Bastos - Yaoundé',
            ],
            [
                'name' => 'Steve Wiltek',
                'username' => 'wiltek',
                'email' => 'wiltek@easytrack.com',
                'phone' => '698154430',
                'password' => bcrypt('password'),
                'is_admin' => '3',
                'address' => 'Santa Barbara - Yaoundé',
            ],
            [
                'name' => 'Estelle Belinga',
                'username' => 'estelle',
                'email' => 'estelle@easytrack.com',
                'phone' => '659401381',
                'password' => bcrypt('password'),
                'is_admin' => '2',
                'address' => 'Awaie Escalier - Yaoundé',
            ],
            [
                'name' => 'Administrateur Directeur',
                'username' => 'admin',
                'email' => 'admin@easytrack.com',
                'phone' => '687601381',
                'password' => bcrypt('password'),
                'is_admin' => '2',
                'address' => 'Akwa  - Douala',
            ]
        ];

        DB::table('users')->insert($users);

        $companies= [
            [
                'user_id' => User::whereUsername('estelle')->first()->id,
                'name' => 'Famous',
                'slug' => 'slug1',
                'email' => 'famous@gmail.com',
                'phone1' => '223344556',
                'town' => 'Yaoundé',
                'street' => 'Miniprix Bastos',
                'activity_id' => 1
            ],
            [
                'user_id' => User::whereUsername('admin')->first()->id,
                'name' => 'Le Relais de la Citée',
                'slug' => 'slug2',
                'email' => 'lerelais@gmail.com',
                'phone1' => '223984456',
                'town' => 'Yaoundé',
                'street' => 'Elig-edzoa Pharmacie',
                'activity_id' => 1
            ]
        ];

        DB::table('companies')->insert($companies);

        $subscriptions = [
            [
                'company_id' => Company::whereSlug('slug1')->first()->id,
                'type_id' => 1,
                'end_date' => Carbon::now()->addMonths(12),
                'status' => 0,
                'is_active' => 1,
            ],
            [
                'company_id' => Company::whereSlug('slug2')->first()->id,
                'type_id' => 1,
                'end_date' => Carbon::now()->addMonths(12),
                'status' => 0,
                'is_active' => 1,
            ]
        ];

        DB::table('subscriptions')->insert($subscriptions);

        $sites= [
            [
                'company_id' => Company::whereSlug('slug2')->first()->id,
                'name' => 'le Relais Bastos',
                'slug' => 'slug1',
                'email' => 'lrbastos@gmail.com',
                'phone1' => '223344556',
                'town' => 'Yaoundé',
                'street' => 'Miniprix Bastos',
            ],
            [
                'company_id' => Company::whereSlug('slug2')->first()->id,
                'name' => 'Le Relais Elig-edzoa',
                'slug' => 'slug2',
                'email' => 'lrnlongkak@gmail.com',
                'phone1' => '223984456',
                'town' => 'Yaoundé',
                'street' => 'Elig-edzoa Pharmacie',
            ],
            [
                'company_id' => Company::whereSlug('slug2')->first()->id,
                'name' => 'le Relais Akwa',
                'slug' => 'slug3',
                'email' => 'lrakwa@gmail.com',
                'phone1' => '223344556',
                'town' => 'Douala',
                'street' => 'Akwa',
            ],
            [
                'company_id' => Company::whereSlug('slug1')->first()->id,
                'name' => 'Facebook',
                'slug' => 'slug4',
                'email' => 'facebook@gmail.com',
                'phone1' => '224144556',
                'town' => 'Douala',
                'street' => 'Ange raphael',
            ],
            [
                'company_id' => Company::whereSlug('slug1')->first()->id,
                'name' => 'Dream palace',
                'slug' => 'slug5',
                'email' => 'dream@gmail.com',
                'phone1' => '227144556',
                'town' => 'Douala',
                'street' => 'Ange raphael',
            ],
        ];

        DB::table('sites')->insert($sites);





        // for($i=0; $i<40; $i++){
        //     $user = new User([
        //         'name' => 'employee '.$i,
        //         'username' => 'employee'.$i,
        //         'email' => 'employee'.$i.'@gmail.com',
        //         'phone' => random_int(777777777,999999999),
        //         'address' => 'adresse employee'.$i,
        //         'password' => bcrypt('password'),
        //         'is_admin' => 1,
        //         'role_id' => random_int(1,5)
        //     ]);

        //     $employee = new Employee();
        //     $employee->cni_number = '002274514';
        //     $employee->contact_name= 'Resposable employee '.$i;
        //     $employee->contact_phone = random_int(777777777, 999999999);
        //     $employee->site_id = random_int(31,35);

        //     DB::transaction(function () use($user, $employee){
        //         $user->save();
        //             $employee->user_id = $user->id;
        //             $employee->save();
        //     });
        // }
    }

}
