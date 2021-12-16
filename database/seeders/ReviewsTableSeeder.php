<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'id' => 1,
            'review_content' => '最高に美味しかったです。またきます',
            'user_id' => 2,
            'restaurant_id' => 1,
            'num_of_stars' => 4,
        ];
        Review::insert($param);

        $param = [
            'id' => 2,
            'review_content' => '味がよく、対応も素晴らしかったです！',
            'user_id' => 3,
            'restaurant_id' => 1,
            'num_of_stars' => 5,
        ];
        Review::insert($param);

        $param = [
            'id' => 3,
            'review_content' => 'またきます!',
            'user_id' => 2,
            'restaurant_id' => 1,
            'num_of_stars' => 4,
        ];
        Review::insert($param);

        $param = [
            'id' => 4,
            'review_content' => '味がよく、アルコールも美味しく頂けました。',
            'user_id' => 4,
            'restaurant_id' => 3,
            'num_of_stars' => 4,
        ];
        Review::insert($param);

        $param = [
            'id' => 5,
            'review_content' => 'いい肉を使っていて大変おいしかったです。',
            'user_id' => 3,
            'restaurant_id' => 2,
            'num_of_stars' => 4,
        ];
        Review::insert($param);

        $param = [
            'id' => 6,
            'review_content' => '最高に美味しかったです。またきます',
            'user_id' => 3,
            'restaurant_id' => 6,
            'num_of_stars' => 4,
        ];
        Review::insert($param);

        $param = [
            'id' => 7,
            'review_content' => '最高に美味しかったです。またきます',
            'user_id' => 4,
            'restaurant_id' => 7,
            'num_of_stars' => 4,
        ];
        Review::insert($param);

        $param = [
            'id' => 8,
            'review_content' => '最高に美味しかったです。またきます',
            'user_id' => 5,
            'restaurant_id' => 8,
            'num_of_stars' => 4,
        ];
        Review::insert($param);

        $param = [
            'id' => 9,
            'review_content' => 'ピザがおすすめのお店です。',
            'user_id' => 3,
            'restaurant_id' => 4,
            'num_of_stars' => 4,
        ];
        Review::insert($param);

        $param = [
            'id' => 10,
            'review_content' => 'ここの豚骨が最高に美味しいです。',
            'user_id' => 2,
            'restaurant_id' => 5,
            'num_of_stars' => 4,
        ];
        Review::insert($param);
    }
}
