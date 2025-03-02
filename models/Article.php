<?php

/**
 * ==================================
 * Cette classe gere la table article
 * ==================================
 * @author Duval Nzouekeu <nzouekeuduval@gmail.com>
 * 
 */

namespace Core\models;

use Core\src\Model;

class Article extends Model
{  
  /**
   * table_join
   *
   * @var string
   */
  private $table_join = "traduction";

  /**
   * __construct
   *
   * @return void
   */
  public function __construct()
  {
    $this->table = "article";
    $this->language = $_SESSION[ 'language' ];
  }
  
  /**
   * Renvoie autmatique le slug d'un id
   *
   * @param int $limit nbre d'article a recupere
   * @return
   */
  public function randomSlug( int $limit = 1 )
  {
    $sql = "SELECT slug 
    FROM traduction 
    INNER JOIN article 
    ON id_article = article.id 
    WHERE lang_code = \"{$this->language}\" 
    AND is_published = 1 
    ORDER BY RAND() LIMIT {$limit} ";
    return $this->request( $sql )->fetch();
  }

  /**
   * Recupere tous les articles
   *
   * @param string $lang la langue de la traduction de l'article
   * @return array
   */
  public function findAllPost( string $lang = null ):array
  {
    // Si lang n'existe pas j'utilise la langue de la page
    $lang ??= $this->language;

    $sql = "SELECT tab.id, title, slug, color, ct.name, tab.views, is_published, first_name prenom, author.name nom, tt.name tags, DAY(tab.date_create) jour, MONTH(tab.date_create) mois, YEAR(tab.date_create) annee
    FROM {$this->table_join}, category c, category_traduction ct, $this->table tab, author, tags, tags_traduction tt
    WHERE traduction.id_article = tab.id
    AND traduction.lang_code = \"{$lang}\"
    AND id_author = author.id

    AND tab.id_category = c.id
    AND ct.id_category = c.id
    AND ct.lang_code = \"{$lang}\"
    
    AND tab.id_tags = tags.id
    AND tt.id_tags = tags.id
    AND tt.lang_code = \"{$lang}\"
    
    ORDER BY tab.date_create DESC";

    return $this->request( $sql )->fetchAll();
  }
  
  /**
   * Recupere toute les traduction de l'article
   *
   * @param  int $id l'id de l'article
   * @return array
   */
  public function findAllLangPost( string $id = null ):array
  {
    // Si l'id existe de je recupere les traduction de l'id
    if ( $id )
      $sql = "SELECT * FROM {$this->table_join} WHERE traduction.id_article = \"$id\"";
    // Sinon je recupere toutes les langues
    else
      $sql = "SELECT * FROM {$this->table_join}";

    return $this->request( $sql )->fetchAll();
  }

  /**
   * Recupere un article par son id et sa traduction
   *
   * @param  string $id l'id de l'article
   * @param  string $lang la langue de traduction de l'article
   * @return object
   */
  public function findById( string $id, string $lang = null ):object
  {
    // Si la lang n'existe pas j'utilise la langue de la page
    $lang ??= $this->language;

    $sql = "SELECT tab.id, img, id_category, id_tags, id_author, lang_code, title, slug, description, intro, content
    FROM {$this->table} tab
    INNER JOIN {$this->table_join}
    ON tab.id = id_article
    WHERE tab.id = \"{$id}\"
    AND lang_code = \"{$lang}\"";

    return $this->request( $sql )->fetch();
  }

  /**
   * Recupere les articles d'une meme category
   *
   * @param  int $id_category nom de la category
   * @return array
   */
  public function findByCategory( int $id_category, int $limit = null ):array
  {
    $sql = "SELECT tab.id, img, title, slug, color, ct.name, tt.name tags
    FROM {$this->table_join}, category c, category_traduction ct, $this->table tab, tags, tags_traduction tt
    WHERE traduction.id_article = tab.id
    AND tab.id_category = \"{$id_category}\"
    AND {$this->table_join}.lang_code = \"{$this->language}\"

    AND c.id = \"{$id_category}\"
    AND ct.id_category = \"{$id_category}\"
    AND ct.lang_code = \"{$this->language}\"

    AND tab.id_tags = tags.id
    AND tt.id_tags = tags.id
    AND tt.lang_code = \"{$this->language}\"

    AND is_published = 1";
    
    if ( $limit ) " ORDER BY tab.date_create DESC";

    if ( $limit ) $sql .= " ORDER BY RAND() LIMIT 0, {$limit}";

    return $this->request( $sql )->fetchAll();
  }

