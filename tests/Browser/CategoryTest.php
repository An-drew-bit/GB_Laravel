<?php

namespace Tests\Browser;

use App\Models\Category;
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
        $category = Category::factory()->create();

        $this->browse(function (Browser $browser) use ($category) {
            $browser->visit('admin.category.create')
                ->type('title', $category->title)
                ->press('Добавить')
                ->assertRouteIs('admin.category.store');
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
            $browser->visit('admin.category.edit')
                ->type('title', $category->title)
                ->press('Изменить')
                ->assertRouteIs('admin.category.store');
        });
    }
}
