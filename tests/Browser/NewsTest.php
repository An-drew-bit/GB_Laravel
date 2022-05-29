<?php

namespace Tests\Browser;

use App\Models\News;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class NewsTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testAddNewsForm()
    {
        $new = News::factory()->create();

        $this->browse(function (Browser $browser) use ($new) {
            $browser->visit('admin.news.create')
                ->type('title', $new->title)
                ->type('description', $new->description)
                ->type('category_id', $new->category_id)
                ->press('Добавить')
                ->assertRouteIs('admin.news.store');
        });
    }

    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testEditNewsForm()
    {
        $new = News::factory()->create();

        $this->browse(function (Browser $browser) use ($new) {
            $browser->visit('admin.news.edit')
                ->type('title', $new->title)
                ->type('description', $new->description)
                ->type('category_id', $new->category_id)
                ->press('Изменить')
                ->assertRouteIs('admin.news.store');
        });
    }
}
