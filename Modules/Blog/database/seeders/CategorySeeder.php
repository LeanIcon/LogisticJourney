<?php

declare(strict_types=1);

namespace Modules\Blog\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Blog\Models\Category;

final class CategorySeeder extends Seeder
{
    /**
     * Seed blog categories.
     */
    public function run(): void
    {
        $categories = [
            // Top-level categories
            [
                'name' => 'Supply Chain',
                'slug' => 'supply-chain',
                'description' => 'Articles about supply chain management, optimization, and best practices.',
                'order' => 1,
                'parent_id' => null,
            ],
            [
                'name' => 'Transportation',
                'slug' => 'transportation',
                'description' => 'Insights on freight, shipping, and transportation logistics.',
                'order' => 2,
                'parent_id' => null,
            ],
            [
                'name' => 'Technology',
                'slug' => 'technology',
                'description' => 'Technology trends, software solutions, and digital transformation in logistics.',
                'order' => 3,
                'parent_id' => null,
            ],
            [
                'name' => 'Warehouse Management',
                'slug' => 'warehouse-management',
                'description' => 'Warehouse operations, inventory management, and fulfillment strategies.',
                'order' => 4,
                'parent_id' => null,
            ],
            [
                'name' => 'Industry News',
                'slug' => 'industry-news',
                'description' => 'Latest news and updates from the logistics and supply chain industry.',
                'order' => 5,
                'parent_id' => null,
            ],
        ];

        // Create top-level categories first
        foreach ($categories as $categoryData) {
            Category::updateOrCreate(
                ['slug' => $categoryData['slug']],
                $categoryData
            );
        }

        // Sub-categories (wait for parent categories to be created)
        $supplyChain = Category::where('slug', 'supply-chain')->first();
        $transportation = Category::where('slug', 'transportation')->first();
        $technology = Category::where('slug', 'technology')->first();
        $warehouse = Category::where('slug', 'warehouse-management')->first();

        $subCategories = [
            // Supply Chain subcategories
            [
                'name' => 'Procurement',
                'slug' => 'procurement',
                'description' => 'Strategic sourcing, vendor management, and procurement processes.',
                'order' => 1,
                'parent_id' => $supplyChain->id,
            ],
            [
                'name' => 'Demand Planning',
                'slug' => 'demand-planning',
                'description' => 'Forecasting, demand sensing, and capacity planning.',
                'order' => 2,
                'parent_id' => $supplyChain->id,
            ],
            [
                'name' => 'Risk Management',
                'slug' => 'risk-management',
                'description' => 'Supply chain resilience, risk mitigation, and contingency planning.',
                'order' => 3,
                'parent_id' => $supplyChain->id,
            ],

            // Transportation subcategories
            [
                'name' => 'Freight Management',
                'slug' => 'freight-management',
                'description' => 'LTL, FTL, and freight forwarding strategies.',
                'order' => 1,
                'parent_id' => $transportation->id,
            ],
            [
                'name' => 'Last-Mile Delivery',
                'slug' => 'last-mile-delivery',
                'description' => 'Final delivery strategies and urban logistics.',
                'order' => 2,
                'parent_id' => $transportation->id,
            ],
            [
                'name' => 'Fleet Management',
                'slug' => 'fleet-management',
                'description' => 'Vehicle tracking, maintenance, and driver management.',
                'order' => 3,
                'parent_id' => $transportation->id,
            ],

            // Technology subcategories
            [
                'name' => 'Automation',
                'slug' => 'automation',
                'description' => 'Robotics, AI, and automated warehouse systems.',
                'order' => 1,
                'parent_id' => $technology->id,
            ],
            [
                'name' => 'IoT & Tracking',
                'slug' => 'iot-tracking',
                'description' => 'IoT sensors, GPS tracking, and real-time visibility solutions.',
                'order' => 2,
                'parent_id' => $technology->id,
            ],
            [
                'name' => 'Software Solutions',
                'slug' => 'software-solutions',
                'description' => 'TMS, WMS, and logistics management platforms.',
                'order' => 3,
                'parent_id' => $technology->id,
            ],

            // Warehouse subcategories
            [
                'name' => 'Inventory Optimization',
                'slug' => 'inventory-optimization',
                'description' => 'Stock management, cycle counting, and inventory accuracy.',
                'order' => 1,
                'parent_id' => $warehouse->id,
            ],
            [
                'name' => 'Order Fulfillment',
                'slug' => 'order-fulfillment',
                'description' => 'Pick, pack, ship processes and fulfillment strategies.',
                'order' => 2,
                'parent_id' => $warehouse->id,
            ],
        ];

        foreach ($subCategories as $categoryData) {
            Category::updateOrCreate(
                ['slug' => $categoryData['slug']],
                $categoryData
            );
        }

        $totalCategories = count($categories) + count($subCategories);
        $this->command->info("✅ Created {$totalCategories} blog categories");
    }
}
