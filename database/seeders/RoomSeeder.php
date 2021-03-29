<?php

namespace Database\Seeders;

use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $items = ['Standard','Single','Double','Quad'];
      foreach($items as $item){
        RoomType::create([
          'title'=>$item,
        ]);
      }

        $items = [
            [
              'name' => 'A101',
              'rate' => '3000',
            ],
            [
                'name' => 'A102',
                'rate' => '1000',
            ],
            [
                'name' => 'A103',
                'rate' => '5000',
            ],
          ];
      
          foreach ($items as $item) {
            $x =  Room::create([
                'name'=>$item['name'],
                'rate'=>$item['rate'],
                'is_reserved'=>0,
                'room_type_id'=>1,
              'description'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. ex.'
            ]);
          }
    }
}
