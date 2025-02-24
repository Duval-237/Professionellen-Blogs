

( function () {

  const article_link = document.querySelectorAll( '#tags .content' );
  
  // L'orsque je clique sur un article il m'affiche toutes les langues
  article_link.forEach( item => {
    item.addEventListener( 'click', (e) => {
      if ( e.target.dataset.id )
        window.location.href = "/admin/tags/view/" + e.target.dataset.id;
    } )
  } );

} )();

