<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
    	foreach (range(1,20) as $index) {
	        DB::table('customers')->insert([
	            'name' => $faker->name,
                'email' => $faker->email,
                'phone_number' => $faker->e164PhoneNumber,
                'address' => $faker->address,
                'city' => $faker->city,
                'state' => $faker->state,
                'zip' => $faker->postcode,
                'company_name' => $faker->company,
                'account' =>$faker->creditCardType,
                'prev_balance' => '20000',
                'payment'=>$faker->randomNumber($nbDigits = 5, $strict = true),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
	        ]);
	}
    }
}
