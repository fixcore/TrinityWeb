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
            $character = Characters::find()->where(['name' => $this->name])->with(['relationStats', 'relationGuild.relationGuild'])->one();
            $data['name'] = $this->name;
            $data['title'] = CharacterData::EMPTY_DATA;
            $data['guild'] = $character->relationGuild ? $character->relationGuild->relationGuild->name : CharacterData::EMPTY_DATA;
            $data['stats']['maxhealth'] = $character->relationStats ? $character->relationStats->maxhealth : 0;
            $data['stats']['maxpower'] = Yii::$app->AppHelper->getCharacterPowerByClass($character->class);
            $data['stats']['strength'] = $character->relationStats ? $character->relationStats->strength : 0;
            $data['stats']['agility'] = $character->relationStats ? $character->relationStats->agility : 0;
            $data['stats']['stamina'] = $character->relationStats ? $character->relationStats->stamina : 0;
            $data['stats']['intellect'] = $character->relationStats ? $character->relationStats->intellect : 0;
            $data['stats']['spirit'] = $character->relationStats ? $character->relationStats->spirit : 0;
            $data['stats']['armor'] = $character->relationStats ? $character->relationStats->armor : 0;
            $data['stats']['expertiseBaseAttackPct'] = $character->relationStats ? $character->relationStats->expertiseBaseAttackPct : 0;
            $data['stats']['attackPower'] = $character->relationStats ? $character->relationStats->attackPower : 0;
            $data['stats']['hitMelee'] = $character->relationStats ? $character->relationStats->hitMelee : 0;
            $data['stats']['critPct'] = $character->relationStats ? $character->relationStats->critPct : 0;
            $data['stats']['expertiseOffAttackPct'] = $character->relationStats ? $character->relationStats->expertiseOffAttackPct : 0;
            $data['stats']['rangedAttackPower'] = $character->relationStats ? $character->relationStats->rangedAttackPower : 0;
            $data['stats']['hitRanged'] = $character->relationStats ? $character->relationStats->hitRanged : 0;
            $data['stats']['rangedCritPct'] = $character->relationStats ? $character->relationStats->rangedCritPct : 0;
            $data['stats']['spellPower'] = $character->relationStats ? $character->relationStats->spellPower : 0;
            $data['stats']['hitSpell'] = $character->relationStats ? $character->relationStats->hitSpell : 0;
            $data['stats']['hasteSpell'] = $character->relationStats ? $character->relationStats->hasteSpell : 0;
            $data['stats']['dodgePct'] = $character->relationStats ? $character->relationStats->dodgePct : 0;
            $data['stats']['parryPct'] = $character->relationStats ? $character->relationStats->parryPct : 0;
            $data['stats']['blockPct'] = $character->relationStats ? $character->relationStats->blockPct : 0;
            $data['stats']['resilience'] = $character->relationStats ? $character->relationStats->resilience : 0;
            
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
