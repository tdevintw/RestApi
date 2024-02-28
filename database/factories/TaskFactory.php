<?php

namespace Database\Factories;
use App\Models\User;
use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    protected $model = Task::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'title'=> $this->faker->sentence(3),
            'description'=> $this->faker->sentence(15),
            'status' => $this->faker->randomElement(['to do','done','doing','uncompleted']),
            'limit_date' =>$this->faker->dateTimeThisDecade('+3 weeks')->format('Y-m-d H:m:s')

        ];
    }
}
