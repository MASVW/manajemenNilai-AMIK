<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $studentName = fake('id_ID')->name();
        $gender = rand(1, 2) === 1 ? 'male' : 'female';
        $initial = $this->getInitial($studentName);
        $randomNum = rand(1, 100);
        $nis = "$initial$randomNum";

        return [
            'name' => $studentName,
            'nis' => $nis,
            'gender' => $gender,
            'birthDate' => fake()->date(),
        ];
    }

    public function getInitial($name): string
    {
        $words = explode(' ', trim($name));
        $initail = '';
        foreach ($words as $key => $word) {
            if ($word !== '') {
                $initail .= strtoupper(substr($word, 0, 1));
            }
        }

        return $initail;
    }
}
