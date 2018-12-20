<?php

use App\Writer;
use Illuminate\Database\Seeder;

class WritersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # Array of writer data to add
        $writers = ['mihika','jim','rachel','clara', 'jim', 'romy', 'natasha'];
        $count = count($writers);

        # Loop through each writer, adding them to the database
        foreach ($writers as $writerData) {
            $writer = new Writer();

            $writer->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $writer->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $writer->name = $writerData;

            $writer->save();

            $count--;
        }
    }
}
