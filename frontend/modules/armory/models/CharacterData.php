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
 
    const EMPTY_DATA = '- - - -';
    
    private $name;
    
    public $talents = [];
    
    public function __construct($character) {
        
        $this->name = $character;
        
        $this->talents = [
            'name' => $character,
        ];
        
        return $this;
    }
    
    public function generateGeneral() {
        $data = $data['stats'] = Yii::$app->cache->get(Yii::$app->request->url);
        if($data === false) {
            $character = Characters::find()->where(['name' => $this->name])->with(['relationStats', 'relationGuild'])->one();
            $data['name'] = $this->name;
            $data['title'] = CharacterData::EMPTY_DATA;
            $data['guild'] = $character->relationGuild ? $character->relationGuild->name : CharacterData::EMPTY_DATA;
            $data['stats']['maxhealth'] = $character->relationStats->maxhealth;
            $data['stats']['maxpower'] = Yii::$app->AppHelper->getCharacterPowerByClass($character->class);
            $data['stats']['strength'] = $character->relationStats->strength;
            $data['stats']['agility'] = $character->relationStats->agility;
            $data['stats']['stamina'] = $character->relationStats->stamina;
            $data['stats']['intellect'] = $character->relationStats->intellect;
            $data['stats']['spirit'] = $character->relationStats->spirit;
            $data['stats']['armor'] = $character->relationStats->armor;
            $data['stats']['expertiseBaseAttackPct'] = $character->relationStats->expertiseBaseAttackPct;
            $data['stats']['attackPower'] = $character->relationStats->attackPower;
            $data['stats']['hitMelee'] = $character->relationStats->hitMelee;
            $data['stats']['critPct'] = $character->relationStats->critPct;
            $data['stats']['expertiseOffAttackPct'] = $character->relationStats->expertiseOffAttackPct;
            $data['stats']['rangedAttackPower'] = $character->relationStats->rangedAttackPower;
            $data['stats']['hitRanged'] = $character->relationStats->hitRanged;
            $data['stats']['rangedCritPct'] = $character->relationStats->rangedCritPct;
            $data['stats']['spellPower'] = $character->relationStats->spellPower;
            $data['stats']['hitSpell'] = $character->relationStats->hitSpell;
            $data['stats']['hasteSpell'] = $character->relationStats->hasteSpell;
            $data['stats']['dodgePct'] = $character->relationStats->dodgePct;
            $data['stats']['parryPct'] = $character->relationStats->parryPct;
            $data['stats']['blockPct'] = $character->relationStats->blockPct;
            $data['stats']['resilience'] = $character->relationStats->resilience;
            
            //todo
            $data['stats']['spellCrit'] = -1;
            $data['stats']['melee_damage_from'] = -1;
            $data['stats']['melee_damage_to'] = -1;
            $data['stats']['range_damage_from'] = -1;
            $data['stats']['range_damage_to'] = -1;
            $data['stats']['experience'] = -1;
            $data['stats']['spellHealing'] = -1;
            $data['stats']['mp5'] = -1;
            $data['stats']['defence'] = -1;
            
            
            $data['items'] = [];
            $_items = $character->relationEquipment;
            foreach(Yii::$app->AppHelper::$ARRAY_SLOTS as $slot) {
                $item = current($_items);
                if(isset($item)) {
                    if(is_object($item) && $slot == $item->slot) {
                        $data['items'][$slot] = [
                            'item_url' => Yii::$app->AppHelper->buildDBUrl($item->relationItemInstance->itemEntry, Yii::$app->AppHelper::$TYPE_ITEM),
                            //'icon_url' => Yii::$app->AppHelper->buildItemIconUrl($slot, $item->itemInstanceRelation->armoryItem->iconRelation->icon),
                            //'rel_item' => Yii::$app->CoreHelper->buildItemRel($item->itemInstanceRelation->itemEntry,explode(' ',$item->itemInstanceRelation->enchantments)),
                        ];
                    } else {
                        $data['items'][$slot] = [
                            'item_url' => '#self',
                            //'icon_url' => Yii::$app->CoreHelper->buildItemIconUrl($slot),
                            //'rel_item' => '',
                        ];
                    }
                }
                next($_items);
            }
            
            Yii::$app->cache->set(Yii::$app->request->url,$data,Yii::$app->params['cache_armory_character']);
        }
        return $data;
    }
    
    public function generateTalents() {
        $data = $data['stats'] = Yii::$app->cache->get(Yii::$app->request->url);
        if($data === false) {
            
            
            Yii::$app->cache->set(Yii::$app->request->url,$data,Yii::$app->params['cache_armory_character_talents']);
        }
        return $data;
    }
    
}
