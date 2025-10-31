<?php

declare(strict_types=1);

namespace Modules\Pricing\Database\Seeders;

use Illuminate\Database\Seeder;

final class PricingDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            PlanSeeder::class,
            PromotionSeeder::class,
            CouponSeeder::class,
        ]);
    }
}
