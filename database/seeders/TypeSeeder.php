<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'String',
                'slug' => 'string',
                'faker' => 'text'
            ],
            [
                'name' => 'Number',
                'slug' => 'number',
                'faker' => 'randomDigit'
            ],
            [
                'name' => 'Date',
                'slug' => 'date',
                'faker' => 'date'
            ],
            [
                'name' => 'Boolean',
                'slug' => 'boolean',
                'faker' => 'boolean'
            ],
            [
                'name' => 'Array',
                'slug' => 'array',
                'faker' => 'randomElement'
            ],
            [
                'name' => 'Object',
                'slug' => 'object',
                'faker' => 'randomElement'
            ]
        ];
      Type::query()->insert($data);
    }
}
