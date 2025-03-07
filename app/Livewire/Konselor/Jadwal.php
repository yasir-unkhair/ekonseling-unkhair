<?php

namespace App\Livewire\Konselor;

use App\Models\CounselorHasSchedule;
use Livewire\Attributes\On;
use Livewire\Component;

class Jadwal extends Component
{
    public $modalID = 'modal-jadwal';
    public $hari;
    public $jam;
    public $metode;
    public $status;
    public $id;
    public $mode = 'new';

    #[On('show-modal-edit-jadwal')]
    public function edit($id = NULL)
    {
        $get = CounselorHasSchedule::where('id', $id)->first();
        if ($get) {
            $this->id = $get->id;
            $this->hari = $get->hari;
            $this->jam = $get->jam;
            $this->metode = $get->metode;
            $this->status = $get->status;
            $this->mode = 'edit';

            $this->show_modal();
        }
    }

    public function render()
    {
        return view('livewire.konselor.jadwal');
    }

    #[On('show-modal-jadwal')]
    public function show_modal()
    {
        $this->dispatch('open-modal', modal: $this->modalID);
    }

    public function save()
    {
        $this->validate([
            'hari' => 'required',
            'jam' => 'required',
            'metode' => 'required',
            'status' => 'required',
        ]);

        try {
            if ($this->mode == 'new') {
                CounselorHasSchedule::create([
                    'user_id' => auth()->user()->id,
                    'hari' => $this->hari,
                    'jam' => $this->jam,
                    'metode' => $this->metode,
                    'status' => $this->status,
                ]);
            } else {
                CounselorHasSchedule::where('id', $this->id)->update([
                    'hari' => $this->hari,
                    'jam' => $this->jam,
                    'metode' => $this->metode,
                    'status' => $this->status,
                ]);
            }
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }

        $this->reset_form();
        alert()->success('Berhasil', 'Jadwal berhasil disimpan');
        return $this->redirect(route('counselor.kelengkapan.jadwal'));
    }

    #[On('delete-jadwal')]
    public function hapus($id)
    {
        CounselorHasSchedule::where('id', $id)->delete();
        alert()->success('Berhasil', 'Jadwal berhasil dihapus');
        return $this->redirect(route('counselor.kelengkapan.jadwal'));
    }

    public function reset_form()
    {
        $this->resetErrorBag();
        $this->resetValidation();
        $this->reset(['hari', 'jam', 'metode', 'status']);
        $this->mode = 'new';
        $this->id = NULL;

        $this->hide_modal();
    }

    public function hide_modal()
    {
        $this->dispatch('close-modal', modal: $this->modalID);
    }
}
