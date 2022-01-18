<div align="center">
<h1>DEPlugins | v1.0.0<h1>
</div>
<p align="center">
✔️ Fake deactivate and activate a plugin with just one in-game command ✔️
</p>

<br>

## Features
- Deactivate and activate a plugin with just one in-game command

<br>
  
## Commands
| **Commands** | **Description** |
| --- | --- |
| **/disableplugin** | **Command disable plugins** |
| **/enableplugin** | **Command enable plugins** |
  
<br>

## Config
```
---
# Prefix Plugins
prefix: "§e[DEPlugins]"

# Use & to charge a colored
# Use {prefix} to get the prefix
# Use {plugin} to see if the plugin has just been enabled or disabled

# Message Enable Plugins Successfully
msg-enable-successfully: "{prefix}§a successfully enabled plugin {plugin}"
# Message Enable Plugins Fallied
msg-enable-fallied: "{prefix}§c fallied enabled plugin {plugin}"

# Message Disable Plugins Successfully
msg-disable-successfully: "{prefix}§a successfully disabled plugin {plugin}"
# Message Disable Plugins Fallied
msg-disable-fallied: "{prefix}§c fallied disabled plugin {plugin}"
...
```

<br>
  
## Permissions
| **Permission** | **Description** | **Default** |
| --- | --- | --- |
| **`deplugins.enable`** | **Permissions use command enable plugins** | **op** |
| **`deplugins.disable`** | **Permissions use command disable plugins** | **op** |

<br>

## For Developer
- You can access to FakeDEPugins by using `FakeDEPlugins::getInstance()`
- Disable Usage:
```php
$plugin = FakeDEPlugins::getInstance()->getPluginByName("Plugin");
FakeDEPlugins::getInstance()->setDisablePlugin($plugin);
```
- Enable Usage:
```php
$plugin = FakeDEPlugins::getInstance()->getPluginByName("Plugin");
FakeDEPlugins::getInstance()->setEnablePlugin($plugin);
```

<br>

## Install
- Step 1: Click the "Direct Download" button to download the plugin
- Step 2: move the file "FakeDEPlugins.phar" into the file "plugins"
- Step 3: Restart server for plugins to work
