<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class MainRoutingController extends Controller
{
    public function routing($slug): RedirectResponse
    {
        try {
            $redirectUrl = $this->getRedirectionUrlBySlug($slug);
            return redirect()->to($redirectUrl);
        }  catch(\Exception $exception) {
            throw new NotFoundHttpException();
        }
    }

    public function getRedirectionUrlBySlug($slug) {
        try {
            $link = Link::query()->firstBySlug($slug);
            return $link->url;
        } catch(\Exception $exception) {
            throw new NotFoundHttpException();
        }
    }
}
