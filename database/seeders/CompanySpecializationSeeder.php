<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySpecializationSeeder extends Seeder
{
    public function run()
    {
        $companyIds = range(1, 10);
        $specializationIds = range(1, 5);

        foreach ($companyIds as $companyId) {
            // Randomly select 1 to 3 specializations for each company
            $selectedSpecializations = array_rand($specializationIds, rand(1, 3));
            
            // Ensure $selectedSpecializations is always an array
            $selectedSpecializations = is_array($selectedSpecializations) ? $selectedSpecializations : [$selectedSpecializations];

            foreach ($selectedSpecializations as $specializationId) {
                DB::table('company_specializations')->insert([
                    'company_id' => $companyId,
                    'specialization_id' => $specializationIds[$specializationId],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
