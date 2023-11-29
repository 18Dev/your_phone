<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

/**
 * @LocalController
 */
class LocalController
{
    /**
     * @param $locale
     * @return RedirectResponse
     */
    public function change($locale): RedirectResponse
    {
        app()->setLocale($locale);

        session()->put('locale', $locale);

        return redirect()->back();
    }
}
