<?php

namespace App\Livewire\Konselor;

use App\Models\Service;
use App\Models\User;
use Livewire\Component;

class IdentitasDiri extends Component
{
    public $name;
    public $jk;
    public $tempat_lahir;
    public $tanggal_lahir;
    public $alamat;
    public $email;
    public $hp;
    public $foto;

    public $spesialisasi = [];
    public $spesialisasi_selected = [];
    public $pengalaman;

    public function mount()
    {
        $user = User::with('spesialisasi')->where('id', auth()->user()->id)->first();

        $details = json_decode($user->details, true);
        if ($details) {
            $this->jk = $details['jk'] ?? '';
            $this->tempat_lahir = $details['tempat_lahir'] ?? '';
            $this->tanggal_lahir = $details['tanggal_lahir'] ?? '';
            $this->alamat = $details['alamat'] ?? '';
            $this->hp = $details['hp'] ?? '';
            $this->pengalaman = $details['pengalaman'] ?? '';
        }

        $this->name = $user->name;
        $this->email = $user->email;

        foreach ($user->spesialisasi as $row) {
            $this->spesialisasi[] = $row->id;
            $this->spesialisasi_selected[] = $row->id;
        }
    }

    public function render()
    {
        $data = [
            'services' => Service::orderBy('name', 'asc')->get()
        ];
        return view('livewire.konselor.identitas-diri', $data);
    }

    public function save()
    {
        $this->validate([
            'name' => 'required',
            'jk' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'hp' => 'required',
            'pengalaman' => 'required|numeric|min:0|max:100',
            'email' => 'required|email|unique:users,email,' . auth()->user()->id,
            'spesialisasi' => 'required|array|min:1'
        ]);

        try {
            //code...
            $user = User::where('id', auth()->user()->id)->first();

            $user->spesialisasi()->sync([]);

            $user->update([
                'name' => $this->name,
                'email' => $this->email,
                'details' => json_encode([
                    'jk' => $this->jk,
                    'tempat_lahir' => $this->tempat_lahir,
                    'tanggal_lahir' => $this->tanggal_lahir,
                    'alamat' => $this->alamat,
                    'hp' => $this->hp,
                    'pengalaman' => $this->pengalaman,
                ])
            ]);

            $user->spesialisasi()->sync($this->spesialisasi);
            alert()->success('Success', 'Identitas diri berhasil diupdate.');
            return $this->redirect(route('counselor.kelengkapan.identitas'));
        } catch (\Throwable $th) {
            dd($th->getMessage());
            exit();
        }
    }
}
