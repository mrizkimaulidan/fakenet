<script>
    $(function() {

        $('#password-button-eye').click(function() {
            let inputPassword = $('#password');

            if (inputPassword.attr('type') == 'password') {
                inputPassword.attr('type', 'text');
                $('#password-eye-class').addClass('fa-eye-slash').removeClass('fa-eye');
            } else {
                inputPassword.attr('type', 'password');
                $('#password-eye-class').addClass('fa-eye').removeClass('fa-eye-slash');
            }

        });

        $('#password-confirmation-button-eye').click(function() {
            let inputPassword = $('#password_confirmation');

            if (inputPassword.attr('type') == 'password') {
                inputPassword.attr('type', 'text');
                $('#password-confirmation-eye-class').addClass('fa-eye-slash').removeClass('fa-eye');
            } else {
                inputPassword.attr('type', 'password');
                $('#password-confirmation-eye-class').addClass('fa-eye').removeClass('fa-eye-slash');
            }

        });

        $('.edit-button').click(function() {
            let id = $(this).data('id');
            let url = "{{ route('api.administrator-aplikasi.show', 'id') }}";
            url = url.replace('id', id);

            let updateAdministratorApplicationUrl = "{{ route('administrator-aplikasi.update', 'id') }}";
            updateAdministratorApplicationUrl = updateAdministratorApplicationUrl.replace('id', id);

            $('#editAdministratorApplicationModal form #name').val('Sedang mengambil data..');
            $('#editAdministratorApplicationModal form #email').val('Sedang mengambil data..');

            $('#editAdministratorApplicationModal form #name').prop('disabled', true);
            $('#editAdministratorApplicationModal form #position_id').prop('disabled', true);
            $('#editAdministratorApplicationModal form #position_id').prop('selectedIndex', 0);
            $('#editAdministratorApplicationModal form #email').prop('disabled', true);
            $('#editAdministratorApplicationModal form #password').prop('disabled', true);
            $('#editAdministratorApplicationModal form #password_confirmation').prop('disabled', true);

            $('#editAdministratorApplicationModal .modal-footer button[type=submit]').prop('disabled', true);

            $.ajax({
                url: url,
                type: "GET",
                success: function (response) {
                    setTimeout(() => {
                        $('#editAdministratorApplicationModal form').attr('action', updateAdministratorApplicationUrl);

                        $('#editAdministratorApplicationModal form #name').val(response.data.name);
                        $('#editAdministratorApplicationModal form #position_id').val(response.data.position.id);
                        $('#editAdministratorApplicationModal form #email').val(response.data.email);

                        $('#editAdministratorApplicationModal form #name').prop('disabled', false);
                        $('#editAdministratorApplicationModal form #position_id').prop('disabled', false);
                        $('#editAdministratorApplicationModal form #email').prop('disabled', false);
                        $('#editAdministratorApplicationModal form #password').prop('disabled', false);
                        $('#editAdministratorApplicationModal form #password_confirmation').prop('disabled', false);

                        $('#editAdministratorApplicationModal .modal-footer button[type=submit]').prop('disabled', false);
                    });
                },
                error: function() {
                    Swal.fire(
                        'Kesalahan Internal!',
                        'Lapor kepada administrator aplikasi!',
                        'error'
                    )

                    $('#editAdministratorApplicationModal').modal('hide');
                }
            });
        });
    });
</script>
