<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('users')->delete();

        Permission::create(['name' => 'manage']);

        $adminRole = Role::create(['name' => 'admin']);
        $clientRole = Role::create(['name' => 'client']);

        $adminRole->givePermissionTo('manage');


        $adminUser = new User([
            'name' => 'Ron Berchu',
            'identifier' => 'identifier',
            'email' => 'ron@nortan.co.za',
            'email_verified_at' => '2021-03-31 04:21:12',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'two_factor_secret' => NULL,
            'two_factor_recovery_codes' => NULL,
            'phone' => NULL,
            'remember_token' => 'piDktPVgUd',
            'current_team_id' => NULL,
            'profile_photo_path' => NULL,
        ]);

        $adminUser->assignRole($adminRole);
        $adminUser->save();
    }
}