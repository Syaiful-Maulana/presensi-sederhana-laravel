<?php

namespace App\Http\Controllers;
use DateTimeZone;
use App\Models\Presensi;
use DateTime;
use Illuminate\Http\Request;

class PresensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Presensi.masuk');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $timezone ='Asia/Jakarta';
        $date = new DateTime('now', new DateTimeZone($timezone));
        $tanggal = $date->format('Y-m-d');
        $localtime = $date->format('H:i:s');

        $presensi = Presensi::where([
            ['user_id' ,'=', auth()->user()->id],
            ['tgl', '=', $tanggal ],
        ])->first();
        if($presensi){
            // dd("Sudah ada");
            return redirect('presensi')->with('error', 'Anda Sudah Melakukan Absensi');
        }else{
            Presensi::create([
                'user_id' => auth()->user()->id,
                'tgl' => $tanggal,
                'jammasuk' => $localtime,
            ]);
        }
        return redirect('presensi')->with('success', 'Selamat Menjalankan Aktivitas');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /** Method Untuk Presensi Keluar */
    public function keluar()
    {
        return view('Presensi.keluar');
    }
    public function prosesKeluar(Request $request)
    {
        $timezone ='Asia/Jakarta';
        $date = new DateTime('now', new DateTimeZone($timezone));
        $tanggal = $date->format('Y-m-d');
        $localtime = $date->format('H:i:s');

        $presensi = Presensi::where([
            ['user_id' ,'=', auth()->user()->id],
            ['tgl', '=', $tanggal ],
        ])->first();
        $dt = [
            'jamkeluar' => $localtime,   
            'jamkerja' => date('H:i:s', strtotime($localtime) - strtotime($presensi->jammasuk))
        ];

        if($presensi->jamkeluar == ""){
            $presensi->update($dt);
            return redirect('keluar')->with('success', 'Selamat Pulang, Hati - Hati di Jalan');;
        }else{
            return redirect('keluar')->with('error', 'Jam Kerja Anda Berakhir, Kembali Lagi Besok');
            
        }
    }

    /** Method Rekap Data */
    public function filterData()
    {
        return view('Laporan.halamanRekap');
    }
    public function tampil($tglawal, $tglakhir){
        $presensi = Presensi::with('user')->whereBetween('tgl', [$tglawal, $tglakhir])->orderBy('tgl', 'asc')->get();
            return view('Laporan.rekap', compact('presensi'));
    }
}
