<?php

use App\Company;
use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = collect([
            "CenterHub",
            "Four Wheels",
            "G_Incubation Center",
            "Kasi DH&C ",
            "SA Automobiles",
            "Voom Vehicles",
        ]);

        foreach($companies as $companyName) {
            Company::create([
                'name' => $companyName
            ]);
        }
    }
}
