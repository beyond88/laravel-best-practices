<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Offer;
use App\Models\Category;
use App\Models\Location;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class OfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $offers = Offer::factory()->count(5)->create();

        foreach( $offers as $offer ) {
            $categories = Category::inRandomOrder()->limit(5)->create();
            $offer->categories->sync($categories->pluck('id'));
        }

        foreach( $offers as $offer ) {
            $categories = Location::inRandomOrder()->limit(5)->create();
            $offer->locations->sync($categories->pluck('id'));
        }
    }
}
