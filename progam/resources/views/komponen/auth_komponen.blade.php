    {{-- Box Modal Login --}}
    <div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="modalLoginLabel1">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h5 class="modal-title" id="modalLoginLabel1">Login</h5>
				</div>
                <form id="loginBiodata" action="{{ route('login.custom') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="merek" class="control-label mb-10">Email :</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Masukan alamat email">
                        </div>
                        <div class="form-group">
                            <label for="model" class="control-label mb-10">Password :</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Masukan password">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="d-flex justify-content-between mt-4">
                            <button type="button" class="btn btn-default" style="color: black;" data-dismiss="modal">Tutup</button>
                            <button type="button" id="SwipeRegisterBiodata" class="btn btn-info">Sign Up</button>
                            <button type="submit" id="login-biodata" class="btn btn-primary">Sign In</button>
                        </div>
                    </div>
                </form>
			</div>
		</div>
	</div>

	{{-- Box Modal Register --}}
	<div class="modal fade" id="modalRegister" tabindex="-1" role="dialog" aria-labelledby="modalRegisterLabel1">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h5 class="modal-title" id="modalRegisterLabel1">Register</h5>
				</div>
                <form id="registerBiodata" action="{{ route('register.custom') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="panel panel-default card-view" id="costumer">
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
                                    <div class="form-group">
                                        <label for="model" class="control-label mb-10">Email :</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Masukan alamat email">
                                    </div>
                                    <div class="form-group">
                                        <label for="model" class="control-label mb-10">Password :</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukan password">
                                    </div>
								</div>
							</div>
						</div>
                    </div>
                    <div class="modal-footer">
                        <div class="d-flex justify-content-between mt-4">
                            <button type="button" class="btn btn-default" style="color: black;" data-dismiss="modal">Tutup</button>
                            <button type="submit" id="register-biodata" class="btn btn-primary">Sign Up</button>
                        </div>
                    </div>
                </form>
			</div>
		</div>
	</div>

    @push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Proses Login
        $('#loginBiodata').on('submit', function (e) {
            e.preventDefault();

            var token = $('meta[name="csrf-token"]').attr('content');
            var data = $(this).serialize();
            var url = $(this).attr('action');

            $.ajax({
                url: url,
                type: 'POST',
                data: data + '&_token=' + token,
                success: function(response) {
                    if (response.success) {
                        // window.location.href = response.redirect_url;
                        window.location.reload()
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: response.message
                        });
                    }
                },
                error: function(xhr) {
                    var errors = xhr.responseJSON.errors;
                    var errorMessage = '';
                    $.each(errors, function(key, value) {
                        errorMessage += value[0] + ' ';
                    });
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: errorMessage
                    });
                }
            })
        });

        $('#SwipeRegisterBiodata').on('click', function (e) {
            e.preventDefault();

            $('#modalLogin').modal('hide');
            $('#modalRegister').modal('show');
        });

        // Proses Registrasi
        $('#registerBiodata').on('submit', function (e) {
            e.preventDefault();

            var token = $('meta[name="csrf-token"]').attr('content');
            var data = $(this).serialize();
            var url = $(this).attr('action');

            $.ajax({
                url: url,
                type: 'POST',
                data: data + '&_token=' + token,
                success: function (response) {
                    if (response.status == 'success') {
                        $('#modalRegister').modal('hide');
                        $('#registerBiodata')[0].reset();
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.message,
                        });
                        $('#modalLogin').modal('show');
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: response.message,
                            timer: 3000,
                            showConfirmButton: false
                        });
                    }
                },
                error: function(response) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Something went wrong!',
                        timer: 3000,
                        showConfirmButton: false
                    });
                }
            })
        });
    </script>
                            
    @endpush