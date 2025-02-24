
const tags = [ ...document.querySelectorAll( '.menu-tags .item a.tags' ) ],
      traduction_category = document.querySelector( '#articles' ).dataset.category,
      category = document.querySelector( '#header' ).dataset.category, 
      container_articles = document.querySelector( '.container-articles' );


function activeLink() {
  tags.forEach( item => {
    item.classList.remove( 'enable' );
    this.classList.add( 'enable' );
  } );
}
// Color le tags selectionner
tags.forEach( item => item.addEventListener( 'click', activeLink ) );


tags.forEach( item => {
  item.addEventListener( 'click', ( e ) => {
    e.preventDefault();

    xhr = new XMLHttpRequest();

    xhr.open( 'POST', '/' + traduction_category + '/' + category, true );
    xhr.setRequestHeader( "Content-Type", "application/x-www-form-urlencoded" );

    // le boutton 'tout' a cote des tags ne renvoie rien
    item.dataset.tags !== "" ?
    window.history.pushState( {}, '', '/' + traduction_category + '/' + category + '/' + item.dataset.tags ):
    window.history.pushState( {}, '', '/' + traduction_category + '/' + category );

    xhr.send( 'tags=' + item.dataset.tags );

    xhr.onreadystatechange = function() {
      if ( xhr.readyState === xhr.DONE && xhr.status === 200 ) {
        articles = JSON.parse( xhr.responseText );

        container_articles.innerHTML = 'loading...';
        container_articles.innerHTML = '';

        articles.forEach( article => {

          container_articles.innerHTML += `
          <article class="article" style="--clr:${article[ 'color' ]}; --clr-transparent:${article[ 'color' ]}c2;">
          <a href="/${article[ 'slug' ]}" class="box-img">
            <img src="/uploads/articles/${article[ 'id' ]}/${article[ 'img' ]}" loading="lazy" alt="${article[ 'title' ]}">
          </a>
          <a href="/${traduction_category}/${category}/${article[ 'tags' ]}" class="categorie-article"><span>${article[ 'tags' ]}</span></a>
          <a href="/${article[ 'slug' ]}" class="box-title">
            <p>${article[ 'title' ]}</p>
          </a>
          </article>`;

        } );
      }
    }
  } );
} );

