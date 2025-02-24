<?php

/**
 * ===================================
 * Cette classe gere la table collection
 * ===================================
 * @author Duval Tetsol <nzouekeuduval@gmail.com>
 * 
 */

namespace Core\models;

use Core\src\Model;

class Collection extends Model
{
  protected $id_user;
  protected $id_article;

  public function __construct()
  {
    $this->table = 'collection';
  }

  public function findCollection( int $id_user ):array
  {
    $sql = "SELECT tab.id collId, article.id, img, title, slug, color, ct.name
    FROM article, category c, category_traduction ct, $this->table tab, traduction
    WHERE traduction.id_article = tab.id_article
    AND traduction.lang_code = \"{$_SESSION[ 'language' ]}\"

    AND article.id_category = c.id
    AND ct.id_category = c.id
    AND ct.lang_code = \"{$_SESSION[ 'language' ]}\"

    AND tab.id_user = \"{$id_user}\"
    AND tab.id_article = article.id

    AND is_published = 1
    ORDER BY date_add DESC";

    return $this->request( $sql )->fetchAll();
  }

  public function verifyCollection( string $id_article, $id_user )
  {
    return $this->request( "SELECT * FROM {$this->table} WHERE id_article = ? AND id_user = ?", [ $id_article, $id_user ] )->fetch();
  }

  public function deleteCollection():object
  {
    return $this->request( "DELETE FROM {$this->table} WHERE id_article = ? AND id_user = ?", [ $this->id_article, $this->id_user ] );
  }

  public function setId_user( $id )
  {
    $this->id_user = $id;
    return $this;
  }

  public function setId_article( $id )
  {
    $this->id_article = $id;
    return $this;
  }

}

