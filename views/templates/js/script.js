
/**
 * Gestions du mode dark
 * 
 * Envoie de la requete aux cookies pour sauvergarde l'etat
 */
( function () {

  const btn_dark_mode = [ ...document.querySelectorAll( '.btn-dark-mode' ) ],
        btn_light_mode = [ ...document.querySelectorAll( '.btn-light-mode' ) ],
        body = document.querySelector( 'body' );

  btn_dark_mode.forEach( item => {
    item.addEventListener( 'click', _ => {
      body.classList.add( 'theme-dark' );
      requestAjax( 'POST', '/main/theme', 'theme=theme-dark' );
      requestAjax( 'POST', '/main/ajax', 'themeUser=1' );
    } );
  } );

  btn_light_mode.forEach( item => {
    item.addEventListener( 'click', _ => {
      body.classList.remove( 'theme-dark' );
      requestAjax( 'POST', '/main/theme', 'theme=theme-light' );
      requestAjax( 'POST', '/main/ajax', 'themeUser=2' );
    });
  });

  // Si le cookie theme n'existe pas
  if ( document.cookie.indexOf( 'theme' ) === -1 ) {
    // Je verifie si le theme de l'appareil est sombre
    if ( window.matchMedia( '( prefers-color-scheme: dark )' ).matches ) {
      body.classList.add( 'theme-dark' );
      requestAjax( 'POST', '/main/theme', 'theme=theme-dark' );
    }
    // Sinon
    else {
      body.classList.remove( 'theme-dark' );
      requestAjax( 'POST', '/main/theme', 'theme=theme-light' );
    }
  }

} )();

// Gere toutes les barres de recherches
( function() {

  const search_input = document.querySelectorAll( '.search-input' ),
        text_search = document.querySelector( '.text-search' ),
        text_search_mobile = document.querySelector( '.text-search-mobile' );

  document.addEventListener( 'click', _ => {
    text_search.style.display = 'none';
  });

  search_input.forEach( item => {
    item.addEventListener( 'keyup', _ => {
      text_search.style.display = 'block';
      if ( text_search.innerHTML === "" ) {
        text_search.style.display = 'none';
      }
      
      if ( item.value == "" ) return;

      var xhr = new XMLHttpRequest();
      xhr.open( 'POST', '/technoganTo/index' );
      xhr.setRequestHeader( "Content-Type", "application/x-www-form-urlencoded" );
      xhr.send( 'search=' + item.value );

      xhr.onreadystatechange = function() {
        if ( xhr.readyState === xhr.DONE && xhr.status === 200 ) {
          articles = JSON.parse( xhr.responseText );
          text_search.innerHTML = '';
          text_search_mobile.innerHTML = '';
          articles.forEach( article => {
            text_search.innerHTML += `
              <li>
                <a href="/technoganTo?search=${article[ 'title' ]}">
                  <span class="svg">
                    <svg viewBox="0 0 254.77 263.68"><defs><style>.cls-search-1,.cls-search-2{fill:none;stroke-width:25px;}.cls-search-1{stroke-miterlimit:10;}.cls-search-2{stroke-linejoin:round;}</style></defs><g id="Calque_2" data-name="Calque 2"><g id="Calque_1-2" data-name="Calque 1"><circle class="cls-search-1" cx="108.26" cy="108.26" r="95.76"></circle><path class="cls-search-2" d="M176.45,175.73l65.82,75.45Z"></path></g></g></svg>
                  </span>
                  <span>${article[ 'title' ]}</span>  
                  <span class="svg">
                    <svg viewBox="0 0 448 512"><path d="M447.1 256C447.1 273.7 433.7 288 416 288H109.3l105.4 105.4c12.5 12.5 12.5 32.75 0 45.25C208.4 444.9 200.2 448 192 448s-16.38-3.125-22.62-9.375l-160-160c-12.5-12.5-12.5-32.75 0-45.25l160-160c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25L109.3 224H416C433.7 224 447.1 238.3 447.1 256z"></path></svg>
                  </span>
                </a>
              </li>
            `;
            text_search_mobile.innerHTML += `
              <li>
                <a href="/technoganTo?search=${article[ 'title' ]}">
                  <span class="svg">
                    <svg viewBox="0 0 254.77 263.68"><defs><style>.cls-search-1,.cls-search-2{fill:none;stroke-width:25px;}.cls-search-1{stroke-miterlimit:10;}.cls-search-2{stroke-linejoin:round;}</style></defs><g id="Calque_2" data-name="Calque 2"><g id="Calque_1-2" data-name="Calque 1"><circle class="cls-search-1" cx="108.26" cy="108.26" r="95.76"></circle><path class="cls-search-2" d="M176.45,175.73l65.82,75.45Z"></path></g></g></svg>
                  </span>
                  <span>${article[ 'title' ]}</span>  
                  <span class="svg">
                    <svg viewBox="0 0 448 512"><path d="M447.1 256C447.1 273.7 433.7 288 416 288H109.3l105.4 105.4c12.5 12.5 12.5 32.75 0 45.25C208.4 444.9 200.2 448 192 448s-16.38-3.125-22.62-9.375l-160-160c-12.5-12.5-12.5-32.75 0-45.25l160-160c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25L109.3 224H416C433.7 224 447.1 238.3 447.1 256z"></path></svg>
                  </span>
                </a>
              </li>
            `;
          } );
        }
      }
    });
  } );
})();

