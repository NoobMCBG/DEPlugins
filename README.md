<div align="center">
<h1>FakeDEPlugins | v1.0.0<h1>
</div>
<p align="center">
✔️ Fake deactivate and activate a plugin with just one in-game command ✔️
</p>

<br>

## Features
- Fake deactivate and activate a plugin with just one in-game command
- Fake disable plugins

<br>
  
## Commands
| **Commands** | **Description** |
| --- | --- |
| **/disableplugin** | **Command fake disable plugins** |
| **/enableplugin** | **Command unfake disable plugins** |
  
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
| **deplugins.enable** | **Permissions use command unfake disable plugins** | **op** |
| **deplugins.disable** | **Permissions use command fake disable plugins** | **op** |

<br>

## Install
- Step 1: Click the "Direct Download" button to download the plugin
- Step 2: move the file "KillDeathSound.phar" into the file "plugins"
- Step 3: Restart server for plugins to work
