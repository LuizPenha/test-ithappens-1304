<?php
$autoIncrement = autoIncrement();
$fak = 0;
/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;
    $types = \App\Type::where('tag', 'usr')->select('id')->get();
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'type_id' =>$faker->randomElement($types),
        // 'password' => $password ?: $password = bcrypt('secret'),
        // 'remember_token' => str_random(10),

    ];
});

// $factory->define(App\Branch::class, function (Faker\Generator $faker)  use ($autoIncrement) {
//     //$last = 60;
//     //if(App\Branch::where('id',60)->exists())
//        // $last = App\Branch::latest()->id;
//     //autoIncrement($last)->next();
//     return [
//         //'id'=> $autoIncrement->current(),
//         'id'=>$faker->unique()->numberBetween(60,65),
//         'description' => $faker->sentence(5, true),
//     ];
// });
//'user_id' => App\User::inRandomOrder()->first()->id,
$factory->define(App\Branch::class, function(Faker\Generator $faker) use ($fak){
   $branches = App\Branch::count();
    //dd($branches);
   if(  $branches ==0 ){

        return[
            'id'=> 60,
            'description'=>$faker->sentence(5, true)
        ];
    }
    if( count(App\Branch::all()) != null )
        return[
            'id'=> $faker->unique()->numberBetween(61,120),
            'description'=>$faker->sentence(5, true)
        ];
});

$factory->define(App\Employee::class, function(Faker\Generator $faker){
    $users= App\User::where('type_id', 4)->select('id')->get();
    return [
        'user_id' => $faker->unique()->randomElement($users),
        'branch_id'=> factory(App\Branch::class)->create()->id,
    ];
});

// $factory->define(App\Employee::class, function (Faker\Generator $faker) {
//     $branches = App\Branch::pluck('id')->toArray();
//     $users= App\User::where('type_id', 4)->select('id')->get();
//     return [
//         'user_id' => $faker->unique()->randomElement($users),
//         //'branch_id' => function(){ return factory(App\Branch::class)->create()->id; }
//         'branch_id'=>$faker->randomElement($branches)
//     ];
// });


$factory->define(App\Product::class, function (Faker\Generator $faker) {
    return [
        'id'=>$faker->unique()->numberBetween(7993 ,15000),
        'bars_code' => $faker->unique()->numberBetween(1111111111111,9999999999999),
        'description' => $faker->sentence(5,true),
        'price' => $faker->randomFloat(2, 5.00, 750.00),
    ];
});


$factory->define(App\Stock::class, function (Faker\Generator $faker) {
    $branches = App\Branch::pluck('id')->toArray();
    $products = App\Product::pluck('id')->toArray();
    $flag = false;
    foreach($branches as $branch_id){
        foreach($products as $product_id){
            if(app\Stock::where('branch_id', $branch_id)->where('product_id', $product_id)->exists()){
                $flag = true;
                continue;
            }else{
                return [
                    // 'branch_id' => $faker->randomElement($branches),
                    // 'product_id' => $faker->randomElement($products),
                    // 'qtd' => $faker->ramdomDigit(3,1,9999),
                    'id'=>$faker->unique()->numberBetween(1 ,7950),
                    'branch_id' => $branch_id,
                    'product_id' =>$product_id,
                    'qtd' => $faker->numberBetween(70,210),
                ];
                //break;
            }
        }
    }
});


function autoIncrement($last = 60)
{
    for ($i = 60; $i < 1000; $i++) {
        if($i>60)
            if($i == $last)
                yield ++$i;
    }
}

//types , statuses

