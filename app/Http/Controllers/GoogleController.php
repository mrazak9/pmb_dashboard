<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle()

    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function handleGoogleCallback()

    {

        try {
            $user = Socialite::driver('google')->user();
            $googleId = $user->getEmail();

            $finduser = User::where('google_id', $user->id)->first();
            // only allow people with @company.com to login
            if (explode("@", $user->email)[1] !== 'fellow.lpkia.ac.id' && explode("@", $user->email)[1] !== 'lpkia.ac.id') {
                return redirect()->to('/')->with('error', 'Gunakan akun email @fellow.lpkia.ac.id untuk akses ke Sistem LUB Siswa');
            }

            if ($finduser) {
                Auth::login($finduser);
                if ($finduser->role === 'student') {
                    return redirect('/listLub');
                } else {
                    return redirect('/');
                }
            } elseif ($finduser === null) {
                $user = User::where('email', $googleId)->first();
                $gID = Socialite::driver('google')->user();
                // Update the google_id field
                $user->update(['google_id' => $gID->id]);

                // Save the changes
                $user->save();

                Auth::login($user);
                return redirect('/listLub');
            }
        } catch (Exception $e) {
            $message = 'Pengguna tidak ditemukan, hubungi MIS https://helpdesk.lpkia.ac.id';
            return $message;
        }
    }
}
