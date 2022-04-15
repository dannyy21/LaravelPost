<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PosttFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=> $this->faker->sentence(mt_rand(2,8)),
            'slug' => $this->faker->slug(),
            'excerpt' => $this->faker->paragraph(),
            // 'body' => '<p>' . implode('</p><p>',$this->faker->paragraphs(mt_rand(5,9))) . '</p>', atau bias kaya dibawah ini
            'body' => collect($this->faker->paragraphs(mt_rand(5,10)))->map(fn($p) => "<p>$p</p>")->implode(''),
            // itu fn($p) sama dengan function ($p){
                // return"<p>$p</p>"
            // paragraph itu 1 paragraph kalo pake s itu byk 
            'category_id' => mt_rand(1,2),
            'user_id' => mt_rand(1,3)
            // ini akan ambil seusai db,karena user ada 3 jadi 1,3, inipun bersangkutan dgn di dbseeder
            // di db seeder harus sama data nya user bikin 3 category 2
        ];
       
    }
}
