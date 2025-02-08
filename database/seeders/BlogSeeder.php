<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pages')
            ->insert([
                'title'      => 'Blog',
                'slug'       => 'blog',
                'layout'     => 'default',
                'created_at' => now(),
                'updated_at' => now(),
                'style'      => 'default',
                'blocks'     => json_encode([
                    [
                        'data' => [],
                        'type' => 'blog.homepage',
                    ],
                ]),
            ]);
    }
}
