<script>
    $(function() {
        $('#recapModal .modal-footer #export').click(function(e) {
            e.preventDefault();
            
            let url = "{{ route('laporan.export.year', 'year') }}";
            let year = $('#year').val();

            url = url.replace('year', year);
            window.open(url, '_blank');
        });

        $('#listOfDues .modal-footer #export').click(function(e) {
            e.preventDefault();
            
            let day = $('#listOfDues #day').val();
            let year = $('#listOfDues #year').val();

            let url = "{{ url('/laporan/export/iuran/') }}/" + day + '/' + year;

            window.open(url, '_blank');
        });
    });
</script>