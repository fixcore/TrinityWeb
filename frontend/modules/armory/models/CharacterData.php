<?php

namespace frontend\modules\armory\models;

use Yii;
use yii\base\Model;

use common\models\chars\Characters;

/**
 * SearchForm
 */
class CharacterData extends Model
{
 
    public $data = [];
    public $talents = [];
    
    public function __construct($character) {
        //pre($this);
        
        $this->data = [
            'name' => $character,
        ];
        
        $this->talents = [
            'name' => $character,
        ];
        
        return $this;
    }
    
}