  /**
   * Recupere les articles d'un meme tags d'une category
   *
   * @param  int $id_category id de la category
   * @param  int $id_tags id du tags
   * @return array
   */
  public function findByTags( int $id_category, int $id_tags ):array
  {
    $sql = "SELECT tab.id, img, title, slug, color, ct.name, tt.name tags
    FROM {$this->table_join}, category c, category_traduction ct, $this->table tab, tags, tags_traduction tt
    WHERE traduction.id_article = tab.id
    AND tab.id_tags = \"{$id_tags}\"
    AND tab.id_category = \"{$id_category}\"
    AND {$this->table_join}.lang_code = \"{$this->language}\"

    AND c.id = \"{$id_category}\"
    AND ct.id_category = \"{$id_category}\"
    AND ct.lang_code = \"{$this->language}\"

    AND tags.id = \"{$id_tags}\"
    AND tt.id_tags = \"{$id_tags}\"
    AND tt.lang_code = \"{$this->language}\"

    AND is_published = 1
    ORDER BY tab.date_create DESC";

    return $this->request( $sql )->fetchAll();
  }

  /**
   * Recupere tous les articles
   *
   * @param array $worts se son les mots extrait du titre
   * @param string $by choisi entre ascendant ou descendant
   * @param string $title le titre a recherher
   * @return array
   */
  public function findByTitle( array $worts = [], string $by = "ASC", string $title = null ):array
  {
    $listeWort = '';
    $orderBy = '';
    foreach( $worts as $wort ) {
      $listeWort .= "title LIKE '%{$wort}%' OR ";
      $orderBy .= " INSTR( title, '{$wort}'), ";
    }
    $listeWort = substr( $listeWort, 0, -3 );
    $orderBy = substr( $orderBy, 0, -2 );

    $sql = "SELECT tab.id, tab.img, title, color, ct.name, tab.views, slug, tt.name tags, tab.date_update
    FROM {$this->table_join}, category c, category_traduction ct, $this->table tab, author, tags, tags_traduction tt ";

    if ( $title ) {
      $sql .= "WHERE title LIKE \"%{$title}%\"";
    } else {
      $sql .= "WHERE ({$listeWort}) ";
    }

    $sql .= "AND traduction.id_article = tab.id
    AND traduction.lang_code = \"{$this->language}\"
    AND id_author = author.id

    AND tab.id_category = c.id
    AND ct.id_category = c.id
    AND ct.lang_code = \"{$this->language}\"
    
    AND tab.id_tags = tags.id
    AND tt.id_tags = tags.id
    AND tt.lang_code = \"{$this->language}\" ";
    
    if ( $by === "RAND" ) {
      $sql .= "ORDER BY {$by}()";
    } else if ( $by == "INSTR") {
      $sql .= "ORDER BY {$orderBy} DESC";
    } else {
      $sql .= "ORDER BY title {$by}";
    }

    $sql .= " LIMIT 0, 15";

    return $this->request( $sql )->fetchAll();
  }

  /**
   * Recupere les article recenment publier
   *
   * @param int $limit de nombre de post a recuperer
   * @return array
   */
  public function findRecentPost( int $start = 0, int $end = 6 ):array
  {
    $sql = "SELECT tab.id, img, title, slug, color, ct.name
    FROM {$this->table_join}, category c, category_traduction ct, $this->table tab
    WHERE traduction.id_article = tab.id
    AND traduction.lang_code = \"{$this->language}\"

    AND tab.id_category = c.id
    AND ct.id_category = c.id
    AND ct.lang_code = \"{$this->language}\"

    AND is_published = 1
    ORDER BY tab.date_create DESC
    LIMIT {$start}, {$end}";

    return $this->request( $sql )->fetchAll();
  }
    
