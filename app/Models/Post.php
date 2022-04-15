<?php

namespace App\Models;


class Post 
{
    private static $blog_post = 
    [
        [
            "title" => "bukan judul pertama",
            "slug" => "bukan-judul-pertama",
            "author" => "danny",
            "body" => "bdihduy"
        ],
        [
            "title" => "bukan judul kedua",
            "slug" => "bukan-judul-kedua",
            "author" => "coucou",
            "body" => "bdahdi"
        ]
    
        ];
        public static function all(){
                return collect(self::$blog_post);
                // kalo static pake self:: kalo bukan pake this->
                //collect itu untuk collection untuk membungks array jadi yang dibawah nya ini tinggal pakai yg ini
        }
        public static function find($slug){
                $posts = static::all();
                // ini bisa dipakai gini karena fungsi collect
    //             $post = [];
    // foreach($posts as $p){
    //     if($p["slug"]=== $slug){
    //         $post = $p;
    //     }
    // }

        return $posts->firstWhere('slug', $slug);
        }
}
//tidak dipakai