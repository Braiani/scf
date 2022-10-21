<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create($this->definitions());
    }

    /**
     * Define the model's default Admin User.
     *
     * @return array
     */
    private function definitions(){
        return [
            'name' => trans('Administrator'),
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'is_admin' => true,
        ];
    }
}
