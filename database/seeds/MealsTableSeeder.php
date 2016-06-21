<?php

use Illuminate\Database\Seeder;
use App\Meal;

class MealsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $meal = new Meal;
      $meal->name = 'Robot Chicken';
      $meal->description = 'Chicken breast, crimini mushroom, carrot, white & green onion, cabbage, spicy sauce. White or brown rice will be available.';
      $meal->save();

      $meal = new Meal;
      $meal->name = 'Cowboy Bebop Steak';
      $meal->description = 'Marinated steak, squash, carrot, broccoli, edamame, onion, spicy sauce. White or brown rice will be available.';
      $meal->save();

      $meal = new Meal;
      $meal->name = 'Bodhi Bowl Tofu';
      $meal->description = 'Organic tofu, red bell pepper, snap peas, water chestnuts, bamboo, broccoli, and peanut sauce. White or brown rice will be available.';
      $meal->save();

      $meal = new Meal;
      $meal->name = 'Ginger-Lime Shrimp';
      $meal->description = 'Shrimp, red bell pepper, snap peas, water chestnuts, bamboo, broccoli, and ginger-lime sauce. White or brown rice will be available.';
      $meal->save();

      $meal = new Meal;
      $meal->name = 'Nirvana Salmon';
      $meal->description = 'Salmon, squash, carrot, broccoli, edamame, onion, and terikak sauce. White or brown rice will be available.';
      $meal->save();

    }
}
