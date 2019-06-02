<?php

use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('clients')->insert([
            'name' => 'eFaktura',
            'NIP' => '1231231230',
            'firstName' => 'Jan',
            'lastName' => 'Kowalski',
            'street' => 'Owocowa',
            'town' => 'Kolbuszowa',
            'postcode' => '36-150',
            'postcode_town' => '',
            'property_number' => '7',
            'phone_number' => '111 222 333'
           // 'created_at' => now(),
           //'updated_at' => now()
        ]);
    }
}
