<script>
    $(function() {
        function changeLabelFile(e) {
            if(e.target.files.length === 0) {
                return $('#label_house_image').html('Pilih Gambar');    
            }

            return $('#label_house_image').html(e.target.files[0].name);
        }

        function previewImage() {
            let file = $('input[type=file]').get(0).files;

            let oldImageSource = $('#old_image_preview').attr('src');

            if (file.length === 0) {
                return $('#image_preview').attr('src', oldImageSource);;
            }

            let reader = new FileReader();

            if(!reader) {
                return;
            }

            reader.onload = function() {
                $('#image_preview').attr('src', reader.result);
            }

            return reader.readAsDataURL(file[0]);
        }

        $('input[type=file]').change(function(e) {
            changeLabelFile(e);

            previewImage();
        });
    });
</script>