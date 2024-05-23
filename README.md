BS-CMS (c) 2020 by Shane Zentz (https://www.shanezentz.com/)

BS-CMS
V-1.0.8

This will be the final version of bs-cms. The reason that this is the final version is that it is based on older technology and was just a learning project anyway. I did learn a lot of new stuff with this project, but I would change many things about it if I was starting over. For example, I should have used ajax for the admin area functions instead of loading all content at once and reloading the admin area on any changes. But, having said that, I did learn a lot of new things and overall I'm very happy with how this project turned out. This project may be one of the simplest flat-file cms' out there but I think it works very well (for smaller, static websites). It may or may not function in the future (after php and other upgrades). For example, recently Tiny Cloud (creators of tinyMCE) changed their policy and suddenly the wysiwyg editor in bs-cms simply stopped working. It turns out that if you want to use the open-source (free) version of tinyMCE you need to 'self-host' the scripts. That wasn't the case until recently. Anyway that issue was fixed in V-1.0.6. I can anticipate that there will be other issues in the future that may cause errors in bs-cms. For example, a future php update could cause fatal errors within bs-cms. Since bs-cms relies on relatively older technologies, and since I feel I have achieved any goals set out for this project, and because of time constraints, this will be the final version.

.Fixed problems with auto gallery script
.Added some basic theme editing functions
	- ability to edit theme files within admin area
	- ability to create new theme files (template, include, or css files)
.Other minor issues fixed 
.And other minor improvements


Thanks for checking out my project!
Shane Zentz

V-1-0-7 : is likely the final or penultimate relase of bs-cms. Everything should be functioning correctly now. I would like to add a few things if I have time, such as ability to edit theme files directly in cms and user permissions but not sure if I'll have time to work on this much. But either way it is fully functioning and works as I intended/needed it to.

V-1.0.6 : is mostly a maintenance build, mainly the previous version stopped working because of changes made by tinymce, so now tinymce will need to be 'self-hosted' instead of using the cloud version. This build also includes a couple of other minor updates/fixes.

Licensed:    MIT
Description: BS-CMS is a simple CMS (content management system) that is a flat-file based system. It uses JSON and XML files
             in place of an SQL database. This is the first version, and you should consider it a beta release. In other words
			       use it at your own risk and do not assume that it is fully correct or bug free or secure. However, feel free
			       to try it out, use it, find limitations and bugs. Also feel free to submit bugs and improvements through my 
			       github channel, . Enjoy!
			 
Limitations: BS-CMS was designed to be a bare-bones, simple CMS, and as such does have it's limitations, as almost any
             software does. Here is a list of some (but not all) obvious limitations:
			      . It does not have user permissions, and as such all users are 'master' or 'god mode' users that have all
			        permissions. I hope to fix this in later releases.
			      . It may contain security flaws that could be exploitable. Use at your own risk.
			      . At present there is no ability for plugins (called add ons here), this will possibly be added at a later
			        release.
			      . It may contain bugs or other flaws. This is my first attempt at a simple, flat-file CMS and as such it may
			        not be correct or 'the way it should be', but at a simple level it does work.
			      . At present it only contains the Tiny MCE editor, which is fine, however I will attempt to add other editors in
			        future releases. Most likely where the end user will have a choice between different editors.


BS-CMS uses the following components:

Bootstrap 4
Licensed: MIT
URL: https://getbootstrap.com/

Lightbox 2
Licensed: MIT
Author: Lokesh Dhakar
URL: https://lokeshdhakar.com/projects/lightbox2/

Tiny MCE
Licensed: GNU Lesser General Public License (LGPL)
URL: https://www.tiny.cloud/

jQuery
Licensed: MIT - https://jquery.org/license/
URL: https://jquery.org/

Nestable jQuery plugin
Licensed: Dual-licensed under the BSD or MIT licenses
URL: https://dbushell.com/Nestable/  and  https://github.com/dbushell/Nestable

PHP Simple Router Class (CHRISTOPH STITZ)
Licensed: MIT
URL: https://steampixel.de/en/simple-and-elegant-url-routing-with-php/, https://steampixel.de/en/author/christoph/, https://github.com/steampixel/simplePHPRouter/tree/master
