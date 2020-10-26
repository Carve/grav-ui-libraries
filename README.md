# Ui Libraries Plugin

The **Ui Libraries** Plugin is for [Grav CMS](http://github.com/getgrav/grav). Gives you the ability to include any UI Library you might need (jQuery UI, UI Kit, etc)

## Installation

Installing the Ui Libraries plugin can be done in one of two ways. The GPM (Grav Package Manager) installation method enables you to quickly and easily install the plugin with a simple terminal command, while the manual method enables you to do so via a zip file.

### GPM Installation (Preferred)

The simplest way to install this plugin is via the [Grav Package Manager (GPM)](http://learn.getgrav.org/advanced/grav-gpm) through your system's terminal (also called the command line).  From the root of your Grav install type:

    bin/gpm install ui-libraries

This will install the Ui Libraries plugin into your `/user/plugins` directory within Grav. Its files can be found under `/your/site/grav/user/plugins/ui-libraries`.

### Manual Installation

To install this plugin, just download the zip version of this repository and unzip it under `/your/site/grav/user/plugins`. Then, rename the folder to `ui-libraries`. You can find these files on [GitHub](https://github.com/a-media/grav-plugin-ui-libraries) or via [GetGrav.org](http://getgrav.org/downloads/plugins#extras).

You should now have all the plugin files under

    /your/site/grav/user/plugins/ui-libraries
	
> NOTE: This plugin is a modular component for Grav which requires [Grav](http://github.com/getgrav/grav) and the [Error](https://github.com/getgrav/grav-plugin-error) and [Problems](https://github.com/getgrav/grav-plugin-problems) to operate.

## Configuration

Before configuring this plugin, you should copy the `user/plugins/ui-libraries/ui-libraries.yaml` to `user/config/plugins/ui-libraries.yaml` and only edit that copy.

Here is the default configuration and an explanation of available options:

```yaml
enabled: true
```

## Usage

1. Install and Enable UI Libraries plugin
2. Enter Grav Admin to select library or libraries to include


