# MM Theme

WordPress theme for Mazz Marketing.

## Current status

The theme ships exactly two things:

- **Homepage** (`front-page.php`) — a direct, static port of the approved
  design in the sibling `final/` folder (`final/index.html` +
  `final/style.css`). The markup and copy are hardcoded to match that source
  file exactly; the only change from the source HTML is resolving the
  founder photo's `src` to the theme's asset URL
  (`content/images/homepage/about-photo.png`). Its stylesheet
  (`assets/css/homepage.css`) is a byte-for-byte copy of `final/style.css`,
  linked directly in the page's own `<head>` (see the `is_front_page()`
  branch in `header.php`) rather than through `wp_enqueue_style()`, so the
  `<head>` matches `final/index.html` exactly (title, meta description,
  font preconnects, stylesheet order).
- **Coming Soon screen** (`template-parts/coming-soon.php`) — the fallback
  for any WP Page without a dedicated template, and for any URL with no
  more specific template (404s, archives, etc.), via `page.php` /
  `index.php`. Copy, social links, and colors are editable via
  **Appearance → Customize → Coming Soon Page** (see
  `mm_theme_customize_register()` in `functions.php`).

There is no Import Demo, no Customizer section, and no theme mods for the
homepage — its content lives directly in `front-page.php`, matching the
final design file 1:1. To change the homepage, edit `final/index.html` (the
source of truth) and `front-page.php` together.

`screenshot.png` (theme thumbnail shown in Appearance → Themes) is included.

## Why no theme mods on the homepage

Earlier versions of this theme tried to make every homepage string editable
via Customizer/Import Demo. That approach drifted from the approved design
(a leftover global stylesheet meant only for the Coming Soon screen was
fighting the homepage's layout) and made the homepage harder to keep in
sync with `final/`. The homepage is now intentionally static — a pixel copy
— to guarantee it never diverges from the approved design.

## Next steps

If new pages are needed later, give them their own template file and keep
the same rule: the static design file is the source of truth, and the WP
template is a direct port of it — not a re-interpretation.
