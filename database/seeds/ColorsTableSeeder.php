<?php

use Illuminate\Database\Seeder;

class ColorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colors = [
            'red' => '#E3342F',
            'orange' => '#F6993F',
            'yellow' => '#FFED4A',
            'green' => '#38C172',
            'blue' => '#3490DC',
            'indigo' => '#6574CD',
        ];

        foreach ($colors as $name => $code) {

            factory('App\Color')->create([
                'name' => $name,
                'code' => $code,
            ]);
        }
    }
}
