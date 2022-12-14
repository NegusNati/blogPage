<?php

namespace Database\Seeders;

use App\Models\Catagory;
use App\Models\Post;
use \App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $user = User::factory()->create([
            'name' => "Jhon Doe"
        ]);
        Post::factory(5)->create([
            'user_id' => $user->id
        ]);

        // $user = User::factory()->create();

        // $family = Catagory::create([
        //     'name' => "Family",
        //     'slug' => 'family'
        // ]);

        // $personal = Catagory::create([
        //     'name' => "Personal",
        //     'slug' => 'personal'
        // ]);

        // $work = Catagory::create([
        //     'name' => "Work",
        //     'slug' => 'work'
        // ]);

        // Post::create([
        //     'user_id' => $user->id,
        //     'catagory_id' => $family->id,
        //     'title' => "My Family Post",
        //     'slug' => "my-first-post",
        //     'excerpt' => "<p>my first post is the shit </p>",
        //     'body' => "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>"
        // ]);
        // Post::create([
        //     'user_id' => $user->id,
        //     'catagory_id' => $personal->id,
        //     'title' => "My Personal Post",
        //     'slug' => "my-second-post",
        //     'excerpt' => "<p>my first post is the shit </p>",
        //     'body' => "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>"
        // ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
