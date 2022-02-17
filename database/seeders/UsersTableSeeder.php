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
            'name' => 'Engr. Virgil A. Fuentes',
            'agency' => 'DICT XI',
            'division' => 'TOD',
            'designation' => 'ITO 1 / iBPLS Focal',
            'contactNumber' => '09228027185',
            'sex' => 0,
            'usertype' => 'admin',
            'email' => 'virgil.fuentes@dict.gov.ph',
            'email_verified_at' => now(),
            'password' => Hash::make('dict@8000'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
