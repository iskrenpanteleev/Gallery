<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RawSQLSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::unprepared(file_get_contents(__DIR__ . '/raw/photos.sql'));
        DB::unprepared(file_get_contents(__DIR__ . '/raw/media.sql'));
        DB::unprepared(file_get_contents(__DIR__ . '/raw/comments.sql'));
        DB::unprepared(file_get_contents(__DIR__ . '/raw/ratings.sql'));
    }
}
