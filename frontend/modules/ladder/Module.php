<?php

namespace frontend\modules\ladder;

use Yii;
use yii\filters\AccessControl;
use yii\base\BootstrapInterface;
use yii\web\GroupUrlRule;

class Module extends \yii\base\Module implements BootstrapInterface
{
    /**
     * @var string
     */
    public $controllerNamespace = 'frontend\modules\ladder\controllers';
    
    public $defaultRoute = 'main';
    
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $this->layout = '@frontend/views/layouts/main_full';
        $this->setAliases(['@ladder' => __DIR__]);
        $this->registerTranslations();
    }
    
    public function beforeAction($action) {
        parent::beforeAction($action);
        Yii::$app->params['breadcrumbs'][] = ['label' => Yii::t('ladder','Ладдер'),'url' => ['/ladder']];
        return $this;
    }
    
    public function bootstrap($app)
    {
        if ($app instanceof \yii\web\Application) {
            $this->addUrlManagerRules($app);
        }
    }
    
    public function registerTranslations()
    {
        Yii::$app->i18n->translations['ladder'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => 'ru',
            'basePath' => '@ladder/messages',
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
