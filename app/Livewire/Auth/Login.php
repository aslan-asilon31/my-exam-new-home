<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use App\Models\Asesmen;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Log;

use App\Models\Pengguna; // Model pengguna
use Illuminate\Http\JsonResponse; // Untuk tipe respons JSON
use Illuminate\Http\Request; // Untuk Request
use Illuminate\Support\Facades\Auth; // Untuk Auth
use Illuminate\Validation\ValidationException; // Untuk pengecualian validasi
use App\Livewire\Auth\Forms\LoginForm;
use Illuminate\Support\Facades\Hash;
use Session;


class Login extends Component
{

    public LoginForm $loginForm;

    public function mount()
    {
      if (\Illuminate\Support\Facades\Auth::check()) {
        return redirect()->intended('dasbor');
      }
    }


    // public function login()
    // {
    //     if (Auth::check()) {
    //         return redirect('/dasbor');
    //     }else{
    //         return redirect('/login');
    //     }
    // }

    public function login(Request $request)
    {
        $data = [
            'surel' => $request->input('surel'),
            'sandi' => $request->input('sandi'),
        ];

        if (Auth::Attempt($data)) {
            return redirect('dasbor');
        }else{
            Session::flash('error', 'surel atau sandi Salah');
            return redirect('/');
        }
    }


    #[Title('Konfirmasi Start')]
    public function render()
    {

        return view('livewire.auth.login')
        ->layout('components.layouts.app_auth');
    }
}
