<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = collect([
            'HTML',
            'CSS',
            'PHP',
            'Laravel',
            'JavaScript',
            'React',
            'Tailwind',
        ]);

        $tags->each(
            fn ($tag) => \App\Models\Screencast\Tag::create([
                'name' => $tag,
                'slug' => \Illuminate\Support\Str::slug($tag),
            ])
        );
    }
}
