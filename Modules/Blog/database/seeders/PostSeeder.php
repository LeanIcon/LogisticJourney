<?php

declare(strict_types=1);

namespace Modules\Blog\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Blog\Models\Author;
use Modules\Blog\Models\Category;
use Modules\Blog\Models\Post;

final class PostSeeder extends Seeder
{
    /**
     * Seed blog posts.
     */
    public function run(): void
    {
        $authors = Author::all();
        $categories = Category::all();

        if ($authors->isEmpty() || $categories->isEmpty()) {
            $this->command->warn('⚠️  Authors and Categories must be seeded first. Run AuthorSeeder and CategorySeeder.');

            return;
        }

        $posts = [
            [
                'title' => '10 Ways to Optimize Your Supply Chain in 2025',
                'slug' => '10-ways-optimize-supply-chain-2025',
                'excerpt' => 'Discover proven strategies to streamline your supply chain operations and reduce costs in the new year.',
                'body' => $this->generateBody('supply-chain-optimization'),
                'type' => 'blog',
                'status' => 'published',
                'is_featured' => true,
                'published_at' => now()->subDays(2),
                'meta_title' => '10 Ways to Optimize Your Supply Chain in 2025 | Logistics Blog',
                'meta_description' => 'Learn 10 proven strategies to streamline supply chain operations, reduce costs, and improve efficiency in 2025.',
                'categories' => ['supply-chain', 'procurement'],
            ],
            [
                'title' => 'The Future of Warehouse Automation: AI and Robotics',
                'slug' => 'future-warehouse-automation-ai-robotics',
                'excerpt' => 'How artificial intelligence and robotics are transforming modern warehouse operations.',
                'body' => $this->generateBody('warehouse-automation'),
                'type' => 'blog',
                'status' => 'published',
                'is_featured' => true,
                'published_at' => now()->subDays(5),
                'meta_title' => 'Warehouse Automation with AI & Robotics | Future of Logistics',
                'meta_description' => 'Explore how AI and robotics are revolutionizing warehouse automation and improving operational efficiency.',
                'categories' => ['warehouse-management', 'automation', 'technology'],
            ],
            [
                'title' => 'Last-Mile Delivery Challenges and Solutions',
                'slug' => 'last-mile-delivery-challenges-solutions',
                'excerpt' => 'Addressing the toughest challenges in last-mile delivery with innovative solutions.',
                'body' => $this->generateBody('last-mile-delivery'),
                'type' => 'blog',
                'status' => 'published',
                'is_featured' => true,
                'published_at' => now()->subDays(7),
                'meta_title' => 'Last-Mile Delivery Challenges & Solutions for 2025',
                'meta_description' => 'Discover effective solutions to overcome last-mile delivery challenges and improve customer satisfaction.',
                'categories' => ['transportation', 'last-mile-delivery'],
            ],
            [
                'title' => 'Implementing a Transportation Management System (TMS)',
                'slug' => 'implementing-transportation-management-system-tms',
                'excerpt' => 'A comprehensive guide to selecting and implementing a TMS for your business.',
                'body' => $this->generateBody('tms-implementation'),
                'type' => 'case study',
                'status' => 'published',
                'is_featured' => false,
                'published_at' => now()->subDays(10),
                'meta_title' => 'How to Implement a TMS | Step-by-Step Guide',
                'meta_description' => 'Complete guide to selecting and implementing a Transportation Management System (TMS) for your logistics operations.',
                'categories' => ['technology', 'software-solutions', 'transportation'],
            ],
            [
                'title' => 'Sustainable Logistics: Reducing Carbon Footprint',
                'slug' => 'sustainable-logistics-reducing-carbon-footprint',
                'excerpt' => 'Practical steps to make your logistics operations more environmentally friendly.',
                'body' => $this->generateBody('sustainable-logistics'),
                'type' => 'blog',
                'status' => 'published',
                'is_featured' => false,
                'published_at' => now()->subDays(12),
                'meta_title' => 'Sustainable Logistics & Carbon Footprint Reduction',
                'meta_description' => 'Learn how to implement sustainable logistics practices and reduce your carbon footprint.',
                'categories' => ['supply-chain', 'industry-news'],
            ],
            [
                'title' => 'Inventory Management Best Practices for E-commerce',
                'slug' => 'inventory-management-best-practices-ecommerce',
                'excerpt' => 'Essential inventory management strategies for online retailers.',
                'body' => $this->generateBody('inventory-management'),
                'type' => 'blog',
                'status' => 'published',
                'is_featured' => false,
                'published_at' => now()->subDays(15),
                'meta_title' => 'E-commerce Inventory Management Best Practices',
                'meta_description' => 'Master inventory management with proven strategies designed for e-commerce businesses.',
                'categories' => ['warehouse-management', 'inventory-optimization'],
            ],
            [
                'title' => 'IoT in Logistics: Real-Time Tracking and Visibility',
                'slug' => 'iot-logistics-real-time-tracking-visibility',
                'excerpt' => 'How IoT sensors and connected devices are improving supply chain visibility.',
                'body' => $this->generateBody('iot-tracking'),
                'type' => 'case study',
                'status' => 'published',
                'is_featured' => false,
                'published_at' => now()->subDays(18),
                'meta_title' => 'IoT in Logistics: Real-Time Tracking Solutions',
                'meta_description' => 'Discover how IoT technology enables real-time tracking and improves supply chain visibility.',
                'categories' => ['technology', 'iot-tracking'],
            ],
            [
                'title' => 'Managing Supply Chain Disruptions in 2025',
                'slug' => 'managing-supply-chain-disruptions-2025',
                'excerpt' => 'Strategies to build resilience and mitigate risks in your supply chain.',
                'body' => $this->generateBody('supply-chain-disruptions'),
                'type' => 'blog',
                'status' => 'published',
                'is_featured' => false,
                'published_at' => now()->subDays(20),
                'meta_title' => 'Managing Supply Chain Disruptions | Risk Mitigation',
                'meta_description' => 'Learn effective strategies to manage supply chain disruptions and build operational resilience.',
                'categories' => ['supply-chain', 'risk-management'],
            ],
            [
                'title' => 'Fleet Management Software: A Complete Buyer\'s Guide',
                'slug' => 'fleet-management-software-buyers-guide',
                'excerpt' => 'Everything you need to know when selecting fleet management software.',
                'body' => $this->generateBody('fleet-management'),
                'type' => 'case study',
                'status' => 'published',
                'is_featured' => false,
                'published_at' => now()->subDays(23),
                'meta_title' => 'Fleet Management Software Buyer\'s Guide 2025',
                'meta_description' => 'Complete guide to choosing the right fleet management software for your transportation needs.',
                'categories' => ['transportation', 'fleet-management', 'software-solutions'],
            ],
            [
                'title' => 'Demand Forecasting Techniques for Accurate Planning',
                'slug' => 'demand-forecasting-techniques-accurate-planning',
                'excerpt' => 'Advanced forecasting methods to improve inventory planning and reduce stockouts.',
                'body' => $this->generateBody('demand-forecasting'),
                'type' => 'case study',
                'status' => 'published',
                'is_featured' => false,
                'published_at' => now()->subDays(25),
                'meta_title' => 'Demand Forecasting Techniques | Inventory Planning',
                'meta_description' => 'Master demand forecasting techniques to improve inventory planning and reduce stockouts.',
                'categories' => ['supply-chain', 'demand-planning'],
            ],
            [
                'title' => 'Cross-Border Logistics: Navigating Customs and Compliance',
                'slug' => 'cross-border-logistics-customs-compliance',
                'excerpt' => 'A practical guide to international shipping regulations and compliance requirements.',
                'body' => $this->generateBody('cross-border-logistics'),
                'type' => 'case study',
                'status' => 'published',
                'is_featured' => false,
                'published_at' => now()->subDays(28),
                'meta_title' => 'Cross-Border Logistics: Customs & Compliance Guide',
                'meta_description' => 'Navigate international shipping with our comprehensive guide to customs and compliance.',
                'categories' => ['transportation', 'industry-news'],
            ],
            [
                'title' => 'Optimizing Order Fulfillment Speed and Accuracy',
                'slug' => 'optimizing-order-fulfillment-speed-accuracy',
                'excerpt' => 'Proven strategies to improve fulfillment efficiency and reduce errors.',
                'body' => $this->generateBody('order-fulfillment'),
                'type' => 'blog',
                'status' => 'published',
                'is_featured' => false,
                'published_at' => now()->subDays(30),
                'meta_title' => 'Order Fulfillment Optimization | Speed & Accuracy',
                'meta_description' => 'Learn strategies to optimize order fulfillment speed and accuracy in your warehouse.',
                'categories' => ['warehouse-management', 'order-fulfillment'],
            ],
            [
                'title' => 'Upcoming Trends in Logistics Technology',
                'slug' => 'upcoming-trends-logistics-technology',
                'excerpt' => 'Stay ahead with insights into emerging technologies transforming logistics.',
                'body' => $this->generateBody('logistics-trends'),
                'type' => 'blog',
                'status' => 'scheduled',
                'is_featured' => false,
                'scheduled_for' => now()->addDays(3),
                'published_at' => null,
                'meta_title' => 'Upcoming Trends in Logistics Technology 2025',
                'meta_description' => 'Explore the latest technology trends shaping the future of logistics and supply chain.',
                'categories' => ['technology', 'industry-news'],
            ],
            [
                'title' => 'Building a Resilient Supply Chain Network',
                'slug' => 'building-resilient-supply-chain-network',
                'excerpt' => 'How to design supply chains that withstand disruptions and uncertainties.',
                'body' => $this->generateBody('resilient-supply-chain'),
                'type' => 'blog',
                'status' => 'draft',
                'is_featured' => false,
                'published_at' => null,
                'meta_title' => 'Building a Resilient Supply Chain Network',
                'meta_description' => 'Design supply chains that can withstand disruptions with these resilience strategies.',
                'categories' => ['supply-chain', 'risk-management'],
            ],
        ];

        foreach ($posts as $postData) {
            $categoryNames = $postData['categories'];
            unset($postData['categories']);

            // Set random author
            $postData['author_id'] = $authors->random()->id;

            $post = Post::updateOrCreate(
                ['slug' => $postData['slug']],
                $postData
            );

            // Attach categories
            $categoryIds = Category::whereIn('slug', $categoryNames)->pluck('id');
            $post->categories()->sync($categoryIds);
        }

        $this->command->info('✅ Created '.count($posts).' blog posts with categories');
    }

