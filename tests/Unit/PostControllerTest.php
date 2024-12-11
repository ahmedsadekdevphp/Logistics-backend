<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Post;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class PostControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testStore()
    {
        $user = User::factory()->create();
        $data = [
            'user_id' => $user->id,
            'title' => 'example title',
            'description' => 'hjh jhjhhjhhhhghhjhj jhhhjj',
            'contact_phone' => '01271345139',
        ];
        Post::create($data);
        $this->assertDatabaseHas('posts', $data);
    }
    public function testStoreEndPoint()
    {
        $user = User::factory()->create();
        $data = [
            'user_id' => $user->id,
            'title' => 'example title',
            'description' => 'hjh jhjhhjhhhhghhjhj jhhhjj',
            'contact_phone' => '01271345139',
        ];

        $response = $this->actingAs($user, 'api')->postJson('/api/posts', $data);
        $response->assertStatus(200);
    }

    public function testIndex()
    {
        $user = User::factory()->create();
        $posts = Post::factory()->count(3)->create(['user_id' => $user->id]);
        $response = $this->actingAs($user, 'api')->getJson('/api/posts');
        $response->assertStatus(200);
        $response->assertJsonFragment([
            'id' => $posts[0]->id,
            'user_id' => $posts[0]->user_id,
            'title' => $posts[0]->title,
            'description' => substr($posts[0]->description, 0, 512),
        ]);
    }

    public function testUploadImage()
    {
        Storage::fake('public');
        $user = User::factory()->create();
        $post = Post::factory()->create(['user_id' => $user->id]);
        $image = UploadedFile::fake()->image('test-image.jpg');

        $response = $this->actingAs($user, 'api')->postJson("/api/posts/{$post->id}/image", [
            'image' => $image,
        ]);
        $response->assertStatus(200)
            ->assertJson(['message' => 'Image uploaded successfully.']);
    }
    public function testShowPost()
    {
        $user = User::factory()->create();
        $post = Post::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user, 'api')->getJson("/api/posts/{$post->id}");

        $response->assertStatus(200)
            ->assertJsonFragment([
                'title' => $post->title,
                'description' => $post->description,
            ]);
    }


}
