<script>
    $(function() {

        $('#addTransactionModal form #client_id').change(function() {
            let id = $(this).children('option:selected').val();
            let url = "{{ route('api.transakasi-client.detail', 'id') }}";
            url = url.replace('id', id);

            $('#addTransactionModal form #internet_package_name').val('Sedang mengambil data..');
            $('#addTransactionModal form #internet_package_price').val('Sedang mengambil data..');

            $('#addTransactionModal .modal-footer button[type=submit]').prop('disabled', true);

            $.ajax({
                url: url,
                type: "GET",
                success: function(response) {
                    setTimeout(() => {
                        $('#addTransactionModal form #internet_package_name').val(response.data.internet_package.name);
                        $('#addTransactionModal form #internet_package_price').val(response.data.internet_package.price);

                        $('#addTransactionModal .modal-footer button[type=submit]').prop('disabled', false);
                    }, 1000);
                }
            });
        });

        $('.detail-button').click(function() {
            let id = $(this).data('id');
            let url = "{{ route('api.transaksi.detail', 'id') }}";

            url = url.replace('id', id);

            $('#detailTransactionModal form #client_id').val('Sedang mengambil data..');
            $('#detailTransactionModal form #client_ip').val('Sedang mengambil data..');
            $('#detailTransactionModal form #user_id').val('Sedang mengambil data..');
            $('#detailTransactionModal form #day').val('Sedang mengambil data..');
            $('#detailTransactionModal form #month').val('Sedang mengambil data..');
            $('#detailTransactionModal form #year').val('Sedang mengambil data..');

            $.ajax({
                url: url,
                type: "GET",
                success: function(response) {
                    setTimeout(() => {
                        $('#detailTransactionModal form #client_id').val(response.data.client_name);
                        $('#detailTransactionModal form #client_ip').val(response.data.client_ip);
                        $('#detailTransactionModal form #user_id').val(response.data.user_name);
                        $('#detailTransactionModal form #day').val(response.data.day);
                        $('#detailTransactionModal form #month').val(response.data.month);
                        $('#detailTransactionModal form #year').val(response.data.year);
                    }, 1000);
                }
            });
        });

        $('.edit-button').click(function() {
            let id = $(this).data('id');
            let showTransactionUrl = "{{ route('api.transaksi.show', 'id') }}";
            let updateTransactionUrl = "{{ route('tagihan.update', 'id') }}";

            showTransactionUrl = showTransactionUrl.replace('id', id);
            updateTransactionUrl = updateTransactionUrl.replace('id', id);

            let editTransactionModalButtonSubmit = $('#editTransactionModal .modal-footer button[type=submit]');

            editTransactionModalButtonSubmit.prop('disabled', true);

            $('#editTransactionModal form #client_id').prop('disabled', true);
            $('#editTransactionModal form #day').prop('disabled', true);
            $('#editTransactionModal form #month').prop('disabled', true);
            $('#editTransactionModal form #year').prop('disabled', true);
            $('#editTransactionModal form #year').prop('disabled', true);
            $('#editTransactionModal form #note').prop('disabled', true);

            $('#editTransactionModal form #client_id').prop('selectedIndex', 0);
            $('#editTransactionModal form #day').prop('selectedIndex', 0);
            $('#editTransactionModal form #month').prop('selectedIndex', 0);
            $('#editTransactionModal form #year').val('');
            $('#editTransactionModal form #internet_package_name').val('');
            $('#editTransactionModal form #internet_package_price').val('');

            $.ajax({
                url: showTransactionUrl,
                type: "GET",
                success: function(response) {
                    setTimeout(() => {
                        $('#editTransactionModal form').attr('action', updateTransactionUrl);

                        $('#editTransactionModal form #client_id').prop('disabled', false);
                        $('#editTransactionModal form #day').prop('disabled', false);
                        $('#editTransactionModal form #month').prop('disabled', false);
                        $('#editTransactionModal form #year').prop('disabled', false);

                        $('#editTransactionModal form #client_id').val(response.data.client_id);

                        $('#editTransactionModal form #internet_package_name').val(response.data.client.internet_package.name);
                        $('#editTransactionModal form #internet_package_price').val(response.data.client.internet_package.price);

                        $('#editTransactionModal form #day').val(response.data.day);
                        $('#editTransactionModal form #month').val(response.data.month);
                        $('#editTransactionModal form #year').val(response.data.year);

                        editTransactionModalButtonSubmit.prop('disabled', false);

                    }, 1000);
                }
            });
        });

        $('#editTransactionModal form #client_id').change(function() {
            let id = $(this).children('option:selected').val();
            let url = "{{ route('api.transakasi-client.detail', 'id') }}";
            url = url.replace('id', id);

            $('#editTransactionModal form #internet_package_name').val('Sedang mengambil data..');
            $('#editTransactionModal form #internet_package_price').val('Sedang mengambil data..');
            $('#editTransactionModal form #amount').val('');
            $('#editTransactionModal form #amount').prop('disabled', true);

            $('#editTransactionModal .modal-footer button[type=submit]').prop('disabled', true);

            $.ajax({
                url: url,
                type: "GET",
                success: function(response) {
                    setTimeout(() => {
                        $('#editTransactionModal form #internet_package_name').val(response.data.internet_package.name);
                        $('#editTransactionModal form #internet_package_price').val(response.data.internet_package.price);
                        $('#editTransactionModal form #amount').val(response.data.internet_package.price);

                        $('#editTransactionModal form #amount').prop('disabled', false);

                        $('#editTransactionModal .modal-footer button[type=submit]').prop('disabled', false);
                    }, 1000);
                }
            });
        });
    });
</script>