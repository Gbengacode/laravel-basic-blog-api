<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $count = Post::query()->count();
        if($count == 0) {
            $postId = Post::factory()->create()->id;
        } else {
            $postId = rand(1, $count);
        }
        return [
            'body' => $this->faker->word,
            'user_id' => 1,
            'post_id' => $postId
        ];
    }
}
