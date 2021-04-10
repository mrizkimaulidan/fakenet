<script>
    $(function() {
        $('.edit-button').click(function() {
            let id = $(this).data('id');
        
            let showInternetPackageUrl = "{{ route('api.paket-internet.show', 'id') }}";
            showInternetPackageUrl = showInternetPackageUrl.replace('id', id);

            let updateInternetPackageUrl = "{{ route('paket-internet.update', 'id') }}";
            updateInternetPackageUrl = updateInternetPackageUrl.replace('id', id);

            let editInternetPackageFormButtonSubmit = $('#editInternetPackageModal .modal-footer button[type=submit]');
            editInternetPackageFormButtonSubmit.prop('disabled', true);

            $('#editInternetPackageModal form #name').prop('disabled', true);
            $('#editInternetPackageModal form #price').prop('disabled', true);

            $('#editInternetPackageModal form #name').val('Sedang mengambil data..');
            $('#editInternetPackageModal form #price').val('');

            $.ajax({
                url: showInternetPackageUrl,
                type: "GET",
                success: function(response) {
                    setTimeout(() => {

                        $("#editInternetPackageModal form").attr('action', updateInternetPackageUrl);

                        $('#editInternetPackageModal form #name').val(response.data.name);
                        $('#editInternetPackageModal form #price').val(response.data.price);

                        $('#editInternetPackageModal form #name').prop('disabled', false);
                        $('#editInternetPackageModal form #price').prop('disabled', false);

                        editInternetPackageFormButtonSubmit.prop('disabled', false);
                    }, 1000);
                },
                error: function() {
                    Swal.fire(
                        'Kesalahan Internal!',
                        'Lapor kepada administrator aplikasi!',
                        'error'
                    )

                    $('#editInternetPackageModal form #name').addClass('text-danger font-weight-bold is-invalid').val('Gagal mengambil data!');
                    $('#editInternetPackageModal form #price').prop('type', 'text').addClass('text-danger font-weight-bold is-invalid').val('Gagal mengambil data!');
                }
            });
        });
    });
</script>