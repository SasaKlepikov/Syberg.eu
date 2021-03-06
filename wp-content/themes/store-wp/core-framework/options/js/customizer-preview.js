(function( $ ) {
    wp.customize( 'onepage[portfolio_text]', function( value ) {
        value.bind( function( to ) {
            $( '.portfolio-text' ).html( to );
        });
    });
    wp.customize( 'onepage[testimonials_text]', function( value ) {
        value.bind( function( to ) {
            $( '.testimonials-text' ).html( to );
        });
    });
    // Site title and description.
    wp.customize( 'blogname', function( value ) {
        value.bind( function( to ) {
            $( '.site-title' ).text( to );
        } );
    } );
    wp.customize( 'blogdescription', function( value ) {
        value.bind( function( to ) {
            $( '.site-description' ).text( to );
        } );
    } );
    // Header text color.
    wp.customize( 'header_textcolor', function( value ) {
        value.bind( function( to ) {
            if ( 'blank' === to ) {
                $( '.site-title, .site-description' ).css( {
                    'clip': 'rect(1px, 1px, 1px, 1px)',
                    'position': 'absolute'
                } );
            } else {
                $( '.site-title, .site-description' ).css( {
                    'clip': 'auto',
                    'color': to,
                    'position': 'relative'
                } );
            }
        } );
    } );
}( jQuery ));
