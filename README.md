# MM Theme

WordPress theme for Mazz Marketing.

## Current status

The site homepage (`front-page.php`) is the full Mazz Marketing marketing
page — hero, problem, approach, how-it-works, services, personal
collaboration comparison, about, MAIA teaser, FAQ, and footer CTA. Every
heading, paragraph, label, and the founder photo is editable via
**Appearance → Customize → Homepage** (singular fields) or pushed from
defaults via **Appearance → Import Demo** (including the repeatable card/FAQ
lists, which are import-only — see `mm_theme_import_homepage_content()` in
`inc/demo-importer.php`). Its styles/scripts live in
`assets/css/homepage.css` and `assets/js/homepage.js`, enqueued only on the
front page (see `mm_theme_scripts()` in `functions.php`).

Any WP Page without a dedicated template, plus any URL with no more specific
template (404s, archives, etc.), falls back to the Coming Soon launch screen
(`template-parts/coming-soon.php`, via `page.php` / `index.php`). Its copy,
social links, and colors are editable via **Appearance → Customize → Coming
Soon Page** (see `mm_theme_customize_register()` in `functions.php`).

A second, selectable page template is available: **AI Landing Page**
(`page-templates/page-ai-landing.php`). Assign it to any WP Page via
**Page Attributes → Template** in the block/classic editor. It ships a full
marketing landing page (hero, benefits, features, services, process, case
study, testimonials, pricing, comparison, team, FAQ, footer CTA), styled
independently from the Coming Soon screen via `assets/css/orbai-landing.css`
and `assets/js/orbai-landing.js` (enqueued only on that template — see
`mm_theme_scripts()` in `functions.php`). Its visual system (light background,
soft-shadow floating cards, black pill buttons, ripple-orb hero/footer
graphic) is modeled on the Orbai Framer template's design language; all copy,
pricing, team, and FAQ content is original to Mazz Marketing. A matching
standalone HTML/CSS/JS build lives in the sibling `orbai-landing-html/`
folder for quick previewing outside WordPress.

`screenshot.png` (theme thumbnail shown in Appearance → Themes) is included.

## Import Demo

**Appearance → Import Demo** pushes this theme's default copy into the
database — no WP-CLI access needed on production (see `inc/demo-importer.php`,
following the Version 5 Import Demo pattern documented in
`version 5 import demo workflow/CLAUDE.md`).

Components:
- **Pages & Navigation** — creates three WordPress pages (AI Marketing →
  `page-templates/page-ai-landing.php`, Lead Generation →
  `page-templates/page-lead-gen.php`, Coaching →
  `page-templates/page-coaching-landing.php`), assigns their templates, and
  wires up the primary navigation menu. **Run this first on a fresh install.**
- **Homepage Content** — all homepage copy (theme mods) and the founder
  photo (imported as a real WP attachment via the hash-dedup Smart Import
  pattern, stored as the `mm_home_about_photo_id` theme mod), plus the
  repeatable card/FAQ lists (approach cards, process steps, choice cards,
  service cards, comparison list items, FAQ) stored as options.
- **Coming Soon Page Content** — brand label, heading, tagline, meta
  description, theme color, footer text, social links (theme mods, also
  editable individually via Appearance → Customize → Coming Soon Page).
- **AI Landing Page Content** — hero eyebrow/heading/subhead, founder quote,
  contact email (theme mods, also editable via Appearance → Customize →
  AI Landing Page).
- **AI Landing Page — FAQ** — the 5 question/answer pairs (stored as the
  `mm_ai_landing_faq` option, a plain array of `['q' => ..., 'a' => ...]`).
- **AI Landing Page — Team** — the 4 team member entries (stored as the
  `mm_ai_landing_team` option, a plain array of
  `['name' => ..., 'role' => ..., 'initials' => ...]`).
- **Coaching Landing Page Content** — hero copy, bio, services, steps,
  metrics, testimonials, FAQ, Calendly URL, and about image for the Coaching
  Landing Page.

Run components individually via **Sync Selected**, all at once via **Sync
All**, or wipe and reapply defaults via **Reset & Reimport Everything**. The
page template always falls back to the hardcoded defaults if a mod/option is
empty, so the page renders correctly even before the importer has run.

## Next steps

Additional page templates (blog, services, etc.) can be added the same way
as the AI Landing Page. Follow the theme bible in
`version 4 download image and blog/` and `version 5 import demo workflow/`
for the conversion, dynamic-layer, and deploy methodology used on this project.
