<?php

namespace App\Livewire\User;

use App\Models\CounselingRequests;
use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Component;

class PengajuanKonseling extends Component
{
    public $modalID = 'pengajuan-konseling';
    public $id;
    public $user_id;
    public $counselor_id;
    public $category;
    public $description;
    public $date;
    public $time;

    public $status = 'pending';

    public $mode = 'new';

    public $spesialisasi = NULL;
    public $jadwal = NULL;

    public function render()
    {
        $konselor = User::role(['counselor'])->active(1)->orderBy('name', 'ASC')->get();
        if ($this->counselor_id) {
            $this->getSpesialisasi($this->counselor_id);
        }
        return view('livewire.user.pengajuan-konseling', ['counselors' => $konselor]);
    }

    public function getSpesialisasi($id)
    {
        $konselor = User::with([
            'spesialisasi' => function (Builder $query) {
                $query->orderBy('name', 'ASC');
            },
            'jadwal' => function (Builder $query) {
                $query->orderBy(DB::raw('FIELD(hari, "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu", "Minggu")', 'ASC'))
                    ->orderBy('created_at', 'ASC');
            }
        ])->where('id', $id)->first();

        $spesialisasi = '';
        foreach ($konselor->spesialisasi as $sp) {
            $spesialisasi .= '<span class="badge badge-warning mr-1">' . $sp->name . '</span>';
        }
        $this->spesialisasi = $spesialisasi;

        $jadwal = '';
        foreach ($konselor->jadwal as $index => $jd) {
            $jadwal .= ($index + 1) . '. ' . $jd->hari . ': ' . $jd->jam . ' (' . ucwords($jd->metode) . ')' . '<br>';
        }
        $this->jadwal = $jadwal;
    }

    #[On('show-modal-pengajuan')]
    public function add()
    {
        $this->resetErrorBag();
        $this->resetValidation();

        $this->mode = 'new';
        $this->id = NULL;
        $this->user_id = NULL;
        $this->counselor_id = NULL;
        $this->category = NULL;
        $this->description = NULL;
        $this->date = NULL;
        $this->time = NULL;

        $this->dispatch('open-modal', modal: $this->modalID);
    }

    public function save()
    {
        $this->validate([
            'counselor_id' => 'required',
            'category' => 'required',
            'date' => 'required',
            'time' => 'required',
            'description' => 'required',
        ]);

        if ($this->mode == 'new') {
            CounselingRequests::create([
                'user_id' => auth()->user()->id,
                'counselor_id' => $this->counselor_id,
                'category' => $this->category,
                'description' => $this->description,
                'date' => $this->date,
                'time' => $this->time,
                'status' => $this->status
            ]);
            alert()->success('Success', 'Pengajuan berhasil dikirim');
        }

        if ($this->mode == 'edit') {
            CounselingRequests::where('id', $this->id)->update([
                'counselor_id' => $this->counselor_id,
                'category' => $this->category,
                'description' => $this->description,
                'date' => $this->date,
                'time' => $this->time,
                'status' => $this->status
            ]);
            alert()->success('Success', 'Pengajuan berhasil diubah');
        }

        $this->reset_form();
        return $this->redirect(route('user.jadwal_konseling.index'));
    }

    public function reset_form()
    {
        $this->resetErrorBag();
        $this->resetValidation();

        $this->mode = 'new';
        $this->id = NULL;
        $this->user_id = NULL;
        $this->counselor_id = NULL;
        $this->category = NULL;
        $this->description = NULL;
        $this->date = NULL;
        $this->time = NULL;

        $this->hide_modal();
    }

    public function hide_modal()
    {
        $this->dispatch('close-modal', modal: $this->modalID);
    }
}
