<script>
    $(function() {

        $('.detail-button').click(function() {
            let id = $(this).data('id');
            let url = "{{ route('api.transaksi.detail', 'id') }}";

            url = url.replace('id', id);

            $('#detailTransactionModal form #client_id').val('Sedang mengambil data..');
            $('#detailTransactionModal form #user_id').val('Sedang mengambil data..');
            $('#detailTransactionModal form #day').val('Sedang mengambil data..');
            $('#detailTransactionModal form #month').val('Sedang mengambil data..');
            $('#detailTransactionModal form #amount').val('Sedang mengambil data..');
            $('#detailTransactionModal form #is_paid').val('Sedang mengambil data..');
            $('#detailTransactionModal form #date').val('Sedang mengambil data..');

            $.ajax({
                url: url,
                type: "GET",
                success: function(response) {
                    setTimeout(() => {
                        $('#detailTransactionModal form #client_id').val(response.data.client_name);
                        $('#detailTransactionModal form #user_id').val(response.data.user_name);
                        $('#detailTransactionModal form #day').val(response.data.day);
                        $('#detailTransactionModal form #month').val(response.data.month);
                        $('#detailTransactionModal form #amount').val(response.data.amount);
                        $('#detailTransactionModal form #is_paid').val(response.data.is_paid);
                        $('#detailTransactionModal form #date').val(response.data.date);
                    }, 1000);
                }
            });
        });

        $('.edit-button').click(function() {
            let id = $(this).data('id');
            let showTransactionUrl = "{{ route('api.transaksi.show', 'id') }}";
            let updateTransactionUrl = "{{ route('transaksi.update', 'id') }}";

            showTransactionUrl = showTransactionUrl.replace('id', id);
            updateTransactionUrl = updateTransactionUrl.replace('id', id);

            let editTransactionModalButtonSubmit = $('#editTransactionModal .modal-footer button[type=submit]');

            editTransactionModalButtonSubmit.prop('disabled', true);

            $('#editTransactionModal form #client_id').prop('disabled', true);
            $('#editTransactionModal form #day').prop('disabled', true);
            $('#editTransactionModal form #month').prop('disabled', true);
            $('#editTransactionModal form #amount').prop('disabled', true);
            $('#editTransactionModal form #is_paid').prop('disabled', true);
            $('#editTransactionModal form #date').prop('disabled', true);

            $('#editTransactionModal form #client_id').prop('selectedIndex', 0);
            $('#editTransactionModal form #day').val('');
            $('#editTransactionModal form #month').prop('selectedIndex', 0);
            $('#editTransactionModal form #amount').val('');
            $('#editTransactionModal form #is_paid').prop('selectedIndex', 0);
            $('#editTransactionModal form #date').val('');

            $.ajax({
                url: showTransactionUrl,
                type: "GET",
                success: function(response) {
                    setTimeout(() => {

                        $('#editTransactionModal form').attr('action', updateTransactionUrl);

                        $('#editTransactionModal form #client_id').prop('disabled', false);
                        $('#editTransactionModal form #day').prop('disabled', false);
                        $('#editTransactionModal form #month').prop('disabled', false);
                        $('#editTransactionModal form #amount').prop('disabled', false);
                        $('#editTransactionModal form #is_paid').prop('disabled', false);
                        $('#editTransactionModal form #date').prop('disabled', false);

                        $('#editTransactionModal form #client_id').val(response.data.client_id);
                        $('#editTransactionModal form #day').val(response.data.day);
                        $('#editTransactionModal form #month').val(response.data.month);
                        $('#editTransactionModal form #amount').val(response.data.amount);
                        $('#editTransactionModal form #is_paid').val(response.data.is_paid);
                        $('#editTransactionModal form #date').val(response.data.date);

                        editTransactionModalButtonSubmit.prop('disabled', false);

                    }, 1000);
                }
            });
        });
    });
</script>