<?php

declare(strict_types=1);


namespace Modules\Blog\Database\Seeders;

use Illuminate\Database\Seeder;

final class BlogDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            AuthorSeeder::class,
            CategorySeeder::class,
            PostSeeder::class,
        ]);
    }
}
