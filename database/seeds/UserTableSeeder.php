<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Developer',
            'username' => 'developer',
            'email' => 'developer@this.app',
            'password' => bcrypt('developer'),
        ]);

        $role = Role::where(['name' => 'Developer'])->first();

        if($role){
            $user->assignRole([$role->id]);
        }
    }
}
