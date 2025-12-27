<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;


class DatabaseSeeder extends Seeder
{
   use WithoutModelEvents;

    
   //  Seed the application's database.
     
    public function run(): void
    {
        /*
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        */

      /*  User::create([
         'name' => 'Rifky Nurdiansyah',
         'email' => 'getsucode@gmail.com',
         'password' => bcrypt('12345')
    ]);

     User::create([
         'name' => 'Getsu',
         'email' => 'getsudesign@gmail.com',
         'password' => bcrypt('12345')
    ]);
     */

     
     User::factory(3)->create();

     Category::create([
         'name' => 'Web Programming',
         'slug' => 'web-programming'
    ]);

    Category::create([
         'name' => 'Personal',
         'slug' => 'personal'
    ]);
    

    Post::factory(20)->create();

    /*
    Post::create([
         'title' => 'Judul Pertama',
         'slug' => 'judu-pertama',
         'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque animi totam quibusdam',
         'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque animi totam quibusdam ea voluptatibus ducimus in blanditiis dolores excepturi dolorum magnam impedit laboriosam eaque corporis molestiae maxime alias pariatur, quasi quam ab quaerat nulla est? Accusantium velit voluptatum aut commodi enim nobis ullam rem molestiae atque incidunt eaque quasi et eveniet eum fugit earum quidem sint doloribus explicabo possimus tenetur, quos alias a voluptatem? Quo corporis obcaecati similique natus velit rerum a quas non, maxime, cumque molestias libero. Cum, cupiditate, vel voluptatibus qui corrupti et repudiandae hic ipsa perspiciatis dolor quo? Iste non perferendis eius magni necessitatibus quo ad quod.',
         'category_id' => 1,
         'user_id' => 1
    ]);

    Post::create([
         'title' => 'Judul Ke Dua',
         'slug' => 'judu-ke-dua',
         'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque animi totam quibusdam',
         'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque animi totam quibusdam ea voluptatibus ducimus in blanditiis dolores excepturi dolorum magnam impedit laboriosam eaque corporis molestiae maxime alias pariatur, quasi quam ab quaerat nulla est? Accusantium velit voluptatum aut commodi enim nobis ullam rem molestiae atque incidunt eaque quasi et eveniet eum fugit earum quidem sint doloribus explicabo possimus tenetur, quos alias a voluptatem? Quo corporis obcaecati similique natus velit rerum a quas non, maxime, cumque molestias libero. Cum, cupiditate, vel voluptatibus qui corrupti et repudiandae hic ipsa perspiciatis dolor quo? Iste non perferendis eius magni necessitatibus quo ad quod.',
         'category_id' => 1,
         'user_id' => 1
    ]);

    Post::create([
         'title' => 'Judul Ke Tiga',
         'slug' => 'judu-ke-tiga',
         'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque animi totam quibusdam',
         'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque animi totam quibusdam ea voluptatibus ducimus in blanditiis dolores excepturi dolorum magnam impedit laboriosam eaque corporis molestiae maxime alias pariatur, quasi quam ab quaerat nulla est? Accusantium velit voluptatum aut commodi enim nobis ullam rem molestiae atque incidunt eaque quasi et eveniet eum fugit earum quidem sint doloribus explicabo possimus tenetur, quos alias a voluptatem? Quo corporis obcaecati similique natus velit rerum a quas non, maxime, cumque molestias libero. Cum, cupiditate, vel voluptatibus qui corrupti et repudiandae hic ipsa perspiciatis dolor quo? Iste non perferendis eius magni necessitatibus quo ad quod.',
         'category_id' => 2,
         'user_id' => 1
    ]);

     Post::create([
         'title' => 'Judul Ke Empat',
         'slug' => 'judu-ke-empat',
         'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque animi totam quibusdam',
         'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque animi totam quibusdam ea voluptatibus ducimus in blanditiis dolores excepturi dolorum magnam impedit laboriosam eaque corporis molestiae maxime alias pariatur, quasi quam ab quaerat nulla est? Accusantium velit voluptatum aut commodi enim nobis ullam rem molestiae atque incidunt eaque quasi et eveniet eum fugit earum quidem sint doloribus explicabo possimus tenetur, quos alias a voluptatem? Quo corporis obcaecati similique natus velit rerum a quas non, maxime, cumque molestias libero. Cum, cupiditate, vel voluptatibus qui corrupti et repudiandae hic ipsa perspiciatis dolor quo? Iste non perferendis eius magni necessitatibus quo ad quod.',
         'category_id' => 2,
         'user_id' => 2
    ]);
    */

    }
}
   

