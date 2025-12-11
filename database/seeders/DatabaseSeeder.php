<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $customers = [
            [
                'full_name' => 'Alice Johnson',
                'email' => 'alice.johnson@example.com',
                'country_code' => 'EUR',
                'registered' => '2024-03-01 12:00:00',
            ],
            [
                'full_name' => 'Bob Smith',
                'email' => 'bob.smith@example.com',
                'country_code' => 'USD',
                'registered' => '2025-11-01 14:25:00',
            ],
            [
                'full_name' => 'Carol Davis',
                'email' => 'carol.davis@example.com',
                'country_code' => 'GBP',
                'registered' => '2025-12-01 10:10:00',
            ],
            [
                'full_name' => 'David Wilson',
                'email' => 'david.wilson@example.com',
                'country_code' => 'USD',
                'registered' => '2025-01-15 09:30:00',
            ],
            [
                'full_name' => 'Eve Brown',
                'email' => 'eve.brown@example.com',
                'country_code' => 'EUR',
                'registered' => '2025-02-20 16:45:00',
            ],
        ];

        $orders = [
            ['customer_id' => 1, 'paid' => 150.00, 'ordered' => '2024-05-01 10:30:00'],
            ['customer_id' => 1, 'paid' => 75.99, 'ordered' => '2024-06-15 14:20:00'],
            ['customer_id' => 1, 'paid' => 210.50, 'ordered' => '2024-08-30 09:15:00'],
            ['customer_id' => 2, 'paid' => 300.00, 'ordered' => '2025-11-01 15:45:00'],
            ['customer_id' => 2, 'paid' => 99.99, 'ordered' => '2025-09-10 11:30:00'],
            ['customer_id' => 2, 'paid' => 125.75, 'ordered' => '2025-10-05 16:40:00'],
            ['customer_id' => 3, 'paid' => 450.00, 'ordered' => '2025-12-04 18:05:00'],
            ['customer_id' => 3, 'paid' => 180.00, 'ordered' => '2025-11-12 13:00:00'],
            ['customer_id' => 3, 'paid' => 65.25, 'ordered' => '2025-11-25 10:20:00'],
            ['customer_id' => 4, 'paid' => 225.50, 'ordered' => '2025-01-20 11:20:00'],
            ['customer_id' => 4, 'paid' => 320.00, 'ordered' => '2025-03-10 17:10:00'],
            ['customer_id' => 4, 'paid' => 45.99, 'ordered' => '2025-04-05 12:35:00'],
            ['customer_id' => 5, 'paid' => 175.75, 'ordered' => '2025-02-25 14:10:00'],
            ['customer_id' => 5, 'paid' => 275.50, 'ordered' => '2025-03-22 15:50:00'],
            ['customer_id' => 5, 'paid' => 89.99, 'ordered' => '2025-05-18 08:45:00'],
        ];

        foreach($customers as $customer){
            Customer::create($customer);
        }

        foreach($orders as $order){
            Order::create($order);
        }
    }
}
