<?php
/**
 * The site homepage: hero, problem, approach, how-it-works, services,
 * personal collaboration comparison, about, MAIA teaser, FAQ, footer CTA.
 * All copy is editable via Appearance → Customize → Homepage, or pushed
 * from defaults via Appearance → Import Demo.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// ── Hero ──────────────────────────────────────────────────────────────────
$eyebrow      = get_theme_mod( 'mm_home_hero_eyebrow', 'Technical Marketing Manager · SEO · Paid Media · Analytics · AI Automation' );
$hero_heading = get_theme_mod( 'mm_home_hero_heading', 'Make your next marketing decision with clarity—not guesswork.' );
$hero_sub     = get_theme_mod( 'mm_home_hero_sub', "I'm Pourya Mazaheri, founder of Mazz Marketing. I help growing businesses identify what needs attention first, then connect strategy, SEO, paid media, websites, analytics and AI-enabled workflows into a system they can measure and improve." );
$hero_cta_primary_label   = get_theme_mod( 'mm_home_hero_cta_primary_label', 'Find your next marketing priority →' );
$hero_cta_secondary_label = get_theme_mod( 'mm_home_hero_cta_secondary_label', 'Explore how I work' );
$hero_microcopy = get_theme_mod( 'mm_home_hero_microcopy', '30 minutes. One focused conversation. A clearer next step. No obligation to continue.' );

// ── Problem ───────────────────────────────────────────────────────────────
$problem_eyebrow   = get_theme_mod( 'mm_home_problem_eyebrow', 'The Challenge' );
$problem_heading   = get_theme_mod( 'mm_home_problem_heading', 'Marketing gets expensive when the pieces do not work together.' );
$problem_intro     = get_theme_mod( 'mm_home_problem_intro', 'Most businesses do not have one marketing problem. They have several disconnected ones.' );
$problem_body      = get_theme_mod( 'mm_home_problem_body', 'Ads may generate clicks, while the website does not convert. Content may be published consistently, but it is not connected to an offer. Data may exist, but it may not be reliable or useful enough to guide decisions. Leads may arrive, then receive inconsistent follow-up.' );
$problem_quote     = get_theme_mod( 'mm_home_problem_quote', 'This does not mean your marketing is broken or that someone failed. It often means the system was built in the wrong order, measured incompletely, or never connected end to end.' );
$problem_closing   = get_theme_mod( 'mm_home_problem_closing', 'My role is not to take control away from you. It is to help you understand what matters, choose the right priority, and build a practical path forward.' );
$problem_cta       = get_theme_mod( 'mm_home_problem_cta_label', 'Clarify what needs attention first →' );
$problem_microcopy = get_theme_mod( 'mm_home_problem_microcopy', 'You do not need to know whether the issue is SEO, ads, tracking, your website or something else. A website link and a short description of your goal are enough to start.' );

// ── Approach ──────────────────────────────────────────────────────────────
$approach_eyebrow = get_theme_mod( 'mm_home_approach_eyebrow', 'How I Think About It' );
$approach_heading = get_theme_mod( 'mm_home_approach_heading', 'Clear strategy. Reliable data. Practical execution.' );
$approach_sub     = get_theme_mod( 'mm_home_approach_sub', 'I do not start by selling a channel, a campaign type or a tool. We start by understanding the business, the offer, the customer journey and the gap that is currently limiting progress.' );
$approach_cards   = mm_theme_get_repeatable_option( 'mm_home_approach_cards', mm_theme_default_approach_cards() );

// ── How I Work ────────────────────────────────────────────────────────────
$how_eyebrow   = get_theme_mod( 'mm_home_how_eyebrow', 'How I Work' );
$how_heading   = get_theme_mod( 'mm_home_how_heading', 'One clear starting point. Different ways to work together.' );
$process_steps = mm_theme_get_repeatable_option( 'mm_home_process_steps', mm_theme_default_process_steps() );
$choice_heading = get_theme_mod( 'mm_home_choice_heading', 'Choose the right level of support' );
$choice_cards   = mm_theme_get_repeatable_option( 'mm_home_choice_cards', mm_theme_default_choice_cards() );

// ── Services ──────────────────────────────────────────────────────────────
$services_eyebrow = get_theme_mod( 'mm_home_services_eyebrow', 'Ways I Can Help' );
$services_heading = get_theme_mod( 'mm_home_services_heading', 'Ways I can help' );
$services_sub     = get_theme_mod( 'mm_home_services_sub', 'Engagements are designed around the bottleneck that matters most right now. That may be strategy, conversion, visibility, tracking or a workflow that is taking too much time to run manually.' );
$service_cards    = mm_theme_get_repeatable_option( 'mm_home_service_cards', mm_theme_default_service_cards() );
$services_cta     = get_theme_mod( 'mm_home_services_cta_label', 'Discuss the right starting point →' );

// ── Personal collaboration ────────────────────────────────────────────────
$collab_eyebrow = get_theme_mod( 'mm_home_collab_eyebrow', 'How This Is Different' );
$collab_heading = get_theme_mod( 'mm_home_collab_heading', 'Direct expertise, not a hand-off process.' );
$collab_p1      = get_theme_mod( 'mm_home_collab_p1', 'When you work with Mazz Marketing, you work directly with me.' );
$collab_p2      = get_theme_mod( 'mm_home_collab_p2', 'That means the person who understands the strategy is also involved in the analysis, the recommendations and the work itself. There is no sales call followed by a hand-off to someone who has never heard the full context.' );
$collab_p3      = get_theme_mod( 'mm_home_collab_p3', 'You should not need to become dependent on unclear reports or black-box marketing. My role is to help you make better decisions and build capabilities that remain useful after the project ends.' );
$compare_without_heading = get_theme_mod( 'mm_home_compare_without_heading', 'Common agency model' );
$compare_with_heading    = get_theme_mod( 'mm_home_compare_with_heading', 'Working with Mazz Marketing' );
$compare_without_items   = mm_theme_get_repeatable_option( 'mm_home_compare_without_items', mm_theme_default_compare_without() );
$compare_with_items      = mm_theme_get_repeatable_option( 'mm_home_compare_with_items', mm_theme_default_compare_with() );

// ── About ─────────────────────────────────────────────────────────────────
$about_eyebrow      = get_theme_mod( 'mm_home_about_eyebrow', 'About Pourya Mazaheri' );
$about_p1           = get_theme_mod( 'mm_home_about_p1', "I'm Pourya Mazaheri, a Technical Marketing Manager and the founder of Mazz Marketing." );
$about_p2           = get_theme_mod( 'mm_home_about_p2', 'My work sits at the intersection of strategy and execution: SEO, Google Ads, Meta Ads, websites, conversion paths, analytics, tracking and AI-enabled marketing workflows.' );
$about_p3           = get_theme_mod( 'mm_home_about_p3', 'I work best with people who value clear thinking, direct communication and practical progress. Sometimes the right answer is to improve a campaign. Sometimes it is to fix the website, the offer, the tracking or the follow-up process first. And sometimes the most honest answer is that more advertising is not the next move.' );
$about_p4           = get_theme_mod( 'mm_home_about_p4', 'Mazz Marketing is where I turn this work into focused consulting, implementation support, practical frameworks and, over time, educational resources for people who want to understand and improve their own marketing systems.' );
$about_lightbox_cta = get_theme_mod( 'mm_home_about_lightbox_cta_label', 'Request an early consultation →' );
$about_photo_id      = get_theme_mod( 'mm_home_about_photo_id' );
$about_photo_url     = $about_photo_id ? wp_get_attachment_image_url( $about_photo_id, 'full' ) : get_template_directory_uri() . '/content/images/homepage/about-photo.png';

// ── MAIA teaser ───────────────────────────────────────────────────────────
$maia_eyebrow = get_theme_mod( 'mm_home_maia_eyebrow', 'Coming Soon — The MAIA Method by Mazz Marketing' );
$maia_heading = get_theme_mod( 'mm_home_maia_heading', 'MAIA — Marketing AI Automations' );
$maia_sub     = get_theme_mod( 'mm_home_maia_sub', 'The complete system to build AI-powered marketing workflows for content, leads, ads, sales and reporting.' );
$maia_body    = get_theme_mod( 'mm_home_maia_body', 'Mazz Marketing is building a growing library of practical insights, templates and learning experiences for marketers, founders and small teams — starting with MAIA.' );

// ── FAQ ───────────────────────────────────────────────────────────────────
$faq_eyebrow = get_theme_mod( 'mm_home_faq_eyebrow', 'FAQ' );
$faq_heading = get_theme_mod( 'mm_home_faq_heading', 'Questions people ask before booking' );
$faqs        = mm_theme_get_repeatable_option( 'mm_home_faq', mm_theme_default_home_faq() );

// ── Final CTA ─────────────────────────────────────────────────────────────
$cta_heading   = get_theme_mod( 'mm_home_cta_heading', 'Not sure what to fix first?' );
$cta_body1     = get_theme_mod( 'mm_home_cta_body1', 'Request a focused 30-minute clarity call. We will discuss your current marketing situation, the goal that matters most and the most useful next step for your business.' );
$cta_body2     = get_theme_mod( 'mm_home_cta_body2', 'You are not committing to a project by requesting the call. The purpose is to gain clarity before spending more time, budget or energy in the wrong place.' );
$cta_microcopy = get_theme_mod( 'mm_home_cta_microcopy', 'You do not need to know whether the issue is SEO, ads, tracking, your website or something else. A website link and a short description of your goal are enough to start.' );

// ── Header / nav / footer ─────────────────────────────────────────────────
$logo_text        = get_theme_mod( 'mm_home_logo_text', 'Mazz Marketing' );
$header_cta_full   = get_theme_mod( 'mm_home_header_cta_full', 'Request an early consultation' );
$header_cta_short  = get_theme_mod( 'mm_home_header_cta_short', 'Request a call' );
$footer_copyright  = get_theme_mod( 'mm_home_footer_copyright', '&copy; ' . gmdate( 'Y' ) . ' Mazz Marketing. All rights reserved.' );

get_header();
?>

<header class="site-header">
	<div class="container header-inner">
		<a href="#" class="logo"><?php echo esc_html( $logo_text ); ?></a>
		<nav class="nav">
			<a href="#problem">The Challenge</a>
			<a href="#how-it-works">How I Work</a>
			<a href="#services">Services</a>
			<a href="#about">About</a>
			<a href="#faq">FAQ</a>
		</nav>
		<a href="#contact" class="btn btn-primary btn-small header-cta">
			<span class="header-cta-full"><?php echo esc_html( $header_cta_full ); ?></span>
			<span class="header-cta-short"><?php echo esc_html( $header_cta_short ); ?></span>
		</a>
	</div>
</header>

<main>

	<!-- HERO + PROBLEM (share one continuous background) -->
	<div class="hero-bg-wrap">
		<div class="hero-color-wash" aria-hidden="true"></div>
		<div class="hero-glow" aria-hidden="true"></div>
		<div class="floating-icons-field" id="floating-icons-field" aria-hidden="true">
			<div class="floating-icon" style="top:12%; left:8%;">
				<div class="floating-icon-inner"><div class="floating-icon-bob" style="animation-duration:9s;">
					<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path fill="#4285F4" d="M21.35 11.1h-9.17v2.73h6.51c-.33 3.81-3.5 5.44-6.5 5.44C8.36 19.27 5 16.25 5 12s3.36-7.27 7.19-7.27c3.09 0 4.9 1.97 4.9 1.97L19 4.72S16.56 2 12.19 2C6.42 2 2.03 6.8 2.03 12s4.39 10 10.16 10c5.05 0 8.74-3.46 8.74-8.57 0-1.08-.16-1.71-.16-1.71z"/></svg>
				</div></div>
			</div>
			<div class="floating-icon" style="top:18%; left:82%;">
				<div class="floating-icon-inner"><div class="floating-icon-bob" style="animation-duration:7s;">
					<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path fill="#0866FF" d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
				</div></div>
			</div>
			<div class="floating-icon" style="top:78%; left:10%;">
				<div class="floating-icon-inner"><div class="floating-icon-bob" style="animation-duration:10s;">
					<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
						<defs><linearGradient id="ig-grad" x1="0" y1="24" x2="24" y2="0"><stop offset="0" stop-color="#FFDD55"/><stop offset="0.5" stop-color="#E1306C"/><stop offset="1" stop-color="#5851DB"/></linearGradient></defs>
						<rect x="2" y="2" width="20" height="20" rx="6" fill="url(#ig-grad)"/>
						<circle cx="12" cy="12" r="5" fill="none" stroke="#fff" stroke-width="1.8"/>
						<circle cx="17.3" cy="6.7" r="1.2" fill="#fff"/>
					</svg>
				</div></div>
			</div>
			<div class="floating-icon" style="top:82%; left:86%;">
				<div class="floating-icon-inner"><div class="floating-icon-bob" style="animation-duration:8.5s;">
					<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path fill="#E37400" d="M22.84 2.998a1 1 0 0 0-1.39-.24L12 9.2 2.55 2.76a1 1 0 0 0-1.39.24 1 1 0 0 0 .24 1.39L11 10.9v10.2a1 1 0 0 0 2 0V10.9l9.6-6.51a1 1 0 0 0 .24-1.39z"/></svg>
				</div></div>
			</div>
			<div class="floating-icon" style="top:58%; left:6%;">
				<div class="floating-icon-inner"><div class="floating-icon-bob" style="animation-duration:9.5s;">
					<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><rect x="2" y="10" width="5" height="12" rx="1" fill="#E37400"/><rect x="9.5" y="4" width="5" height="18" rx="1" fill="#F9AB00"/><rect x="17" y="7" width="5" height="15" rx="1" fill="#E37400"/></svg>
				</div></div>
			</div>
			<div class="floating-icon" style="top:65%; left:93%;">
				<div class="floating-icon-inner"><div class="floating-icon-bob" style="animation-duration:7.5s;">
					<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><circle cx="10" cy="10" r="7" fill="none" stroke="var(--text)" stroke-width="2.2"/><line x1="15" y1="15" x2="21" y2="21" stroke="var(--text)" stroke-width="2.2" stroke-linecap="round"/></svg>
				</div></div>
			</div>
			<div class="floating-icon" style="top:8%; left:94%;">
				<div class="floating-icon-inner"><div class="floating-icon-bob" style="animation-duration:8s;">
					<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><rect x="2" y="4" width="20" height="16" rx="3" fill="none" stroke="var(--text)" stroke-width="1.8"/><path d="M2 8h20" stroke="var(--text)" stroke-width="1.8"/><path d="M7 14l3 3 6-7" fill="none" stroke="url(#g-check)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><defs><linearGradient id="g-check" x1="7" y1="14" x2="16" y2="10"><stop stop-color="#f5a623"/><stop offset="1" stop-color="#e8548c"/></linearGradient></defs></svg>
				</div></div>
			</div>
			<div class="floating-icon" style="top:8%; left:6%;">
				<div class="floating-icon-inner"><div class="floating-icon-bob" style="animation-duration:11s;">
					<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><rect x="1.5" y="5" width="21" height="14" rx="4" fill="#FF0000"/><path d="M10 8.5v7l6-3.5-6-3.5z" fill="#fff"/></svg>
				</div></div>
			</div>
		</div>

		<section class="hero">
			<div class="container hero-inner">
				<div class="eyebrow-with-avatar">
					<span class="avatar-photo avatar-photo-accent" aria-hidden="true"></span>
					<span class="eyebrow"><?php echo esc_html( $eyebrow ); ?></span>
				</div>
				<h1><?php echo esc_html( $hero_heading ); ?></h1>
				<p class="hero-sub"><?php echo esc_html( $hero_sub ); ?></p>

				<div class="hero-ctas">
					<a href="#contact" class="btn btn-primary btn-large"><?php echo esc_html( $hero_cta_primary_label ); ?></a>
					<a href="#how-it-works" class="btn btn-secondary btn-large"><?php echo esc_html( $hero_cta_secondary_label ); ?></a>
				</div>
				<p class="hero-microcopy"><?php echo esc_html( $hero_microcopy ); ?></p>
			</div>
		</section>

		<!-- PROBLEM -->
		<section id="problem" class="section">
			<div class="container narrow">
				<span class="eyebrow eyebrow-center"><?php echo esc_html( $problem_eyebrow ); ?></span>
				<h2 class="center"><?php echo esc_html( $problem_heading ); ?></h2>

				<p><?php echo esc_html( $problem_intro ); ?></p>

				<p><?php echo esc_html( $problem_body ); ?></p>

				<blockquote class="pull-quote">
					<?php echo esc_html( $problem_quote ); ?>
				</blockquote>

				<p><?php echo esc_html( $problem_closing ); ?></p>

				<a href="#contact" class="btn btn-primary"><?php echo esc_html( $problem_cta ); ?></a>
				<p class="hero-microcopy"><?php echo esc_html( $problem_microcopy ); ?></p>
			</div>
		</section>
	</div>

	<!-- APPROACH -->
	<section id="approach" class="section section-alt">
		<div class="container narrow">
			<span class="eyebrow eyebrow-center"><?php echo esc_html( $approach_eyebrow ); ?></span>
			<h2 class="center"><?php echo esc_html( $approach_heading ); ?></h2>
			<p class="center services-sub"><?php echo esc_html( $approach_sub ); ?></p>

			<div class="approach-grid">
				<?php foreach ( $approach_cards as $card ) : ?>
				<div class="approach-card">
					<span class="step-number"><?php echo esc_html( $card['number'] ); ?></span>
					<h3><?php echo esc_html( $card['title'] ); ?></h3>
					<p><?php echo esc_html( $card['body'] ); ?></p>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<!-- HOW I WORK -->
	<section id="how-it-works" class="section section-alt">
		<div class="container narrow">
			<span class="eyebrow eyebrow-center"><?php echo esc_html( $how_eyebrow ); ?></span>
			<h2 class="center"><?php echo esc_html( $how_heading ); ?></h2>

			<div class="process-steps">
				<?php foreach ( $process_steps as $step ) : ?>
				<div class="process-step">
					<span class="step-number"><?php echo esc_html( $step['number'] ); ?></span>
					<h3><?php echo esc_html( $step['title'] ); ?></h3>
					<p><?php echo esc_html( $step['body'] ); ?></p>
				</div>
				<?php endforeach; ?>
			</div>

			<h3 class="choice-heading choice-heading-big center"><?php echo esc_html( $choice_heading ); ?></h3>
			<div class="choice-grid">
				<?php foreach ( $choice_cards as $i => $card ) : ?>
				<div class="choice-card<?php echo 1 === $i ? ' choice-card-highlight' : ''; ?>">
					<div class="choice-icon" aria-hidden="true"><?php echo mm_theme_choice_icon_svg( $i ); ?></div>
					<h4><?php echo esc_html( $card['title'] ); ?></h4>
					<p><?php echo esc_html( $card['body'] ); ?></p>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<!-- SERVICES -->
	<section id="services" class="section section-alt">
		<div class="container">
			<span class="eyebrow eyebrow-center"><?php echo esc_html( $services_eyebrow ); ?></span>
			<h2 class="center"><?php echo esc_html( $services_heading ); ?></h2>
			<p class="center services-sub"><?php echo esc_html( $services_sub ); ?></p>

			<div class="services-grid">
				<?php foreach ( $service_cards as $i => $card ) : ?>
				<div class="service-card<?php echo 3 === $i ? ' service-card-center' : ''; ?>">
					<div class="service-icon" aria-hidden="true"><?php echo mm_theme_service_icon_svg( $i ); ?></div>
					<h3><?php echo esc_html( $card['title'] ); ?></h3>
					<p><?php echo esc_html( $card['body'] ); ?></p>
				</div>
				<?php endforeach; ?>
			</div>

			<div class="compare-cta">
				<a href="#contact" class="btn btn-primary"><?php echo esc_html( $services_cta ); ?></a>
			</div>
		</div>
	</section>

	<!-- PERSONAL COLLABORATION -->
	<section id="collaboration" class="section">
		<div class="container narrow-tight">
			<span class="eyebrow eyebrow-center"><?php echo esc_html( $collab_eyebrow ); ?></span>
			<h2 class="center compare-heading"><?php echo esc_html( $collab_heading ); ?></h2>

			<p><?php echo esc_html( $collab_p1 ); ?></p>
			<p><?php echo esc_html( $collab_p2 ); ?></p>
			<p><?php echo esc_html( $collab_p3 ); ?></p>

			<div class="compare-grid">
				<div class="compare-card compare-without">
					<h3><?php echo esc_html( $compare_without_heading ); ?></h3>
					<ul class="compare-list">
						<?php foreach ( $compare_without_items as $item ) : ?>
						<li><span class="compare-icon compare-icon-no" aria-hidden="true">&#8226;</span><?php echo esc_html( $item['text'] ); ?></li>
						<?php endforeach; ?>
					</ul>
				</div>
				<div class="compare-card compare-with">
					<h3><?php echo esc_html( $compare_with_heading ); ?></h3>
					<ul class="compare-list">
						<?php foreach ( $compare_with_items as $item ) : ?>
						<li><span class="compare-icon compare-icon-yes" aria-hidden="true">&#10003;</span><?php echo esc_html( $item['text'] ); ?></li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
		</div>
	</section>

	<!-- ABOUT -->
	<section id="about" class="section">
		<div class="container narrow-tight about-grid">
			<a href="#about-photo-lightbox" class="about-photo">
				<img src="<?php echo esc_url( $about_photo_url ); ?>" alt="Pourya Mazaheri, founder of Mazz Marketing" />
			</a>
			<div class="about-text">
				<span class="eyebrow"><?php echo esc_html( $about_eyebrow ); ?></span>
				<p><?php echo esc_html( $about_p1 ); ?></p>
				<p><?php echo esc_html( $about_p2 ); ?></p>
				<p><?php echo esc_html( $about_p3 ); ?></p>
				<p><?php echo esc_html( $about_p4 ); ?></p>
			</div>
		</div>
	</section>

	<!-- ABOUT PHOTO LIGHTBOX (pure CSS, no JS) -->
	<div id="about-photo-lightbox" class="lightbox">
		<a href="#about" class="lightbox-backdrop" aria-label="Close"></a>
		<div class="lightbox-content">
			<a href="#about" class="lightbox-close" aria-label="Close">&times;</a>
			<img src="<?php echo esc_url( $about_photo_url ); ?>" alt="Pourya Mazaheri, founder of Mazz Marketing" class="lightbox-photo" />
			<div class="lightbox-text">
				<span class="eyebrow"><?php echo esc_html( $about_eyebrow ); ?></span>
				<p><?php echo esc_html( $about_p1 . ' ' . $about_p2 ); ?></p>
				<a href="#contact" class="btn btn-primary"><?php echo esc_html( $about_lightbox_cta ); ?></a>
			</div>
		</div>
	</div>

	<!-- FUTURE EDUCATION -->
	<section id="resources" class="section section-alt">
		<div class="container narrow center">
			<span class="eyebrow eyebrow-center"><?php echo esc_html( $maia_eyebrow ); ?></span>
			<h2><?php echo esc_html( $maia_heading ); ?></h2>
			<p class="services-sub"><?php echo esc_html( $maia_sub ); ?></p>
			<div class="maia-visual" role="img" aria-label="MAIA — Marketing AI Automations, coming soon from Mazz Marketing">
				<svg viewBox="0 0 640 320" xmlns="http://www.w3.org/2000/svg">
					<defs>
						<linearGradient id="maia-grad" gradientUnits="userSpaceOnUse" x1="0" y1="0" x2="640" y2="320">
							<stop offset="0" stop-color="#f5a623"/>
							<stop offset="0.5" stop-color="#e8548c"/>
							<stop offset="1" stop-color="#9b4de0"/>
						</linearGradient>
						<radialGradient id="maia-glow" cx="50%" cy="45%" r="65%">
							<stop offset="0" stop-color="#ffffff" stop-opacity="0.9"/>
							<stop offset="1" stop-color="#ffffff" stop-opacity="0"/>
						</radialGradient>
					</defs>
					<rect x="0.5" y="0.5" width="639" height="319" rx="23.5" fill="var(--bg)" stroke="var(--border)"/>
					<rect x="0.5" y="0.5" width="639" height="319" rx="23.5" fill="url(#maia-glow)"/>

					<g stroke="url(#maia-grad)" stroke-width="1.5" stroke-linecap="round" opacity="0.55">
						<line x1="150" y1="120" x2="270" y2="90"/>
						<line x1="150" y1="120" x2="270" y2="160"/>
						<line x1="270" y1="90" x2="390" y2="120"/>
						<line x1="270" y1="160" x2="390" y2="120"/>
						<line x1="390" y1="120" x2="490" y2="90"/>
						<line x1="390" y1="120" x2="490" y2="150"/>
					</g>

					<circle cx="150" cy="120" r="8" fill="var(--surface)" stroke="url(#maia-grad)" stroke-width="2.5"/>
					<circle cx="270" cy="90" r="6" fill="url(#maia-grad)"/>
					<circle cx="270" cy="160" r="6" fill="url(#maia-grad)"/>
					<circle cx="390" cy="120" r="9" fill="var(--surface)" stroke="url(#maia-grad)" stroke-width="2.5"/>
					<circle cx="490" cy="90" r="6" fill="url(#maia-grad)"/>
					<circle cx="490" cy="150" r="6" fill="url(#maia-grad)"/>

					<text x="320" y="215" text-anchor="middle" font-family="Plus Jakarta Sans, sans-serif" font-weight="700" font-size="40" fill="var(--text)" letter-spacing="1">MAIA</text>
					<text x="320" y="245" text-anchor="middle" font-family="Inter, sans-serif" font-weight="500" font-size="14" letter-spacing="2.5" fill="var(--text-dim)">MARKETING AI AUTOMATIONS</text>

					<g transform="translate(255, 262)">
						<rect x="0" y="0" width="130" height="26" rx="13" fill="url(#maia-grad)"/>
						<text x="65" y="18" text-anchor="middle" font-family="Inter, sans-serif" font-weight="600" font-size="11.5" letter-spacing="0.6" fill="#fff">COMING SOON</text>
					</g>
				</svg>
			</div>
			<p><?php echo esc_html( $maia_body ); ?></p>
		</div>
	</section>

	<!-- FAQ -->
	<section id="faq" class="section">
		<div class="container narrow">
			<span class="eyebrow eyebrow-center"><?php echo esc_html( $faq_eyebrow ); ?></span>
			<h2 class="center"><?php echo esc_html( $faq_heading ); ?></h2>
			<div class="faq-list">
				<?php foreach ( $faqs as $faq ) : ?>
				<details class="faq-item">
					<summary><?php echo esc_html( $faq['q'] ); ?></summary>
					<p><?php echo esc_html( $faq['a'] ); ?></p>
				</details>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<!-- FINAL CTA -->
	<section id="contact" class="section cta-final">
		<div class="container narrow center">
			<h2><?php echo esc_html( $cta_heading ); ?></h2>
			<p><?php echo esc_html( $cta_body1 ); ?></p>
			<p><?php echo esc_html( $cta_body2 ); ?></p>
			<p class="cta-microcopy"><?php echo esc_html( $cta_microcopy ); ?></p>
		</div>
	</section>

</main>

<footer class="site-footer">
	<div class="container footer-inner">
		<p class="footer-copyright"><?php echo wp_kses_post( $footer_copyright ); ?></p>
		<nav class="footer-links">
			<a href="/impressum.html">Impressum</a>
			<a href="/datenschutzerklaerung.html">Datenschutzerklärung</a>
		</nav>
	</div>
</footer>

<?php get_footer(); ?>
