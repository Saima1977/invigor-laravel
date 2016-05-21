<?php

class TestCase extends Illuminate\Foundation\Testing\TestCase
{
    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function setupDatabase()
    {
        Artisan::call('migrate');
        Artisan::call('db:seed');
        $this->migrated = true;
    }
}
