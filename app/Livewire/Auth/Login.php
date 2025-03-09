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
            if ($this->role == 'user') {
                $konseli = $this->sinkron_mhs_simak($this->username);
            }

            $err = 0;
            $user = User::where('role', $this->role)->where(function ($query) {
                $query->where('username', $this->username)->orWhere('email', $this->username);
            })->first();

            if (!$user) {
                $this->addError('username', 'Identitas ' . $this->username . ' tidak ditemukan!');
                $err++;
            }

            if ($user) {
                if (!$user->is_active) {
                    $this->addError('username', 'Akun belum diaktifkan!');
                    $err++;
                }

                if ($user->user_simak && $this->role == 'counselor') {
                    $token = get_token();
                    if (!$token || $token['status'] != '200') {
                        $this->addError('username', 'Terjadi kesalahan saat pembuatan token!');
                        $err++;
                    }

                    if (!$err) {
                        $response = json_decode(get_data(str_curl(env('API_URL_SIMAK') . '/4pisim4k/index.php/dosen/nidn', ['token' => $token['data']['token'], 'nidn' => $this->username])), TRUE);
                        if ($response['status'] != '200') {
                            $this->addError('username', 'Identitas dosen ' . $this->username . ' tidak ditemukan!');
                            $err++;
                        }

                        if (!$err) {
                            $get = $response['data']['dosen'];
                            if (!password_verify($this->password, $get['password'])) {
                                $this->addError('password', 'Password yang Anda masukkan salah. Silakan coba lagi!');
                                $err++;
                            }
                        }
                    }
                }

                if ($user->user_simak && $this->role == 'user') {
                    if (!password_verify($this->password, $konseli['password'])) {
                        $this->addError('password', 'Password yang Anda masukkan salah. Silakan coba lagi!');
                        $err++;
                    }
                }

                if (!$user->user_simak) {
                    if (!password_verify($this->password, $user->password)) {
                        $this->addError('password', 'Password yang Anda masukkan salah. Silakan coba lagi!');
                        $err++;
                    }
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

    public function sinkron_mhs_simak($nim)
    {
        $err = 0;

        $token = get_token();
        if (!$token || $token['status'] != '200') {
            $this->addError('username', 'Terjadi kesalahan saat pembuatan token!');
            $err++;
        }

        $get = [];
        if (!$err) {
            $response = json_decode(get_data(str_curl(env('API_URL_SIMAK') . '/4pisim4k/index.php/mahasiswa/nim', ['token' => $token['data']['token'], 'nim' => $nim])), TRUE);
            if ($response['status'] != '200') {
                $this->addError('username', 'Identitas mahasiswa ' . $nim . ' tidak dikenali!');
                $err++;
            }

            if (!$err) {
                $get = $response['data'];
            }
        }

        if (!$err) {
            $value = [
                'name' => ucwords(strtolower(trim($get['nama_mahasiswa']))),
                'email' => $get['email'],
                'username' => $get['nim'],
                'password' => $get['password'],
                'role' => 'user',
                'user_simak' => 1,
                'details' => json_encode([
                    'hp' => $get['handphone'],
                    'jk' => $get['jenis_kelamin'],
                    'alamat' => NULL,
                    'institusi' => 'Universitas Khairun',
                    'tempat_lahir' => $get['tempat_lahir'],
                    'tanggal_lahir' => $get['tanggal_lahir']
                ])
            ];

            // insert user jika belum ada
            User::firstOrCreate(
                ['username' => $get['nim']],
                $value
            );

            return $value;
        }
    }
}
