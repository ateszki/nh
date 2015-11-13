<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(UserTableSeeder::class);

        Model::reguard();
    }
}

class UserTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Andrés Teszkiewicz',
            'email' => 'ateszki@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        DB::table('clientes')->insert([
            'user_id'=>1,
            'razsoc'=>'Empresa SA',
            'lista'=>1,
        ]);
    }
}
