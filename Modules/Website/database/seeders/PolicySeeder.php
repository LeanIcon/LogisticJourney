<?php

declare(strict_types=1);


namespace Modules\Website\Database\Seeders;

use Illuminate\Database\Seeder;
use League\CommonMark\CommonMarkConverter;
use Modules\Website\Models\Policy;

final class PolicySeeder extends Seeder
{
    private CommonMarkConverter $converter;

    public function __construct()
    {
        $this->converter = new CommonMarkConverter([
            'html_input' => 'strip',
            'allow_unsafe_links' => false,
        ]);
    }

    /**
     * Seed policies from markdown files.
     */
    public function run(): void
    {
        $policiesPath = base_path('Modules/Website/policies');

        $policyFiles = [
            [
                'file' => 'Privacy_Policy_LogisticJourney.md',
                'title' => 'Privacy Policy',
                'slug' => 'privacy-policy',
            ],
            [
                'file' => 'Terms_and_Conditions_LogisticJourney.md',
                'title' => 'Terms and Conditions',
                'slug' => 'terms-and-conditions',
            ],
            [
                'file' => 'Refund_Policy_LogisticJourney.md',
                'title' => 'Refund Policy',
                'slug' => 'refund-policy',
            ],
            [
                'file' => 'Delivery_Policy_LogisticJourney.md',
                'title' => 'Delivery Policy',
                'slug' => 'delivery-policy',
            ],
            [
                'file' => 'Cancellation_Policy_LogisticJourney.md',
                'title' => 'Cancellation Policy',
                'slug' => 'cancellation-policy',
            ],
        ];

        foreach ($policyFiles as $policyData) {
            $filePath = $policiesPath.'/'.$policyData['file'];

            if (file_exists($filePath)) {
                $markdown = file_get_contents($filePath);
                $html = $this->converter->convert($markdown)->getContent();

                Policy::updateOrCreate(
                    ['slug' => $policyData['slug']],
                    [
                        'title' => $policyData['title'],
                        'slug' => $policyData['slug'],
                        'content' => $html,
                        'status' => 'published',
                    ]
                );

                $this->command->info("✅ Created/Updated: {$policyData['title']}");
            } else {
                $this->command->warn("⚠️  File not found: {$policyData['file']}");
            }
        }

        $this->command->info('✅ Policy seeding completed');
    }
}
