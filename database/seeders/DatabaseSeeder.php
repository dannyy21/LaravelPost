<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Postt;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
          
     

            // User::create([

            //     'name' => 'danny',
            //     'email' => 'dpp@gmai.com',
            //     'password' => bcrypt('1234')
            // ]);

            // User::create([

            //     'name' => 'COCO',
            //     'email' => 'coco.com',
            //     'password' => bcrypt('1234')
            // ]);

         //  \App\Models\
       
         //ini ngikut ke file userfactory yg ngambil data random indo yg udah di setting di config/app dan .env
         //fitur generate 10 data palsu disebut faker   
        
         Postt::factory(20)->create();
         User::factory(3)->create();
        Category::create([

            'name'=> 'web Programming',
            'slug'=> 'web-programming'
        ]);

        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]); 
        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design'
        ]); 

        
       



        // Postt::create([

        //     'title' => 'Judul Pertama Nih',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => 'bdihdiyyyyyyy',
        //     'body' => 'bidhiyyyyyyyyyyyyyy bdihduyyyyyyyyyyyy',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);

        // Postt::create([

        //     'title' => 'Judul Kedua Nih',
        //     'slug' => 'judul-kedua',
        //     'excerpt' => 'bdodoyyyyy',
        //     'body' => '
        //     Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem animi magnam labore exercitationem quam repellendus assumenda blanditiis ut quasi? Non et sit error magnam rerum id fugiat voluptatem est? Placeat.',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);
        // Postt::create([

        //     'title' => 'Judul Keriga Nih',
        //     'slug' => 'judul-ketiga',
        //     'excerpt' => 'bduhdiy',
        //     'body' => 'nani',
        //     'category_id' => 2,
        //     'user_id' => 1
        // ]);
        // Postt::create([

        //     'title' => 'Judul Keempat Nih',
        //     'slug' => 'judul-empat',
        //     'excerpt' => 'bduhdiy',
        //     'body' => 'nani',
        //     'category_id' => 2,
        //     'user_id' => 2
        // ]);
     
    }
}