/**
 * Boutton random
 * 
 * Ouvre aleatoirement un article
 */

( function() {
  var random = document.querySelectorAll( '.random' );

  random.forEach( item => {
    item.addEventListener( 'click', (e) => {
      e.preventDefault();

      var xhr = new XMLHttpRequest();
      xhr.open( 'POST', '/main/ajax' );
      xhr.setRequestHeader( "Content-Type", "application/x-www-form-urlencoded" );
      xhr.send( 'random=1' );
      
      xhr.onreadystatechange = function() {
        if ( xhr.readyState == xhr.DONE && xhr.status == 200 ) {
          window.location.href = "/" + xhr.responseText;
        }
      }
    } );
  } );
} )();


/**
 * Gestion de la connexion
 *
 */

( function () {
  const connexion = document.querySelector( '#connexion' ),
        container_connexion = document.querySelector( '#connexion .container-connexion' ),
        menu_mobile = document.querySelector( '#menu-mobile' ),
        btn_close = [ ...document.querySelectorAll( '.bx2 .head button.close' ) ],
        btn_return = [ ...document.querySelectorAll( '.bx2 .head button.return' ) ],
        btn_connexion = [ ...document.querySelectorAll( '.connexion' ) ],
        errorbx = document.querySelectorAll( '.errorbx' ),
        btn_create = document.querySelector( '.btn-create' ),
        btn_reset_password = document.querySelector( '.pssd-forget' ),
        bx2_login = document.querySelector( '.bx2.login' ),
        bx2_sign_up = document.querySelector( '.bx2.sign-up' ),
        bx2_reset_password = document.querySelector( '.reset-password' );
  
if ( connexion ) {

  function createCookie() {
    let date = new Date();
    date.setTime( date.getTime() + 60 * 20 * 1000 );
    document.cookie = `hideFormConnexion=true; expires=${date.toUTCString()}; path=/; domain=technogan.com`;
  }

  if ( document.cookie.indexOf( 'hideFormConnexion' ) === -1 )
    connexion.classList.add( 'enable' );

  container_connexion.addEventListener( 'click', _ => connexion.classList.add( 'enable' ), true );
  
  connexion.addEventListener( 'click', _ => {
    createCookie();
    connexion.classList.remove( 'enable' );
  }, true );

  btn_close.forEach( item => {
    item.addEventListener( 'click', _ => {
      createCookie();
      connexion.classList.remove( 'enable' );
    });
  });
  
  btn_return.forEach( item => {
    item.addEventListener( 'click', _ => { 
      bx2_login.style.display = "block";
      bx2_sign_up.style.display = "none";
      bx2_reset_password.style.display = "none";
      errorbx[1].style.opacity = 0;
    });
    
  });

  btn_connexion.forEach( item => {
    item.addEventListener( 'click', _ => {
      connexion.classList.add( 'enable' );
      menu_mobile.classList.remove( 'enable' );
    });
  });

  btn_create.addEventListener( 'click', _ => {
    bx2_login.style.display = "none";
    bx2_sign_up.style.display = "block";
    errorbx[0].style.opacity = 0;
  });
  
  btn_reset_password.addEventListener( 'click', _ => {
    bx2_login.style.display = "none";
    bx2_reset_password.style.display = "block";
    errorbx[0].style.opacity = 0;
  });

  
  const btn_login = document.querySelector( '.btn-login' ),
        email_login = document.querySelector( '#email-login' ),
        password_login = document.querySelector( '#password-login' ),
        formLogin = document.querySelector( '#formLogin' );
      
  var regex =  /^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/;

  email_login.addEventListener( 'input', _ => {
    errorbx[0].style.opacity = 0;
  })
  password_login.addEventListener( 'input', _ => {
    errorbx[0].style.opacity = 0;
  })

  btn_login.addEventListener( 'click', (e) => {
    e.preventDefault();

    // form = new FormData( formLogin );
    // for ( const [ key, value ] of form.entries() ) {
    //   console.log( key, value );
    // }
    
    let email = email_login.value;
    let password = password_login.value;


    if ( email !== '' && password !== '' && regex.test( email ) ) {
      var xhr = new XMLHttpRequest();
      xhr.open( 'POST', '/main/ajax' );
      xhr.setRequestHeader( "Content-Type", "application/x-www-form-urlencoded" );
      xhr.send( `email=${email}&password=${password}` );

      xhr.onreadystatechange = function() {
        if ( xhr.readyState == xhr.DONE && xhr.status == 200 ) {
          // Si un message est envoye
          if ( xhr.responseText !== '' ) {
            errorbx[0].style.opacity = 1;
            errorbx[0].lastElementChild.textContent = xhr.responseText;
            email_login.focus();
            password_login.value = "";
          } else {
            window.location.reload();
          }
        }
      }
    } else {
      errorbx[0].style.opacity = 1;
    }
  });

  const btn_sign_in = document.querySelector( '.btn-sign-in' ),
        email_sign_in = document.querySelector( '#email-sign-in' ),
        password_sign_in = document.querySelector( '#password-sign-in' );
  
  email_sign_in.addEventListener( 'input', _ => {
    errorbx[1].style.opacity = 0;
  })
  password_sign_in.addEventListener( 'input', _ => {
    errorbx[1].style.opacity = 0;
  })

  btn_sign_in.addEventListener( 'click', (e) => {
    e.preventDefault();

    let email = email_sign_in.value;
    let password = password_sign_in.value;

    if ( email !== '' && password !== '' && regex.test( email ) ) {
      var xhr = new XMLHttpRequest();
      xhr.open( 'POST', '/main/ajax' );
      xhr.setRequestHeader( "Content-Type", "application/x-www-form-urlencoded" );
      xhr.send( `emailSignIn=${email}&passwordSignIn=${password}` );

      xhr.onreadystatechange = function() {
        if ( xhr.readyState == xhr.DONE && xhr.status == 200 ) {
          // Si un message est envoye
          if ( xhr.responseText !== '' ) {
            errorbx[1].style.opacity = 1;
            errorbx[1].lastElementChild.textContent = xhr.responseText;
            email_sign_in.focus();
          } else {
            window.location.reload();
          }
        }
      }
    } else {
      errorbx[1].style.opacity = 1;
    }
  });
  
}

})();

