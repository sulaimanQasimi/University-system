<?php

namespace Database\Factories;

use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;

class DepartmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Department::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'userID'=>self::factoryForModel(Department::class)->create()->id,
            'name'=>$this->faker->name,
            'header'=>$this->faker->userName,
            'phone'=>$this->faker->phoneNumber,
            'image'=>$this->faker->url,
        ];
    }
}
