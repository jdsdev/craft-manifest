<?php
/**
 * Craft Manifest
 *
 * @author    mister bk! GmbH
 * @copyright Copyright (c) 2017-2018 mister bk! GmbH
 * @link      https://www.mister-bk.de/
 */

namespace jdsdev\manifest\variables;

use jdsdev\manifest\Manifest;

class ManifestVariable
{
    /**
     * Find the files version.
     *
     * @param  string  $file
     * @return string
     */
    public function version($file)
    {
        return Manifest::$plugin->manifest->version($file);
    }

    /**
     * Returns the files version with the appropriate tag.
     *
     * @param  string  $file
     * @param  bool  $inline  (optional)
     * @return string
     */
    public function withTag($file, $inline = false)
    {
        return Manifest::$plugin->manifest->withTag($file, $inline);
    }
}