/**
 * Gestion du menu pour utilisateur
 * 
 */
( function () {
  //initialisation des variables
  const img_profil = document.querySelector( '.img-profil' ),
        menu_profil = document.querySelector( '.menu-profil' ),
        btn_signOut = document.querySelectorAll( '.sign-out' );

// Si l'utilisateur est connecte
if ( img_profil ) {

  document.addEventListener( 'click', (e) =>  {
    if ( !menu_profil.contains( e.target ) ) menu_profil.classList.remove( 'enable' ) 
  }, true );

  img_profil.addEventListener( 'click', _ => menu_profil.classList.toggle( 'enable' ) );
  
  btn_signOut.forEach( item => {
    item.addEventListener( 'click', (e) => {
      e.preventDefault();
      requestAjax( 'POST', '/main/ajax', 'signOut=on', true );
    });
  });
}

} ) ();

/**
 * Gestion du choix de langue
 * 
 * Envoie de la requete pour sauvergarde l'etat
 */
( function () {
  //initialisation des variables
  const pop_up_translate = document.querySelector( '#select-language' ),
        box_select = document.querySelector( '.box-select' ),
        btn_close = document.querySelector( '#select-language .btn-close' ),
        all_language = document.querySelectorAll( '.all-language' );
  
  all_language.forEach( item => {
    item.addEventListener( 'click', _ => {
      pop_up_translate.classList.add( 'enable' );
    } );
  } );

  pop_up_translate.addEventListener( 'click', _ => pop_up_translate.classList.remove( 'enable' ),true );
  box_select.addEventListener( 'click', _ => pop_up_translate.classList.add( 'enable' ),true );
  btn_close.addEventListener( 'click', _ => pop_up_translate.classList.remove( 'enable' ), true );

  // console.log( 'bonjour' );

  // const btn_language = [ ...document.querySelectorAll( '.languages .item' ) ];

  // btn_language.forEach( item => {
  //   item.addEventListener( 'click',  ( e )  => {
  //     requestAjax( 'POST', 'views/templates/lang/lang.php', 'lang=' + e.target.dataset.lang, true );
  //   } );
  // } );

} ) ();


