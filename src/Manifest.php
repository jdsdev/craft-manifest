<?php
/**
 * Craft Manifest
 *
 * @author    mister bk! GmbH
 * @copyright Copyright (c) 2017-2018 mister bk! GmbH
 * @link      https://www.mister-bk.de/
 */

namespace jdsdev\manifest;

use Craft;
use craft\base\Plugin;
use craft\web\twig\variables\CraftVariable;
use jdsdev\manifest\models\Settings;
use jdsdev\manifest\twigextensions\ManifestTwigExtension;
use jdsdev\manifest\variables\ManifestVariable;
use yii\base\Event;

class Manifest extends Plugin
{
    /**
     * @var Manifest
     */
    public static $plugin;


    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        self::$plugin = $this;

        // Add in our Twig extension
        Craft::$app->getView()->registerTwigExtension(new ManifestTwigExtension());

        Event::on(
            CraftVariable::class,
            CraftVariable::EVENT_INIT,
            function (Event $event) {
                /** @var CraftVariable $variable */
                $variable = $event->sender;
                $variable->set('manifest', ManifestVariable::class);
            }
        );
    }

    /**
     * @inheritdoc
     */
    protected function createSettingsModel()
    {
        return new Settings();
    }

    /**
     * @inheritdoc
     */
    protected function settingsHtml(): string
    {
        return Craft::$app->getView()->renderTemplate(
            'manifest/settings',
            ['settings' => $this->getSettings()]
        );
    }
}
