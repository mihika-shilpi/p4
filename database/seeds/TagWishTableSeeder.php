<?php

use Illuminate\Database\Seeder;
use App\Tag;
use App\Wish;

class TagWishTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $wishes =[
            'Pet Protection Laws' => ['peace','equality'],
            'SpaceRail' => ['travel', 'society'],
            'I (Believe I) Can Fly' => ['happiness', 'travel', 'society']
        ];

        # Now loop through the above array, creating a new pivot for each wish to tag
        foreach ($wishes as $title => $tags) {

            # First get the wish
            $wish = Wish::where('title', 'like', $title)->first();

            # Now loop through each tag for this wish, adding the pivot
            foreach ($tags as $tagName) {
                $tag = Tag::where('name', 'LIKE', $tagName)->first();

                # Connect this tag to this wish
                $wish->tags()->save($tag);
            }
        }
    }
}

