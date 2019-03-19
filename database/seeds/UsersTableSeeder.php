<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = array(
            'admin',
            'cashier',
            'customer'
        );
        
        //$users[rand(0, count($users) - 1)];
        $faker = Faker\Factory::create();

        for($i = 0; $i < 20; $i++) {
            App\User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'usertype' => $users[rand(0, count($users) - 1)],
                'password' => bcrypt('secret'),
            ]);
        }
    }
}
