<?php

namespace App\Exports;

use App\Models\Peminjaman;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PeminjamanExport implements FromCollection, WithHeadings, WithStyles
{
    protected $startDate;
    protected $endDate;
    protected $namaAnggota;
    protected $judulBuku;

    public function __construct($startDate = null, $endDate = null,  $namaAnggota = null,  $judulBuku = null)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->namaAnggota = $namaAnggota;
        $this->judulBuku = $judulBuku;
    }

    public function collection()
    {
        return Peminjaman::with(['anggota', 'buku']) 
            ->when($this->startDate, function ($query) {
                $query->whereDate('tanggal_peminjaman', '>=', Carbon::parse($this->startDate));
            })
            ->when($this->endDate, function ($query) {
                $query->whereDate('tanggal_peminjaman', '<=', Carbon::parse($this->endDate));
            })
            ->when($this->namaAnggota, function ($query) {
                $query->where('anggota_id', $this->namaAnggota);
            })
            ->when($this->judulBuku, function ($query) {
                $query->where('buku_id', $this->judulBuku);
            })
            ->get()
            ->map(function ($peminjaman) {
                return [
                    'ID' => $peminjaman->id,
                    'Nama Peminjam' => $peminjaman->anggota->name ?? '-',
                    'Judul Buku' => $peminjaman->buku->judul_buku ?? '-',
                    'Tanggal Pinjam' => Carbon::parse($peminjaman->tanggal_peminjaman)->format('Y-m-d'),
                    'Tanggal Harus Kembali' => Carbon::parse($peminjaman->tanggal_harus_kembali)->format('Y-m-d'),
                    'Tanggal Kembali' => $peminjaman->tanggal_pengembalian 
                        ? Carbon::parse($peminjaman->tanggal_pengembalian)->format('Y-m-d') 
                        : '-',
                    'Denda' => $peminjaman->denda ?? 0,
                    'Status' => $peminjaman->status,
                ];
            });
    }

    public function headings(): array
    {
        return ["ID", "Nama Anggota", "Judul Buku", "Tanggal Peminjaman", "Tanggal Harus Kembali", "Tanggal Pengembalian", "Denda", "Status"];
    }

    public function styles(Worksheet $sheet)
    {
        foreach (range('A', 'H') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        return [
            1 => ['font' => ['bold' => true]],
        ];
    }

}
