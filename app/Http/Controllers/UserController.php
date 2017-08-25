<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Validator;
use Auth;
use App\User;
use Intervention\Image\ImageManagerStatic as Image;
use Storage;
use Hash;
use Uuid;


class UserController extends Controller
{
    //
    public function __construct()
    {
    }


    public function getActivateAccount()
    {
        return view('auth.activate-account');
    }

    public function postActivateAccount(Request $request)
    {

        $inputs = $request->all();
        $validator = Validator::make($inputs, ['verification_code' => 'required']);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($this);
        }
        $user = Auth::user();
        if ($user->verification_code != $inputs['verification_code']) {
            $this->setFlashMessage("Incorrect verification code!", 2);
        }
        $user->verification_code = "";
        $user->account_verified = true;
        $user->active = true;
        $user->save();
        $this->setFlashMessage("Your account has been verified!", 1);
        return redirect('/profile');
    }

    public function getProfile()
    {
        $user = User::where('id', Auth::id())->withCount('items')->first();
        return view('frontend.pages.user.profile', compact('user'));
    }

    public function postProfile(Request $request)
    {
        $inputs = $request->all();
        unset($inputs['_token']);
        User::where('id', Auth::id())->update($inputs);
        $this->setFlashMessage("Your details has been updated!", 1);
        return redirect('/profile');
    }

    public function postAvatar(Request $request)
    {
        $inputs = $request->all();
        unset($inputs['_token']);
        if ($request->hasFile('avatar') && $request->avatar->isValid()) {
            $file = $request->file('avatar');
            $ext = $file->extension();
            $avatar_url = Auth::user()->avatar_url;
            $file_name = Uuid::generate(1) . "." . $ext;

            if ($avatar_url) {
                $elems = explode("/", $avatar_url);
                $file_name = array_pop($elems);
            }
            $s3 = Storage::disk();
            $file_path = 'avatars/' . $file_name;
            $image = Image::make($file->path())->fit(self::IMAGE_WIDTH, self::IMAGE_HEIGHT)->stream();
            $result = $s3->put($file_path, $image->__toString(), 'public');
            if ($result) {
                $update['avatar_url'] = $s3->url($file_path);
                User::where('id', Auth::id())->update($update);
                $this->setFlashMessage("Your avatar has been updated!", 1);
                return redirect()->back();

            }


        }
        return redirect()->back();
    }

    public function getChangePassword()
    {
        $user = Auth::user();
        return view('auth.passwords.change', compact('user'));
    }

    public function postChangePassword(Request $request)
    {
        $inputs = $request->all();
        $validator = Validator::make($inputs, [
            'old_password' => 'required|min:6',
            'password' => 'required|min:6|confirmed'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $user = Auth::user();
        if (Hash::check($inputs['old_password'], $user->password)) {
            // The passwords match...
            $user->password = bcrypt($inputs['password']);
            $user->save();
            $this->setFlashMessage("You changed your password!", 1);
        } else {
            $this->setFlashMessage("You entered an incorrect password!", 2);
        }
        return redirect()->back();
    }

    public function getUserItems()
    {
        $user = Auth::user();
        $items = Item::where('user_id', $user->id)
            ->with('category')
            ->with('images')
            ->with('state')
            ->get();
        return view('frontend.pages.user.items', compact('items'));
    }
}
