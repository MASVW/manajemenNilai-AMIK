<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subjects = [
            'IPA',
            'IPS',
            'Math',
            'Ekonomi',
            'Bahasa',
        ];
        foreach ($subjects as $key => $subject) {
            Subject::query()->create([
                'name' => $subject,
            ]);
        }
    }
}
