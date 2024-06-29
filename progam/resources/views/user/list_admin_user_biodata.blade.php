@extends('home')
@section('content')
    <div class="container-fluid">
        <!-- Title -->
		<div class="row heading-bg">
			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
			    <h5 class="txt-dark">Daftar Biodata Lamaran</h5>
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

        @if(Auth::user()->type == 'User')
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-default card-view">
                        <div class="panel-heading">
							<div class="pull-right">
                                <a href="{{ route('create_biodata') }}" class="btn btn-sm btn-primary">Daftar</a>
							</div>
							<div class="clearfix"></div>
						</div>
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body">
                                    <div class="table-responsive">
                                        <table id="table_biodata_user" class="table mb-0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">No</th>
                                                    <th class="text-center">Nama</th>
                                                    <th class="text-center">Posisi yang di lamar</th>
                                                    <th class="text-center">Tanggal di lamar</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                            </div>
                        </div>
                    </div>	
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-default card-view">
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body">
                                    <div class="table-responsive">
                                        <table id="table_biodata_admin" class="table mb-0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">No</th>
                                                    <th class="text-center">Nama</th>
                                                    <th class="text-center">Posisi yang di lamar</th>
                                                    <th class="text-center">Jenjang Pendidikan</th>
                                                    <th class="text-center">Tanggal di lamar</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                            </div>
                        </div>
                    </div>	
                </div>
            </div>
        @endif
    </div>

@endsection

@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
	<script>
        // Untuk User
        $(document).ready(function() {
            $('#table_biodata_user').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                searching: true,
                ajax: "{{ route('data.biodata_user') }}",
                columns: [
                    {data: 'id_biodata', name: 'id_biodata', render: function (data, type, row, meta) {
                        return `<p class="text-center" style="color: white">${meta.row + meta.settings._iDisplayStart + 1}</p>`
                    }},
                    {data: 'nama', name: 'nama', render: function (data, type, row) {
                        return `<p class="text-center" style="color: white">${row.nama}</p>`
                    }},
                    {data: 'posisi_yang_dilamar', name: 'posisi_yang_dilamar', render: function (data, type, row) {
                        return `<p class="text-center" style="color: white">${row.posisi_yang_dilamar}</p>`
                    }},
                    {data: 'created_at', name: 'created_at', render: function (data, type, row) {
                        return `<p class="text-center" style="color: white">${moment(row.created_at).format('DD MMMM YYYY')}</p>`;
                    }},
                    {data: null, name: 'action', orderable: false, searchable: false, render: function (data, type, row) {
                        let detailUrl = `{{ route('data.detail_biodata_user', ['id_biodata' => ':id_biodata']) }}`.replace(':id_biodata', row.id_biodata);
                        return `
                            <div class="text-center">
                                <a href="${detailUrl}" class="btn btn-primary btn-sm" title="Detail Biodata Pelamar">
                                    <i class="zmdi zmdi-eye"></i>
                                </a>
                            </div>
                        `;
                    }}
                ],
                createdRow: function (row, data, dataIndex) {
                    $(row).addClass('iteration-row');
                }
            });
        });

        // Untuk Admin
        $(document).ready(function() {
            $('#table_biodata_admin').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                searching: true,
                ajax: "{{ route('data.biodata_admin') }}",
                columns: [
                    {data: 'id_biodata', name: 'id_biodata', render: function (data, type, row, meta) {
                        return `<p class="text-center" style="color: white">${meta.row + meta.settings._iDisplayStart + 1}</p>`
                    }},
                    {data: 'nama', name: 'nama', render: function (data, type, row) {
                        return `<p class="text-center" style="color: white">${row.nama}</p>`
                    }},
                    {data: 'posisi_yang_dilamar', name: 'posisi_yang_dilamar', render: function (data, type, row) {
                        return `<p class="text-center" style="color: white">${row.posisi_yang_dilamar}</p>`
                    }},
                    { 
                    data: 'allPendidikanPelamar', name: 'allPendidikanPelamar', orderable: false, render: function (data, type, row) {

                        var allPendidikanPelamar = row.allPendidikanPelamar.map(function (object) {
                            return `
                                <li style="white-space: normal; text-align: center; color: white;">${object.jenjang_pendidikan}</li>
                                `;
                            })

                            return `<ol>${allPendidikanPelamar.join('')}</ol>`;
                        }
                    },
                    {data: 'created_at', name: 'created_at', render: function (data, type, row) {
                        return `<p class="text-center" style="color: white">${moment(row.created_at).format('DD MMMM YYYY')}</p>`;
                    }},
                    {data: null, name: 'action', orderable: false, searchable: false, render: function (data, type, row) {
                        let editUrl = `{{ route('data.edit_biodata_admin', ['id_biodata' => ':id_biodata']) }}`.replace(':id_biodata', row.id_biodata);
                        return `
                            <div class="text-center">
                                <a href="${editUrl}" class="btn btn-warning btn-sm" title="Ubah Biodata Pelamar" style="margin-right: 15px;">
                                    <i class="zmdi zmdi-edit" style="color: black;"></i>
                                </a>
                                <a href="#" class="btn btn-sm btn-danger" onclick="deleteBiodata(this)" title="Hapus Biodata Pelamar" data-id="${row.id_biodata}"><i class="zmdi zmdi-delete"></i></a>
                            </div>
                        `;
                    }}
                ],
                createdRow: function (row, data, dataIndex) {
                    $(row).addClass('iteration-row');
                }
            });
        });

        // Proses menghapus data pemesanan produk
        function deleteBiodata(e){

            let id_biodata = e.getAttribute('data-id');

            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            });

            swalWithBootstrapButtons.fire({
                title: 'Apakah anda yakin?',
                text: "Ingin menghapus data biodata pelamar ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Hapus',
                cancelButtonText: 'Tidak, Batalkan',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    if (result.isConfirmed){

                        $.ajax({
                            type:'DELETE',
                            url:'{{url("/biodata/prosesHapusBiodataPelamar")}}/' +id_biodata,
                            data:{
                                "_token": "{{ csrf_token() }}",
                            },
                            success:function(data) {
                                if (data.success){
                                    swalWithBootstrapButtons.fire(
                                        'Dihapus!',
                                        'Data Biodata Pelamar berhasil dihapus.',
                                        "success"
                                    );
                                    $("#"+id_biodata+"").remove();
                                    $('#table_biodata_admin').DataTable().ajax.reload();
                                }

                            }
                        });

                    }

                } else if (
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Dibatalkan!',
                        'Proses menghapus data biodata pelamar dibatalkan',
                        'error'
                    );
                }
            });

            $(".swal2-confirm, .swal2-cancel").css("margin", "10px 10px");
        }

	</script>
@endpush