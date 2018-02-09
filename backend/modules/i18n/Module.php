<?php

namespace backend\modules\i18n;

use Yii;

use backend\modules\i18n\models\I18nMessage;
use backend\modules\i18n\models\I18nSourceMessage;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'backend\modules\i18n\controllers';

    /**
     * @param \yii\i18n\MissingTranslationEvent $event
     */
    public static function missingTranslation($event)
    {
        //only for russian
        if($event->language == 'ru-RU') {

            $category = $event->category;
            $missing = $event->message;

            $existTranslate = I18nSourceMessage::find()->where(['message' => $missing, 'category' => $category])->one();
            if(!$existTranslate) {
                $newTranslateModel = new I18nSourceMessage();
                $newTranslateModel->category = $category;
                $newTranslateModel->message = $missing;
                $newTranslateModel->save();
                foreach(Yii::$app->params['availableLocales'] as $lang => $lang_text) {
                    $newTranslateMessage = new I18nMessage();
                    $newTranslateMessage->id = $newTranslateModel->id;
                    $newTranslateMessage->language = explode('-',$lang)[0];
                    if($lang == $event->language) {
                        $newTranslateMessage->translation = $missing;
                    }
                    $newTranslateMessage->save();
                }
            }
        }
    }

    public function init()
    {
        parent::init();
    }
}
