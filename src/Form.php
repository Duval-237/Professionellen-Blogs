<?php

/**
 * =============================================
 * Cette class permet de generer les formulaires
 * =============================================
 * @author Duval Tetsol <nzouekeuduval@gmail.com>
 * 
 */

namespace Core\src;

class Form
{

  /**
   * Contient le code du formulaire
   * 
   * @var string
   */
  private string $formCode = '';
    
  /**
   * Permet de creer le formulaire
   *
   * @return string
   */
  public function create():string
  {
    return $this->formCode;
  }
  
  /**
   * Cette fonction permet de verifier les champs
   *
   * @param  array $form
   * @param  array $champs
   * @return bool
   */
  public static function validate( array $form, array $champs ):bool
  {
    foreach ( $champs as $champ ) {
      if ( !isset( $form[ $champ ] ) || empty( $form[ $champ ] ) ) {
        return false;
      }
    }
    return true;
  }
  
  /**
   * Permet d'ajouter les attributs dans une balise
   *
   * @param  array $attributs
   * @return string
   */
  private function addAttributs( array $attributs ):string
  {
    $str = "";

    $courts = [ 'required', 'autofocus', 'checked', 'desable', 'readonly' ];

    foreach ( $attributs as $attribut => $value ) {
      if ( in_array( $attribut, $courts ) && $value == true ) {
        $str .= "$attribut ";
      } else {
        $str .= "{$attribut} = '{$value}'";
      }
    }
    return $str;
  }
  
  /**
   * Cette function cree la balise <form>
   *
   * @param  string $methode contient la methode
   * @param  string $action contient la page qui va recevoir les donnees
   * @param  array $attributs contient les attributs
   * @return self
   */
  public function startForm(string $action = '', string $methode = 'POST', array $attributs = [] ):self
  {
    $this->formCode .= "<form method='{$methode}' action='{$action}'";
    $this->formCode .= $attributs ? $this->addAttributs( $attributs ) . '>' : '>';

    return $this;
  }
  
  /**
   * Cette fonction cree <div>
   *
   * @param  array $attributs
   * @return self
   */
  public function startDiv( array $attributs = [] ):self
  {
    $this->formCode .= "<div ";
    $this->formCode .= $attributs ? $this->addAttributs( $attributs ) . '>' : '>';

    return $this;
  }
  
  /**
   * Cette fonction cree un <input>
   *
   * @param  string $type
   * @param  string $name
   * @param  array $attributs
   * @return self
   */
  public function addInput( string $type, string $name, array $attributs = [] ):self
  {
    $this->formCode .= "<input type='{$type}' name='{$name}'";
    $this->formCode .= $attributs ? $this->addAttributs( $attributs ) . '>' : '>';
    
    return $this;
  }
  
  /**
   * Cette fonction cree un <label></label>
   *
   * @param  string $for
   * @param  string $text
   * @param  array $attributs
   * @return self
   */
  public function addLabel( string $for, string $text, array $attributs = [] ):self
  {
    $this->formCode .= "<label for='{$for}' ";
    $this->formCode .= $attributs ? $this->addAttributs( $attributs ) : '';
    $this->formCode .= ">{$text}</label>";
    
    return $this;
  }
  
  /**
   * Cette fonction cree un champ <textarea></textarea>
   *
   * @param  string $name
   * @param  string $text
   * @param  array $attributs
   * @return self
   */
  public function addTextarea( string $name, string $text, array $attributs = [] ):self
  {
    $this->formCode .= "<textarea name='{$name}' ";
    $this->formCode .= $attributs ? $this->addAttributs( $attributs ) : '';
    $this->formCode .= ">{$text}</textarea>";
    
    return $this;
  }
  
  /**
   * Cette fonction cree un <select></select> avec ses <option>
   *
   * @param  string $name
   * @param  array $options
   * @param  array $attributs
   * @return self
   */
  public function addSelect( string $name, array $options, array $attributs = [] ):self
  {
    $this->formCode .= "<select name='{$name}' ";
    $this->formCode .= $attributs ? $this->addAttributs( $attributs ) . '>' : '>';
    foreach ( $options as $value => $text ) {
      $this->formCode .= "<option value='{$value}'>{$text}</option>" ;
    }
    $this->formCode .= "</select>";
    
    return $this;
  }
  
  /**
   * Cette fonction ferme </div>
   *
   * @return self
   */
  public function endDiv( ):self
  {
    $this->formCode .= "</div>";

    return $this;
  }
  
  /**
   * Cette fonction ferme </form>
   *
   * @return void
   */
  public function endForm():void
  {
    $this->formCode .= '</form>';
  } 

}

