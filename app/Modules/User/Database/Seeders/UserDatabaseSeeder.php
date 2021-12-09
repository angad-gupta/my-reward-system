<?php

namespace App\Modules\User\Database\Seeders;

use App\Modules\User\Entities\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        
        $user = User::create([
            'ip_address' => '127.0.0.1',
            'username' => 'admin@gmail.com',
            'email' => 'admin@gmail.com',
            'user_type' => 'super_admin',
            'department' => '1',
            'password' => bcrypt('admin@gmail.com'),
            'active' =>'1',
            'first_name' =>'Administrator',
            'parent_id' => '0'
        ]);

        // $this->call("OthersTableSeeder");
    }
}
