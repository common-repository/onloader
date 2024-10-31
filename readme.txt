=== OnLoad'er ===
Contributors: mortenf
Donate link: http://www.mfd-consult.dk/paypal/
Tags: ajax, content
Requires at least: 2.8
Tested up to: 2.8
Stable tag: trunk

A shortcode for loading content via AJAX on page load with a spinning load indicator.

== Description ==

This shortcode, `onloader`, makes it possible to dynamically load extra content onto a page, with a nice spinning
load indicator taking the place of the content until it is loaded.

= Usage =

Add a shortcode like the following to the content of a post or page.

`[onloader href="..." id="..." width="..." height="..." style="..."]`

The `href` attribute is mandatory, the rest are optional.

Attribute descriptions:

* **href**: The URL of the the content that should be loaded and displayed (or a string beginning with "demo").
* **id**: Used to differentiate between several otherwise identical shortcodes on a single page. Should be a simple
text string beginning with a letter.
* **width**: The width of the box that will hold the load indicator and the content once it is loaded, expressed as
CSS, e.g. `200px` or `100%`. The default value is `100%`.
* **height**: The height of the box that will hold the load indicator and the content once it is loaded, expressed as
CSS, e.g. `200px` or `100%`. The default value is `200px`.
* **style**: CSS to style the box that holds the content, e.g. `text-align: center; color: red`.

= Example =

`[onloader href="http://example.com/feed" id="example1" width="80%" height="15em" style="border: 1px solid blue"]`

== Installation ==

1. Download Plugin .zip-file.
1. Unzip and upload to the plugin directory, usually at `wp-content/plugins/`.
1. Activate the plugin from the WordPress "Plugin" administration screen.
1. Add a shortcode to a post or page per the [instructions](http://wordpress.org/extend/plugins/onloader/).

== Screenshots ==

1. Demo, while loading
2. Demo, after load

== Frequently Asked Questions ==

= I get a JavaScript error, "Access to restricted URI denied" =

Because of the browser/JavaScript security model, it is not possible to load content from other sites, only
from the same domain the OnLoad'er script itself is located on.

A proxy service will be added to a later version of the plugin.

= How can I test that it works? =

Add the shortcode `[onloader href="demo"]` to a page, and hit preview. You should see the spinning load indicator,
and after a few seconds the message "You are seeing the output of the OnLoad'er demo script. Everything worked!".

= Can I use more than one on a single page =

Certainly. If you are loading content from distinct URLs, it should "just work", otherwise add `id` attributes
with suitable values to make it possible to tell them apart.

= Another question? =

If your question isn't answered here, please do leave a comment in the forum or on the plugin's homepage:
[www.mfd-consult.dk/onloader](http://www.mfd-consult.dk/onloader/)

== Changelog ==

= 1.0 =
* Initial release.

== License ==

Copyright (c) 2009 Morten Høybye Frederiksen <morten@wasab.dk>

Permission to use, copy, modify, and distribute this software for any
purpose with or without fee is hereby granted, provided that the above
copyright notice and this permission notice appear in all copies.

THE SOFTWARE IS PROVIDED "AS IS" AND THE AUTHOR DISCLAIMS ALL WARRANTIES
WITH REGARD TO THIS SOFTWARE INCLUDING ALL IMPLIED WARRANTIES OF
MERCHANTABILITY AND FITNESS. IN NO EVENT SHALL THE AUTHOR BE LIABLE FOR
ANY SPECIAL, DIRECT, INDIRECT, OR CONSEQUENTIAL DAMAGES OR ANY DAMAGES
WHATSOEVER RESULTING FROM LOSS OF USE, DATA OR PROFITS, WHETHER IN AN
ACTION OF CONTRACT, NEGLIGENCE OR OTHER TORTIOUS ACTION, ARISING OUT OF
OR IN CONNECTION WITH THE USE OR PERFORMANCE OF THIS SOFTWARE.
