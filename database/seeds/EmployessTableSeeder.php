<?php

use App\Company;
use App\Employee;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class EmployessTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i=1; $i <= 20 ; $i++) { 
            DB::table('employees')->insert([
                'firstName' => $faker->company,
                'lastName' => $faker->company,
                'email' => $faker->email,
                'phone' => $faker->email,
            ]);

            $company = Company::inRandomOrder()->first();
            $employee = Employee::find($i);
            $employee->company()->associate($company);
            $employee->save();
        }
    }
}
