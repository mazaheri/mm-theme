<?php
/**
 * Homepage repeatable-content defaults and decorative icon SVGs.
 *
 * Loaded unconditionally (front-page.php reads these on every request),
 * unlike inc/demo-importer.php which is admin-only.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// ── Repeatable option helper ─────────────────────────────────────────────────
function mm_theme_get_repeatable_option( $option_name, $defaults ) {
	$value = get_option( $option_name );
	return ( is_array( $value ) && ! empty( $value ) ) ? $value : $defaults;
}

// ── Homepage — repeatable content defaults ───────────────────────────────────
function mm_theme_default_approach_cards() {
	return [
		[ 'number' => '01', 'title' => 'Strategy before tactics', 'body' => 'Before spending more on ads, content or software, clarify who you need to reach, what you are offering, and what action you want people to take.' ],
		[ 'number' => '02', 'title' => 'Data before opinions', 'body' => 'Marketing decisions should be informed by what customers actually do — not by vanity metrics, vague reports or assumptions.' ],
		[ 'number' => '03', 'title' => 'Systems before scale', 'body' => 'Before increasing budget or workload, make sure the website, tracking, follow-up and core workflows can handle more demand.' ],
	];
}

function mm_theme_default_process_steps() {
	return [
		[ 'number' => '01', 'title' => 'Clarity call', 'body' => 'We review your current situation, the main growth goal and the area that needs attention first.' ],
		[ 'number' => '02', 'title' => 'Priorities and next steps', 'body' => 'You leave with a clearer view of what to focus on, what not to do yet, and whether a deeper engagement would be useful.' ],
		[ 'number' => '03', 'title' => 'Choose the right level of support', 'body' => 'You may take the direction and implement it yourself, work with me collaboratively, or bring me in for defined strategic or technical support.' ],
	];
}

function mm_theme_default_choice_cards() {
	return [
		[ 'title' => 'You implement', 'body' => 'You receive clear direction, frameworks and priorities, then execute with your own team or independently.' ],
		[ 'title' => 'We work together', 'body' => 'We solve the problem collaboratively while building the understanding and systems you can keep using.' ],
		[ 'title' => 'I support the execution', 'body' => 'I provide focused strategic and technical support for the agreed scope, from audit through implementation.' ],
	];
}

function mm_theme_default_service_cards() {
	return [
		[ 'title' => 'Marketing Strategy &amp; Growth Roadmaps', 'body' => 'For businesses that need clarity on positioning, priorities, customer journeys, offers and the right order of marketing activity.' ],
		[ 'title' => 'Google Ads, Meta Ads &amp; Conversion', 'body' => 'For businesses that need paid media connected to a stronger offer, a clearer conversion path and meaningful measurement — not just more traffic.' ],
		[ 'title' => 'SEO, Websites &amp; Measurement', 'body' => 'For businesses that want their website to become a measurable growth asset, rather than a brochure that looks good but does not create demand or conversions.' ],
		[ 'title' => 'AI-Enabled Marketing Systems', 'body' => 'For teams and independent professionals who want to reduce repetitive work across content, lead generation, follow-up, reporting and marketing operations — without losing quality, brand control or human judgement.' ],
	];
}

function mm_theme_default_compare_without() {
	return [
		[ 'text' => 'A sales call, then a hand-off to whoever is available' ],
		[ 'text' => 'Reports built around channel metrics, not shared context' ],
		[ 'text' => 'Recommendations shaped by the services being sold' ],
	];
}

function mm_theme_default_compare_with() {
	return [
		[ 'text' => 'One person, involved from the first call through the work itself' ],
		[ 'text' => 'Decisions explained in plain terms, tied to your goal' ],
		[ 'text' => 'Direction shaped by evidence, not by which service is easiest to sell' ],
	];
}

function mm_theme_default_home_faq() {
	return [
		[ 'q' => 'What happens on the first call?', 'a' => 'We review your current situation, the main growth goal and the area that needs attention first. You leave with a clearer view of what to focus on and what not to do yet.' ],
		[ 'q' => 'Do I need to know whether the issue is SEO, ads, tracking or my website?', 'a' => 'No. You do not need to diagnose the problem before booking. A website link and a short description of your goal are enough to start — we clarify the most useful next step together.' ],
		[ 'q' => 'Do you only work with businesses already running ads?', 'a' => 'No. The right answer depends on the business, the goal and the evidence. Sometimes that means ads or SEO, sometimes it means website or tracking work first, and sometimes it means waiting until the foundations are ready.' ],
		[ 'q' => 'Can you work with my existing team or freelancer?', 'a' => 'Yes. I can work alongside an existing team or freelancer, provide direction they implement, or take on a defined piece of the work myself.' ],
		[ 'q' => 'Do you offer AI automation services?', 'a' => 'Yes. This includes reducing repetitive work across content, lead generation, follow-up, reporting and marketing operations, without losing quality, brand control or human judgement.' ],
		[ 'q' => 'Will you offer training and courses?', 'a' => 'Yes, over time. Mazz Marketing is building a library of practical insights, frameworks and training based on real marketing work. See the section above to get notified.' ],
		[ 'q' => 'What if I am not ready to hire a consultant?', 'a' => 'Requesting the call does not commit you to a paid project. The goal is clearer decisions, not dependence — you remain in control of how, or whether, you implement the direction.' ],
	];
}

// ── Homepage — decorative icon SVGs (not copy, not imported) ────────────────
function mm_theme_choice_icon_svg( $index ) {
	$icons = [
		'<svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="32" cy="32" r="28" fill="var(--bg)" stroke="var(--border)"/><path d="M20 34l8 8 16-18" stroke="var(--text)" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/></svg>',
		'<svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="24" cy="26" r="9" fill="var(--surface)" stroke="var(--text)" stroke-width="2"/><circle cx="42" cy="26" r="9" fill="var(--text)"/><path d="M12 50c0-8 6-13 12-13s12 5 12 13" stroke="var(--text)" stroke-width="2" fill="none"/><path d="M30 50c0-8 6-13 12-13s12 5 12 13" fill="var(--text)"/></svg>',
		'<svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="14" y="14" width="36" height="36" rx="10" fill="var(--text)"/><path d="M24 32l6 6 12-14" stroke="var(--surface)" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/></svg>',
	];
	return isset( $icons[ $index ] ) ? $icons[ $index ] : '';
}

function mm_theme_service_icon_svg( $index ) {
	$icons = [
		'<svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="32" cy="32" r="22" fill="none" stroke="var(--border)" stroke-width="4"/><path d="M32 10a22 22 0 0 1 0 44" stroke="url(#g6)" stroke-width="4" stroke-linecap="round"/><circle cx="32" cy="32" r="6" fill="var(--text)"/><defs><linearGradient id="g6" x1="32" y1="10" x2="32" y2="54"><stop stop-color="#f5a623"/><stop offset="0.5" stop-color="#e8548c"/><stop offset="1" stop-color="#9b4de0"/></linearGradient></defs></svg>',
		'<svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="8" y="36" width="10" height="20" rx="2" fill="var(--text-dim)"/><rect x="27" y="24" width="10" height="32" rx="2" fill="var(--text)"/><rect x="46" y="12" width="10" height="44" rx="2" fill="url(#g1)"/><defs><linearGradient id="g1" x1="46" y1="12" x2="56" y2="56"><stop stop-color="#f5a623"/><stop offset="1" stop-color="#9b4de0"/></linearGradient></defs></svg>',
		'<svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="10" y="14" width="44" height="36" rx="6" fill="var(--bg)" stroke="var(--border)"/><rect x="10" y="14" width="44" height="9" rx="6" fill="var(--text)"/><circle cx="16" cy="18.5" r="1.6" fill="var(--surface)"/><circle cx="21" cy="18.5" r="1.6" fill="var(--surface)"/><rect x="18" y="30" width="20" height="4" rx="2" fill="url(#g4)"/><rect x="18" y="38" width="28" height="4" rx="2" fill="var(--border)"/><defs><linearGradient id="g4" x1="18" y1="30" x2="38" y2="34"><stop stop-color="#f5a623"/><stop offset="1" stop-color="#e8548c"/></linearGradient></defs></svg>',
		'<svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="10" y="30" width="10" height="24" rx="2" fill="var(--border)"/><rect x="27" y="18" width="10" height="36" rx="2" fill="var(--text-dim)"/><rect x="44" y="8" width="10" height="46" rx="2" fill="url(#g5)"/><circle cx="49" cy="8" r="6" fill="url(#g5)"/><defs><linearGradient id="g5" x1="44" y1="8" x2="54" y2="54"><stop stop-color="#9b4de0"/><stop offset="1" stop-color="#f5a623"/></linearGradient></defs></svg>',
	];
	return isset( $icons[ $index ] ) ? $icons[ $index ] : '';
}
