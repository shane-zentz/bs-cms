BS-CMS (c) 2020 by Shane Zentz (https://www.shanezentz.com/)

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