/**
 * Gestion du pop un newsletter
 *
 */
( function () {
  //initialisation des variables
  const pop_up_newsletter = document.querySelector( '#pop-up-newsletter' ),
        button_close = document.querySelector( '#pop-up-newsletter .button-close' );


  // Si le hideNewsletter n'existe pas
  if ( document.cookie.indexOf( 'hideNewsletter' ) === -1 )
    pop_up_newsletter.classList.add( 'enable' )


  button_close.addEventListener( 'click', _ => {
    let date = new Date();

    date.setTime( date.getTime() + ( 60 * 60 * 24 * 1000 ) );
    document.cookie = `hideNewsletter=true; expires=${date.toUTCString()}; path=/; domain=technogan.com`;
    pop_up_newsletter.classList.remove( 'enable' )
  }, true );
})();


/**
 * Gestion du bouton Auto top
 */
( function () {

  const autoTop = document.querySelector( '#auto-top' );
  
  let scrollHeight = document.documentElement.scrollHeight,
      scrollTop = document.documentElement.scrollTop,
      windowHeight = window.innerHeight;

  let pourcentPage = ( scrollTop / ( scrollHeight - windowHeight ) ) * 100;
  
  if ( pourcentPage > 5 )
    autoTop.classList.add( 'enable' );
  else
    autoTop.classList.remove( 'enable' );
  
  window.addEventListener( 'scroll', _ => {

    let scrollHeight = document.documentElement.scrollHeight,
        scrollTop = document.documentElement.scrollTop,
        windowHeight = window.innerHeight;

    let pourcentPage = ( scrollTop / ( scrollHeight - windowHeight ) ) * 100;
    
    if ( pourcentPage > 5 )
      autoTop.classList.add( 'enable' );
    else
      autoTop.classList.remove( 'enable' );
  } );
  
  autoTop.addEventListener( 'click', _ => document.documentElement.scrollTop = 0 );
} )();


