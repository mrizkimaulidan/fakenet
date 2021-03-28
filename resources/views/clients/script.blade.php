<script>
    $(function() {
        function changeLabelFile(e) {
            if(e.target.files.length === 0) {
                return $('#label_house_image').html('Pilih Gambar');    
            }

            return $('#label_house_image').html(e.target.files[0].name);
        }
        
        $('input[type=file]').change(function(e) {
            return changeLabelFile(e)
        });
    });
</script>