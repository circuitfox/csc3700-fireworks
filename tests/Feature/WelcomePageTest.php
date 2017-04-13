<?php

namespace Tests\Feature;

use Tests\LayoutTests;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class WelcomePageTest extends TestCase
{
    use LayoutTests;

    protected function getRoute() {
       return "/";
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testHasTabs()
    {
        $this->get($this->getRoute())
            ->assertSee("nav-tabs")
            ->assertSee("#tab1")
            ->assertSee("#tab2")
            ->assertSee("tab-content")
            ->assertSee("tab-pane");
    }
}
