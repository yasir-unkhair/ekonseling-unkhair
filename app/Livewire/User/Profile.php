<?php

namespace App\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\File as FacadesFile;
use Illuminate\Validation\Rules\File;
use Livewire\Component;
use Livewire\WithFileUploads;

use Intervention\Image\Laravel\Facades\Image;

class Profile extends Component
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
    public $institusi;

    public $url_foto;

    public function mount()
    {
        $user = User::where('id', auth()->user()->id)->first();

        $details = json_decode($user->details, true);
        if ($details) {
            $this->jk = $details['jk'] ?? '';
            $this->tempat_lahir = $details['tempat_lahir'] ?? '';
            $this->tanggal_lahir = $details['tanggal_lahir'] ?? '';
            $this->alamat = $details['alamat'] ?? '';
            $this->hp = $details['hp'] ?? '';
            $this->institusi = $details['institusi'] ?? '';
        }

        $this->name = $user->name;
        $this->email = $user->email;
        $this->url_foto = $user->foto;
    }

    public function render()
    {
        return view('livewire.user.profile');
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
            'email' => 'required|email|unique:users,email,' . auth()->user()->id,
            'institusi' => 'required'
        ];

        $foto = $this->foto;
        if ($foto) {
            $rules += ['foto' => ['required', 'image', File::types(['png', 'jpg', 'jpeg'])->max(0.5 * 1024)]];
        }

        $this->validate($rules);


        //dd($this);

        $path_foto = 'images/foto/';

        try {

            if ($foto) {
                $nama_file = 'user-' . time() . '.' . $foto->getClientOriginalExtension();
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

            //code...
            $user = User::where('id', auth()->user()->id)->first();
            $user->update([
                'name' => $this->name,
                'email' => $this->email,
                'details' => json_encode([
                    'jk' => $this->jk,
                    'tempat_lahir' => $this->tempat_lahir,
                    'tanggal_lahir' => $this->tanggal_lahir,
                    'alamat' => $this->alamat,
                    'hp' => $this->hp,
                    'institusi' => $this->institusi
                ]),
                'foto' => $this->url_foto
            ]);

            alert()->success('Success', 'Profil anda berhasil diupdate.');
            return $this->redirect(route('user.profile'));
        } catch (\Throwable $th) {
            dd($th->getMessage());
            exit();
        }
    }
}
