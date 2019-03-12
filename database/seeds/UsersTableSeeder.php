<?php

use Faker\Factory;
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
        //
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users')->truncate();
        $faker = Factory::create();
        DB::table('users')->insert([
            [  'name'=> "Maheeb Azmaeen",
                'email' => "maheeb@test.com",
                'password'=> bcrypt('maheeb'),
                'bio' => $faker->text(rand(250, 300))

            ],
            [   'name'=> "Neymar",
                'email' => "neymar@test.com",
                'password'=> bcrypt('maheeb'),
                'bio' => $faker->text(rand(250, 300))

            ],


            [
                'name'=> "Leo Messi",
                'email' => "leo@test.com",
                'password'=> bcrypt('maheeb'),
                'bio' => $faker->text(rand(250, 300))

            ],

        ]);
    }
}
