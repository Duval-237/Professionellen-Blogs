
const requestAjax = function ( methode, path, data = null, load = false ) {
  var xhr = new XMLHttpRequest();

  xhr.open( methode, path );
  if ( methode == 'POST' ) xhr.setRequestHeader( "Content-Type", "application/x-www-form-urlencoded" );
  xhr.send( data );

  xhr.onreadystatechange = _ => {
    if( xhr.readyState == xhr.DONE && xhr.status == 200 ) {
      if ( load ) window.location.reload();
      // console.log( 'send ' + xhr.responseText );
    }
  }
}

