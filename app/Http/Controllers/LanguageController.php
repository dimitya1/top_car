<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\RedirectResponse;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

/**
 * Class LanguageController
 * @package App\Http\Controllers
 */
class LanguageController
{
    /**
     * @param string $language
     * @return RedirectResponse
     */
    public function switch(string $language): RedirectResponse
    {
        $locale = Str::lower($language);

        $supportedLanguages = config('topcar.locales');

        if (!in_array($locale, $supportedLanguages)) {
            $locale = config('topcar.locale_ru', 'ru');
        }

        app()->setLocale($locale);

        session(['locale' => $locale]);

        return back();
    }
}
