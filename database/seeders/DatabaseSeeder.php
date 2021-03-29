<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,

            // ProductCategorySeeder::class,
            // ProductSeeder::class,
            // CategorySeeder::class,
            // ExpenseSeeder::class,
            // SaleSeeder::class,
            // SupplierSeeder::class,
            // CustomerSeeder::class,
            // IncomeSeeder::class,
            SettingSeeder::class,
            RoomSeeder::class,
            MenuSeeder::class,
        ]);
    }
}
