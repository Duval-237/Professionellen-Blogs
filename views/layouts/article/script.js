
// Pour telecharger le pdf
( function() {
  const article = document.querySelector( 'article.container' );
  var slugArticle = article.dataset.slug;

  // Bouton telecharge
  const btn_download = document .querySelector( '.options .download');
  btn_download.addEventListener( 'click', _ => {
    window.location.href = 'article/getPdf/' + slugArticle;
  });
})();

// Pour partager l'article
( function() {
  const share = document.querySelector( '#share' ),
        container = document.querySelector( '#share .container' ),
        close = document.querySelector( '#share .btn-close' ),
        link = document.querySelector( '#share .link' ),
        btn_copy = document.querySelector( '#share .btn-copy' );

  // Bouton share
  const btn_share = document .querySelector( '.options .share' );
  btn_share.addEventListener( 'click', _ => {
    share.classList.add( 'enable' );
  });

  close.addEventListener( 'click', _ => share.classList.remove( 'enable' ) );
  share.addEventListener( 'click', _ => share.classList.remove( 'enable' ), true );
  container.addEventListener( 'click', _ => share.classList.add( 'enable' ), true );

  window.addEventListener( 'scroll', _ => share.classList.remove( 'enable' ) );

  btn_copy.addEventListener( 'click', () => {
    share.classList.remove( 'enable' );
    navigator.clipboard.writeText( link.textContent );
  } );

})();


// Pour Enregistrer l'articles
( function() {
  // Bouton enregistrer
  const save = document .querySelector( '.options .save' ),
        add_collection = document .querySelector( '.options .add-collection' ),
        slugArticle = document.querySelector( 'article.container' ).dataset.slug;

  if ( add_collection ) {
    add_collection.addEventListener( 'click', _ => {
      if ( add_collection.classList.value.indexOf('enable') !== -1 ) {
        save.classList.remove( 'enable' );
        requestAjax( 'POST', 'article/index', `collect=off&slug=${slugArticle}` );
      } else {
        save.classList.add( 'enable' );
        requestAjax( 'POST', 'article/index', `collect=on&slug=${slugArticle}` );
      }
    });
  }
})();

// Menu de navigation de l'articles
( function() {
  const title = [ ...document.querySelectorAll( '.body-post-article h2' ) ],
        section = [ ...document.querySelectorAll( '.body-post-article section' ) ],
        menu = document.querySelector( '.menu-article' ),
        container_menu = document.querySelector( '.content-post-menu' ),
        toggle = document.querySelector( '.content-post-menu .toggle' );

  // Calcule la position total d'un element par rapport a la page
  function getOffset( element ) {
    var top = 0, left = 0;
    do {
      top  += element.offsetTop;
      left += element.offsetLeft;
    } while ( element = element.offsetParent );

    return top;
  }

  menu.innerHTML = '';

  // j'ecris tous les titre h2 de l'article dans le menu
  let i = 0;
  title.forEach( item => {
    text = item.innerText;
    if ( text.indexOf( '\n' ) ) {
      text = text.substring( text.indexOf( '\n' ) + 1 );
      menu.innerHTML += `<li class="item" data-id="${i}">${i+1}. ${text}</li>`;
    } else {
      menu.innerHTML += `<li class="item" data-id="${i}">${i+1}. ${text}</li>`;
    }
    i++;
  } );

  //contient la position de chaque section
  var top_section = [];

  // Attend la fin tu chargement pour recupere la position de chaque section
  window.addEventListener( 'load', _ => {  
    let j = 0;

    section.forEach( item => {
      top_section[ j ] = getOffset( item );
      j++;    
    } );
  });
  
  // l'orsqu'on clique sur un titre du menu
  menu.childNodes.forEach( item => {
    item.addEventListener( 'click', _ =>  {
      let id = item.dataset.id;
      let top = top_section[ id ] - 95;
      if ( document.documentElement.offsetWidth < 700 ) {
        top = top_section[ id ] - 92;
      }
      document.documentElement.scrollTop = top;
      container_menu.classList.remove( 'enable' );
    });
  });

  toggle.addEventListener( 'click', _ => {
    container_menu.classList.toggle( 'enable' );
  } );

})();

// Evaluation
( function() {
  const btn_yes = document.querySelector( '.btn-evaluation.yes' ),
        btn_no = document.querySelector( '.btn-evaluation.no' ),
        box_btn = document.querySelector( '.box-evaluation' ),
        box_oui = document.querySelector( '.box-reponse.oui' ),
        box_non = document.querySelector( '.box-reponse.non' );

  btn_yes.addEventListener( 'click', _ => {
    box_oui.style.display = 'block';
    box_btn.style.display = 'none';
  });
  btn_no.addEventListener( 'click', _ => {
    box_non.style.display = 'block';
    box_btn.style.display = 'none';
  });

})();

// Envoie une requete apres 30s de lecture
( function() {
  const article = document.querySelector( 'article.container' );
  var slugArticle = article.dataset.slug;

  setTimeout( () => {
    requestAjax( 'POST', '/' + slugArticle, 'idArticle=1&categoryArticle=1&tagsArticle=1');
  }, 30000 );
})();

