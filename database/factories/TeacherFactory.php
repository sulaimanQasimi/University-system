<?php

namespace Database\Factories;

use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

class TeacherFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Teacher::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'department_id'=>1,
            'user_id'=>1,
            'image'=>$this->faker->imageUrl(),
            'firstname'=>$this->faker->firstName,
            'lastname'=>$this->faker->lastName,
            'fathername'=>$this->faker->titleFemale,
            'sex'=>$this->faker->randomKey(['M','F']),
            'dateofbirth'=>$this->faker->dateTimeThisCentury(2006),
            'field'=>$this->faker->randomKey(['BBA','LLB']),
            'experience'=>$this->faker->numberBetween(5,15),
            'address'=>$this->faker->address,
            'phone'=>$this->faker->phoneNumber,
            'email'=>$this->faker->freeEmail(),
            'salary'=>$this->faker->numberBetween(15000,36000),
        ];
    }
}
