
/**
 * Creation du mini editeur de text d'articles
 */
( function() {
  // initialisation des variables
  const content = document.querySelector( '#content' ), //Textarea content
        btn_blog = document.querySelector( '.btn-blog' ),
        btn_bold = document.querySelector( '.btn-bold' ),
        btn_italic = document.querySelector( '.btn-italic' ),
        btn_link = document.querySelector( '.btn-link' ),
        btn_h2 = document.querySelector( '.btn-h2' ),
        btn_h3 = document.querySelector( '.btn-h3' ),
        btn_span = document.querySelector( '.btn-span' ),
        btn_paragraph = document.querySelector( '.btn-paragraph' ),
        btn_citation = document.querySelector( '.btn-citation' ),
        btn_code = document.querySelector( '.btn-code' ),
        btn_img = document.querySelector( '.btn-img' ),
        btn_ul = document.querySelector( '.btn-ul' ),
        btn_ol = document.querySelector( '.btn-ol' ),
        bx_addImg = document.querySelector( '#addImg' ),
        container_addImg = document.querySelector( '#addImg .container' ),
        form_uploads = document.querySelector( '#addImg form' ), 
        input_file = document.querySelector( '#addImg #img' ),
        input_title = document.querySelector( '#addImg #title' ),
        button_uploads = document.querySelector( '#addImg button' ),
        img = document.querySelector( '#addImg .inputbx img' );
        
  /**
   * Cette function ajoute une balise avec ou sans selection
   * 
   * @param {object} textarea le champ a modifier
   * @param {string} startBalise la balise ouvrante
   * @param {string} endBalise la balise fermente
   * @returns {void}
   */
  function addBalise ( textarea, startBalise, endBalise ) {
    const start = textarea.selectionStart;
    const end = textarea.selectionEnd;

    if ( start !== end ) {
      textarea.value = textarea.value.substring( 0, start ) + startBalise + textarea.value.substring( start, end ) + endBalise + textarea.value.substring( end );
    } else {
      textarea.value = textarea.value.substring( 0, start ) + startBalise + endBalise + textarea.value.substring( start );
    }
  }

  // L'orsqu'on sur le boutton blog
  btn_blog.addEventListener( 'click', _ => {
    content.value += "<section>\n\n<h2> <span>1</span> <span>Title</span> </h2>\n<p> content </p>\n</section>\n\n\n";
  } );

  // L'orsqu'on clique sur le boutton blog
  btn_bold.addEventListener( 'click', _ => addBalise( content, "<b>", "</b>" ) );
  // L'orqu'on clique sur le boutton italic
  btn_italic.addEventListener( 'click', _ => addBalise( content, "<i>", "</i>" ) );
  // L'orqu'on clique sur le boutton link
  btn_link.addEventListener( 'click', _ => addBalise( content, "<a href=''>", "</a>" ) );
  // L'orqu'on clique sur le boutton h2
  btn_h2.addEventListener( 'click', _ => addBalise( content, "<h2><span>", "<span></h2>\n" ) );
  // L'orqu'on clique sur le boutton h3
  btn_h3.addEventListener( 'click', _ => addBalise( content, "<h3>", "</h3>\n" ) );
  // L'orqu'on clique sur le boutton span
  btn_span.addEventListener( 'click', _ => addBalise( content, "<span>", "</span>" ) );
  // L'orqu'on clique sur le boutton paragraphe
  btn_paragraph.addEventListener( 'click', _ => addBalise( content, "<p>", "</p>\n" ) );
  // L'orqu'on clique sur le boutton citation
  btn_citation.addEventListener( 'click', _ => addBalise( content, "<blockquote cite=''>", "</blockquote>" ) );
  // L'orqu'on clique sur le boutton code
  btn_code.addEventListener( 'click', _ => addBalise( content, "<pre><code class='code-php'>\n\n", "</code></pre>" ) );
  // L'orqu'on clique sur le boutton liste non ordonee
  btn_ul.addEventListener( 'click', _ => addBalise( content, "<ul>\n <li>", "</li>\n</ul>\n" ) );
  // L'orqu'on clique sur le boutton liste ordonnee
  btn_ol.addEventListener( 'click', _ => addBalise( content, "<ol>\n <li>", "</li>\n</ol>\n" ) );

  // L'orqu'on clique sur le boutton img il affiche une fenetre pour ajouter une image
  btn_img.addEventListener( 'click', _ => bx_addImg.classList.add( 'enable' ) );
  // Ferme la fenetre si on clique ailleur
  bx_addImg.addEventListener( 'click', _ => bx_addImg.classList.remove( 'enable' ), true );
  // Garde toujour ouvert la fenetre si on click dessus
  container_addImg.addEventListener( 'click', _ => bx_addImg.classList.add( 'enable' ), true );

  input_file.addEventListener( 'change', _ => {
    // Recupere et affiche l'image uploader
    img.src = URL.createObjectURL( input_file.files[0] );
    img.style.width = "100%";
    img.style.height = "100%";
  } );

  // L'orsqu'on clique sur le boutton uploads
  button_uploads.addEventListener( 'click', ( e ) => { 
    e.preventDefault();
    let form_data = new FormData( form_uploads );
    let title = input_title.value;
    let file = input_file.value;

    // Dossier temporelle 
    var dir = '$temp';

    // Si l'id exsite ca veut dire l'article a ete creer
    if( form_uploads.dataset.id !== '' ) {
      dir = form_uploads.dataset.id;
      // J'envoie le nom du dossier
      form_data.append( 'dir', dir );
    }

    // Si les champs sont remplit
    if ( title !== '' && file !== '' ) {
      // Envoie les donne du formulaire
      var xhr = new XMLHttpRequest();
      xhr.open( 'POST', '/admin/ajax' );
      xhr.send( form_data );

      xhr.onreadystatechange = function() {
        if ( xhr.readyState == xhr.DONE && xhr.status == 200 ) {
          const cursor = content.selectionStart;
          // Cette requete renvoie le nom du fichier avec son extension
          content.value = content.value.substring( 0, cursor ) + "<div class='box-img'><img src='/uploads/articles/" + dir + "/" + xhr.responseText + "' alt='"+ title +"' title='"+ title +"'></div>\n"+ content.value.substring( cursor );

          img.src = '';
          input_file.value = '';
          input_title.value = '';
          bx_addImg.classList.remove( 'enable' );
        }
      }
    }
  } );
} )();


