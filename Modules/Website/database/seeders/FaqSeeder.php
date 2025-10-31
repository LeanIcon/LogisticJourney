<?php

declare(strict_types=1);

namespace Modules\Website\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Website\Models\Faq;

final class FaqSeeder extends Seeder
{
    /**
     * Seed FAQs.
     */
    public function run(): void
    {
        $faqs = [
            [
                'question' => 'What services does your logistics platform offer?',
                'answer' => '<p>Our platform provides comprehensive logistics solutions including freight management, warehouse operations, inventory tracking, order fulfillment, and real-time shipment visibility. We integrate with major carriers and offer both domestic and international shipping options.</p>',
                'status' => 'published',
            ],
            [
                'question' => 'How do I get started with your platform?',
                'answer' => '<p>Getting started is easy! Simply sign up for an account, complete your company profile, and connect your warehouse or fulfillment center. Our onboarding team will guide you through the integration process and help you configure your first shipments within 24-48 hours.</p>',
                'status' => 'published',
            ],
            [
                'question' => 'What is the pricing structure?',
                'answer' => '<p>We offer flexible pricing plans based on your shipping volume and features needed. Plans start at $49/month for small businesses and scale up to enterprise solutions. All plans include core features, with advanced analytics and premium support available on higher tiers.</p>',
                'status' => 'published',
            ],
            [
                'question' => 'Do you integrate with e-commerce platforms?',
                'answer' => '<p>Yes! We integrate seamlessly with Shopify, WooCommerce, Magento, BigCommerce, and other major e-commerce platforms. Orders sync automatically, and tracking information is pushed back to your store in real-time.</p>',
                'status' => 'published',
            ],
            [
                'question' => 'What shipping carriers do you support?',
                'answer' => '<p>We partner with all major carriers including FedEx, UPS, USPS, DHL, and regional carriers. You can compare rates across carriers and choose the best option for each shipment based on cost, speed, and service level.</p>',
                'status' => 'published',
            ],
            [
                'question' => 'Can I track my shipments in real-time?',
                'answer' => '<p>Absolutely! Our platform provides real-time tracking for all shipments. You and your customers receive automatic updates at each milestone, including pickup, in-transit, out for delivery, and delivered notifications.</p>',
                'status' => 'published',
            ],
            [
                'question' => 'Do you offer international shipping?',
                'answer' => '<p>Yes, we support international shipping to over 200 countries. Our platform handles customs documentation, duty calculations, and compliance requirements to simplify cross-border logistics.</p>',
                'status' => 'published',
            ],
            [
                'question' => 'What kind of customer support do you provide?',
                'answer' => '<p>We offer 24/7 customer support via email, live chat, and phone. Our standard plans include email support, while premium plans get priority phone support and a dedicated account manager.</p>',
                'status' => 'published',
            ],
            [
                'question' => 'Is there a mobile app available?',
                'answer' => '<p>Yes! Our mobile apps for iOS and Android allow you to manage shipments, track packages, scan barcodes, and receive notifications on the go. The apps are available for free download from the App Store and Google Play.</p>',
                'status' => 'published',
            ],
            [
                'question' => 'How secure is my data?',
                'answer' => '<p>We take security seriously. All data is encrypted in transit and at rest using industry-standard AES-256 encryption. We\'re SOC 2 Type II certified and comply with GDPR and other data protection regulations.</p>',
                'status' => 'published',
            ],
            [
                'question' => 'Can I automate my shipping workflows?',
                'answer' => '<p>Yes! Our platform offers powerful automation rules. You can set up automatic carrier selection based on weight, destination, or cost, auto-print labels, and trigger notifications. Advanced plans include custom workflow builders.</p>',
                'status' => 'published',
            ],
            [
                'question' => 'Do you offer warehouse management features?',
                'answer' => '<p>Yes, our platform includes comprehensive warehouse management capabilities including inventory tracking, bin location management, cycle counting, and pick/pack/ship workflows. Perfect for 3PLs and businesses managing their own warehouses.</p>',
                'status' => 'published',
            ],
            [
                'question' => 'What reporting and analytics are available?',
                'answer' => '<p>We provide detailed analytics on shipping costs, delivery performance, carrier performance, and operational metrics. Generate custom reports, export data to CSV/Excel, and visualize trends through interactive dashboards.</p>',
                'status' => 'published',
            ],
            [
                'question' => 'Can multiple users access the same account?',
                'answer' => '<p>Yes, you can add unlimited team members with role-based permissions. Assign specific roles like Admin, Manager, or Warehouse Staff, each with appropriate access levels to different features and data.</p>',
                'status' => 'published',
            ],
            [
                'question' => 'Is there a free trial available?',
                'answer' => '<p>Yes! We offer a 14-day free trial with full access to all features. No credit card required to start your trial. Experience the platform risk-free and see how it can transform your logistics operations.</p>',
                'status' => 'published',
            ],
            [
                'question' => 'What happens if a shipment is lost or damaged?',
                'answer' => '<p>We help you file claims with carriers and provide documentation support. All shipments include basic carrier insurance, and you can purchase additional coverage for high-value items directly through our platform.</p>',
                'status' => 'published',
            ],
            [
                'question' => 'Can I use my own carrier accounts?',
                'answer' => '<p>Absolutely! You can connect your existing carrier accounts to use your negotiated rates, or use our pre-negotiated rates. Many customers use a hybrid approach to get the best pricing.</p>',
                'status' => 'published',
            ],
            [
                'question' => 'Do you support returns management?',
                'answer' => '<p>Yes, our platform includes complete returns management. Generate return labels, track return shipments, manage return reasons, and sync return data back to your e-commerce platform or ERP system.</p>',
                'status' => 'published',
            ],
        ];

        foreach ($faqs as $index => $faq) {
            Faq::updateOrCreate(
                ['question' => $faq['question']],
                $faq
            );
        }

        $this->command->info('✅ Created '.count($faqs).' FAQs');
    }
}
