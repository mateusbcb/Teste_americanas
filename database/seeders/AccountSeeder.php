<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Account;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Account::create([
            'name'      => 'Admin B2W',
            'email'     => 'admin@admin.com',
            'password'  => md5('password'),
        ]);
    }
}
