<?php

namespace Tests;

use App\Models\User;
use Illuminate\Contracts\Console\Kernel;
use Laravel\BrowserKitTesting\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = env('APP_URL');

    /**
     * @var \App\Models\User
     */
    protected $user;

    /**
     * @param null $user
     *
     * @return $this
     */
    public function signIn($user = null)
    {
        if (!$user) {
            $user = User::factory()->make([
                'email' => 'admin@admin.com',
                'name' => 'admin',
                'password' => bcrypt('123456'),
                'picture' => null,
            ]);
        }
        $this->actingAs($this->user = $user);
        return $this;
    }
}
