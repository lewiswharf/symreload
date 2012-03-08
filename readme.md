#SymReload

Automatically reloads/refreshes browser when files in workspace are modified.

- Version: 1.0
- Author: Mark Lewis <mark@casadelewis.com>
- Build Date: 08 March 2012
- Requirements: Symphony 2.2

##What's monitored

The current page, utilities folder, and linked assets (CSS, JavaScript, images etc.) are currently monitored.

**Note:** I want to see what the performance is like for real world Symphony websites before adding other files to monitor, such as events and data sources.

##Install

1. Upload the 'symreload' folder in this archive to your Symphony
   'extensions' folder.
2. Enable extension by selecting the "SymReload" item under Extensions, choose Enable
   from the with-selected menu, then click Apply.
3. Go to frontend page or refresh current frontend page to begin.

##Uninstall

1. Uninstall extension by selecting the "SymReload" item under Extensions, choose Uninstall from the with-selected menu, then click Apply.

##History

- 1.01 Fixed bug where __logVisit returned false incorrectly
- 1.0 Initial release