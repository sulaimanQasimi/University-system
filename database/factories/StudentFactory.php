<?php

namespace Database\Factories;

use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'=>1,

            'kankor_id'=>$this->faker->randomLetter().'-'.$this->faker->year(2019).$this->faker->numberBetween(1),
            'school'=>$this->faker->name(),
            'college_id'=>1,
            'sex'=>'M',
            'firstname'=>$this->faker->firstName(),
            'lastname'=>$this->faker->lastName(),
            'fathername'=>$this->faker->firstNameMale(),
            'grandfathername'=>$this->faker->firstNameFemale(),
            'grade'=>$this->faker->numberBetween(1,8),
            'dateofbirth'=>$this->faker->dateTimeThisCentury(),
            'phone'=>$this->faker->phoneNumber(),
            'address'=>$this->faker->address(),
            'year'=>$this->faker->year(),
            'image'=>$this->faker->colorName(),
            'created_at'=>$this->faker->dateTime()
        ];
    }
}
