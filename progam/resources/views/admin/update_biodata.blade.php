@extends('home')
@section('content')
    <div class="container-fluid">
        <!-- Title -->
		<div class="row heading-bg">
			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
			    <h5 class="txt-dark">Ubah Biodata Lamaran</h5>
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
                                        <form action="{{route('data.proses_edit_biodata_admin',[$biodata->id_biodata])}}" method="POST">
                                            {{csrf_field()}}
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label mb-10" for="posisi_yang_dilamar">POSISI YANG DILAMAR</label>
                                                        <input type="text" class="form-control" id="posisi_yang_dilamar" name="posisi_yang_dilamar" value="{{ $biodata->posisi_yang_dilamar }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label mb-10" for="nama">NAMA</label>
                                                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $biodata->nama }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label mb-10" for="no_ktp">NO. KTP</label>
                                                        <input type="text" class="form-control" id="no_ktp" name="no_ktp" value="{{ $biodata->no_ktp }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label mb-10" for="ttl">TEMPAT, TANGGAL LAHIR</label>
                                                        <input type="text" class="form-control" id="ttl" name="ttl" value="{{ $biodata->ttl }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label mb-10" for="jenis_kelamin">JENIS KELAMIN</label>
                                                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
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
                                                        <input type="text" class="form-control" id="agama" name="agama" value="{{ $biodata->agama }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label mb-10" for="golongan_darah">GOLONGAN DARAH</label>
                                                        <input type="text" class="form-control" id="golongan_darah" name="golongan_darah" value="{{ $biodata->golongan_darah }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label mb-10" for="status">STATUS</label>
                                                        <input type="text" class="form-control" id="status" name="status" value="{{ $biodata->status }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label mb-10" for="alamat_ktp">ALAMAT KTP</label>
                                                        <textarea class="form-control" rows="4" id="alamat_ktp" name="alamat_ktp">{{ $biodata->alamat_ktp }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label mb-10" for="alamat_tinggal">ALAMAT TINGGAL</label>
                                                        <textarea class="form-control" rows="4" id="alamat_tinggal" name="alamat_tinggal">{{ $biodata->alamat_tinggal }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label mb-10" for="email">EMAIL</label>
                                                        <input type="email" class="form-control" id="email" name="email" value="{{ $biodata->email }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label mb-10" for="no_telepon">NO. TELP</label>
                                                        <input type="text" class="form-control" id="no_telepon" name="no_telepon" value="{{ $biodata->no_telepon }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label mb-10" for="orang_terdekat">ORANG TERDEKAT YANG DAPAT DIHUBUNGI</label>
                                                        <input type="text" class="form-control" id="orang_terdekat" name="orang_terdekat" value="{{ $biodata->orang_terdekat }}">
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
                                                                        <th class="text-center">Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($biodata->pendidikan as $item)
                                                                        <tr>
                                                                            <td>
                                                                                <input type="text" class="form-control" id="jenjang_pendidikan-{{ $item->id }}" name="jenjang_pendidikan[{{ $item->id }}]" value="{{ $item->jenjang_pendidikan }}">
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" class="form-control" id="nama_instusi_akademik-{{ $item->id }}" name="nama_instusi_akademik[{{ $item->id }}]" value="{{ $item->nama_instusi_akademik }}">
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" class="form-control" id="jurusan-{{ $item->id }}" name="jurusan[{{ $item->id }}]" value="{{ $item->jurusan }}">
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" class="form-control" id="tahun_lulus-{{ $item->id }}" name="tahun_lulus[{{ $item->id }}]" value="{{ $item->tahun_lulus }}">
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" class="form-control" id="ipk-{{ $item->id }}" name="ipk[{{ $item->id }}]" value="{{ $item->ipk }}">
                                                                            </td>
                                                                            <td>
                                                                                @if ($loop->iteration == 1)
                                                                                    <button type="button" name="add_pendidikan" id="add_pendidikan" class="btn btn-sm btn-success mt-4"><i class="zmdi zmdi-plus"></i></button>
                                                                                @else
                                                                                    <button type="button" data-id_pendidikan="{{ $item->id }}" class="btn btn-sm btn-danger remove-table-row-pendidikan mt-5"><i class="zmdi zmdi-delete"></i></button>
                                                                                @endif
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
                                                                        <th class="text-center">Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($biodata->pelatihan as $item2)
                                                                        <tr>
                                                                            <td>
                                                                                <input type="text" class="form-control" id="nama_kursus-{{ $item2->id }}" name="nama_kursus[{{ $item2->id }}]" value="{{ $item2->nama_kursus }}">
                                                                            </td>
                                                                            <td>
                                                                                <select class="form-control" id="sertifikat-{{ $item2->id }}" name="sertifikat[{{ $item2->id }}]">
                                                                                    <option value="">Pilih Ketersediaan</option>
                                                                                    <option value="ada" {{ $item2->sertifikat == 'ada' ? 'selected' : '' }}>ADA</option>
                                                                                    <option value="tidak" {{ $item2->sertifikat == 'tidak' ? 'selected' : '' }}>TIDAK</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" class="form-control" id="tahun-{{ $item2->id }}" name="tahun[{{ $item2->id }}]" value="{{ $item2->tahun }}">
                                                                            </td>
                                                                            <td class="text-center">
                                                                                @if ($loop->iteration == 1)
                                                                                    <button type="button" name="add_pelatihan" id="add_pelatihan" class="btn btn-sm btn-success mt-4"><i class="zmdi zmdi-plus"></i></button>
                                                                                @else
                                                                                    <button type="button" data-id_pelatihan="{{ $item2->id }}" class="btn btn-sm btn-danger remove-table-row-pelatihan mt-5"><i class="zmdi zmdi-delete"></i></button>
                                                                                @endif
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
                                                                        <th class="text-center">Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($biodata->pekerjaan as $item3)
                                                                        <tr>
                                                                            <td>
                                                                                <input type="text" class="form-control" id="nama_perusahaan-{{ $item3->id }}" name="nama_perusahaan[{{ $item3->id }}]" value="{{ $item3->nama_perusahaan }}">
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" class="form-control" id="posisi_terakhir-{{ $item3->id }}" name="posisi_terakhir[{{ $item3->id }}]" value="{{ $item3->nama_perusahaan }}">
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" class="form-control" id="pendapatan_terakhir-{{ $item3->id }}" name="pendapatan_terakhir[{{ $item3->id }}]" value="{{ $item3->nama_perusahaan }}">
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" class="form-control" id="tahun_pekerjaan-{{ $item3->id }}" name="tahun_pekerjaan[{{ $item3->id }}]" value="{{ $item3->tahun }}">
                                                                            </td>
                                                                            <td class="text-center">
                                                                                @if ($loop->iteration == 1)
                                                                                    <button type="button" name="add_pekerjaan" id="add_pekerjaan" class="btn btn-sm btn-success mt-4"><i class="zmdi zmdi-plus"></i></button>
                                                                                @else
                                                                                    <button type="button" data-id_pekerjaan="{{ $item3->id }}}" class="btn btn-sm btn-danger remove-table-row-pekerjaan mt-5"><i class="zmdi zmdi-delete"></i></button>
                                                                                @endif
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
                                                        <input type="text" class="form-control" id="skill" name="skill" value="{{ $biodata->skill }}">
                                                        <small>Tuliskan keahlian & keterampilan yang saat ini anda miliki</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label mb-10" for="penempatan_karyawan">BERSEDIA DITEMPATKAN DI SELURUH KANTOR PERUSAHAAN</label>
                                                        <select class="form-control" id="penempatan_karyawan" name="penempatan_karyawan">
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
                                                        <input type="text" class="form-control" id="penghasilan_yang_diharapkan" name="penghasilan_yang_diharapkan" value="{{ $biodata->penghasilan_yang_diharapkan }}">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="d-flex justify-content-between" style="margin-top: 50px;">
                                                <a href="{{ route('biodata') }}" class="btn btn-sm btn-primary">Kembali</a>
                                                <button type="submit" class="btn btn-sm btn-success mr-10">Simpan</button>
                                            </div>
										</form>
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

@push('scripts')
    <script>
    var a = Math.floor(Math.random() * 1000);
    var b = Math.floor(Math.random() * 2000);
    var c = Math.floor(Math.random() * 3000);

    // Untuk pendidikan terakhir
    $('#add_pendidikan').click(function(){
        ++a;
        $('#table_pendidikan_user').append(
            `<tr>
                <td>
                    <input type="text" class="form-control" id="jenjang_pendidikan-${a}" name="jenjang_pendidikan[]">
                </td>
                <td>
                    <input type="text" class="form-control" id="nama_instusi_akademik-${a}" name="nama_instusi_akademik[]">
                </td>
                <td>
                    <input type="text" class="form-control" id="jurusan-${a}" name="jurusan[]">
                </td>
                <td>
                    <input type="text" class="form-control" id="tahun_lulus-${a}" name="tahun_lulus[]">
                </td>
                <td>
                    <input type="text" class="form-control" id="ipk-${a}" name="ipk[]">
                </td>
                <td>
                    <button type="button" data-id_pendidikan="${a}" class="btn btn-sm btn-danger remove-table-row-pendidikan mt-5"><i class="zmdi zmdi-delete"></i></button>
                </td>
            </tr>`);
    });

    $(document).on('click','.remove-table-row-pendidikan', function(){

        var id_pendidikan = $(this).data('id_pendidikan')

        $(this).parents('tr').remove();
    })

    // Untuk pelatihan
    $('#add_pelatihan').click(function(){
        ++b;
        $('#table_pelatihan_user').append(
            `<tr>
                <td>
                    <input type="text" class="form-control" id="nama_kursus-${b}" name="nama_kursus[]">
                </td>
                <td>
                    <select class="form-control" id="sertifikat-${b}" name="sertifikat[]">
                        <option>Pilih Ketersediaan</option>
                        <option value="ada">ADA</option>
                        <option value="tidak">TIDAK</option>
                    </select>
                </td>
                <td>
                    <input type="text" class="form-control" id="tahun-${b}" name="tahun[]">
                </td>
                <td class="text-center">
                    <button type="button" data-id_pelatihan="${b}" class="btn btn-sm btn-danger remove-table-row-pelatihan mt-5"><i class="zmdi zmdi-delete"></i></button>
                </td>
            </tr>`);
    });

    $(document).on('click','.remove-table-row-pelatihan', function(){

        var id_pelatihan = $(this).data('id_pelatihan')

        $(this).parents('tr').remove();
    })

    // Untuk pekerjaan
    $('#add_pekerjaan').click(function(){
        ++c;
        $('#table_pekerjaan_user').append(
            `<tr>
                <td>
                    <input type="text" class="form-control" id="nama_perusahaan-${c}" name="nama_perusahaan[]">
                </td>
                <td>
                    <input type="text" class="form-control" id="posisi_terakhir-${c}" name="posisi_terakhir[]">
                </td>
                <td>
                    <input type="text" class="form-control" id="pendapatan_terakhir-${c}" name="pendapatan_terakhir[]">
                </td>
                <td>
                    <input type="text" class="form-control" id="tahun_pekerjaan-${c}" name="tahun_pekerjaan[]">
                </td>
                <td class="text-center">
                    <button type="button" data-id_pekerjaan="${c}" class="btn btn-sm btn-danger remove-table-row-pekerjaan mt-5"><i class="zmdi zmdi-delete"></i></button>
                </td>
            </tr>`);
    });

    $(document).on('click','.remove-table-row-pekerjaan', function(){

        var id_pekerjaan = $(this).data('id_pekerjaan')

        $(this).parents('tr').remove();
    })
    
    </script>
@endpush