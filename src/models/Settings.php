<?php
/**
 * Craft Manifest
 *
 * @author    mister bk! GmbH
 * @copyright Copyright (c) 2017-2018 mister bk! GmbH
 * @link      https://www.mister-bk.de/
 */

namespace jdsdev\manifest\models;

use craft\base\Model;

class Settings extends Model
{
    /**
     * Path to the public directory.
     *
     * @var string
     */
    public $publicPath = 'web';

    /**
     * Path to the asset directory.
     *
     * @var string
     */
    public $assetPath = '/';


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['publicPath', 'assetPath'], 'required'],
            [['publicPath', 'assetPath'], 'string'],
        ];
    }
}
