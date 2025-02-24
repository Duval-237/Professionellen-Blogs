
( function() {
  
  const file = document.querySelector( '#file' ),
        image = document.querySelector( 'img' ),
        span = document.querySelector( 'form label .imgbx span' );

  file.addEventListener( 'change', _ => {
    image.src = URL.createObjectURL( file.files[0] );
    image.style.width = "200px";
    image.style.height = "200px";
    span.textContent = '';
  } );
  
} )()

