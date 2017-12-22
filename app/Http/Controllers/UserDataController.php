<?php

namespace App\Http\Controllers;

use App\Category;
use App\UserData;
use Validator;
use Illuminate\Http\Request;

class UserDataController extends Controller
{
    //Főoldal megjelenítése -> címjegyzék
    public function index()
    {
        $userDatas = UserData::paginate(5);
        $categories = Category::all();
        return view('userdatas')
            ->with('categories', $categories)
            ->with('userDatas', $userDatas);
    }

    //Címzett tárolása
    public function store(Request $request)
    {
        $phoneFormat = $request->only('phone_format');
        $phoneNumber = $request->only('phone');
        $validata = $this->valid($request->all());
        if ($validata->fails()) {
            return redirect()->route('home')
                ->withErrors($validata->errors()->all())
                ->withInput();
        }

        if (isset($phoneFormat["phone_format"]) &&
            isset($phoneNumber["phone"])
        ) {

            $create = $this->createUserData($request->only('name', 'email', 'phone_format', 'phone'));
            $userCat = UserData::find($create->id);
            $userCat->categories()->attach($request->only('category'));

        } else {

            $create = $this->createUserData($request->only('name', 'email'));
            $userCat = UserData::find($create->id);

            $userCat->categories()->attach($request->only('category'));
        }


        $request->session()->reflash();
        $request->session()->flash('success', 'Sikeres felvitel!');
        return redirect()->back();
    }

    //Címzett szerkesztése
    public function update(Request $request, $id)
    {
        $phoneFormat = $request->only('phone_format');
        $phoneNumber = $request->only('phone');
        $validata = $this->valid($request->all());
        if ($validata->fails()) {
            return redirect()->route('home')
                ->withErrors($validata->errors()->all())
                ->withInput();
        }

        if ($phoneFormat["phone_format"] != null &&
            isset($phoneNumber["phone"])
        ) {


            UserData::where('id', $id)->update($request->only('name', 'email', 'phone_format', 'phone'));
            $userCat = UserData::find($id);
            $userCat->categories()->detach();
            $userCat->categories()->attach($request->only('category'));

        } else {

            UserData::where('id', $id)->update($request->only('name', 'email'));
            $userCat = UserData::find($id);
            $userCat->categories()->detach();
            $userCat->categories()->attach($request->only('category'));
        }


        $request->session()->reflash();
        $request->session()->flash('success', 'Sikeres módosítás!');
        return redirect()->back();
    }

    //Címzett törlése
    public function destroy($id, Request $request)
    {
        $userDatas = UserData::find($id)->categories()->detach();
        $userDatas = UserData::where('id', $id)->delete();

        $request->session()->reflash();
        $request->session()->flash('success', 'Sikeres törlés!');
        return redirect()->route('home');
    }

    //Címzett kiegészítő függvény a felvitelhez
    protected function createUserData($data)
    {
        return UserData::create($data);
    }

    //Validáció
    protected function valid(array $data)
    {
        $rule = [
            'name' => 'required',
            'email' => 'required',
            'phone1' => 'max:2',
            'phone2' => 'max:7',
        ];
        $message = [
            'name.required' => 'validation.userNameRequired',
            'email.required' => 'validation.userEmailRequired',
            'phone1.max' => 'validation.userPhoneFormat',
            'phone2.max' => 'validation.userPhoneNumber',
        ];
        return Validator::make($data, $rule, $message);
    }

}
