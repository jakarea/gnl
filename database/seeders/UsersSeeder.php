<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class UsersSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Schema::disableForeignKeyConstraints();
        DB::table('users')->truncate();
        Schema::enableForeignKeyConstraints();

        $user = User::create([
            'full_name' => "Jon Doe",
            'designation' => "Programmer",
            'birth' => "1991-05-12",
            'email' => 'info@yopmail.com',
            'password' => Hash::make('1234567890'),
            'country' => "Netherland",
            'city' => "Amsterdam",
            'state' => "Amsterdam",
            'post_code' => "1011A"

        ]);
        $user->roles()->attach(Role::where('slug', 'admin')->first());

    }
}
