<?php

namespace Database\Factories;

use App\Models\Lecture;
use App\Models\StudentShell;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentShellFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = StudentShell::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => self::factoryForModel(User::class),
            'lecture_id' => self::factoryForModel(Lecture::class),
            'total_score' => $this ->faker->randomFloat(NULL,0, 100),
        ];
    }
}
