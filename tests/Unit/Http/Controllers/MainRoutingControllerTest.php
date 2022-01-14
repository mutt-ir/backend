<?php

namespace Tests\Unit\Http\Controllers;

use App\Http\Controllers\MainRoutingController;
use App\Models\Link;
use Illuminate\Support\Str;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Tests\TestCase;

class MainRoutingControllerTest extends TestCase
{
    /**
     * @var string
     */

    protected static $mockLinkSlug;
    /**
     * @var string
     */
    protected static $mockLinkUrl;

    /**
     * @var string
     */
    protected static $mockLinkRedirectionUrl;

    /**
     * @var MainRoutingController
     */
    protected static $controller;

    protected function setUp(): void
    {
        parent::setUp();

        [
            'slug' => self::$mockLinkSlug,
            'url' => self::$mockLinkRedirectionUrl
        ] = Link::query()->first();

        self::$mockLinkUrl = '/' . self::$mockLinkSlug;
        self::$controller = new MainRoutingController();
    }

    public function test_get_redirection_url_by_slug()
    {
        $url = self::$controller->getRedirectionUrlBySlug(self::$mockLinkSlug);
        $this->assertEquals($url, self::$mockLinkRedirectionUrl);
    }

    public function test_get_redirection_url_by_slug_exception()
    {
        $fakeSlug = Str::random(13);
        try {
            $url = self::$controller->getRedirectionUrlBySlug($fakeSlug);
            $this->fail($url);
        } catch (\Exception $exception) {
            $this->assertInstanceOf(NotFoundHttpException::class, $exception);
        }
    }

    public function test_main_routing()
    {
        $this->get(self::$mockLinkUrl)
            ->assertRedirect(self::$mockLinkRedirectionUrl);
    }


    public function test_main_routing_exception()
    {
        $fakeSlug = Str::random(13);
        $fakeUrl = '/' . $fakeSlug;
        $this->get($fakeUrl)
            ->assertStatus(404);
    }

}
