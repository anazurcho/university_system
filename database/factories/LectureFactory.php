<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Lecture;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class LectureFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Lecture::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return array(
            'name' => $this->faker->name,
            'course_id' => self::factoryForModel(Course::class),
            'user_id' =>  self::factoryForModel(User::class)
        );
    }
}
