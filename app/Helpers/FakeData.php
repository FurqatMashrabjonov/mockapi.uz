<?php

namespace App\Helpers;

use Faker\Generator;

class FakeData
{
    public function text(Generator $gen, $length = 28): string
    {
        return $gen->text($length);
    }

    public function randomDigit($min = 0, $max = 1000): int
    {
        return rand($min, $max);
    }

    public function date(Generator $gen): string
    {
        return $gen->date();
    }

    public function boolean(): bool
    {
        return rand(1, 10) % 2 == 0;
    }

    public function randomElement(Generator $gen): array
    {
        return $gen->randomElements;
    }

    function randomArray(Generator $gen): array
    {
        return $gen->randomElements;
    }

    static function fillOneData($fields)
    {
        $faker = new Generator();
        $data = [];
        foreach ($fields as $key => $field){

        }
    }

    static function fillData($fields, $count = 1)
    {

    }

}
