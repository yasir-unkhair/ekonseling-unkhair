<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class Login extends Component
{
    public $modalID = 'FormLogin';
    public $username;
    public $password;
    public $role;

    public function render()
    {
        return view('livewire.auth.login');
    }

    #[On('show-login')]
    public function showLogin()
    {
        $this->resetErrorBag();
        $this->username = NULL;
        $this->password = NULL;
        $this->role = NULL;
        $this->dispatch('open-modal', modal: $this->modalID);
    }

    public function login()
    {
        $this->validate([
            'username' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);

        try {
            $err = 0;
            $user = User::where('role', $this->role)->where(function ($query) {
                $query->where('username', $this->username)->orWhere('email', $this->username);
            })->first();

            if (!$user) {
                $this->addError('username', 'Identitas ' . $this->username . ' tidak ditemukan!');
                $err++;
            }

            if ($user) {
                if (!password_verify($this->password, $user->password)) {
                    $this->addError('password', 'Password yang Anda masukkan salah. Silakan coba lagi!');
                    $err++;
                }

                if (!$user->is_active) {
                    $this->addError('username', 'Akun belum diaktifkan!');
                    $err++;
                }
            }

            if (!$err) {
                auth()->login($user);

                alert()->success('Success', 'Selamat datang ' . $user->name);

                if ($user->role == 'admin') {
                    return $this->redirect(route('admin.dashboard'));
                }

                if ($user->role == 'counselor') {
                    return $this->redirect(route('counselor.dashboard'));
                }

                if ($user->role == 'user') {
                    // dd('user');
                    return $this->redirect(route('user.dashboard'));
                }
            }
        } catch (\Throwable $th) {
            dd($th->getMessage());
            exit();
        }
    }
}
