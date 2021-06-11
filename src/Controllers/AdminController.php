<?php

namespace SimaoCoutinho\Admin\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use SimaoCoutinho\Admin\Models\Language;

class AdminController extends Controller
{
    public function index()
    {

    }

    //region Languages
    public function languages()
    {
        $languages = Language::whereDeleted(false)->get();

        return view('admin::backend.languages.languages', [
            'languages' => $languages
        ]);
    }

    public function addLanguage()
    {
        return view('admin::backend.languages.language');
    }

    public function editLanguage($id)
    {
        $language = Language::findOrFail($id);

        return view('admin::backend.languages.language', [
            'language' => $language
        ]);
    }

    public function updateLanguage(Request $request): JsonResponse
    {
        $language = new Language();

        if ($request->input('id') != 0) {
            $language = Language::findOrFail($request->input('id'));
        }

        $language->save();

        return response()->json(["status" => true]);
    }

    public function deleteLanguage(Request $request): JsonResponse
    {
        $language = Language::findOrFail($request->input('id'));
        $language->deleted = true;
        $language->save();

        return response()->json(["status" => true]);
    }
    //endregion
}
