<?php

namespace App\Http\Controllers;

use App\Models\BiodataPelamar;
use App\Models\PendidikanPelamar;
use App\Models\RiwayatPekerjaanPelamar;
use App\Models\RiwayatPelatihanPelamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BiodataController extends Controller
{
    public function generateID($prefix, $tableName, $columnName, $aditionalWhere = null)
    {
        $prefixLength = strlen($prefix);

        $numberBefore = DB::table($tableName)
            ->selectRaw('SUBSTR(' . $columnName . ', ' . ($prefixLength + 1) . ') as code')
            ->orderByRaw('CAST(SUBSTR(' . $columnName . ', ' . ($prefixLength + 1) . ') AS SIGNED) desc')
            ->whereRaw('SUBSTR(' . $columnName . ',1, ' . ($prefixLength) . ') = \'' . $prefix . '\'');

        if ($aditionalWhere != null) {
            $numberBefore = $numberBefore->whereRaw($aditionalWhere);
        }

        $numberBefore = $numberBefore->first();

        if ($numberBefore == null) {
            return $prefix . '00001';
        }

        $currentNumber = (int)$numberBefore->code + 1;

        switch ($currentNumber) {
            case $currentNumber < 10:
                $currentCode = $prefix . '0000' . $currentNumber;
                break;
            case $currentNumber < 100:
                $currentCode = $prefix . '000' . $currentNumber;
                break;
            case $currentNumber < 1000:
                $currentCode = $prefix . '00' . $currentNumber;
                break;
            case $currentNumber < 10000:
                $currentCode = $prefix . '0' . $currentNumber;
                break;
            default:
                $currentCode = $prefix . $currentNumber;
                break;
        }

        return $currentCode;
    }

    public function list_biodata_admin_user()
    {
        return view('user.list_admin_user_biodata');
    }

    // Untuk User

    public function create_biodata_user()
    {
        return view('user.create_biodata');
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $id_biodata = $this->generateID('BP', 'biodata_pelamar', 'id_biodata');

            $biodata = new BiodataPelamar([
                'id_biodata' => $id_biodata,
                'id' => Auth()->user()->id,
                'posisi_yang_dilamar' => $request->get('posisi_yang_dilamar'),
                'nama' => $request->get('nama'),
                'no_ktp' => $request->get('no_ktp'),
                'ttl' => $request->get('ttl'),
                'jenis_kelamin' => $request->get('jenis_kelamin'),
                'agama' => $request->get('agama'),
                'golongan_darah' => $request->get('golongan_darah'),
                'status' => $request->get('status'),
                'alamat_ktp' => $request->get('alamat_ktp'),
                'alamat_tinggal' => $request->get('alamat_tinggal'),
                'email' => $request->get('email'),
                'no_telepon' => $request->get('no_telepon'),
                'orang_terdekat' => $request->get('orang_terdekat'),
                'skill' => $request->get('skill'),
                'penempatan_karyawan' => $request->get('penempatan_karyawan'),
                'penghasilan_yang_diharapkan' => $request->get('penghasilan_yang_diharapkan'),
            ]);

            $biodata->save();

            for ($i = 0; $i < count($request->jenjang_pendidikan); $i++) {
                $pendidikan = new PendidikanPelamar;
                $pendidikan->id_biodata = $id_biodata;
                $pendidikan->jenjang_pendidikan = $request->jenjang_pendidikan[$i];
                $pendidikan->nama_instusi_akademik = $request->nama_instusi_akademik[$i];
                $pendidikan->jurusan = $request->jurusan[$i];
                $pendidikan->tahun_lulus = $request->tahun_lulus[$i];
                $pendidikan->ipk = $request->ipk[$i];
                $pendidikan->save();
            }

            for ($i = 0; $i < count($request->nama_kursus); $i++) {
                $pelatihan = new RiwayatPelatihanPelamar;
                $pelatihan->id_biodata = $id_biodata;
                $pelatihan->nama_kursus = $request->nama_kursus[$i];
                $pelatihan->sertifikat = $request->sertifikat[$i];
                $pelatihan->tahun = $request->tahun[$i];
                $pelatihan->save();
            }

            for ($i = 0; $i < count($request->nama_perusahaan); $i++) {
                $pekerjaan = new RiwayatPekerjaanPelamar;
                $pekerjaan->id_biodata = $id_biodata;
                $pekerjaan->nama_perusahaan = $request->nama_perusahaan[$i];
                $pekerjaan->posisi_terakhir = $request->posisi_terakhir[$i];
                $pekerjaan->pendapatan_terakhir = $request->pendapatan_terakhir[$i];
                $pekerjaan->tahun = $request->tahun_pekerjaan[$i];
                $pekerjaan->save();
            }

            DB::commit();

            return redirect()->route('biodata')->with(['success' => 'Daftar pribadi pelamar berhasil disimpan']);
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->route('biodata')->with(['error' => $e->getMessage()]);
        }
    }

    public function dataBiodataUser()
    {
        $id_user = Auth::user()->id;

        $data = BiodataPelamar::where('id', $id_user)->orderBy('created_at', 'desc')->get();

        return datatables()->of($data)->make(true);
    }

    public function detailBiodataUser($id_biodata)
    {
        $biodata = BiodataPelamar::find($id_biodata);

        return view('user.detail_biodata', ['biodata' => $biodata]);
    }

    // Untuk Admin

    public function dataBiodataAdmin()
    {
        $dataBiodataAll = BiodataPelamar::orderBy('created_at', 'desc')->get();

        $data = $dataBiodataAll->map(function ($item) {
            $getBiodata = $item->id_biodata;

            $getPendidikanPelamar = PendidikanPelamar::where('id_biodata', $getBiodata)->orderBy('created_at', 'desc')->get();

            $item->allPendidikanPelamar = $getPendidikanPelamar;

            return $item;
        });

        return datatables()->of($data)->make(true);
    }

    public function getBiodataAdmin($id_biodata)
    {
        $biodata = BiodataPelamar::find($id_biodata);

        return view('admin.update_biodata', ['biodata' => $biodata]);
    }

    public function ubahBiodataAdmin(Request $request, $id_biodata)
    {
        $data = $request->except(
            '_method',
            '_token',
            'submit',
            'jenjang_pendidikan',
            'nama_instusi_akademik',
            'jurusan',
            'tahun_lulus',
            'ipk',
            'nama_kursus',
            'sertifikat',
            'tahun',
            'nama_perusahaan',
            'posisi_terakhir',
            'pendapatan_terakhir',
            'tahun_pekerjaan',
        );

        $rules = [
            'posisi_yang_dilamar' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'no_ktp' => 'required|string|max:255',
            'ttl' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string|in:laki-laki,perempuan',
            'agama' => 'required|string|max:255',
            'golongan_darah' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'alamat_ktp' => 'required|string',
            'alamat_tinggal' => 'required|string',
            'email' => 'required|email|max:255',
            'no_telepon' => 'required|string|max:255',
            'orang_terdekat' => 'required|string|max:255',
            'skill' => 'required',
            'penempatan_karyawan' => 'required',
            'penghasilan_yang_diharapkan' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->Back()->withInput()->withErrors($validator);
        }

        $biodata = BiodataPelamar::find($id_biodata);

        if ($biodata->update($data)) {

            try {
                DB::beginTransaction();

                // Proses Pendidikan Pelamar
                $jenjang_pendidikan_array = $request->jenjang_pendidikan;
                $nama_instusi_akademik_array = $request->nama_instusi_akademik;
                $jurusan_array = $request->jurusan;
                $tahun_lulus_array = $request->tahun_lulus;
                $ipk_array = $request->ipk;

                $pendidikan_db = PendidikanPelamar::where('id_biodata', $id_biodata)->orderByRaw('created_at', 'desc')->get();

                foreach ($pendidikan_db as $pi) {
                    if (isset($jenjang_pendidikan_array[$pi->id])) {
                        // Update
                        $pi->jenjang_pendidikan = $jenjang_pendidikan_array[$pi->id];
                        $pi->nama_instusi_akademik = $nama_instusi_akademik_array[$pi->id];
                        $pi->jurusan = $jurusan_array[$pi->id];
                        $pi->tahun_lulus = $tahun_lulus_array[$pi->id];
                        $pi->ipk = $ipk_array[$pi->id];
                        $pi->save();

                        unset($jenjang_pendidikan_array[$pi->id]);
                        unset($nama_instusi_akademik_array[$pi->id]);
                        unset($jurusan_array[$pi->id]);
                        unset($tahun_lulus_array[$pi->id]);
                        unset($ipk_array[$pi->id]);
                    } else {
                        // Delete
                        $pi->delete();
                    }
                }

                foreach ($jenjang_pendidikan_array as $key => $pi) {
                    $pendidikan = new PendidikanPelamar;
                    $pendidikan->id_biodata = $id_biodata;
                    $pendidikan->jenjang_pendidikan = $jenjang_pendidikan_array[$key];
                    $pendidikan->nama_instusi_akademik = $nama_instusi_akademik_array[$key];
                    $pendidikan->jurusan = $jurusan_array[$key];
                    $pendidikan->tahun_lulus = $tahun_lulus_array[$key];
                    $pendidikan->ipk = $ipk_array[$key];
                    $pendidikan->save();
                }

                // Proses Pelatihan Pelamar
                $nama_kursus_array = $request->nama_kursus;
                $sertifikat_array = $request->sertifikat;
                $tahun_array = $request->tahun;

                $pelatihan_db = RiwayatPelatihanPelamar::where('id_biodata', $id_biodata)->orderByRaw('created_at', 'desc')->get();

                foreach ($pelatihan_db as $pl) {
                    if (isset($nama_kursus_array[$pl->id])) {
                        // Update
                        $pl->nama_kursus = $nama_kursus_array[$pl->id];
                        $pl->sertifikat = $sertifikat_array[$pl->id];
                        $pl->tahun = $tahun_array[$pl->id];
                        $pl->save();

                        unset($nama_kursus_array[$pl->id]);
                        unset($sertifikat_array[$pl->id]);
                        unset($tahun_array[$pl->id]);
                    } else {
                        // Delete
                        $pl->delete();
                    }
                }

                foreach ($nama_kursus_array as $key => $pl) {
                    $pelatihan = new RiwayatPelatihanPelamar;
                    $pelatihan->id_biodata = $id_biodata;
                    $pelatihan->nama_kursus = $nama_kursus_array[$key];
                    $pelatihan->sertifikat = $sertifikat_array[$key];
                    $pelatihan->tahun = $tahun_array[$key];
                    $pelatihan->save();
                }

                // Proses Pekerjaan Pelamar
                $nama_perusahaan_array = $request->nama_perusahaan;
                $posisi_terakhir_array = $request->posisi_terakhir;
                $pendapatan_terakhir_array = $request->pendapatan_terakhir;
                $tahun_pekerjaan_array = $request->tahun_pekerjaan;

                $pekerjaan_db = RiwayatPekerjaanPelamar::where('id_biodata', $id_biodata)->orderByRaw('created_at', 'desc')->get();

                foreach ($pekerjaan_db as $pk) {
                    if (isset($nama_perusahaan_array[$pk->id])) {
                        // Update
                        $pk->nama_perusahaan = $nama_perusahaan_array[$pk->id];
                        $pk->posisi_terakhir = $posisi_terakhir_array[$pk->id];
                        $pk->pendapatan_terakhir = $pendapatan_terakhir_array[$pk->id];
                        $pk->tahun = $tahun_pekerjaan_array[$pk->id];
                        $pk->save();

                        unset($nama_perusahaan_array[$pk->id]);
                        unset($posisi_terakhir_array[$pk->id]);
                        unset($pendapatan_terakhir_array[$pk->id]);
                        unset($tahun_pekerjaan_array[$pk->id]);
                    } else {
                        // Delete
                        $pk->delete();
                    }
                }

                foreach ($nama_perusahaan_array as $key => $pk) {
                    $pekerjaan = new RiwayatPekerjaanPelamar;
                    $pekerjaan->id_biodata = $id_biodata;
                    $pekerjaan->nama_perusahaan = $nama_perusahaan_array[$key];
                    $pekerjaan->posisi_terakhir = $posisi_terakhir_array[$key];
                    $pekerjaan->pendapatan_terakhir = $pendapatan_terakhir_array[$key];
                    $pekerjaan->tahun = $tahun_pekerjaan_array[$key];
                    $pekerjaan->save();
                }

                DB::commit();
                return redirect()->route('biodata')->with(['success' => 'Daftar biodata pelamar berhasil diubah']);
            } catch (\Exception $e) {
                DB::rollBack();
                return redirect()->route('biodata')->with(['error' => $e->getMessage()]);
            }
        } else {
            return redirect()->route('biodata')->with(['error' => 'Daftar pribadi pelamar gagal diubah']);
        }

        return Back()->withInput();
    }

    public function prosesHapusBiodataPelamar(Request $request, $id_biodata)
    {
        if ($request->ajax()) {

            $biodata = BiodataPelamar::findOrFail($id_biodata);

            if ($biodata) {

                $biodata->delete();

                return response()->json(array('success' => true));
            }
        }
    }
}
