<?php

namespace Tests\Browser;

use App\Models\Category;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CategoryTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testAddCategoryForm()
    {
        $category = Category::factory()->create([
            'title' => 'Some test Category'
        ]);

        $this->browse(function (Browser $browser) use ($category) {
            $browser->visit(route('admin.category.create'))
                ->type('title', $category->title)
                ->press('Добавить')
                ->assertPathIs(route('admin.category.index'));
        });
    }

    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testEditCategoryForm()
    {
        $category = Category::factory()->create([
            'title' => 'Some test Category'
        ]);

        $this->browse(function (Browser $browser) use ($category) {
            $browser->visit(route('admin.category.edit'))
                ->type('title', $category->title)
                ->press('Изменить')
                ->assertPathIs(route('admin.category.index'));
        });
    }
}
