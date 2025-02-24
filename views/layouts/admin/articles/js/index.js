
/**
 * 
 * Page d'acceuil des articles
*/
( function() {

  // Permet d'envoyer une requete ajax
  const sendRequest = function ( methode, path, data = null ) {
    var xhr = new XMLHttpRequest();
  
    xhr.open( methode, path );
    if ( methode == 'POST' ) xhr.setRequestHeader( "Content-Type", "application/x-www-form-urlencoded" );
    xhr.send( data );
  } 
    
  const btn_published = [ ...document.querySelectorAll( '.status .toggle' ) ],
        article_link = document.querySelectorAll( '#articles .content' );
  
  // L'orsque je clique sur un article il m'affiche toutes les langues
  article_link.forEach( item => {
    item.addEventListener( 'click', (e) => {
      if ( e.target.dataset.id )
        window.location.href = "/admin/articles/view/" + e.target.dataset.id;
    } )
  } );
  
  // L'orsque je clique sur le toggle pour publier un articles
  btn_published.forEach( item => {
    item.addEventListener( 'click', _ => {
      var parent = item.parentElement;
      // je recupere l'id de l'article
      var id = parent.dataset.id;
      // Si le toggle est active
      if ( parent.classList[ parent.classList.length - 1] === 'enable' ) {
        sendRequest( 'POST', '/admin/ajax', 'ispublished=0&id=' + id );
        parent.classList.remove( 'enable' );
      }
      // Sinon
      else {
        sendRequest( 'POST', '/admin/ajax', 'ispublished=1&id=' + id );
        parent.classList.add( 'enable' );
      }
    } );
  });

} )();

