<?php

use Illuminate\Database\Seeder;
use App\Models\PostImage;

class PostImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(PostImage::class, 30)->create();
    }
}
