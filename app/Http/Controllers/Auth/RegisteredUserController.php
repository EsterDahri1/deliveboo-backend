<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\Typology;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $typologies = Typology::all()->sortBy('name_typology');
        return view('auth.register', compact('typologies'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required','confirmed', 'min:8', 'max:255'],
            'password_confirmation' => ['required','same:password'],
            'typologies' =>['required'],
            'vat' => ['required','string','unique:restaurants,vat'],
        ]);


        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);


        $restaurant = Restaurant::create([
            'address' => $request->address,
            'vat' => $request->vat,
            'cover_image' => '',
            'name' => $request->restaurantName,
            'user_id' => $user->id,

        ]);
        // $cover_image = Storage::disk('local')->put('restaurants_images', $request['cover_image']);
        // $request['cover_image'] = $cover_image;

        // if ($request->has('cover_image')) {
        //     $file_path =  Storage::disk('public')->put('restaurants', $request->cover_image);

        //     $restaurant->cover_image = $file_path;
        // }

        if ($request->has('typologies')) {

            $restaurant->typologies()->sync($request->typologies);
        }


        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
