<?php

declare(strict_types=1);

namespace Modules\Website\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Website\Models\Form;

final class FormSeeder extends Seeder
{
    /**
     * Seed the application's forms.
     * Creates essential forms: Contact, Newsletter Subscription, and Demo Request.
     */
    public function run(): void
    {
        $forms = [
            // Contact Form
            [
                'name' => 'Contact Form',
                'slug' => 'contact-form',
                'description' => 'General contact form for customer inquiries, support requests, and feedback.',
                'status' => 'published',
                'fields' => [
                    [
                        'name' => 'name',
                        'label' => 'Full Name',
                        'type' => 'text',
                        'placeholder' => 'Enter your full name',
                        'required' => true,
                        'validation' => ['required', 'string', 'max:255'],
                    ],
                    [
                        'name' => 'email',
                        'label' => 'Email Address',
                        'type' => 'email',
                        'placeholder' => 'your.email@example.com',
                        'required' => true,
                        'validation' => ['required', 'email', 'max:255'],
                    ],
                    [
                        'name' => 'phone',
                        'label' => 'Phone Number',
                        'type' => 'tel',
                        'placeholder' => '+1 (555) 123-4567',
                        'required' => false,
                        'validation' => ['nullable', 'string', 'max:20'],
                    ],
                    [
                        'name' => 'subject',
                        'label' => 'Subject',
                        'type' => 'select',
                        'placeholder' => 'Select a subject',
                        'required' => true,
                        'options' => [
                            'general' => 'General Inquiry',
                            'support' => 'Technical Support',
                            'sales' => 'Sales Question',
                            'feedback' => 'Feedback',
                            'other' => 'Other',
                        ],
                        'validation' => ['required', 'string', 'in:general,support,sales,feedback,other'],
                    ],
                    [
                        'name' => 'message',
                        'label' => 'Message',
                        'type' => 'textarea',
                        'placeholder' => 'Tell us how we can help you...',
                        'required' => true,
                        'rows' => 5,
                        'validation' => ['required', 'string', 'min:10', 'max:5000'],
                    ],
                ],
                'settings' => [
                    'submit_button_text' => 'Send Message',
                    'success_message' => 'Thank you for contacting us! We\'ll get back to you within 24 hours.',
                    'redirect_url' => null,
                    'send_confirmation_email' => true,
                    'notify_admin' => true,
                    'admin_email' => env('MAIL_FROM_ADDRESS', 'hello@example.com'),
                    'enable_captcha' => true,
                    'allow_file_uploads' => false,
                    'max_submissions_per_day' => 10,
                ],
            ],

            // Newsletter Subscription Form
            [
                'name' => 'Newsletter Subscription',
                'slug' => 'newsletter-subscription',
                'description' => 'Newsletter signup form for email marketing campaigns and updates.',
                'status' => 'published',
                'fields' => [
                    [
                        'name' => 'email',
                        'label' => 'Email Address',
                        'type' => 'email',
                        'placeholder' => 'Enter your email address',
                        'required' => true,
                        'validation' => ['required', 'email', 'max:255', 'unique:subscribers,email'],
                    ],
                    [
                        'name' => 'name',
                        'label' => 'Name',
                        'type' => 'text',
                        'placeholder' => 'Enter your name (optional)',
                        'required' => false,
                        'validation' => ['nullable', 'string', 'max:255'],
                    ],
                    [
                        'name' => 'preferences',
                        'label' => 'Email Preferences',
                        'type' => 'checkbox_group',
                        'required' => false,
                        'options' => [
                            'product_updates' => 'Product Updates',
                            'blog_posts' => 'Blog Posts',
                            'promotions' => 'Special Offers & Promotions',
                            'events' => 'Events & Webinars',
                        ],
                        'validation' => ['nullable', 'array'],
                    ],
                    [
                        'name' => 'consent',
                        'label' => 'I agree to receive marketing emails',
                        'type' => 'checkbox',
                        'required' => true,
                        'validation' => ['required', 'accepted'],
                    ],
                ],
                'settings' => [
                    'submit_button_text' => 'Subscribe',
                    'success_message' => 'Successfully subscribed! Please check your email to confirm your subscription.',
                    'redirect_url' => null,
                    'send_confirmation_email' => true,
                    'require_double_optin' => true,
                    'notify_admin' => false,
                    'enable_captcha' => true,
                    'allow_file_uploads' => false,
                    'max_submissions_per_day' => null,
                ],
            ],

            // Demo Request Form
            [
                'name' => 'Request Demo',
                'slug' => 'demo-request',
                'description' => 'Demo request form for potential customers to schedule product demonstrations.',
                'status' => 'published',
                'fields' => [
                    [
                        'name' => 'first_name',
                        'label' => 'First Name',
                        'type' => 'text',
                        'placeholder' => 'John',
                        'required' => true,
                        'validation' => ['required', 'string', 'max:100'],
                    ],
                    [
                        'name' => 'last_name',
                        'label' => 'Last Name',
                        'type' => 'text',
                        'placeholder' => 'Doe',
                        'required' => true,
                        'validation' => ['required', 'string', 'max:100'],
                    ],
                    [
                        'name' => 'email',
                        'label' => 'Work Email',
                        'type' => 'email',
                        'placeholder' => 'john.doe@company.com',
                        'required' => true,
                        'validation' => ['required', 'email', 'max:255'],
                    ],
                    [
                        'name' => 'phone',
                        'label' => 'Phone Number',
                        'type' => 'tel',
                        'placeholder' => '+1 (555) 123-4567',
                        'required' => true,
                        'validation' => ['required', 'string', 'max:20'],
                    ],
                    [
                        'name' => 'company',
                        'label' => 'Company Name',
                        'type' => 'text',
                        'placeholder' => 'Your Company Inc.',
                        'required' => true,
                        'validation' => ['required', 'string', 'max:255'],
                    ],
                    [
                        'name' => 'company_size',
                        'label' => 'Company Size',
                        'type' => 'select',
                        'placeholder' => 'Select company size',
                        'required' => true,
                        'options' => [
                            '1-10' => '1-10 employees',
                            '11-50' => '11-50 employees',
                            '51-200' => '51-200 employees',
                            '201-500' => '201-500 employees',
                            '501-1000' => '501-1,000 employees',
                            '1000+' => '1,000+ employees',
                        ],
                        'validation' => ['required', 'string'],
                    ],
                    [
                        'name' => 'job_title',
                        'label' => 'Job Title',
                        'type' => 'text',
                        'placeholder' => 'e.g., CEO, CTO, Product Manager',
                        'required' => false,
                        'validation' => ['nullable', 'string', 'max:255'],
                    ],
                    [
                        'name' => 'industry',
                        'label' => 'Industry',
                        'type' => 'select',
                        'placeholder' => 'Select your industry',
                        'required' => false,
                        'options' => [
                            'technology' => 'Technology',
                            'healthcare' => 'Healthcare',
                            'finance' => 'Finance',
                            'retail' => 'Retail',
                            'manufacturing' => 'Manufacturing',
                            'education' => 'Education',
                            'logistics' => 'Logistics & Transportation',
                            'other' => 'Other',
                        ],
                        'validation' => ['nullable', 'string'],
                    ],
                    [
                        'name' => 'preferred_date',
                        'label' => 'Preferred Demo Date',
                        'type' => 'date',
                        'placeholder' => 'Select a date',
                        'required' => false,
                        'validation' => ['nullable', 'date', 'after:today'],
                    ],
                    [
                        'name' => 'preferred_time',
                        'label' => 'Preferred Time',
                        'type' => 'select',
                        'placeholder' => 'Select preferred time',
                        'required' => false,
                        'options' => [
                            'morning' => 'Morning (9 AM - 12 PM)',
                            'afternoon' => 'Afternoon (12 PM - 4 PM)',
                            'evening' => 'Evening (4 PM - 6 PM)',
                        ],
                        'validation' => ['nullable', 'string'],
                    ],
                    [
                        'name' => 'message',
                        'label' => 'Additional Information',
                        'type' => 'textarea',
                        'placeholder' => 'Tell us about your requirements or any specific features you\'re interested in...',
                        'required' => false,
                        'rows' => 4,
                        'validation' => ['nullable', 'string', 'max:2000'],
                    ],
                ],
                'settings' => [
                    'submit_button_text' => 'Request Demo',
                    'success_message' => 'Thank you for your interest! Our team will contact you within 1 business day to schedule your demo.',
                    'redirect_url' => '/thank-you',
                    'send_confirmation_email' => true,
                    'notify_admin' => true,
                    'admin_email' => env('MAIL_FROM_ADDRESS', 'hello@example.com'),
                    'enable_captcha' => true,
                    'allow_file_uploads' => false,
                    'max_submissions_per_day' => 5,
                    'priority' => 'high',
                ],
            ],
        ];

        foreach ($forms as $formData) {
            Form::updateOrCreate(
                ['slug' => $formData['slug']],
                $formData
            );
        }

        $this->command->info('✅ Created 3 essential forms: Contact, Newsletter Subscription, and Demo Request');
    }
}
