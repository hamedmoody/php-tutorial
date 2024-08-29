jQuery(document).ready(function( $ ){
    $('#thumbnail').change( function(e){
        e.preventDefault();
        if (e.target.files && e.target.files[0]) {
            const reader = new FileReader();
            reader.onload = function (e) {
                $('.thumbnail-preview').attr( 'src', e.target.result );
                $('.thumbnail').addClass('contain-image');
            }
            reader.readAsDataURL( e.target.files[0] );
        }
    } );
});