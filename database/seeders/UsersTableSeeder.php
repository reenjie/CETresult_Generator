<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'fname' =>'admin',
            'lname' => 'admin',
            'mname' =>'admin',
            'religion' =>'',
            'civilstatus'=>'',
            'gender'=>'',
            'birthdate'=>date('Y-m-d'),
            'address'=>'',
            'contactno'=>'',
            'emergencycontact'=>'',
            'com_tax_number'=>'',
            'tin'=>'',
            'gsis'=>'',
            'sss'=>'',
            'occupation'=>'',
            'email'=>'admin@admin.com',
            'email_verified_at'=>now(),
            'password'=>Hash::make('password'),
            'roles'=>0
        ]);
    }
}
