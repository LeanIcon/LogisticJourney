<?php

declare(strict_types=1);

namespace Modules\Website\Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Modules\Website\Models\Contact;

final class ContactSeeder extends Seeder
{
    /**
     * Seed contacts/leads.
     */
    public function run(): void
    {
        // Get admin users for assignment (if any exist)
        $users = User::all();
        $userIds = $users->isNotEmpty() ? $users->pluck('id')->toArray() : [null];

        $contacts = [
            [
                'name' => 'John Smith - Acme Corporation',
                'email' => 'procurement@acmecorp.com',
                'phone' => '+1 (555) 123-4567',
                'message' => 'We\'re interested in your warehouse management solution for our 3 distribution centers. Looking for a demo and pricing information.',
                'source' => 'website',
                'status' => 'new',
                'assigned_to' => $userIds[array_key_first($userIds)],
            ],
            [
                'name' => 'Sarah Martinez - Tech Startup Inc',
                'email' => 'smartinez@techstartup.io',
                'phone' => '+1 (555) 234-5678',
                'message' => 'We need a shipping solution that integrates with Shopify. Our monthly volume is around 500 orders. Can you help?',
                'source' => 'referral',
                'status' => 'contacted',
                'assigned_to' => $userIds[array_key_first($userIds)],
            ],
            [
                'name' => 'Michael Chen - Global Retail Solutions',
                'email' => 'mchen@globalretail.com',
                'phone' => '+1 (555) 345-6789',
                'message' => 'Requesting information about your international shipping capabilities. We ship to 50+ countries monthly.',
                'source' => 'website',
                'status' => 'qualified',
                'assigned_to' => $userIds[array_key_first($userIds)],
            ],
            [
                'name' => 'Jennifer Thompson - E-commerce Essentials',
                'email' => 'j.thompson@ecommerce.net',
                'phone' => '+1 (555) 456-7890',
                'message' => 'Looking to switch from our current provider. Need better rates and tracking. Can we schedule a call?',
                'source' => 'google',
                'status' => 'negotiation',
                'assigned_to' => $userIds[array_key_first($userIds)],
            ],
            [
                'name' => 'David Wilson - Wilson Manufacturing',
                'email' => 'dwilson@manufacturing.com',
                'phone' => '+1 (555) 567-8901',
                'message' => 'We manufacture industrial equipment and need freight management for LTL and FTL shipments. Enterprise pricing?',
                'source' => 'linkedin',
                'status' => 'converted',
                'assigned_to' => $userIds[array_key_first($userIds)],
            ],
            [
                'name' => 'Emily Rodriguez - Fashion Forward LLC',
                'email' => 'erodriguez@fashion.com',
                'phone' => '+1 (555) 678-9012',
                'message' => 'Hi! We\'re a fashion brand looking for a logistics partner for our peak season. Need return management too.',
                'source' => 'website',
                'status' => 'new',
                'assigned_to' => $userIds[array_key_first($userIds)],
            ],
            [
                'name' => 'Robert Anderson - Electronics Depot',
                'email' => 'randerson@electronics.io',
                'phone' => '+1 (555) 789-0123',
                'message' => 'We need a solution that handles high-value electronics with insurance. Volume: 2000+ orders/month.',
                'source' => 'referral',
                'status' => 'contacted',
                'assigned_to' => $userIds[array_key_first($userIds)],
            ],
            [
                'name' => 'Lisa Brown - Health Products Plus',
                'email' => 'lbrown@healthproducts.com',
                'phone' => '+1 (555) 890-1234',
                'message' => 'Interested in your temperature-controlled shipping for supplements and health products. What carriers do you support?',
                'source' => 'website',
                'status' => 'qualified',
                'assigned_to' => $userIds[array_key_first($userIds)],
            ],
            [
                'name' => 'James Taylor - Taylor Furniture Co',
                'email' => 'jtaylor@furniture.com',
                'phone' => '+1 (555) 901-2345',
                'message' => 'We ship large furniture items and need white-glove delivery options. Do you support freight carriers?',
                'source' => 'google',
                'status' => 'lost',
                'assigned_to' => $userIds[array_key_first($userIds)],
            ],
            [
                'name' => 'Maria Garcia - Beauty Cosmetics Inc',
                'email' => 'mgarcia@cosmetics.net',
                'phone' => '+1 (555) 012-3456',
                'message' => 'Looking for a logistics platform that integrates with BigCommerce. Need hazmat compliance for some products.',
                'source' => 'facebook',
                'status' => 'new',
                'assigned_to' => $userIds[array_key_first($userIds)],
            ],
            [
                'name' => 'Thomas White - Auto Parts Direct',
                'email' => 'twhite@autoparts.com',
                'phone' => '+1 (555) 123-4560',
                'message' => 'We need same-day shipping in major metros. Do you have partnerships with local couriers?',
                'source' => 'website',
                'status' => 'contacted',
                'assigned_to' => $userIds[array_key_first($userIds)],
            ],
            [
                'name' => 'Amanda Lee - Online Bookstore',
                'email' => 'alee@bookstore.com',
                'phone' => '+1 (555) 234-5601',
                'message' => 'Small business looking for affordable shipping rates. Volume around 200 orders per month.',
                'source' => 'referral',
                'status' => 'qualified',
                'assigned_to' => $userIds[array_key_first($userIds)],
            ],
            [
                'name' => 'Christopher Davis - Sporting Goods Co',
                'email' => 'cdavis@sporting.com',
                'phone' => '+1 (555) 345-6012',
                'message' => 'Need to ship bulky items like kayaks and bikes. What are your oversized package options?',
                'source' => 'linkedin',
                'status' => 'negotiation',
                'assigned_to' => $userIds[array_key_first($userIds)],
            ],
            [
                'name' => 'Jessica Miller - Luxury Jewelry',
                'email' => 'jmiller@jewelry.net',
                'phone' => '+1 (555) 456-0123',
                'message' => 'We sell high-value jewelry and need secure shipping with signature confirmation. Can you accommodate?',
                'source' => 'website',
                'status' => 'converted',
                'assigned_to' => $userIds[array_key_first($userIds)],
            ],
            [
                'name' => 'Daniel Johnson - Tech Gadgets',
                'email' => 'djohnson@gadgets.io',
                'phone' => '+1 (555) 567-0124',
                'message' => 'Interested in API integration for automated label printing. Do you have developer documentation?',
                'source' => 'google',
                'status' => 'new',
                'assigned_to' => $userIds[array_key_first($userIds)],
            ],
            [
                'name' => 'Michelle Brown - Organic Foods Market',
                'email' => 'mbrown@organicfood.com',
                'phone' => '+1 (555) 678-0125',
                'message' => 'We ship perishable foods and need refrigerated shipping options. What\'s your cold chain solution?',
                'source' => 'referral',
                'status' => 'contacted',
                'assigned_to' => $userIds[array_key_first($userIds)],
            ],
            [
                'name' => 'Kevin Martinez - Home Goods Plus',
                'email' => 'kmartinez@homegoods.com',
                'phone' => '+1 (555) 789-0126',
                'message' => 'Looking for multi-warehouse support. We have 5 fulfillment centers across the US.',
                'source' => 'website',
                'status' => 'qualified',
                'assigned_to' => $userIds[array_key_first($userIds)],
            ],
            [
                'name' => 'Rachel Wilson - Pet Supplies Online',
                'email' => 'rwilson@petstore.com',
                'phone' => '+1 (555) 890-0127',
                'message' => 'Need a shipping solution for pet supplies including live fish. Do you handle special requirements?',
                'source' => 'facebook',
                'status' => 'lost',
                'assigned_to' => $userIds[array_key_first($userIds)],
            ],
            [
                'name' => 'Brian Taylor - Print Shop Pro',
                'email' => 'btaylor@printing.net',
                'phone' => '+1 (555) 901-0128',
                'message' => 'We print custom products on-demand. Need real-time rate shopping at checkout. Is this possible?',
                'source' => 'linkedin',
                'status' => 'negotiation',
                'assigned_to' => $userIds[array_key_first($userIds)],
            ],
            [
                'name' => 'Nicole Garcia - Art Gallery Online',
                'email' => 'ngarcia@artgallery.com',
                'phone' => '+1 (555) 012-0129',
                'message' => 'We ship artwork and need special handling for fragile items. What packaging services do you offer?',
                'source' => 'website',
                'status' => 'new',
                'assigned_to' => $userIds[array_key_first($userIds)],
            ],
            [
                'name' => 'Andrew Clark - Toy Store Central',
                'email' => 'aclark@toys.com',
                'phone' => '+1 (555) 123-0130',
                'message' => 'Preparing for holiday rush. Need to scale from 500 to 5000 orders/month. Can your platform handle it?',
                'source' => 'referral',
                'status' => 'contacted',
                'assigned_to' => $userIds[array_key_first($userIds)],
            ],
            [
                'name' => 'Stephanie Lewis - Handmade Crafts',
                'email' => 'slewis@crafts.io',
                'phone' => '+1 (555) 234-0131',
                'message' => 'Small Etsy seller looking to upgrade shipping. Need discounted rates and batch label printing.',
                'source' => 'google',
                'status' => 'qualified',
                'assigned_to' => $userIds[array_key_first($userIds)],
            ],
            [
                'name' => 'Mark Robinson - Industrial Supply Co',
                'email' => 'mrobinson@industrial.com',
                'phone' => '+1 (555) 345-0132',
                'message' => 'B2B company shipping heavy industrial equipment. Need freight quotes and LTL options.',
                'source' => 'website',
                'status' => 'converted',
                'assigned_to' => $userIds[array_key_first($userIds)],
            ],
            [
                'name' => 'Laura Martinez - Gourmet Bakery',
                'email' => 'lmartinez@bakery.com',
                'phone' => '+1 (555) 456-0133',
                'message' => 'We ship baked goods and need next-day delivery guarantees. What are your overnight shipping rates?',
                'source' => 'facebook',
                'status' => 'new',
                'assigned_to' => $userIds[array_key_first($userIds)],
            ],
            [
                'name' => 'Steven Anderson - Garden Supply Store',
                'email' => 'sanderson@garden.net',
                'phone' => '+1 (555) 567-0134',
                'message' => 'Shipping live plants and seeds. Need carrier restrictions info and packaging recommendations.',
                'source' => 'linkedin',
                'status' => 'contacted',
                'assigned_to' => $userIds[array_key_first($userIds)],
            ],
        ];

        foreach ($contacts as $contact) {
            Contact::updateOrCreate(
                ['email' => $contact['email']],
                $contact
            );
        }

        $this->command->info('✅ Created '.count($contacts).' contacts');
    }
}
