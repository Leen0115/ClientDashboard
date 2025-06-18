<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{

    public function setLanguage($lang)
    {
        if (!in_array($lang, ['en', 'ar'])) {
            return response()->json([
                'status' => 'error',
                'message' => __('languagePage.Failed_to_change_language')
            ], 400);
        }

        session(['locale' => $lang]);
        app()->setLocale($lang);

        return response()->json([
            'status' => 'success',
            'message' => __('languagePage.Language_changed_successfully'),
        ])->cookie('locale', $lang, 60 * 24 * 365);
    }
}
