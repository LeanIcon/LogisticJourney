<?php

declare(strict_types=1);

namespace Modules\Pricing\Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Modules\Pricing\Models\Promotion;

final class PromotionSeeder extends Seeder
{
    /**
     * Seed promotions.
     */
    public function run(): void
    {
        $promotions = [
            [
                'title' => 'New Year 2024 Sale',
                'description' => 'Start the new year right with 25% off all annual plans!',
                'discount_type' => 'percentage',
                'discount_value' => 25.00,
                'start_date' => Carbon::create(2024, 1, 1, 0, 0, 0),
                'end_date' => Carbon::create(2024, 1, 31, 23, 59, 59),
                'status' => 'inactive', // Past promotion
                'applicable_plans' => ['Professional Annual'],
            ],
            [
                'title' => 'Spring Savings',
                'description' => 'Spring into action with 15% off Professional and Business plans.',
                'discount_type' => 'percentage',
                'discount_value' => 15.00,
                'start_date' => Carbon::create(2024, 3, 1, 0, 0, 0),
                'end_date' => Carbon::create(2024, 3, 31, 23, 59, 59),
                'status' => 'inactive', // Past promotion
                'applicable_plans' => ['Professional', 'Business'],
            ],
            [
                'title' => 'Summer Flash Sale',
                'description' => 'Beat the heat with our biggest sale of the year - 30% off all plans!',
                'discount_type' => 'percentage',
                'discount_value' => 30.00,
                'start_date' => Carbon::now()->addDays(10),
                'end_date' => Carbon::now()->addDays(17),
                'status' => 'active', // Upcoming promotion
                'applicable_plans' => ['Starter', 'Professional', 'Business', 'Professional Annual'],
            ],
            [
                'title' => 'Black Friday Special',
                'description' => 'Our biggest savings ever - 40% off annual plans for Black Friday!',
                'discount_type' => 'percentage',
                'discount_value' => 40.00,
                'start_date' => Carbon::create(2024, 11, 25, 0, 0, 0),
                'end_date' => Carbon::create(2024, 11, 30, 23, 59, 59),
                'status' => 'active', // Future promotion
                'applicable_plans' => ['Professional Annual'],
            ],
            [
                'title' => 'First Month Free',
                'description' => 'Try Professional plan risk-free - first month on us!',
                'discount_type' => 'fixed',
                'discount_value' => 149.00,
                'start_date' => Carbon::now()->subDays(30),
                'end_date' => Carbon::now()->addDays(60),
                'status' => 'active', // Active promotion
                'applicable_plans' => ['Professional'],
            ],
        ];

        foreach ($promotions as $promotion) {
            Promotion::updateOrCreate(
                ['title' => $promotion['title']],
                $promotion
            );
        }

        $this->command->info('✅ Created '.count($promotions).' promotions');
    }
}
