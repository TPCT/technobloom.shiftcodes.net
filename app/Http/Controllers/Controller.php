<?php

namespace App\Http\Controllers;

use App\Helpers\Utilities;
use App\Models\Language;
use App\Settings\General;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function __construct()
    {
        view()->share('language', Language::where('locale', app()->getLocale())->exists() ? app()->getLocale() : app(General::class)->default_locale);
        view()->share('rtl', app()->getLocale() == "ar" ? "true" : "false");
    }

    public function view($viewPath, $content = [], $status=200, $headers=[]): bool|\Illuminate\Http\JsonResponse|string
    {
        return Utilities::view($viewPath, $content, $status, $headers);
    }
}
