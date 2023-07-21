<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    
        User::create([
            'name' => 'Dummy',
            'username' => 'dummy',
            'email' => 'dummy@example.com',
            'password' => bcrypt('password'),
        ]);

        // User::create([
        //     'name' => 'Doddy Ferdiansyah',
        //     'email' => 'doddy@example.com',
        //     'password' => bcrypt('1234'),
        // ]);

        // Post::create([
        //     'title' => 'Judul Pertama',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Minus reiciendis soluta voluptatem obcaecati facere cumque voluptatum magnam nam dolorum ipsam architecto possimus blanditiis',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Minus reiciendis soluta voluptatem obcaecati facere cumque voluptatum magnam nam dolorum ipsam architecto possimus blanditiis exercitationem ratione quibusdam veritatis quo consequuntur omnis officiis placeat, dolorem quam dolor, rerum sequi. Beatae odit quidem reprehenderit illo dolorum harum asperiores laudantium accusantium perspiciatis autem. Tenetur delectus aliquam perspiciatis nam, hic incidunt accusantium consequatur optio ullam et non deserunt, a consequuntur culpa recusandae est. Labore doloribus maiores expedita, ipsa dolorum voluptatem voluptas minus magnam illo hic iusto tempora accusamus blanditiis perspiciatis culpa saepe quos rerum quo accusantium maxime in aliquid eos! Minima quaerat odio ad dicta.',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'title' => 'Judul Kedua',
        //     'slug' => 'judul-kedua',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Minus reiciendis soluta voluptatem obcaecati facere cumque voluptatum magnam nam dolorum ipsam architecto possimus blanditiis',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Minus reiciendis soluta voluptatem obcaecati facere cumque voluptatum magnam nam dolorum ipsam architecto possimus blanditiis exercitationem ratione quibusdam veritatis quo consequuntur omnis officiis placeat, dolorem quam dolor, rerum sequi. Beatae odit quidem reprehenderit illo dolorum harum asperiores laudantium accusantium perspiciatis autem. Tenetur delectus aliquam perspiciatis nam, hic incidunt accusantium consequatur optio ullam et non deserunt, a consequuntur culpa recusandae est. Labore doloribus maiores expedita, ipsa dolorum voluptatem voluptas minus magnam illo hic iusto tempora accusamus blanditiis perspiciatis culpa saepe quos rerum quo accusantium maxime in aliquid eos! Minima quaerat odio ad dicta.',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'title' => 'Judul Ketiga',
        //     'slug' => 'judul-ketiga',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Minus reiciendis soluta voluptatem obcaecati facere cumque voluptatum magnam nam dolorum ipsam architecto possimus blanditiis',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Minus reiciendis soluta voluptatem obcaecati facere cumque voluptatum magnam nam dolorum ipsam architecto possimus blanditiis exercitationem ratione quibusdam veritatis quo consequuntur omnis officiis placeat, dolorem quam dolor, rerum sequi. Beatae odit quidem reprehenderit illo dolorum harum asperiores laudantium accusantium perspiciatis autem. Tenetur delectus aliquam perspiciatis nam, hic incidunt accusantium consequatur optio ullam et non deserunt, a consequuntur culpa recusandae est. Labore doloribus maiores expedita, ipsa dolorum voluptatem voluptas minus magnam illo hic iusto tempora accusamus blanditiis perspiciatis culpa saepe quos rerum quo accusantium maxime in aliquid eos! Minima quaerat odio ad dicta.',
        //     'category_id' => 2,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'title' => 'Judul Keempat',
        //     'slug' => 'judul-keempat',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Minus reiciendis soluta voluptatem obcaecati facere cumque voluptatum magnam nam dolorum ipsam architecto possimus blanditiis',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Minus reiciendis soluta voluptatem obcaecati facere cumque voluptatum magnam nam dolorum ipsam architecto possimus blanditiis exercitationem ratione quibusdam veritatis quo consequuntur omnis officiis placeat, dolorem quam dolor, rerum sequi. Beatae odit quidem reprehenderit illo dolorum harum asperiores laudantium accusantium perspiciatis autem. Tenetur delectus aliquam perspiciatis nam, hic incidunt accusantium consequatur optio ullam et non deserunt, a consequuntur culpa recusandae est. Labore doloribus maiores expedita, ipsa dolorum voluptatem voluptas minus magnam illo hic iusto tempora accusamus blanditiis perspiciatis culpa saepe quos rerum quo accusantium maxime in aliquid eos! Minima quaerat odio ad dicta.',
        //     'category_id' => 2,
        //     'user_id' => 2
        // ]);

        User::factory(3)->create();

        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming'
        ]);

        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design'
        ]);

        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        Post::factory(20)->create();
        
    }
}
