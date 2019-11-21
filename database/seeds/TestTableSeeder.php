<?php

use Illuminate\Database\Seeder;

class TestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('test')->insert([
            'test_name' => Str::random(10),
            'test_description' => Str::random(10).'@gmail.com'
        ]);
    }
}
