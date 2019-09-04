<?php
/**
 * Craft Manifest
 *
 * @author    mister bk! GmbH
 * @copyright Copyright (c) 2017-2018 mister bk! GmbH
 * @link      https://www.mister-bk.de/
 */

namespace jdsdev\manifest\twigextensions;

use jdsdev\manifest\Manifest;
use Twig_Extension;
use Twig_SimpleFilter;
use Twig_SimpleFunction;

class ManifestTwigExtension extends Twig_Extension
{
    /**
     * @inheritdoc
     */
    public function getName()
    {
        return 'manifest';
    }

    /**
     * @inheritdoc
     */
    public function getFilters()
    {
        return [
            new Twig_SimpleFilter('manifest', [$this, 'manifest']),
        ];
    }

    /**
     * @inheritdoc
     */
    public function getFunctions()
    {
        return [
            new Twig_SimpleFunction('manifest', [$this, 'manifest']),
        ];
    }

    /**
     * Returns versioned file or the entire tag.
     *
     * @param  string  $file
     * @param  bool  $tag  (optional)
     * @param  bool  $inline  (optional)
     * @return string
     */
    public function manifest($file, $tag = false, $inline = false)
    {
        if ($tag) {
            return Manifest::$plugin->manifest->withTag($file, $inline);
        }

        return Manifest::$plugin->manifest->version($file);
    }
}
