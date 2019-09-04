# Webpack Manifest Plugin for Craft

Adapted from mister-bk/craft-plugin-mix for generic Webpack support.

Adds a set of twig filters to find files in _manifest.json_ (output by [webpack-manifest-plugin](https://www.npmjs.com/package/webpack-manifest-plugin)) when provided with the corresponding source file.

## Requirements

This plugin requires Craft CMS 3.0.0 or later.

## Installation

To install the plugin, follow these instructions.

1.  Open your terminal and go to your Craft project:

```bash
cd /path/to/project
```

2.  Then tell Composer to load the plugin:

```bash
composer require jdsdev/craft-manifest
```

3.  In the Craft Control Panel, go to Settings → Plugins and click the "Install" button for **Manifest**.

## Configuration

To configure Manifest go to Settings → Plugins → Manifest in the Craft Control Panel.

The available settings are:

- **Public Path** - The path of the public directory containing the index.php
- **Asset Path** - The path of the asset directory where Webpack stores the compiled files

## Usage

Find a versioned CSS file.

```twig
<link rel="stylesheet" href="{{ manifest('css/main.css') }}">
```

Find a versioned JavaScript file.

```twig
<script src="{{ manifest('js/main.js') }}"></script>
```

Lazily find a versioned file and build the tag based on the file extension.

```twig
{{ manifest('js/main.js', true) | raw }}
```

Alternatively include the content of a versioned file inline.

```twig
{{ manifest('css/main.css', true, true) | raw }}
```

## License

Craft Manifest is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT/).
