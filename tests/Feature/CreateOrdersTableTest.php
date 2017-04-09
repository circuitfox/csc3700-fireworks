<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTableTest extends TestCase
{
  use DatabaseMigrations;

  public function testHasOrdersTable()
  {
    $this->assertTrue(Schema::hasTable("orders"));
  }

  public function testHasIdColumn()
  {
    $this->assertTrue(Schema::hasColumn("orders", "id"));
  }

  public function testHasUserIdColumn()
  {
    $this->assertTrue(Schema::hasColumn("orders", "user_id"));
  }
}
