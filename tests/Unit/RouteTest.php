<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TestRoutes extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testRoutes()
    {

        $this->withoutMiddleware();

        $appURL = env('APP_URL');

        $urls = [
            '/',
            '/services',
            '/contact',
            '/booking',
            '/admin',
            '/about',
            '/error',
            '/contact',
            'cart',
            '/shop',
            '/cashier',
            '/oic',
            '/accounting',
            '/assistant',

        ];

        echo  PHP_EOL;

        foreach ($urls as $url) {
            $response = $this->get($url);
            if((int)$response->status() !== 200){
                echo  $url . ' (Failed!) did not return a 200.';
                $this->assertTrue(false);
            } else {
                echo $url . ' (Success)';
                $this->assertTrue(true);
            }
            echo  PHP_EOL;
        }
    }
}
