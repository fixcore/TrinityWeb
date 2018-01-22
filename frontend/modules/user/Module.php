<?php

namespace frontend\modules\user;

use Yii;
use yii\filters\AccessControl;
use yii\base\BootstrapInterface;
use yii\web\GroupUrlRule;

class Module extends \yii\base\Module implements BootstrapInterface
{
    /**
     * @var string
     */
    public $controllerNamespace = 'frontend\modules\user\controllers';

    /**
     * @var bool Is users should be activated by email
     */
    public $shouldBeActivated = false;
    
    /**
     * @var string layout that be use
     */
    public $layout = 'main_full';
    
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $this->setAliases(['@userPanel' => __DIR__]);
        $this->registerTranslations();
    }
    
    public function bootstrap($app)
    {
        if ($app instanceof \yii\web\Application) {
            $this->addUrlManagerRules($app);
        }
    }
    
    public function registerTranslations()
    {
        Yii::$app->i18n->translations['cp'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => 'ru',
            'basePath' => '@userPanel/messages',
            'on missingTranslation' => ['\backend\modules\i18n\Module', 'missingTranslation']
        ];
    }
    
    protected function addUrlManagerRules($app)
    {
        $app->urlManager->addRules([new GroupUrlRule([
            'prefix' => $this->id,
            'rules' => require __DIR__ . '/url-rules.php',
        ])], true);
    }
    
}
