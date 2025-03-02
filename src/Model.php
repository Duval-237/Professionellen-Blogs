<?php

/**
 * ===================================
 * Cette class est le Model principale
 * ===================================
 * @author Duval Nzouekeu <nzouekeuduval@gmail.com>
 * 
 */

namespace Core\src;

abstract class Model extends Database
{    
  /**
   * database
   *
   * @var object
   */
  private $database;  
  
  /**
   * Table
   *
   * @var string $table
   */
  protected string $table;

  /**
   * Language
   * 
   * @var string
   */
  public string $language;
    
  /**
   * Recupere le nombre de vue d'un article
   *
   * @param  int $id l'id de l'article
   * @return object
   */
  public function getView( string $id ):object
  {
    $sql = "SELECT views FROM {$this->table} WHERE id = \"$id\"";
    return $this->request( $sql )->fetch();
  }
  
  /**
   * Met a jour le nombre de vue
   *
   * @param  int $id l'id de l'article
   * @param  int $view le nouvelle vue
   * @return void
   */
  public function addView( string $id, int $view ):void
  {
    $sql = "UPDATE {$this->table} set views = $view WHERE id = \"$id\"";
    $this->request( $sql );
  }

  /**
   * Recupere une donnee grace a son id
   * 
   * @param  int $id
   * @return object
   */
  public function find( string $id ):object
  {
    return $this->request( "SELECT * FROM {$this->table} WHERE id = {$id}" )->fetch();
  }
  
  /**
   * Recupere tous les elements d'une table
   *
   * @return array
   */
  public function findAll():array
  {
    return $this->request( "SELECT * FROM {$this->table}" )->fetchAll();
  }
  
  /**
   * Recupere les donnnees en fonction des critere
   *
   * @param  array $critere le tableau de critere
   * @return array
   */
  public function findBy ( array $critere ):array
  {
    $keys = [];
    $values = [];

    foreach ( $critere as $key => $value ) {
      $keys[] = "$key = ?";
      $values[] = $value;
    }
    $liste_keys = implode( ' AND ', $keys );

    return $this->request( "SELECT * FROM {$this->table} WHERE {$liste_keys}", $values )->fetchAll();
  }
  
  /**
   * Ajoute un element dans la base de donnee
   *
   * @return object
   */
  public function create():object
  {
    $champs = [];
    $values = [];
    $marqueur = [];

    foreach ( $this as $champ => $value ) {
      if ( $value !== NULL && $champ !== 'table' && $champ !== 'database' ) {
        $champs[] = $champ;
        $values[] = $value;
        $marqueur[] = '?';
      }
    }
    $liste_champ = implode( ',', $champs );
    $liste_marqueur = implode( ',', $marqueur );

    return $this->request( "INSERT INTO {$this->table} ({$liste_champ}) VALUES({$liste_marqueur})", $values );  
  }
  
  /**
   * update
   *
   * @param  mixed $id
   * @return object
   */
  public function update( string $id ):object {
    $champs = [];
    $values = [];

    foreach( $this as $champ => $value ) {
      if ( $value !== NULL && $champ !== 'table' && $champ !== 'database' ) {
        $champs[] = "$champ = ?";
        $values[] = $value;
      }
    }
    $liste_champ = implode( ',', $champs );
    
    return $this->request( "UPDATE {$this->table} SET {$liste_champ} WHERE id = \"{$id}\"", $values );
  }
  
  /**
   * delete
   *
   * @param  int $id
   * @return object
   */
  public function delete( string $id ):object
  {
    return $this->request( "DELETE FROM {$this->table} WHERE id = {$id}" );
  }

  /**
   * cette fonction va execute automatique les requetes
   *
   * @param  string $sql contient la requete SQL
   * @param  array $attributs contient les valeurs des marqueur SQL
   * @return object
   */
  public function request( string $sql, array $attributs = NULL ):object
  {
    $this->database = Database::getInstance();

    if ( $attributs !== NULL ) {
      $query = $this->database->prepare( $sql );
      $query->execute( $attributs );
      return $query;
    } else
      return $this->database->query( $sql );
  }
  
  /**
   * Cette methode permet
   *
   * @param $donnee
   * @return self
   */
  public function hydrate( $donnee ):self
  {
    foreach ( $donnee as $donne => $value ) {
      $setter = "set" . ucfirst( $donne );
      
      if ( method_exists( $this, $setter ) ) {
        $this->$setter( $value );
      }
    }

    return $this;
  }
  
  /**
   * Cette function decode une donnee json en fonction de la langue du site
   *
   * @param $donnee 
   * @param  string $lang
   * @return void
   */
  public function decode( $donnee, string $lang ):void
  {
    $default = 'fr';
    
    if ( gettype( $donnee ) == 'object' ) {

      foreach ( $donnee as $keys => $data ) {
        if ( is_object( json_decode( $data ) ) )
          $donnee->$keys = json_decode( $data )->$lang ?? json_decode( $data )->$default;
      }
    } else if ( gettype( $donnee ) === 'array' ) {

      foreach ( $donnee as $keys ) {
        foreach ( $keys as $key => $value) {
          if ( is_object( json_decode( $value ) ) )
            $keys->$key = json_decode( $value )->$lang ?? json_decode( $value )->$default;
        }
      }
    }
  }

}

