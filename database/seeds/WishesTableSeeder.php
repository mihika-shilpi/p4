<?php

use App\Wish;
use App\Writer;
use Illuminate\Database\Seeder;

class WishesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $wishes = [
            ['Constant Supply of Chocolate Magnum Ice Cream', 'clara', 'Walking to your freezer in the middle of the night only to find that your box of Magnums is empty is devastating. There has got to be a way to have an uninteruppted magical supply of ice cream always!'],
            ['International Citizenship', 'mihika', 'We are just not tied to one city, one country, one life anymore. I am tired of visas and countries dictating where I can be. its 2019 ! Why not have an international passport application so that you can be anywhere, anytime.'],
            ['SpaceRail', 'jim', 'Its about time we could have the promised shoot around the world capacity'],
            ['I (Believe I) Can Fly', 'romy', 'Because humans have figured out how to make their bodies do everything...why not figure flying out'],
            ['Pet Protection Laws', 'natasha', 'Its time that our increasingly socialist governments drew out protection for species other than our own. I see so many people mistreating their pets and I want action!'],
        ];

        $count = count($wishes);

        foreach ($wishes as $key => $wishData) {

            $name = $wishData[1];
            $writer_id = Writer::where('name', '=', $name)->pluck('id')->first();

            $wish = new Wish();

            $wish->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $wish->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $wish->title = $wishData[0];
            $wish->writer_id = $writer_id;
            $wish->description = $wishData[2];

            $wish->save();
            $count--;
        }
    }
}
