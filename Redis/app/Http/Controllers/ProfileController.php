<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewAvatarRequest;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    public function changeAvatar(NewAvatarRequest $request)
    {
        //$avatar = Auth::user()->avatar;
        ////if($avatar !== null)
       // {
       //     File::delete("storage/images/avatars/$avatar");
       // }

        $name = uniqid()."webp";
        $file = request()->file('profile_image');

        $gd = new Driver();
        $manager = new ImageManager($gd);

        $image = $manager->read($file)->toWebp(90); // od 1% do 100% kvalitet slike, veci br, veca slika, veci kvalitet

        Storage::disk('public')->put("images/avatars/$name", (string) $image);

        Auth::user()->update(['avatar' => $name]);

        return redirect()->back();

    }


    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
