Northfield Day Care Center - static HTML version
=================================================

Upload the CONTENTS of this folder to the web root (public_html) of northfielddaycarecenter.org,
or to any subfolder for a staging preview. All links are relative, so it works in either place.

URLs are unchanged:
  /               -> index.html
  /philosophy/    -> philosophy/index.html
  /program/       -> program/index.html
  /faqs/          -> faqs/index.html
  /testimonials/  -> testimonials/index.html
  /staff/         -> staff/index.html
  /contact/       -> contact/index.html

Asset paths (wp-content/..., wp-includes/...) keep the same folder structure as the WordPress site,
so the design and all image/CSS/JS links are identical.

Contact form
------------
Contact Form 7 needed WordPress, so the form now posts to /contact/send.php (needs PHP on the host).
It emails BetterFutures@NorthfieldDaycareCenter.org and shows the usual thank-you message.
Spam protection: a hidden honeypot field replaces Google reCAPTCHA (so the small reCAPTCHA badge
in the bottom corner no longer appears). Edit $to in send.php to change the recipient.

Removed (only work on WordPress/Cloudflare): WP REST/feed/xmlrpc links in <head>,
Cloudflare email-obfuscation script (emails are now written out normally), Cloudflare analytics beacon.

Mobile menu
-----------
The WordPress theme's phone/tablet menu never worked (its icon font and start-up script were missing).
wp-content/themes/nfd/css/mobile-menu.css and wp-content/themes/nfd/js/mobile-menu.js add a working
tap-to-open menu at 1024px wide and below. Desktop is unchanged.

Noindex (staging)
-----------------
Every page has <meta name="robots" content="noindex, nofollow" /> and .htaccess sends an
X-Robots-Tag: noindex, nofollow header, so search engines will not index this copy.
BEFORE GOING LIVE on the real domain: remove that meta line from each page and delete the
"BEGIN noindex ... END noindex" block from .htaccess, or the site will drop out of Google.