/**
 * Formulaire
 */
( function() {

  const category = document.querySelector( '#category' ),
        tags_option = document.querySelector( '#tags' ),
        input_file = document.querySelector( '#img_intro' ),
        img = document.querySelector( '#form .imgbx img' );

  // je verifie si l'input file existe
  if( input_file ) {
    input_file.addEventListener( 'change', _ => {
      // J'affiche l'image uploader dans le formulaire
      img.src = URL.createObjectURL( input_file.files[ 0 ] );
      img.style.width = "480px";
      img.style.height = "320px";

    } );
  }

  // je verifie si category existe pour ne pas afficher les message d'erreur
  if ( category ) {
    // L'orqsu'on selectionne une categorie, on affiche ces tags
    category.addEventListener( 'change', _ => {
      xhr = new XMLHttpRequest();
      xhr.open( 'POST', '/admin/ajax' );
      xhr.setRequestHeader( "Content-Type", "application/x-www-form-urlencoded" );
      xhr.send( 'category=' + category.value );
  
      xhr.onreadystatechange = function() {
        if ( xhr.readyState == xhr.DONE && xhr.status == 200 ) {
          // Si il ya une reponse
          if (  xhr.responseText ) {
            // Converti la reponse en Object
            tags = JSON.parse( xhr.responseText );
            tags_option.innerHTML = "<option value='' hidden>Select tags</option>";
            // Un Object contient un Object, donc je parcour
            for( i = 0; i < tags.length; i++ ) {
              tags_option.innerHTML += "<option value='" + JSON.parse( tags[ i ] )[ 'id' ] + "'>" + JSON.parse( tags[ i ] )[ 'name' ] +"</option>";
            }
          }
        }
      }
    });

    // Si l'id du tags existe
    if ( tags_option.dataset.tags ) {
      // j'envoie les donne l'orsque la page charge
      window.addEventListener( 'load', _ => {
        xhr = new XMLHttpRequest();
        xhr.open( 'POST', '/admin/ajax' );
        xhr.setRequestHeader( "Content-Type", "application/x-www-form-urlencoded" );
        xhr.send( 'category=' + category.value );
  
        xhr.onreadystatechange = function() {
          if ( xhr.readyState == xhr.DONE && xhr.status == 200 ) {
            // Si il ya une reponse
            if (  xhr.responseText ) {
              // Converti la reponse en Object
              tags = JSON.parse( xhr.responseText );
              // Un Object contient un Object, donc je parcour
              for( i = 0; i < tags.length; i++ ) {
                // Si l'id du tags est egal avec l'id du tags recu, je selected
                if ( tags_option.dataset.tags === JSON.parse( tags[ i ] )[ 'id' ] ) {
                  tags_option.innerHTML += "<option value='" + JSON.parse( tags[ i ] )[ 'id' ] + "' selected>" + JSON.parse( tags[ i ] )[ 'name' ] +"</option>";
                } else {
                  tags_option.innerHTML += "<option value='" + JSON.parse( tags[ i ] )[ 'id' ] + "'>" + JSON.parse( tags[ i ] )[ 'name' ] +"</option>";
                }
              }
            }
          }
        }
      } );
    }
  }
} )();

