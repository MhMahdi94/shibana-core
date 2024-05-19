<?php

namespace Database\Seeders;

use App\Models\WalletOperation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WalletOperationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        WalletOperation::create(['name'=>'topup']);
        WalletOperation::create(['name'=>'transfer']);
        WalletOperation::create(['name'=>'withdraw']);
    }
}
