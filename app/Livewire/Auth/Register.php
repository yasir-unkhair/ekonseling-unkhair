<?php

namespace App\Livewire\Auth;

use App\Jobs\SendMail;
use App\Models\RegisterUser;
use Livewire\Attributes\On;
use Livewire\Component;

class Register extends Component
{
    public $modalID = 'FormRegister';
    public $nama;
    public $email;
    public $password;

    public function render()
    {
        return view('livewire.auth.register');
    }

    #[On('show-register')]
    public function showRegister()
    {
        $this->resetErrorBag();
        $this->resetValidation();
        $this->nama = NULL;
        $this->email = NULL;
        $this->password = NULL;
        $this->dispatch('open-modal', modal: $this->modalID);
    }

    public function register()
    {
        $this->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users,email|unique:app_register_users,email',
            'password' => 'required'
        ]);

        try {
            //code...
            $register = RegisterUser::create([
                'nama' => $this->nama,
                'email' => $this->email,
                'password' => $this->password
            ]);

            if ($register->wasRecentlyCreated) {
                SendMail::dispatch('register', $register->toArray());
            }

            alert()->success('Register Berhasil', 'Silakan cek email Anda untuk aktivasi akun!');
            return $this->redirect(route('frontend.beranda'));
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }
}
