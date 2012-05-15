#SymReload

Automatically reloads/refreshes browser when files in workspace are modified.

##What's monitored

The current page, utilities folder, and linked assets (CSS, JavaScript, images etc.) are currently monitored.

**Note:** I want to see what the performance is like for real world Symphony websites before adding other files to monitor, such as events and data sources.

##Install

1. Upload the 'symreload' folder in this archive to your Symphony
   'extensions' folder.
2. Enable extension by selecting the "SymReload" item under Extensions, choose Enable
   from the with-selected menu, then click Apply.
3. Go to frontend page or refresh current frontend page to begin.

##Notes

- Disable XDebug and other debuggers in php.ini to reduce server `tmp` clutter.

##Uninstall

1. Uninstall extension by selecting the "SymReload" item under Extensions, choose Uninstall from the with-selected menu, then click Apply.