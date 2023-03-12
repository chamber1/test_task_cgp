<?php

namespace Database\Factories;

use App\Models\ClientsCompany;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientsCompanyFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ClientsCompany::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'client_id' => $this->faker->numberBetween(1, 12000),
            'company_id' => $this->faker->numberBetween(1, 12000),
        ];
    }
}
