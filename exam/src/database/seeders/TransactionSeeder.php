<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaction;
use Illuminate\Support\Carbon;

class TransactionSeeder extends Seeder
{
    public function run(): void
    {
        $types = ['income', 'expense'];
        foreach (['2025-07', '2025-08'] as $month) {
            for ($i = 1; $i <= 20; $i++) {
                Transaction::create([
                    'type' => $types[array_rand($types)],
                    'title' => 'Sample ' . $i,
                    'amount' => rand(100, 5000) / 10,
                    'spend_date' => Carbon::parse("$month-" . rand(1, 28)),
                ]);
            }
        }
    }
}
