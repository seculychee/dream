<?php

namespace App\Http\Controllers;

use App\Category;
use App\CategoryUserData;
use Illuminate\Http\Request;
use Validator;

class CategoryController extends Controller
{
    //Kategória oldal megjelenítése
    public function index()
    {
        $categories = Category::paginate(5);
        return view('category')->with('categories', $categories);
    }

    //Kategória felvitele
    public function store(Request $request)
    {
        $validata = $this->valid($request->all());
        if ($validata->fails()) {
            return redirect()->route('category')
                ->withErrors($validata->errors()->all())
                ->withInput();
        }
        $this->createCategory($request->only('name'));

        $request->session()->reflash();
        $request->session()->flash('success', 'Sikeres felvitel!');
        return redirect()->back();
    }

    //Kategória szerkesztése
    public function update(Request $request, Category $category)
    {
        $validata = $this->valid($request->all());
        if ($validata->fails()) {
            return redirect()->route('category')
                ->withErrors($validata->errors()->all())
                ->withInput();
        }
        $category->update($request->only('name'));

        $request->session()->reflash();
        $request->session()->flash('success', 'Sikeres módosítás!');
        return redirect()->back();
    }

    //Kategória törlése
    public function destroy(Category $category, Request $request)
    {
        $user = Category::find($category->id);
        $pivot = $user->userData()->get();

        foreach ($pivot as $users) {
            CategoryUserData::create([
                'user_data_id' => $users->id,
                'category_id' => 1
            ]);
        }
        $user->userData()->detach();

        $category->delete();

        $request->session()->reflash();
        $request->session()->flash('success', 'Sikeres törlés!');
        return redirect()->back();
    }

    //Kategória kiegészítő függvény a felvitelhez
    protected function createCategory($data)
    {
        return $company = Category::create($data);
    }

    //Validáció
    protected function valid(array $data)
    {
        $rule = [
            'name' => 'required',
        ];
        $message = [
            'name.required' => 'validation.categoryNameRequired',
        ];
        return Validator::make($data, $rule, $message);
    }
}
