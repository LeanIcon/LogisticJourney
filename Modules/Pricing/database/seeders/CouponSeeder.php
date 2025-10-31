<?php

declare(strict_types=1);

namespace Modules\Pricing\Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Modules\Pricing\Models\Coupon;

final class CouponSeeder extends Seeder
{
    /**
     * Seed discount coupons.
     */
    public function run(): void
    {
        $coupons = [
            [
                'code' => 'WELCOME10',
                'description' => 'Welcome new customers with 10% off their first month',
                'discount_type' => 'percentage',
                'discount_value' => 10.00,
                'usage_limit' => 1000,
                'used_count' => 247,
                'expires_at' => null, // No expiration
                'status' => 'active',
            ],
            [
                'code' => 'SAVE20NOW',
                'description' => '20% off for summer promotion',
                'discount_type' => 'percentage',
                'discount_value' => 20.00,
                'usage_limit' => 500,
                'used_count' => 142,
                'expires_at' => Carbon::now()->addDays(30),
                'status' => 'active',
            ],
            [
                'code' => 'FIFTY50',
                'description' => 'Limited time - 50% off your first month',
                'discount_type' => 'percentage',
                'discount_value' => 50.00,
                'usage_limit' => 100,
                'used_count' => 89,
                'expires_at' => Carbon::now()->addDays(14),
                'status' => 'active',
            ],
            [
                'code' => 'FREESTART',
                'description' => '$49 credit for new Starter plan users',
                'discount_type' => 'fixed',
                'discount_value' => 49.00,
                'usage_limit' => 200,
                'used_count' => 67,
                'expires_at' => Carbon::now()->addDays(60),
                'status' => 'active',
            ],
            [
                'code' => 'UPGRADE15',
                'description' => '15% off when upgrading to Business plan',
                'discount_type' => 'percentage',
                'discount_value' => 15.00,
                'usage_limit' => 300,
                'used_count' => 45,
                'expires_at' => Carbon::now()->addDays(90),
                'status' => 'active',
            ],
            [
                'code' => 'LOYALTY25',
                'description' => '25% off for existing customers renewing annual plans',
                'discount_type' => 'percentage',
                'discount_value' => 25.00,
                'usage_limit' => 150,
                'used_count' => 103,
                'expires_at' => Carbon::now()->addDays(120),
                'status' => 'active',
            ],
            [
                'code' => 'PARTNER100',
                'description' => '$100 off for partner referrals',
                'discount_type' => 'fixed',
                'discount_value' => 100.00,
                'usage_limit' => 50,
                'used_count' => 12,
                'expires_at' => null,
                'status' => 'active',
            ],
            [
                'code' => 'HOLIDAY30',
                'description' => '30% off holiday promotion',
                'discount_type' => 'percentage',
                'discount_value' => 30.00,
                'usage_limit' => 500,
                'used_count' => 487,
                'expires_at' => Carbon::now()->subDays(10), // Expired
                'status' => 'inactive',
            ],
            [
                'code' => 'FLASH40',
                'description' => '40% off for 24 hours only',
                'discount_type' => 'percentage',
                'discount_value' => 40.00,
                'usage_limit' => 100,
                'used_count' => 100, // Maxed out
                'expires_at' => Carbon::now()->subDays(5), // Expired
                'status' => 'inactive',
            ],
            [
                'code' => 'STUDENT15',
                'description' => '15% off for students and educators',
                'discount_type' => 'percentage',
                'discount_value' => 15.00,
                'usage_limit' => null, // Unlimited
                'used_count' => 34,
                'expires_at' => null,
                'status' => 'active',
            ],
            [
                'code' => 'NONPROFIT20',
                'description' => '20% off for nonprofit organizations',
                'discount_type' => 'percentage',
                'discount_value' => 20.00,
                'usage_limit' => null, // Unlimited
                'used_count' => 18,
                'expires_at' => null,
                'status' => 'active',
            ],
            [
                'code' => 'TRIAL2MONTHS',
                'description' => '2 months free trial instead of 14 days',
                'discount_type' => 'fixed',
                'discount_value' => 298.00, // $149 * 2
                'usage_limit' => 75,
                'used_count' => 56,
                'expires_at' => Carbon::now()->addDays(45),
                'status' => 'active',
            ],
            [
                'code' => 'REFER50',
                'description' => '$50 credit for successful referrals',
                'discount_type' => 'fixed',
                'discount_value' => 50.00,
                'usage_limit' => null, // Unlimited
                'used_count' => 123,
                'expires_at' => null,
                'status' => 'active',
            ],
            [
                'code' => 'WINBACK35',
                'description' => '35% off to bring back former customers',
                'discount_type' => 'percentage',
                'discount_value' => 35.00,
                'usage_limit' => 200,
                'used_count' => 78,
                'expires_at' => Carbon::now()->addDays(30),
                'status' => 'active',
            ],
            [
                'code' => 'EARLY2024',
                'description' => 'Early adopter discount for 2024',
                'discount_type' => 'percentage',
                'discount_value' => 25.00,
                'usage_limit' => 250,
                'used_count' => 234,
                'expires_at' => Carbon::now()->subDays(30), // Expired
                'status' => 'inactive',
            ],
        ];

        foreach ($coupons as $coupon) {
            Coupon::updateOrCreate(
                ['code' => $coupon['code']],
                $coupon
            );
        }

        $active = count(array_filter($coupons, fn ($c) => $c['status'] === 'active'));
        $expired = count($coupons) - $active;

        $this->command->info('✅ Created '.count($coupons).' coupons');
        $this->command->info('   → Active: '.$active);
        $this->command->info('   → Inactive/Expired: '.$expired);
    }
}
