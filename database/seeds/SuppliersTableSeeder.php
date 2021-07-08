<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class SuppliersTableSeeder extends Seeder
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
	        DB::table('suppliers')->insert([
	            'name' => $faker->name,
                'email' => $faker->email,
                'phone' => $faker->e164PhoneNumber,
                'sup_img' => $faker->imageUrl($width = 640, $height = 480),
                'address' => $faker->address,
                'company_name' => $faker->company,
                'city' => $faker->city,
                'state' => $faker->state,
                'country' => $faker->country,
                'postal_code' => $faker->postcode,
                'account' =>$faker->creditCardType,
                'prev_balance' => '10000',
                'comments' => 'NULL',
                'payment'=>$faker->randomNumber($nbDigits = 5, $strict = true),
                'postal_code' => $faker->postcode,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
	        ]);
        }
    }
}
