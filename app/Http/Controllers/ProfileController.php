<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    use ResetsPasswords;

    public function index(Request $request)
    {
        return $this->showResetForm($request);
    }

    public function update(Request $request)
    {
        $request->validate($this->rules(), $this->validationErrorMessages());

        $reset = $this->resetPassword(Auth::user(), $request->password);
        return redirect()->route('consulta');
    }

    /**
     * Methods Overriden of the trati
     *
     */
    
    public function showResetForm(Request $request, $token = null)
    {
        return view('auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }
    
    protected function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
        ];
    }
}
