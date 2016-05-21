<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class InvigorTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

	use DatabaseTransactions;    
    
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testCreateProduct()
    {
        $this->visit('invigors/create')
            ->type('new.png', 'image')
            ->type('Product Test', 'name')
            ->type('$11.00', 'price')
            ->type('This is a test product', 'description')
            ->press('Create the Product!')
            ->seePageIs('/invigors`');
    }    
}
