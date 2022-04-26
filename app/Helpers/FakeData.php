<?php

namespace App\Helpers;

use Carbon\Carbon;
use Faker\Factory;
use Faker\Generator;
use Illuminate\Support\Facades\Log;

class FakeData
{
    static function fillOneData($field): array
    {
        $faker = new Generator();
        $data = [];
        $data[$field->name] = match ($field->type->faker) {
            'text' => 'sadasdasdas',
            'randomDigit' => rand(0, 1000),
            'boolean' => rand(0, 5) % 2 == 0,
            'date' => Carbon::now()->toDateTimeString(),
            'object' => $faker->randomElement,
            'array' => $faker->randomElements
        };
        return $data;
    }

    static function fillData($fields, $count = 1)
    {
        $data = [];
        $faker = Factory::create();
        foreach ($fields as $field) {
//             array_merge(static::fillOneData($field), $data);
            $data[$field->name] = match ($field->type->faker) {
                'text' => $faker->name,
                'randomDigit' => rand(0, 1000),
                'boolean' => rand(0, 5) % 2 == 0,
                'date' => Carbon::now()->toDateTimeString(),
                'randomElements', 'randomElement' => $faker->randomElements(['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j'], rand(1, 10)),
            };
        }
        return $data;
    }

}
