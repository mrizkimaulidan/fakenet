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
            
            let year = $('#listOfDues #year').val();

            let url = "{{ route('laporan.export.dues', 'year') }}";
            url = url.replace('year', year);

            window.open(url, '_blank');
        });
    });
</script>