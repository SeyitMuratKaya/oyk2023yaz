<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoryRequest;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function show()
    {
        $params = session()->get('story_params');

        $story = session()->has("story_params") ? $this->prepareStoryText($params) : null;

        return view("story.show", compact("story"));
    }

    public function handle(StoryRequest $request)
    {
        $request->session()->put("story_params", [
            "name" => $request->input("name"),
            "hobby" => $request->input("hobby"),
            "drink" => $request->input("drink"),
            "notes" => $request->input("notes"),
        ]);

        // $request->session()->get("story", "default");
        // $request->session()->has("story");
        // dump($request->session()->all());
        // return view("story.result", ["story" => "deneme"]);

        return redirect()->route("story.show");
    }

    public function delete(Request $request)
    {
        $request->session()->remove("story_params");
        return redirect()->route("story.show");
    }

    private function prepareStoryText($params)
    {
        $story = "Kahramanımız "
            . $params["name"]
            . " bir sabah korkunç düşlerden uyandığında bir daha asla"
            . $this->prepareHobbyPartForStoryText($params["hobby"])
            . " korkusuna kapıldı. Bu böyle gitmez. ben en iyisi ayılma için"
            . $this->prepareDrinkPartForStoryText($params["drink"])
            . $params["notes"] . " diye ekledi";

        return $story;
    }

    private function prepareHobbyPartForStoryText($hobby)
    {
        $text = match ($hobby) {
            "music" => " bir daha asla müzik dinlemeyecekti.",
            "art" => " bir daha asla resim yapmayacaktı.",
            "sport" => " bir daha asla spor yapmayacaktı.",
            default => " hobi bulamadı.",
        };
        return $text;
    }

    private function prepareDrinkPartForStoryText($drink)
    {
        $text = match ($drink) {
            "Ice Capiccino" => " Ice Capiccino içmeliyim dedi. ",
            "Mocha" => " Mocha içmeliyim dedi. ",
            "Çay" => " Çay içmeliyim dedi. ",
            "Filtre Kahve" => " Filtre Kahve içmeliyim dedi. ",
            default => " içecek bulamadı. ",
        };
        return $text;
    }
}
