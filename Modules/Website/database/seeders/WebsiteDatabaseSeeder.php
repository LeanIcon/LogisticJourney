<?php

declare(strict_types=1);

namespace Modules\Website\Database\Seeders;

use Illuminate\Database\Seeder;

final class WebsiteDatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            FormSeeder::class,
        ]);
    }
}