  /**
   * Recupere les articles les plus vue
   *
   * @param  mixed $limit limit des nbre a recuperer
   * @return array
   */
  public function findPopularPost( int $limit = 6 ):array
  {
    $sql = "SELECT tab.id, img, title, slug, color, ct.name
    FROM {$this->table_join}, category c, category_traduction ct, $this->table tab
    WHERE traduction.id_article = tab.id
    AND traduction.lang_code = \"{$this->language}\"

    AND tab.id_category = c.id
    AND ct.id_category = c.id
    AND ct.lang_code = \"{$this->language}\"

    AND is_published = 1
    ORDER BY tab.views DESC
    LIMIT 0, {$limit}";

    return $this->request( $sql )->fetchAll();
  }
    
  /**
   * 
   *
   * @param  mixed $limit limit des nbre a recuperer
   * @return array
   */
  public function randomPost( int $limit = 6 ):array
  {
    $sql = "SELECT tab.id, tab.img, title, slug, color, ct.name, author.img img_author, author.name author_name, first_name, autra.description author_description
    FROM {$this->table_join}, category c, category_traduction ct, $this->table tab, author, author_traduction autra
    WHERE traduction.id_article = tab.id
    AND traduction.lang_code = \"{$this->language}\"

    AND tab.id_category = c.id
    AND ct.id_category = c.id
    AND ct.lang_code = \"{$this->language}\"

    AND tab.id_author = author.id
    AND autra.id_author = author.id
    AND autra.lang_code = \"{$this->language}\"

    AND is_published = 1
    ORDER BY RAND()
    LIMIT 0, {$limit}";

    return $this->request( $sql )->fetchAll();
  }
  
  /**
   * Recupere l'id du slug
   *
   * @param  string $slug slug de l'article
   * @return object
   */
  public function findIdSlug( $slug )
  {
    $sql = "SELECT tab.id FROM {$this->table} tab
    INNER JOIN {$this->table_join}
    ON tab.id = id_article 
    WHERE slug = \"{$slug}\"";

    return $this->request( $sql )->fetch();
  }
  
  /**
   * Trouve toutes les traduction du slug grace a l'id
   *
   * @param  int $id l'id de l'articles
   * @return array
   */
  public function findSlugById( string $id ):array
  {
    return $this->request( "SELECT slug, lang_code FROM {$this->table_join} WHERE id_article=\"{$id}\" " )->fetchAll();
  }
  
  /**
   * Recupere tout un article grace a son slug
   *
   * @param  string $slug
   * @return
   */
  public function findBySlug( $slug )
  {
    $sql = "SELECT tab.id, tab.img, tab.views, title, ct.name category, color, intro, traduction.description, content, slug, tt.name tags, author.img img_author, author.name, first_name, autra.description author_description, info, tab.date_update date, DAY( tab.date_update) as jour, MONTH(tab.date_update) as mois, YEAR(tab.date_update) as annee
    FROM {$this->table_join}, category, category_traduction ct, $this->table tab, author, author_traduction autra, tags, tags_traduction tt
    WHERE slug = \"$slug\"

    AND ct.id_category = category.id
    AND ct.lang_code = \"{$this->language}\"

    AND tab.id = id_article
    AND tab.id_category = category.id
    AND tab.id_author = author.id

    AND tab.id_tags = tags.id
    AND tt.id_tags = tags.id
    AND tt.lang_code = \"{$this->language}\"

    AND autra.id_author = author.id
    AND autra.lang_code = \"{$this->language}\"

    AND traduction.lang_code = \"$this->language\"

    AND is_published = 1 ";

    return $this->request( $sql )->fetch();
  }
  
  /**
   * Cree un articles dans la bd
   *
   * @param  int $category
   * @param  int $tags
   * @param  int $author
   * @param  string $lang la langue de l'artice
   * @param  string $title
   * @param  string $slug
   * @param  string $description
   * @param  string $intro
   * @param  string $content
   * @return void
   */
  public function add ( string $id, string $img, int $category, int $tags, int $author, string $lang, string $title, string $slug, string $description, string $intro, string $content ):void
  {
    $sql1 = "INSERT INTO {$this->table} VALUES( \"$id\", \"$img\", \"$category\", \"$tags\", \"$author\", 0, NOW(), NOW(), 0 )";
    $this->request( $sql1 );

    $sql2 = "INSERT INTO {$this->table_join} VALUES( NULL, \"$id\", \"$lang\", \"$title\", \"$slug\", \"$description\", \"$intro\", \"$content\" )";
    $this->request( $sql2 );
  }

