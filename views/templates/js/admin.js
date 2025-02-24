
// Gestion de la fenetre pop up pour supprimer
( function() {
  // Initialistion des variables
  const btn_delete = [ ...document.querySelectorAll( '.delete' ) ],
        pop_up  = document.querySelector( '#pop-up' ),
        pop_up_container  = document.querySelector( '#pop-up .container' ),
        btn_yes = document.querySelector( '.btn_yes' ),
        btn_no  = document.querySelector( '.btn_no' );

  // Si on clique sur un boutton supprimer
  btn_delete.forEach( item => {
    item.addEventListener( 'click', ( e ) => {
      e.preventDefault();
      btn_yes.href = e.target.href;
      // j'affiche la fenetre pop up
      pop_up.style.display = "flex";
    } );
  } );

  // Si on clique sur le boutton annule je ferme le pop up
  btn_no.addEventListener( 'click', ( e ) => {
    e.preventDefault();
    pop_up.style.display = "none";
  } );

  // Si on clique sur pop up on ferme
  pop_up.addEventListener( 'click', _ => pop_up.style.display = "none", true);
  // Mais si on clique sur le contenu de pop up on laisse ouvert
  pop_up_container.addEventListener( 'click', _ => pop_up.style.display = "flex", true);

})();

