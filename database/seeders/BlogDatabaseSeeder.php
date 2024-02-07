<?php

namespace Creode\LaravelNovaBlog\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class BlogDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        \Creode\LaravelNovaBlog\Entities\Post::factory(20)->create();
    }
}
