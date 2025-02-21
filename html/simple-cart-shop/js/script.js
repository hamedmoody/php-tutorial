jQuery(document).ready( function( $ ){

    function setup_countdown(){
        $('.countdown').each(function(){
            let time = $(this).data('date');
            let ts  = Date.parse( time ) / 1000;
            let now_ts  = Math.floor( Date.now() / 1000 );
            let remain  = ts - now_ts;
            if( remain >= 0 ){

                let days    = Math.floor( remain / 86400 );
                let hours   = Math.floor( ( remain % 86400 ) / 3600 );
                let minutes = Math.floor( ( remain % 3600 ) / 60 );
                let seconds = remain % 60;

                let result = '';
                result+= days ? days.toString().padStart(2,'0') + ' روز و ' : '';
                result+= `${hours.toString().padStart(2,'0')}:${minutes.toString().padStart(2,'0')}:${seconds.toString().padStart(2,'0')} ساعت`;

                $(this).text( result );

            }
        });
        setTimeout( setup_countdown, 1000 );
    }

    setup_countdown( );

} );