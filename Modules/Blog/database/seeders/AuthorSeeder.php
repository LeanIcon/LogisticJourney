<?php

declare(strict_types=1);


namespace Modules\Blog\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Blog\Models\Author;

final class AuthorSeeder extends Seeder
{
    /**
     * Seed blog authors.
     */
    public function run(): void
    {
        $authors = [
            [
                'name' => 'John Smith',
                'slug' => 'john-smith',
                'email' => 'john.smith@example.com',
                'bio' => 'Senior logistics expert with over 15 years of experience in supply chain management and freight optimization.',
                'website' => 'https://johnsmith.com',
                'is_guest' => false,
            ],
            [
                'name' => 'Sarah Johnson',
                'slug' => 'sarah-johnson',
                'email' => 'sarah.j@example.com',
                'bio' => 'Technology writer specializing in logistics software, automation, and digital transformation in the supply chain industry.',
                'website' => 'https://sarahjohnson.com',
                'is_guest' => false,
            ],
            [
                'name' => 'Michael Chen',
                'slug' => 'michael-chen',
                'email' => 'michael.chen@example.com',
                'bio' => 'Logistics consultant and thought leader focusing on sustainable transportation and green supply chain practices.',
                'website' => null,
                'is_guest' => false,
            ],
            [
                'name' => 'Emily Rodriguez',
                'slug' => 'emily-rodriguez',
                'email' => 'emily.r@example.com',
                'bio' => 'Supply chain analyst with expertise in data analytics, forecasting, and inventory optimization strategies.',
                'website' => 'https://emilyrodriguez.com',
                'is_guest' => false,
            ],
            [
                'name' => 'David Thompson',
                'slug' => 'david-thompson',
                'email' => 'david.t@example.com',
                'bio' => 'Warehouse management specialist and operations director with focus on lean methodologies and process improvement.',
                'website' => null,
                'is_guest' => false,
            ],
            [
                'name' => 'Lisa Anderson',
                'slug' => 'lisa-anderson',
                'email' => 'lisa.anderson@example.com',
                'bio' => 'International trade expert covering customs, compliance, and cross-border logistics regulations.',
                'website' => 'https://lisaanderson.com',
                'is_guest' => true,
            ],
            [
                'name' => 'Robert Martinez',
                'slug' => 'robert-martinez',
                'email' => 'robert.m@example.com',
                'bio' => 'E-commerce logistics strategist helping businesses scale their fulfillment operations and last-mile delivery.',
                'website' => null,
                'is_guest' => true,
            ],
            [
                'name' => 'Jennifer Kim',
                'slug' => 'jennifer-kim',
                'email' => 'jennifer.kim@example.com',
                'bio' => 'Transportation management specialist with deep knowledge of route optimization and fleet management systems.',
                'website' => 'https://jenniferkim.com',
                'is_guest' => false,
            ],
        ];

        foreach ($authors as $author) {
            Author::updateOrCreate(
                ['slug' => $author['slug']],
                $author
            );
        }

        $this->command->info('✅ Created '.count($authors).' blog authors');
    }
}
