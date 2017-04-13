<?php

namespace Tests;

trait LayoutTests
{
    protected abstract function getRoute();

    public function testHasXsrfToken()
    {
        $this->get($this->getRoute())
            ->assertCookie("XSRF-TOKEN");
    }

    public function testHasTitle()
    {
        $this->get($this->getRoute())
            ->assertSee("Fireworks Shop Admin Page");
    }

    // Look for navbar classes
    public function testHasNavBar()
    {
        $this->get($this->getRoute())
            ->assertSee("navbar")
            ->assertSee("navbar-default")
            ->assertSee("navbar-header")
            ->assertSee("nav");
    }

    public function testHasAssets()
    {
        $this->get($this->getRoute())
            ->assertSee("css/app.css")
            ->assertSee("js/app.js");
    }
}
