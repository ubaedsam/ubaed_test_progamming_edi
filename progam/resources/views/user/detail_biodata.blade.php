@extends('home')
@section('content')
    <div class="container-fluid">
        <!-- Title -->
		<div class="row heading-bg">
			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
			    <h5 class="txt-dark">Detail Biodata Lamaran</h5>
			</div>
			<!-- Breadcrumb -->
			<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
				<ol class="breadcrumb">
				    <li><a href="/">Home</a></li>
					<li class="active"><span>Biodata Lamaran</span></li>
				</ol>
			</div>
			<!-- /Breadcrumb -->
		</div>
		<!-- /Title -->

        <div class="row">
			<div class="col-md-12">
				<div class="panel panel-default card-view">
					<div class="panel-heading">
                        <h6 class="panel-title text-center txt-dark">DAFTAR PRIBADI PELAMAR</h6>
						<div class="clearfix"></div>
					</div>
					<div class="panel-wrapper collapse in">
						<div class="panel-body">
							<div class="row">
								<div class="col-sm-12 col-xs-12">
									<div class="form-wrap">
                                        {{-- <form action="{{route('data.proses_edit_biodata_admin',[$biodata->id_biodata])}}" method="POST">
                                            {{csrf_field()}} --}}
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label mb-10" for="posisi_yang_dilamar">POSISI YANG DILAMAR</label>
                                                        <input type="text" class="form-control filled-input" id="posisi_yang_dilamar" name="posisi_yang_dilamar" value="{{ $biodata->posisi_yang_dilamar }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label mb-10" for="nama">NAMA</label>
                                                        <input type="text" class="form-control filled-input" id="nama" name="nama" value="{{ $biodata->nama }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label mb-10" for="no_ktp">NO. KTP</label>
                                                        <input type="text" class="form-control filled-input" id="no_ktp" name="no_ktp" value="{{ $biodata->no_ktp }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label mb-10" for="ttl">TEMPAT, TANGGAL LAHIR</label>
                                                        <input type="text" class="form-control filled-input" id="ttl" name="ttl" value="{{ $biodata->ttl }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label mb-10" for="jenis_kelamin">JENIS KELAMIN</label>
                                                        <select class="form-control filled-input" id="jenis_kelamin" name="jenis_kelamin" readonly>
                                                            <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                                            <option value="laki-laki" {{ $biodata->jenis_kelamin == 'laki-laki' ? 'selected' : '' }}>Laki - Laki</option>
                                                            <option value="perempuan" {{ $biodata->jenis_kelamin == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label mb-10" for="agama">AGAMA</label>
                                                        <input type="text" class="form-control filled-input" id="agama" name="agama" value="{{ $biodata->agama }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label mb-10" for="golongan_darah">GOLONGAN DARAH</label>
                                                        <input type="text" class="form-control filled-input" id="golongan_darah" name="golongan_darah" value="{{ $biodata->golongan_darah }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label mb-10" for="status">STATUS</label>
                                                        <input type="text" class="form-control filled-input" id="status" name="status" value="{{ $biodata->status }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label mb-10" for="alamat_ktp">ALAMAT KTP</label>
                                                        <textarea class="form-control filled-input" rows="4" id="alamat_ktp" name="alamat_ktp" readonly>{{ $biodata->alamat_ktp }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label mb-10" for="alamat_tinggal">ALAMAT TINGGAL</label>
                                                        <textarea class="form-control filled-input" rows="4" id="alamat_tinggal" name="alamat_tinggal" readonly>{{ $biodata->alamat_tinggal }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label mb-10" for="email">EMAIL</label>
                                                        <input type="email" class="form-control filled-input" id="email" name="email" value="{{ $biodata->email }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label mb-10" for="no_telepon">NO. TELP</label>
                                                        <input type="text" class="form-control filled-input" id="no_telepon" name="no_telepon" value="{{ $biodata->no_telepon }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label mb-10" for="orang_terdekat">ORANG TERDEKAT YANG DAPAT DIHUBUNGI</label>
                                                        <input type="text" class="form-control filled-input" id="orang_terdekat" name="orang_terdekat" value="{{ $biodata->orang_terdekat }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label mb-10 mt-20">PENDIDIKAN TERAKHIR</label>
                                                        <div class="table-responsive">
                                                            <table id="table_pendidikan_user" class="table mb-0" width="100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="text-center">Jenjang Pendidikan Terakhir</th>
                                                                        <th class="text-center">Nama Instusi Akademik</th>
                                                                        <th class="text-center">Jurusan</th>
                                                                        <th class="text-center">Tahun Lulus</th>
                                                                        <th class="text-center">IPK</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($biodata->pendidikan as $item)
                                                                        <tr>
                                                                            <td>
                                                                                <input type="text" class="form-control filled-input" id="jenjang_pendidikan-{{ $item->id }}" name="jenjang_pendidikan[{{ $item->id }}]" value="{{ $item->jenjang_pendidikan }}" readonly>
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" class="form-control filled-input" id="nama_instusi_akademik-{{ $item->id }}" name="nama_instusi_akademik[{{ $item->id }}]" value="{{ $item->nama_instusi_akademik }}" readonly>
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" class="form-control filled-input" id="jurusan-{{ $item->id }}" name="jurusan[{{ $item->id }}]" value="{{ $item->jurusan }}" readonly>
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" class="form-control filled-input" id="tahun_lulus-{{ $item->id }}" name="tahun_lulus[{{ $item->id }}]" value="{{ $item->tahun_lulus }}" readonly>
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" class="form-control filled-input" id="ipk-{{ $item->id }}" name="ipk[{{ $item->id }}]" value="{{ $item->ipk }}" readonly>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label mb-10 mt-20">RIWAYAT PELATIHAN</label>
                                                        <div class="table-responsive">
                                                            <table id="table_pelatihan_user" class="table mb-0" width="100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="text-center">Nama Kursus/Seminar</th>
                                                                        <th class="text-center">Sertifikat (Ada/Tidak)</th>
                                                                        <th class="text-center">Tahun</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($biodata->pelatihan as $item2)
                                                                        <tr>
                                                                            <td>
                                                                                <input type="text" class="form-control filled-input" id="nama_kursus-{{ $item2->id }}" name="nama_kursus[{{ $item2->id }}]" value="{{ $item2->nama_kursus }}" readonly>
                                                                            </td>
                                                                            <td>
                                                                                <select class="form-control filled-input" id="sertifikat-{{ $item2->id }}" name="sertifikat[{{ $item2->id }}]" readonly>
                                                                                    <option value="">Pilih Ketersediaan</option>
                                                                                    <option value="ada" {{ $item2->sertifikat == 'ada' ? 'selected' : '' }}>ADA</option>
                                                                                    <option value="tidak" {{ $item2->sertifikat == 'tidak' ? 'selected' : '' }}>TIDAK</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" class="form-control filled-input" id="tahun-{{ $item2->id }}" name="tahun[{{ $item2->id }}]" value="{{ $item2->tahun }}" readonly>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label mb-10 mt-20">RIWAYAT PEKERJAAN</label>
                                                        <div class="table-responsive">
                                                            <table id="table_pekerjaan_user" class="table mb-0" width="100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="text-center">Nama Perusahaan</th>
                                                                        <th class="text-center">Posisi Terakhir</th>
                                                                        <th class="text-center">Pendapatan Terakhir</th>
                                                                        <th class="text-center">Tahun</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($biodata->pekerjaan as $item3)
                                                                        <tr>
                                                                            <td>
                                                                                <input type="text" class="form-control filled-input" id="nama_perusahaan-{{ $item3->id }}" name="nama_perusahaan[{{ $item3->id }}]" value="{{ $item3->nama_perusahaan }}" readonly>
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" class="form-control filled-input" id="posisi_terakhir-{{ $item3->id }}" name="posisi_terakhir[{{ $item3->id }}]" value="{{ $item3->nama_perusahaan }}" readonly>
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" class="form-control filled-input" id="pendapatan_terakhir-{{ $item3->id }}" name="pendapatan_terakhir[{{ $item3->id }}]" value="{{ $item3->nama_perusahaan }}" readonly>
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" class="form-control filled-input" id="tahun_pekerjaan-{{ $item3->id }}" name="tahun_pekerjaan[{{ $item3->id }}]" value="{{ $item3->tahun }}" readonly>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label mb-10" for="skill">SKILL</label>
                                                        <input type="text" class="form-control filled-input" id="skill" name="skill" value="{{ $biodata->skill }}" readonly>
                                                        <small>Tuliskan keahlian & keterampilan yang saat ini anda miliki</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label mb-10" for="penempatan_karyawan">BERSEDIA DITEMPATKAN DI SELURUH KANTOR PERUSAHAAN</label>
                                                        <select class="form-control filled-input" id="penempatan_karyawan" name="penempatan_karyawan" readonly>
                                                            <option value="">Pilih Ketersediaan Penempatan</option>
                                                            <option value="ya" {{ $biodata->penempatan_karyawan == 'ya' ? 'selected' : '' }}>Ya</option>
                                                            <option value="tidak" {{ $biodata->penempatan_karyawan == 'tidak' ? 'selected' : '' }}>Tidak</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label mb-10" for="penghasilan_yang_diharapkan">PENGHASILAN YANG DIHARAPKAN - Per Bulan</label>
                                                        <input type="text" class="form-control filled-input" id="penghasilan_yang_diharapkan" name="penghasilan_yang_diharapkan" value="{{ $biodata->penghasilan_yang_diharapkan }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="d-flex justify-content-between" style="margin-top: 50px;">
                                                <a href="{{ route('biodata') }}" class="btn btn-sm btn-primary">Kembali</a>
                                            </div>
										{{-- </form> --}}
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
    </div>

@endsection