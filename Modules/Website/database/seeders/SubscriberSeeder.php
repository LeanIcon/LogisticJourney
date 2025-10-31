<?php

declare(strict_types=1);

namespace Modules\Website\Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Modules\Website\Models\Subscriber;

final class SubscriberSeeder extends Seeder
{
    /**
     * Seed newsletter subscribers.
     */
    public function run(): void
    {
        $domains = ['gmail.com', 'yahoo.com', 'hotmail.com', 'outlook.com', 'company.com', 'business.net', 'enterprise.io'];
        $firstNames = ['John', 'Sarah', 'Michael', 'Emily', 'David', 'Jennifer', 'Robert', 'Lisa', 'James', 'Maria',
            'Thomas', 'Amanda', 'Christopher', 'Jessica', 'Daniel', 'Michelle', 'Kevin', 'Rachel', 'Brian', 'Nicole',
            'Andrew', 'Stephanie', 'Mark', 'Laura', 'Steven', 'Angela', 'Jason', 'Melissa', 'Ryan', 'Rebecca',
            'Eric', 'Amy', 'Matthew', 'Kimberly', 'Joshua', 'Ashley', 'Paul', 'Samantha', 'William', 'Elizabeth',
            'Brandon', 'Megan', 'Adam', 'Lauren', 'Benjamin', 'Hannah', 'Alexander', 'Brittany', 'Jonathan', 'Heather'];
        $lastNames = ['Smith', 'Johnson', 'Williams', 'Brown', 'Jones', 'Garcia', 'Miller', 'Davis', 'Rodriguez', 'Martinez',
            'Hernandez', 'Lopez', 'Gonzalez', 'Wilson', 'Anderson', 'Thomas', 'Taylor', 'Moore', 'Jackson', 'Martin',
            'Lee', 'Thompson', 'White', 'Harris', 'Sanchez', 'Clark', 'Ramirez', 'Lewis', 'Robinson', 'Walker',
            'Young', 'Allen', 'King', 'Wright', 'Scott', 'Torres', 'Nguyen', 'Hill', 'Flores', 'Green'];

        $subscribers = [];

        // Generate 60 subscribers
        for ($i = 0; $i < 60; $i++) {
            $firstName = $firstNames[random_int(0, count($firstNames) - 1)];
            $lastName = $lastNames[random_int(0, count($lastNames) - 1)];
            $email = mb_strtolower($firstName.'.'.$lastName.($i > 20 ? $i : '').'@'.$domains[random_int(0, count($domains) - 1)]);

            // 85% verified, 10% pending, 5% unsubscribed
            $rand = random_int(1, 100);
            if ($rand <= 85) {
                $status = 'verified';
                $verifiedAt = Carbon::now()->subDays(random_int(1, 90));
            } elseif ($rand <= 95) {
                $status = 'pending';
                $verifiedAt = null;
            } else {
                $status = 'unsubscribed';
                $verifiedAt = Carbon::now()->subDays(random_int(30, 90));
            }

            $subscribers[] = [
                'email' => $email,
                'status' => $status,
                'verified_at' => $verifiedAt,
                'created_at' => Carbon::now()->subDays(random_int(1, 120)),
                'updated_at' => Carbon::now()->subDays(random_int(0, 30)),
            ];
        }

        foreach ($subscribers as $subscriber) {
            Subscriber::updateOrCreate(
                ['email' => $subscriber['email']],
                $subscriber
            );
        }

        $verified = count(array_filter($subscribers, fn ($s) => $s['status'] === 'verified'));
        $pending = count(array_filter($subscribers, fn ($s) => $s['status'] === 'pending'));
        $unsubscribed = count(array_filter($subscribers, fn ($s) => $s['status'] === 'unsubscribed'));

        $this->command->info('✅ Created '.count($subscribers).' subscribers');
        $this->command->info('   → Verified: '.$verified);
        $this->command->info('   → Pending: '.$pending);
        $this->command->info('   → Unsubscribed: '.$unsubscribed);
    }
}
