<?php

/**
 * Cette classe gere les donnees du site
 * 
 * @author Duval Nzouekeu <nzouekeuduval@gmail.com>
 * 
 */

namespace Core\models;
use Core\src\Model;

class BlotutoTo extends Model
{
  public function __construct()
  {
    $this->table = "article";
    $this->language = $_SESSION[ 'language' ];
  }

}

