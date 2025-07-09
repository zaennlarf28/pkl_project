<?php
namespace Database\Seeders;

use App\Models\User;
use DB;
// import
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{

    public function run(): void
    {
        DB::table('users')->delete();

        User::create([
            'name'     => 'Admin',
            'email'    => 'admin@gmail.com',
            'password' => bcrypt('rahasia'),
            'isAdmin'  => 1,
        ]);

        User::create([
            'name'     => 'Pak Ute',
            'email'    => 'ute@gmail.com',
            'password' => bcrypt('rahasia'),
            'isAdmin'  => 2,
        ]);

        User::create([
            'name'     => 'Pak candra',
            'email'    => 'candra@gmail.com',
            'password' => bcrypt('rahasia'),
            'isAdmin'  => 3,
        ]);
        User::create([
            'name'     => 'Pak Mulki',
            'email'    => 'mulki@gmail.com',
            'password' => bcrypt('rahasia'),
            'isAdmin'  => 4,
        ]);

        User::create([
            'name'     => 'Siswa',
            'email'    => 'siswa@gmail.com',
            'password' => bcrypt('rahasia'),
            'isAdmin'  => 0,
        ]);

    }
}