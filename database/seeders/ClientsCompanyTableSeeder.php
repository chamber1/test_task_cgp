<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ClientsCompany;

class ClientsCompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ClientsCompany::factory(12000)->create();
    }
}
