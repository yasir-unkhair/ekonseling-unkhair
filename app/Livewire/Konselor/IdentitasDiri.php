<?php

namespace App\Livewire\Konselor;

use App\Models\Service;
use App\Models\User;
use Illuminate\Support\Facades\File as FacadesFile;
use Illuminate\Validation\Rules\File;
use Livewire\Component;
use Livewire\WithFileUploads;

use Intervention\Image\Laravel\Facades\Image;

class IdentitasDiri extends Component
{
    use WithFileUploads;

    public $name;
    public $jk;
    public $tempat_lahir;
    public $tanggal_lahir;
    public $alamat;
    public $email;
    public $hp;
    public $foto;
    public $url_foto;

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
        $this->url_foto = $user->foto;

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
        $rules = [
            'name' => 'required',
            'jk' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'hp' => 'required',
            'pengalaman' => 'required|numeric|min:0|max:100',
            'email' => 'required|email|unique:users,email,' . auth()->user()->id,
            'spesialisasi' => 'required|array|min:1'
        ];

        $foto = $this->foto;
        if ($foto) {
            $rules += ['foto' => ['required', 'image', File::types(['png', 'jpg', 'jpeg'])->max(0.5 * 1024)]];
        }

        $this->validate($rules);

        $path_foto = 'images/foto/';

        try {
            //code...

            if ($foto) {
                $nama_file = 'konselor-' . time() . '.' . $foto->getClientOriginalExtension();
                $lokasi_file = public_path($path_foto);
                if (!FacadesFile::isDirectory($lokasi_file)) {
                    FacadesFile::makeDirectory($lokasi_file, 0755, true, true);
                }

                $img = Image::read($foto->path());
                $img->resize(215, 250, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($lokasi_file . $nama_file);

                // Hapus foto lama
                if (filter($this->url_foto)) {
                    if (file_exists(public_path($this->url_foto))) {
                        unlink(public_path($this->url_foto));
                    }
                }

                $this->url_foto = $path_foto . $nama_file;
            }

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
                ]),
                'foto' => $this->url_foto
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
