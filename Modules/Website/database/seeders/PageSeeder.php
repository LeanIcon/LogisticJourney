<?php

declare(strict_types=1);

namespace Modules\Website\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Website\Models\Page;

final class PageSeeder extends Seeder
{
    public function run(): void
    {
        // Create or update the demo-request page with the DemoRequest block
        $blocks = [
            [
                'type' => 'DemoRequest',
                'data' => [
                    'title' => 'Request a Demo',
                    'subtitle' => 'Get a personal walkthrough of Logistic Journey with one of our product experts',
                    'phone' => '+27 11 568 7109',
                    'email' => 'support@logisticjourney.com',
                    'address' => "The Workshop, Unit 7\n70 Seventh Avenue\nParktown North, Johannesburg\nGauteng, South Africa",
                    'social_links' => [
                        ['type' => 'facebook', 'url' => 'https://facebook.com/logisticjourney'],
                        ['type' => 'linkedin', 'url' => 'https://linkedin.com/company/logisticjourney'],
                        ['type' => 'youtube', 'url' => 'https://youtube.com/logisticjourney'],
                        ['type' => 'instagram', 'url' => 'https://instagram.com/logisticjourney'],
                    ],
                    'show_background' => true,
                ],
            ],
        ];

        Page::updateOrCreate(
            ['slug' => 'demo-request'],
            [
                'title' => 'See Logistic Journey In Action',
                'type' => 'custom',
                'status' => 'published',
                'content' => null,
                'blocks' => $blocks,
            ]
        );

        $this->command->info('✅ Created/updated page: demo-request with DemoRequest block');
    }
}
