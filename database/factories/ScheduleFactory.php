<?php

namespace Database\Factories;

use App\Models\Lecture;
use App\Models\Schedule;
use Illuminate\Database\Eloquent\Factories\Factory;

class ScheduleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Schedule::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'lecture_id' => self::factoryForModel(Lecture::class),
            'day' => $this->faker->randomElement(['Monday', 'Tuesday','Wednesday','Thursday','Friday', 'Saturday', 'Sunday']),
            'time' => $this->faker->time('H:i:s'),
        ];
    }
}
