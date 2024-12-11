<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\OrderStatus;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            ['name' => 'pending', 'style' => '#FFA500'],
            ['name' => 'in progress', 'style' => '#00BFFF'],
            ['name' => 'delivered', 'style' => '#32CD32']
        ];

        foreach ($statuses as $status) {
            OrderStatus::create($status);
        }
    }
}
