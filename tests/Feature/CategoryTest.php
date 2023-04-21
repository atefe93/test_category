<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{

    use RefreshDatabase;


    public function test_create_category()
    {
        //$this->withoutExceptionHandling();
        $user = User::factory()->create();
        $response = $this->actingAs($user)->post('/admin-panel/management/categories', [
            'title' => 'Category 1',
            'parent_id' => null,
        ]);


        $this->assertDatabaseHas('categories', [
            'title' => 'Category 1',
            'parent_id' => null,
        ]);

        $response->assertRedirect('/admin-panel/management/categories');

    }
    public function test_required_title_for_category()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/admin-panel/management/categories',['title' => '']);
        $this->assertDatabaseMissing('categories',['title' => '']);

        $response->assertSessionHasErrors('title');


    }


    public function test_get_all_categories()
    {
        //$this->withoutExceptionHandling();
        $user = User::factory()->create();
        Category::factory()->create([
            'title' => 'Category 1',
            'parent_id' => null,
        ]);

        Category::factory()->create([
            'title' => 'Category 2',
            'parent_id' => 1,
        ]);

        $response = $this->actingAs($user)->get('/admin-panel/management/categories');

        $response->assertStatus(200);
        $response->assertSee('Category 1');
        $response->assertSee('Category 2');
        $response->assertSee('نوع دسته: بدون والد');
        $response->assertSee('نوع دسته:Category 1');
    }

    public function test_edit_category()
    {
        $user = User::factory()->create();
        $category = Category::factory()->create([
            'title' => 'Category 1',
            'parent_id' => null,
        ]);

        $response = $this->actingAs($user)->get('/admin-panel/management/categories/' . $category->id . '/edit');

        $response->assertStatus(200);
        $response->assertSee($category->title);
    }

    public function test_update_category()
    {
        $user = User::factory()->create();
        $category = Category::factory()->create([
            'title' => 'Category 1',
            'parent_id' => null,
        ]);

        $response = $this->actingAs($user)->put('/admin-panel/management/categories/' . $category->id, [
            'title' => 'Category 1 Updated',
            'parent_id' => 2,
        ]);

        $this->assertDatabaseHas('categories', [
            'title' => 'Category 1 Updated',
            'parent_id' => 2,
        ]);
        $response->assertRedirect('/admin-panel/management/categories');
    }

    public function test_delete_category()
    {
        $user = User::factory()->create();
        $category = Category::factory()->create([
            'title' => 'Category 1',
            'parent_id' => null,
        ]);

        $response = $this->actingAs($user)->delete('/admin-panel/management/categories/' . $category->id);

        $this->assertDeleted($category);
        $response->assertRedirect('/admin-panel/management/categories');
    }
    public function test_delete_category_and_children()
    {
        $user = User::factory()->create();
        $category = Category::factory()->create([
            'title' => 'Category 1',
            'parent_id' => null,
        ]);
        $child = Category::factory()->create([
            'title' => 'Category 2',
            'parent_id' => 1,
        ]);

        $response = $this->actingAs($user)->delete('/admin-panel/management/categories/' . $category->id);

        $this->assertDeleted($category);
        $this->assertDeleted($child);
        $response->assertRedirect('/admin-panel/management/categories');
    }

}
