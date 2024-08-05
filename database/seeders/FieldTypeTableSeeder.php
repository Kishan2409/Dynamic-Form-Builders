<?php

namespace Database\Seeders;

use App\Models\FieldType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FieldTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FieldType::updateOrCreate(['id' => 1], ['id' => 1, 'name' => 'Single Line Text / Textbox', 'data_type' =>  'string', 'config_json' => '{"required":"false","unique":"false","default_value":"","maxlength":255,"placeholder":"","display":"false","readonly":"false","hidden":"false"}']);
    }
}
