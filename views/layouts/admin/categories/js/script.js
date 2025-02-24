
( function() {

  const color = document.querySelector( '#color' ),
        code  = document.querySelector( '#code' );
  
  code.addEventListener( 'keyup', _ => {
    color.value = code.value;
  } );
  
  color.addEventListener( 'change', _ => {
    code.value = color.value;
  } );
  
})();

