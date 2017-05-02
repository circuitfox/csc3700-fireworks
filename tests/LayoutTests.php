<?php

namespace Tests;


trait LayoutTests
{
    protected abstract function getRoute();

    public function testHasXsrfToken()
    {
        $user = factory(\App\User::class)->states('admin')->create();
        $this->actingAs($user)->get($this->getRoute())
            ->assertCookie("XSRF-TOKEN");
    }

    public function testHasTitle()
    {
        $user = factory(\App\User::class)->states('admin')->create();
        $this->actingAs($user)->get($this->getRoute())
            ->assertSee("Fireworks Shop Admin Page");
    }

    // Look for navbar classes
    public function testHasNavBar()
    {
        $user = factory(\App\User::class)->states('admin')->create();
        $this->actingAs($user)->get($this->getRoute())
            ->assertSee("navbar")
            ->assertSee("navbar-default")
            ->assertSee("navbar-header")
            ->assertSee("nav");
    }

    public function testHasAssets()
    {
        $user = factory(\App\User::class)->states('admin')->create();
        $this->actingAs($user)->get($this->getRoute())
            ->assertSee("css/app.css")
            ->assertSee("js/app.js");
    }
}
