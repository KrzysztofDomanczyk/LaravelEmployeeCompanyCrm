<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
    
        for ($i=0; $i < 50 ; $i++) { 
            DB::table('companies')->insert([
                'name' => $faker->company,
                'email' => $faker->email,
                'website' => $faker->domainName,
            ]);
        }
    }
}
