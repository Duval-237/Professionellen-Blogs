
( function() {

  const file = document.querySelector( '#file' ),
        image = document.querySelector( 'img' );

  file.addEventListener( 'change', _ => {
    image.src = URL.createObjectURL( file.files[ 0 ] );
  } );

} )()

