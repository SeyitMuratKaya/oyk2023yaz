<?php

use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Route;
use Teto\HTTP\AcceptLanguage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/story', [FormController::class, "show"])->name("story.show");
Route::post('/story', [FormController::class, "handle"])->name("story.handle");
Route::delete('/story', [FormController::class, "delete"])->name("story.delete");

Route::get('/set-color/{color}', function ($color) {
    return redirect()->back()->withCookie("color", $color);
});

Route::get('/hello', function () {
    $arr = range(0, 10);

    foreach ($arr as $index => $item) {
        echo $index . " -> " . $item . "<br>";
    }

    $str = implode("-", $arr);

    echo $str . "<br>";
});

Route::get("/landing/{lang?}", function ($lang = null) {
    //simple landing page
    //turkce ve ingilizce hizmet verecek
    //her dil icin bir route olacak
    //dil degiskeni ile dil belirlenecek
    //dil degiskeni yoksa default olarak ingilizce
    //dil degiskeni varsa o dilde hizmet verilecek

    //service container and service provider

    // $languages = ["en", "tr"];
    // if (!in_array($lang, $languages)) {
    //     return redirect("/landing");
    // }

    $translations = [
        "en" => [
            "welcome" => "Welcome",
            "intro" => "We're the best",
            "headline" => "Ignore the rest",
            "outro" => "Keep following for more",
        ],
        "tr" => [
            "welcome" => "Hosgeldiniz",
            "intro" => "En iyisi biziz",
            "headline" => "Gerisini takmayin",
            "outro" => "Daha fazlasi icin takipte kal",
        ],
        "es" => [
            "welcome" => "Bienvenido",
            "intro" => "Somos los mejores",
            "headline" => "Ignora el resto",
            "outro" => "Sigue siguiendo para más",
        ],
        "fr" => [
            "welcome" => "Bienvenue",
            "intro" => "Nous sommes les meilleurs",
            "headline" => "Ignorez le reste",
            "outro" => "Continuez à suivre pour plus",
        ],
        "jp" => [
            "welcome" => "ようこそ",
            "intro" => "私たちは最高です",
            "headline" => "残りを無視する",
            "outro" => "もっと見るためにフォローし続ける",
        ],
    ];
    // if (!array_key_exists($lang, $translations)) {
    //     return "404";
    // }
    // if (!isset($translations[$lang])) {
    //     return "404";
    // }

    if ($lang == null) {
        $lang = "en";
        foreach (AcceptLanguage::get() as $language) {
            if (in_array($language['language'], array_keys($translations))) {
                $lang = $language['language'];
                break;
            }
        }
    } elseif (!isset($translations[$lang])) {
        return Redirect("/landing");
    }

    // dump($strings); dd($strings);

    return view('landing', [
        'lang' => $lang,
        'translations' => $translations[$lang],
        'languages' => array_keys($translations)
    ]);
})->name("landing");

Route::get("/altest", function () {
    dd(AcceptLanguage::get());

    return "altest";
})->name("altest");
