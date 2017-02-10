<?php

namespace Tests;

use Tests\TestCase;
use Faker\Factory as Faker;
use Artisan;

class ApiTestCase extends TestCase
{
    protected $fake;
    protected $times = 1;

    public function __construct()
    {
        $this->fake = Faker::create();
    }

    public function setUp()
    {
        parent::setUp();

        Artisan::call('migrate');
    }

    public function times($count)
    {
        $this->times = $count;

        return $this;
    }
}
