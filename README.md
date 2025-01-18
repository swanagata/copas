
# Copas Plugin

Copas is a WordPress plugin that adds a customizable "Copy to Clipboard" button, integrated with the Classic Editor. This plugin uses the clipboard.js library to enable users to easily copy specified content to their clipboard with a single click.

## Features

- Customizable copy button for the Classic Editor.
- Easily specify content to copy using shortcodes.
- Customize button text, success message, and CSS classes.

## Installation

1. **Upload Plugin files**

   Upload the `copas` folder to the `/wp-content/plugins/` directory.

2. **Activate the Plugin**

   Activate the plugin through the 'Plugins' menu in WordPress.

## Usage

To use the Copas plugin, insert the following shortcode into your post or page:

```plaintext
[copas content="Text to copy" buttontext="Copy" successmessage="Copied!" classtext="my-button-class"]
```

### Shortcode Parameters

- `content`: (string) Content to be copied to the clipboard. Default is an empty string.
- `buttontext`: (string) Text displayed on the button. Default is "Copy".
- `successmessage`: (string) Message displayed after successful copy. Default is "Copied!".
- `classtext`: (string) CSS class applied to the button. Default is "button".

## Changelog

### Version 1.0

- Initial release with basic copy-to-clipboard functionality.

## License

This plugin is licensed under the [GPL-3.0 License](https://www.gnu.org/licenses/gpl-3.0.html).

---

Feel free to modify the sections to better suit your needs or to add more information specific to your plugin.