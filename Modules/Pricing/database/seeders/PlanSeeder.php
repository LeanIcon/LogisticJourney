<?php

declare(strict_types=1);


namespace Modules\Pricing\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Pricing\Models\Plan;

final class PlanSeeder extends Seeder
{
    /**
     * Seed pricing plans.
     */
    public function run(): void
    {
        $plans = [
            [
                'name' => 'Starter',
                'description' => 'Perfect for small businesses and startups just getting started with shipping. Includes up to 100 shipments per month, basic carrier integrations (USPS, FedEx, UPS), email support, real-time tracking, label printing, and basic reporting.',
                'price' => 49.00,
                'billing_cycle' => 'monthly',
                'status' => 'active',
            ],
            [
                'name' => 'Professional',
                'description' => 'Ideal for growing businesses that need advanced features and better rates. Includes up to 500 shipments per month, all carrier integrations, priority email & chat support, advanced tracking & notifications, batch label printing, custom branding, advanced analytics, returns management, and API access.',
                'price' => 149.00,
                'billing_cycle' => 'monthly',
                'status' => 'active',
            ],
            [
                'name' => 'Business',
                'description' => 'Comprehensive solution for established businesses with high shipping volumes. Includes up to 2,000 shipments per month, all carrier integrations + regional carriers, priority phone support, multi-user accounts with roles, multi-warehouse support, automation rules, advanced reporting & exports, returns portal, dedicated account manager, integration support, and custom workflows.',
                'price' => 349.00,
                'billing_cycle' => 'monthly',
                'status' => 'active',
            ],
            [
                'name' => 'Enterprise',
                'description' => 'Custom solution for large organizations with complex shipping requirements. Includes unlimited shipments, all carriers + custom carrier integrations, 24/7 priority support, unlimited users, unlimited warehouses, advanced automation & AI routing, white-label solution, custom integrations, SLA guarantee, dedicated success team, custom development, data migration assistance, and training & onboarding.',
                'price' => 999.00,
                'billing_cycle' => 'monthly',
                'status' => 'active',
            ],
            [
                'name' => 'Professional Annual',
                'description' => 'Save 20% with annual billing on our most popular plan. Same features as Professional monthly plan but billed annually for $1,428 (20% discount).',
                'price' => 1428.00, // $149 * 12 * 0.8 = $1,428 (20% discount)
                'billing_cycle' => 'yearly',
                'status' => 'active',
            ],
        ];

        foreach ($plans as $plan) {
            Plan::updateOrCreate(
                ['name' => $plan['name'], 'billing_cycle' => $plan['billing_cycle']],
                $plan
            );
        }

        $this->command->info('✅ Created '.count($plans).' pricing plans');
    }
}
