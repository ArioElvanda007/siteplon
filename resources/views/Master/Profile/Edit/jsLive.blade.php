<script>
    $(function () {
        //preview image create
        $('#gambar').change(function(){   
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#preview_image').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]); 
        });        
    });

    $(function() {
        // Multiple images preview in browser
        var imagesPreview = function(input, placeToInsertImagePreview) {
            $('.modal-img').html('');//clear image

            if (input.files) {
                var filesAmount = input.files.length;

                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();

                    reader.onload = function(event) {
                        $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                    }

                    reader.readAsDataURL(input.files[i]);
                }
            }

        };

        $('#gambar').on('change', function() {
            imagesPreview(this, 'div.modal-img');
        });
    });    
</script>