  /**
   * Cree une traduction a un article
   * 
   * @param  string $id l'id de l'article
   * @param  string $lang la langue de l'article
   * @param  string $title
   * @param  string $slug
   * @param  string $description
   * @param  string $intro
   * @param  string $content
   * @return void
   */
  public function addLangPost ( string $id, string $lang, string $title, string $slug, string $description, string $intro, string $content ):void
  {
    $sql = "INSERT INTO {$this->table_join} 
    VALUES ( NULL, \"{$id}\", \"$lang\", \"$title\", \"$slug\", \"$description\", \"$intro\", \"$content\" )";
    $this->request( $sql );
  }

  /**
   * Modifie un articles
   *
   * @param  int $id l'id de l'article a modifie
   * @param  int $category
   * @param  int $tags
   * @param  int $author
   * @param  string $lang
   * @param  string $title
   * @param  string $slug
   * @param  string $description
   * @param  string $intro
   * @param  string $content
   * @return void
   */
  public function updatePost ( string $id, int $category, int $tags, int $author, string $lang, string $title, string $slug, string $description, string $intro, string $content ):void
  {
    $sql1 = "UPDATE {$this->table} 
    SET id_category = \"{$category}\", id_tags = \"{$tags}\", id_author = \"{$author}\", date_update = NOW()
    WHERE id = \"$id\"";
    $this->request( $sql1 );

    $sql2 = "UPDATE {$this->table_join} 
    SET lang_code = \"{$lang}\", title = \"{$title}\", slug = \"{$slug}\", description = \"{$description}\", intro = \"{$intro}\", content = \"{$content}\"
    WHERE id_article = \"$id\"
    AND lang_code = \"fr\"";
    $this->request( $sql2 );
  }

  /**
   * Modifie une image d'un article
   *
   * @param  int $id
   * @param  string $img
   * @return void
   */
  public function updateImgPost ( string $id, string $img):void
  {
    $sql = "UPDATE {$this->table} SET img = \"$img\" WHERE id = \"$id\"";
    $this->request( $sql );
  }
  
  /**
   * Modifie une traduction d'un article
   *
   * @param  int $id
   * @param  string $lang_article la langue a modife
   * @param  string $lang la nouvelle langue
   * @param  string $title
   * @param  string $slug
   * @param  string $description
   * @param  string $intro
   * @param  string $content
   * @return void
   */
  public function updateLangPost ( string $id, string $lang_article, string $lang, string $title, string $slug, string $description, string $intro, string $content ):void
  {
    $sql2 = "UPDATE {$this->table_join} 
    SET lang_code = \"{$lang}\", title = \"{$title}\", slug = \"{$slug}\", description = \"{$description}\", intro = \"{$intro}\", content = \"{$content}\"
    WHERE id_article = \"$id\"
    AND lang_code = \"$lang_article\"";

    $this->request( $sql2 );
  }
  
  /**
   * Permet de publier un article
   *
   * @param  int $id l'id de l'article
   * @param  int $value la valeur 0 ou 1
   * @return void
   */
  public function post ( string $id, int $value ):void
  {
    $sql = "UPDATE {$this->table} SET is_published = \"{$value}\" WHERE id = \"{$id}\" ";
    $this->request( $sql );
  }
  
  /**
   * Supprime un article
   *
   * @param  int $id l'id de l'article
   * @return void
   */
  public function deletePost ( string $id ):void
  {
    $sql2 = "DELETE FROM {$this->table_join} WHERE id_article = \"{$id}\"";
    $this->request( $sql2 );

    $sql1 = "DELETE FROM {$this->table} WHERE id = \"{$id}\"";
    $this->request( $sql1 );
  }
  
  /**
   * Supprime une traduction d'un article
   *
   * @param  int $id
   * @param  string $lang langue a supprime
   * @return void
   */
  public function deleteLangPost ( string $id, string $lang ):void
  {
    $sql = "DELETE FROM {$this->table_join} 
    WHERE id_article = \"{$id}\"
    AND lang_code = \"{$lang}\"";
    $this->request( $sql );
  }
}
#La compasion c'est pas de la faiblesse

