<?php

namespace App\Livewire\Konselor;

use App\Models\CounselingRequests;
use Livewire\Attributes\On;
use Livewire\Component;

class DetailPermintaanKonseling extends Component
{
    public $modalID = 'detail-permintaan-konseling';
    public $id;
    public $konseli;
    public $kategori;
    public $tanggal;
    public $jam;
    public $deskripsi;

    public $status;
    public $catatan;

    public function render()
    {
        return view('livewire.konselor.detail-permintaan-konseling');
    }

    #[On('show-modal-detail-permintaan')]
    public function detail($id)
    {
        $get = CounselingRequests::with('user')->where('id', $id)->first();

        $this->id = $get->id;
        $this->konseli = $get->user->name;
        $this->kategori = $get->category;
        $this->tanggal = tgl_indo($get->date, false);
        $this->jam = $get->time;
        $this->deskripsi = $get->description;

        $this->status = $get->status;
        $this->catatan = json_decode($get->details)->catatan ?? '';

        $this->dispatch('open-modal', modal: $this->modalID);
    }

    public function save()
    {
        $this->validate([
            'status' => 'required',
            'catatan' => 'required',
        ]);

        CounselingRequests::where('id', $this->id)->update([
            'status' => $this->status,
            'details' => json_encode([
                'catatan' => $this->catatan
            ]),
        ]);

        $this->hide_modal();
        alert()->success('Berhasil', 'Data berhasil disimpan.');
        return $this->redirect(route('counselor.permintaan_konseling.index'));
    }

    public function hide_modal()
    {
        $this->reset_form();
        $this->dispatch('close-modal', modal: $this->modalID);
    }

    public function reset_form()
    {
        $this->resetErrorBag();
        $this->resetValidation();

        $this->id = NULL;
        $this->konseli = NULL;
        $this->kategori = NULL;
        $this->tanggal = NULL;
        $this->jam = NULL;
        $this->deskripsi = NULL;

        $this->status = NULL;
        $this->catatan = NULL;
    }
}