    private function generateBody(string $type): string
    {
        $bodies = [
            'supply-chain-optimization' => '<h2>Introduction</h2><p>Supply chain optimization is crucial for maintaining competitive advantage in today\'s fast-paced logistics landscape. In this comprehensive guide, we\'ll explore 10 proven strategies that will help you streamline operations and reduce costs.</p><h2>1. Implement Demand-Driven Planning</h2><p>Move away from traditional forecast-based planning and adopt demand-driven approaches that respond to real-time market signals.</p><h2>2. Leverage Data Analytics</h2><p>Use advanced analytics to gain insights into your supply chain performance and identify optimization opportunities.</p><h2>3. Automate Repetitive Tasks</h2><p>Reduce manual errors and improve efficiency by automating routine supply chain processes.</p>',

            'warehouse-automation' => '<h2>The Dawn of Smart Warehouses</h2><p>Warehouse automation has evolved dramatically with the integration of AI and robotics. Modern facilities are transforming into intelligent operations that can adapt and learn.</p><h2>Key Technologies</h2><p>Autonomous mobile robots (AMRs), AI-powered inventory management systems, and machine learning algorithms are reshaping how warehouses operate.</p><h2>Benefits and ROI</h2><p>Companies implementing warehouse automation typically see 25-40% improvement in operational efficiency and significant reduction in labor costs.</p>',

            'last-mile-delivery' => '<h2>The Last-Mile Challenge</h2><p>Last-mile delivery represents up to 53% of total shipping costs and poses unique challenges for logistics providers. Let\'s explore effective solutions.</p><h2>Urban Delivery Strategies</h2><p>Micro-fulfillment centers, route optimization, and alternative delivery methods like lockers and pickup points are proving effective.</p><h2>Technology Solutions</h2><p>Real-time tracking, dynamic routing, and customer communication platforms are essential for successful last-mile operations.</p>',

            'default' => '<h2>Introduction</h2><p>This article provides comprehensive insights into modern logistics practices and strategies for operational excellence.</p><h2>Key Concepts</h2><p>Understanding the fundamentals is essential for implementing effective logistics solutions in your organization.</p><h2>Best Practices</h2><p>Industry-leading companies follow proven methodologies to achieve superior supply chain performance.</p><h2>Conclusion</h2><p>By applying these principles, you can transform your logistics operations and drive business success.</p>',
        ];

        return $bodies[$type] ?? $bodies['default'];
    }
}