/**
 * Gestion du scroll vers le bas
 */
( function () {

  let last_scroll = 0;

  const body = document.querySelector( 'body' );

  window.addEventListener( 'scroll', _ => {

    let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

    if ( scrollTop > last_scroll ) 
      body.classList.add( 'scroll-bottom' );
    else
      body.classList.remove( 'scroll-bottom' );

    last_scroll = scrollTop;
  });

} )();


/**
 * Gestion de la barre de recherche pour mobile
 */
( function () {
  // Initialisation des variables
  const container_search = document.querySelector( '#container-search' ),
        btn_search = document.querySelector( '.btn-search' ),
        btn_back = document.querySelector( '.btn-back' ),
        search_input = document.querySelector( '.search-input' ),
        btn_reset = document.querySelector( '.btn-reset' );

  // affiche un element si input est rempli
  function verifValue ( input, item ) {
    if ( input.value != "" ) 
      item.style.display = "flex";
    else
      item.style.display = "none";
  }

  verifValue( search_input, btn_reset );

  var caract = search_input.value.length;
  // Place le curseur a la fin
  search_input.setSelectionRange( caract, caract );
  
  // button qui affiche la barre de recherche
  btn_search.addEventListener( 'click', _ => {
    container_search.classList.add( 'enable' );
    search_input.focus();
  });
  
  // button qui ferme la barre de recherche
  btn_back.addEventListener( 'click', _ => {
    container_search.classList.remove( 'enable' );
    search_input.blur();
  } );

  // L'orsqu'on ecrit dans dans la barre de recherche
  search_input.addEventListener( 'keyup', _ => {
    verifValue( search_input, btn_reset );
  } );

  // L'orqu'on clique sue le bouton pour effacer le contenu de la recherche
  btn_reset.addEventListener( 'click', _ => {
    search_input.value = "";
    search_input.focus();
    btn_reset.style.display = "none";
    console.log( search_input );
  }, true );

} )();  


/**
 * Gestion du menu pour mobile
 */
( function () {
  // Initialisation des variables
  const btn_menu_mobile = document.querySelector( '.btn-menu-mobile' ),
        menu_mobile = document.querySelector( '#menu-mobile' ),
        navbar_mobile = document.querySelector( '.navbar-mobile' ),
        navbar_mobile_close = document.querySelector( '.navbar-mobile-close' );

  // L'orsqu'on clique sur le bouton menu
  btn_menu_mobile.addEventListener( 'click', _ => menu_mobile.classList.add( 'enable' ) );
  // L'orsqu'on clique sur le font transparent du menu j'utilise la capture
  menu_mobile.addEventListener( 'click', _ => menu_mobile.classList.remove( 'enable' ), true );
  // L'orsqu'on clique sur le menu pour qu'il ne disparaise pas j'utilise le bouillonnement
  navbar_mobile.addEventListener( 'click', _ => menu_mobile.classList.add( 'enable' ), true );
  // L'orsq'on clique sur la croix du menu nav du mode mobile
  navbar_mobile_close.addEventListener( 'click', _ => menu_mobile.classList.remove( 'enable' ), true );

} )();


/**
 * Gestion du deroulement pour footer mobile
 */
( function () {

  const title = [ ...document.querySelectorAll( '.title-footer-middle' ) ];

  function activeLink() {
    var bool = false;

    bool = this.classList[1] === "enable" ? true : false;

    title.forEach( item => {
      item.classList.remove( 'enable' );
      this.classList.add( 'enable' );

      if ( bool ) this.classList.remove( 'enable' );
    } );
  }
  title.forEach( item => item.addEventListener( 'click', activeLink ) );

} )();

