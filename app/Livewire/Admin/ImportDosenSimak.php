<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class ImportDosenSimak extends Component
{
    public $modalID = 'modal-import-dosen-simak';
    public $username;
    public $password;
    public $email;
    public $name;
    public $homebase;

    public $details = [];

    public $form = 'search';

    public $currentStep = 1;

    public $message = [];

    public function render()
    {
        return view('livewire.admin.import-dosen-simak');
    }

    #[On('show-modal-import-dosen-simak')]
    public function show_modal()
    {
        $this->reset_form();
        $this->dispatch('open-modal', modal: $this->modalID);
    }

    public function search()
    {
        $this->validate([
            'username' => 'required',
        ]);

        $err = 0;

        $token = get_token();
        if (!$token || $token['status'] != '200') {
            $this->message = [
                'type' => 'danger',
                'title' => 'Uppss!!',
                'message' => 'Terjadi kesalahan saat pembuatan token!'
            ];
            $err++;
        }

        $get = [];
        if (!$err) {
            $response = json_decode(get_data(str_curl(env('API_URL_SIMAK') . '/4pisim4k/index.php/dosen/nidn', ['token' => $token['data']['token'], 'nidn' => $this->username])), TRUE);
            if ($response['status'] != '200') {
                $this->message = [
                    'type' => 'danger',
                    'title' => 'Uppss!!',
                    'message' => 'Identitas dosen ' . $this->username . ' tidak ditemukan!'
                ];
                $err++;
            }
            $get = $response['data'];
        }

        if (!$err) {
            $prodi = $get['head'];
            $dosen = $get['dosen'];

            $this->username = $dosen['nidn'];
            $gd = trim($dosen['gelar_depan']);
            $gb = trim($dosen['gelar_belakang']);
            $this->name = ($gd ? $gd . ' ' : '') . trim(ucwords(strtolower($dosen['nama_dosen']))) . ($gb ? ', ' . $gb : '');
            $this->password = $dosen['password'];
            $this->email = $dosen['email'];

            $this->homebase = $prodi['nama_program_studi'] . ' (' . $prodi['nama_jenjang_pendidikan'] . ')';

            $this->details = [
                'hp' => NULL,
                'jk' => $dosen['jenis_kelamin'],
                'alamat' => NULL,
                'pengalaman' => NULL,
                'tempat_lahir' => NULL,
                'tanggal_lahir' => $dosen['tanggal_lahir'],
            ];

            $this->step(2);

            $this->message = NULL;
        }
    }

    public function save()
    {
        $this->validate([
            'username' => 'required|unique:users,username',
        ]);

        try {
            //code...
            User::create([
                'name' => $this->name,
                'email' => $this->email,
                'username' => $this->username,
                'password' => $this->password,
                'role' => 'counselor',
                'user_simak' => 1,
                'details' => json_encode($this->details)
            ]);

            $this->close_modal();
            alert()->success('Success', 'Dosen berhasil ditambahkan sebagai konselor.');
            return $this->redirect(route('admin.konselor.index'));
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    public function step($step)
    {
        $this->currentStep = $step;
        $this->form = ($step == 1) ? 'search' : 'save';
        if ($step == 1) {
            $this->reset_form();
        }
    }

    public function reset_form()
    {
        $this->resetErrorBag();
        $this->resetValidation();

        $this->username = null;
        $this->password = null;
        $this->email = null;
        $this->name = null;
        $this->homebase = null;
        $this->currentStep = 1;
        $this->details = [];
        $this->message = [];
        $this->form = 'search';
    }

    public function close_modal()
    {
        $this->reset_form();
        $this->dispatch('close-modal', modal: $this->modalID);
    }
}
