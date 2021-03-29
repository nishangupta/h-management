<?php

namespace Database\Seeders;

use App\Models\Food;
use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = ['Starter','Fast food','Beverages','Breakfast','Khajaset','Dinner'];
        foreach($items as $item){
            Menu::create([
            'title'=>$item,
            ]);
        }

        $items = ['Chowmien','Momo','Coke','Beer'];
        foreach($items as $key=> $item){
            Food::create([
            'title'=>$item,
            'price'=>rand(100,500),
            'menu_id'=>$key+1,
            ]);
        }

    }
}
