<?php

namespace Database\Factories;

use App\Models\HW;
use App\Models\Lecture;
use Illuminate\Database\Eloquent\Factories\Factory;

class HWFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = HW::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'title' => $this ->faker->sentence,
            'content' => $this->faker->paragraph,
            'due_to' => $this->faker->date('Y-m-d'),
//            'due_to' => '2000-12-12',
            'lecture_id' => self::factoryForModel(Lecture::class)
        ];
    }
}
