<?php
/**
 * Template Name: Coaching Landing Page
 *
 * Full coaching landing page: sticky nav, hero, social proof bar, pain/problem,
 * about/authority, services, how it works, results/case studies, testimonials,
 * FAQ, CTA footer. All text from get_theme_mod(); images via attachment IDs.
 *
 * CSS isolation: body.mm-coaching-landing prevents bleed from style.css dark theme.
 * Calendly CTA appears at 6 touchpoints throughout the page.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// ── Theme mods (text) ────────────────────────────────────────────────────────
$mm_coaching_hero_eyebrow       = get_theme_mod( 'mm_coaching_hero_eyebrow',       'TECHNICAL MARKETING COACHING' );
$mm_coaching_hero_heading       = get_theme_mod( 'mm_coaching_hero_heading',       'Get more leads, fix your tracking, and scale what works.' );
$mm_coaching_hero_subhead       = get_theme_mod( 'mm_coaching_hero_subhead',       'Hands-on coaching for business owners who want a website that converts, ads that actually work, and tracking they can trust.' );
$mm_coaching_calendly_url       = get_theme_mod( 'mm_coaching_calendly_url',       'https://calendly.com/mazzmarketing/30min' );
$mm_coaching_cta_label          = get_theme_mod( 'mm_coaching_cta_label',          'Book Free 30-Min Call' );
$mm_coaching_pain_heading       = get_theme_mod( 'mm_coaching_pain_heading',       "You're spending on ads but the results don't add up." );
$mm_coaching_pain_body          = get_theme_mod( 'mm_coaching_pain_body',          "Your website isn't converting. Your ad accounts have gaps. Your analytics don't tell you where buyers actually come from. You've tried fixing it yourself — it takes too long and nothing sticks." );
$mm_coaching_about_heading      = get_theme_mod( 'mm_coaching_about_heading',      'Pourya Mazaheri' );
$mm_coaching_about_bio          = get_theme_mod( 'mm_coaching_about_bio',          "I'm a technical marketing consultant who has helped dozens of businesses fix the gap between their marketing spend and their results. I work directly in your ad accounts, your website, and your analytics — no handoffs, no black boxes." );
$mm_coaching_about_image_id     = (int) get_theme_mod( 'mm_coaching_about_image_id', 0 );
$mm_coaching_about_image_url    = $mm_coaching_about_image_id
	? wp_get_attachment_url( $mm_coaching_about_image_id )
	: '';
$mm_coaching_social_proof_label = get_theme_mod( 'mm_coaching_social_proof_label', 'Trusted by business owners across Europe' );
$mm_coaching_result_heading     = get_theme_mod( 'mm_coaching_result_heading',     'Real results from real clients' );
$mm_coaching_cta_heading        = get_theme_mod( 'mm_coaching_cta_heading',        "Ready to fix what’s broken?" );
$mm_coaching_cta_body           = get_theme_mod( 'mm_coaching_cta_body',           "Book a free 30-minute call. We’ll look at your setup, find the biggest opportunity, and map a clear path to more leads." );
$mm_coaching_contact_email      = get_theme_mod( 'mm_coaching_contact_email',      'hello@mazzmarketing.com' );

// ── Structured options (repeating content) ───────────────────────────────────
$mm_coaching_services = get_option( 'mm_coaching_services' );
if ( ! is_array( $mm_coaching_services ) || empty( $mm_coaching_services ) ) {
	$mm_coaching_services = [
		[
			'icon'  => 'web',
			'title' => 'Website & Conversion Audit',
			'desc'  => "We diagnose exactly why your site isn't converting and fix it — layout, copy, and technical performance.",
		],
		[
			'icon'  => 'ads',
			'title' => 'Google & Meta Ads',
			'desc'  => 'Strategy, setup, and ongoing management of paid campaigns that drive qualified leads at a profitable cost.',
		],
		[
			'icon'  => 'track',
			'title' => 'GTM, GA4 & Pixel Tracking',
			'desc'  => 'Full tracking setup so you can see which campaigns, pages, and channels actually produce buyers.',
		],
	];
}

$mm_coaching_steps = get_option( 'mm_coaching_steps' );
if ( ! is_array( $mm_coaching_steps ) || empty( $mm_coaching_steps ) ) {
	$mm_coaching_steps = [
		[
			'num'   => '01',
			'title' => 'Free Discovery Call',
			'desc'  => 'We spend 30 minutes on your current setup, your goals, and the biggest gaps. No pitch — just clarity.',
		],
		[
			'num'   => '02',
			'title' => 'Action Plan',
			'desc'  => 'You get a written plan prioritising the highest-ROI fixes first, with clear timelines and expected outcomes.',
		],
		[
			'num'   => '03',
			'title' => 'Hands-On Execution',
			'desc'  => 'We implement inside your accounts — you get weekly updates and see changes in your data in real time.',
		],
	];
}

$mm_coaching_metrics = get_option( 'mm_coaching_metrics' );
if ( ! is_array( $mm_coaching_metrics ) || empty( $mm_coaching_metrics ) ) {
	$mm_coaching_metrics = [
		[ 'value' => '3&#215;',  'label' => 'Average increase in qualified leads' ],
		[ 'value' => '40%',      'label' => 'Reduction in cost per lead' ],
		[ 'value' => '90 days',  'label' => 'Typical time to measurable impact' ],
	];
}

$mm_coaching_testimonials = get_option( 'mm_coaching_testimonials' );
if ( ! is_array( $mm_coaching_testimonials ) || empty( $mm_coaching_testimonials ) ) {
	$mm_coaching_testimonials = [
		[
			'quote'    => 'Pourya fixed in two weeks what I had been struggling with for a year. My Google Ads are finally profitable.',
			'name'     => 'Erik Hoffmann',
			'role'     => 'Owner, Hoffmann Dental',
			'initials' => 'EH',
		],
		[
			'quote'    => 'The tracking setup alone changed how we make decisions. We now know exactly which channel pays for itself.',
			'name'     => 'Lena Vogel',
			'role'     => 'Marketing Lead, Formzeit',
			'initials' => 'LV',
		],
		[
			'quote'    => 'Our website conversion rate doubled after the audit. Straightforward advice, direct implementation.',
			'name'     => 'Marco Ricci',
			'role'     => 'Founder, Ricci Studi',
			'initials' => 'MR',
		],
	];
}

$mm_coaching_faq = get_option( 'mm_coaching_faq' );
if ( ! is_array( $mm_coaching_faq ) || empty( $mm_coaching_faq ) ) {
	$mm_coaching_faq = [
		[
			'q' => 'What kinds of businesses do you work with?',
			'a' => 'Primarily small to mid-sized businesses spending €500–€10,000/month on digital marketing — service businesses, local businesses, and e-commerce brands that want more from their current budget.',
		],
		[
			'q' => 'How is coaching different from hiring an agency?',
			'a' => 'You get direct access to one person who works inside your accounts, explains every decision, and builds systems you own. There are no account managers or handoffs.',
		],
		[
			'q' => 'Do I need to have ads running already?',
			'a' => 'No. Some clients come with existing campaigns, some start from scratch. The first call always looks at your current situation and we go from there.',
		],
		[
			'q' => 'How long does a typical engagement last?',
			'a' => 'Most clients see measurable results within the first 30–90 days. Ongoing retainers run month-to-month — no long-term contracts required.',
		],
		[
			'q' => 'What does the free call actually cover?',
			'a' => 'We look at your website, any active ad campaigns, and your analytics setup. You leave with at least two specific things you can fix immediately, regardless of whether we work together.',
		],
	];
}

get_header();
?>

<a class="skip-link" href="#main">Skip to content</a>

<!-- ============ SECTION 1: STICKY NAV — Calendly touchpoint 1 ============ -->
<header class="site-header" id="site-header">
	<div class="container header-inner">
		<a href="#top" class="brand">
			<span class="brand-mark" aria-hidden="true">M</span>
			<span class="brand-name">Mazz Marketing</span>
		</a>

		<nav class="main-nav" aria-label="Primary">
			<a href="#about">About</a>
			<a href="#services">Services</a>
			<a href="#results">Results</a>
			<a href="#faq">FAQ</a>
		</nav>

		<div class="header-actions">
			<a href="mailto:<?php echo esc_attr( $mm_coaching_contact_email ); ?>" class="btn btn-ghost">Contact</a>
			<a href="<?php echo esc_url( $mm_coaching_calendly_url ); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-primary">
				<?php echo esc_html( $mm_coaching_cta_label ); ?>
			</a>
			<button class="nav-toggle" id="navToggle" aria-label="Toggle menu" aria-expanded="false">
				<span></span><span></span><span></span>
			</button>
		</div>
	</div>
	<nav class="mobile-nav" id="mobileNav" aria-label="Mobile">
		<a href="#about">About</a>
		<a href="#services">Services</a>
		<a href="#results">Results</a>
		<a href="#faq">FAQ</a>
		<a href="<?php echo esc_url( $mm_coaching_calendly_url ); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-primary">
			<?php echo esc_html( $mm_coaching_cta_label ); ?>
		</a>
	</nav>
</header>

<main id="main">

	<!-- ============ SECTION 2: HERO — Calendly touchpoint 2 ============ -->
	<section class="hero" id="top">
		<div class="hero-glow" aria-hidden="true"></div>
		<div class="container hero-inner">
			<p class="eyebrow" data-reveal>&#128200; <?php echo esc_html( $mm_coaching_hero_eyebrow ); ?></p>
			<h1 data-reveal><?php echo esc_html( $mm_coaching_hero_heading ); ?></h1>
			<p class="hero-subhead" data-reveal>
				<?php echo esc_html( $mm_coaching_hero_subhead ); ?>
			</p>
			<div class="hero-ctas" data-reveal>
				<a href="<?php echo esc_url( $mm_coaching_calendly_url ); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-primary btn-lg">
					<?php echo esc_html( $mm_coaching_cta_label ); ?>
				</a>
				<a href="#services" class="btn btn-outline">See How It Works</a>
			</div>
		</div>
	</section>

	<!-- ============ SECTION 3: SOCIAL PROOF BAR ============ -->
	<section class="coach-proof-bar" id="proof" aria-label="Trust indicators">
		<div class="container">
			<p class="coach-proof-label" data-reveal><?php echo esc_html( $mm_coaching_social_proof_label ); ?></p>
			<div class="coach-proof-items" data-reveal>
				<div class="coach-proof-item">
					<span class="coach-proof-value">50+</span>
					<span class="coach-proof-desc">Businesses Coached</span>
				</div>
				<div class="coach-proof-divider" aria-hidden="true"></div>
				<div class="coach-proof-item">
					<span class="coach-proof-value">6+</span>
					<span class="coach-proof-desc">Years in Digital Marketing</span>
				</div>
				<div class="coach-proof-divider" aria-hidden="true"></div>
				<div class="coach-proof-item">
					<span class="coach-proof-value">Google</span>
					<span class="coach-proof-desc">&amp; Meta Certified</span>
				</div>
				<div class="coach-proof-divider" aria-hidden="true"></div>
				<div class="coach-proof-item">
					<span class="coach-proof-value">GTM</span>
					<span class="coach-proof-desc">GA4 &amp; Pixel Expert</span>
				</div>
			</div>
		</div>
	</section>

	<!-- ============ SECTION 4: PAIN / PROBLEM — Calendly touchpoint 3 ============ -->
	<section class="section" id="pain">
		<div class="container">
			<div class="coach-pain-grid">
				<div class="coach-pain-copy" data-reveal>
					<p class="eyebrow">THE PROBLEM</p>
					<h2 class="section-title"><?php echo esc_html( $mm_coaching_pain_heading ); ?></h2>
					<p class="section-subtitle"><?php echo esc_html( $mm_coaching_pain_body ); ?></p>
					<ul class="coach-pain-list">
						<li>Your website gets traffic but barely any enquiries</li>
						<li>You can't tell which campaigns are actually profitable</li>
						<li>Analytics shows numbers but not actionable decisions</li>
					</ul>
					<a href="<?php echo esc_url( $mm_coaching_calendly_url ); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-primary" style="margin-top:2rem;">
						<?php echo esc_html( $mm_coaching_cta_label ); ?>
					</a>
				</div>
				<div class="coach-pain-visual" data-reveal aria-hidden="true">
					<div class="coach-pain-card card">
						<div class="coach-pain-icon-row">
							<span class="icon-badge icon-badge-sm">
								<svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M3 17l6-6 4 4 8-9" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
							</span>
							<span class="coach-pain-tag">Ad Spend</span>
						</div>
						<p class="coach-pain-card-value">&euro;3,200 / mo</p>
						<p class="coach-pain-card-label">0 tracked conversions</p>
						<div class="coach-pain-card-arrow">
							<svg viewBox="0 0 24 24" fill="none" aria-hidden="true" style="width:20px;height:20px;color:var(--text-dim);margin-top:16px;"><path d="M12 5v14M5 12l7 7 7-7" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
						</div>
						<p class="coach-pain-card-value" style="color:var(--text-dim);">No clear ROI</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- ============ SECTION 5: ABOUT / AUTHORITY ============ -->
	<section class="section section-alt" id="about">
		<div class="container">
			<div class="coach-about-grid">
				<div class="coach-about-img-wrap" data-reveal>
					<?php if ( $mm_coaching_about_image_url ) : ?>
						<img src="<?php echo esc_url( $mm_coaching_about_image_url ); ?>"
						     alt="<?php echo esc_attr( $mm_coaching_about_heading ); ?>"
						     class="coach-about-img"
						     width="480" height="600">
					<?php else : ?>
						<div class="coach-about-img coach-about-placeholder" aria-hidden="true">
							<span class="avatar avatar-lg">PM</span>
						</div>
					<?php endif; ?>
				</div>
				<div class="coach-about-copy" data-reveal>
					<p class="eyebrow">ABOUT</p>
					<h2 class="section-title"><?php echo esc_html( $mm_coaching_about_heading ); ?></h2>
					<p class="section-subtitle"><?php echo esc_html( $mm_coaching_about_bio ); ?></p>
					<ul class="coach-credentials">
						<li><span class="check" aria-hidden="true">&#10003;</span> Google Ads &amp; Analytics certified</li>
						<li><span class="check" aria-hidden="true">&#10003;</span> Meta Blueprint certified</li>
						<li><span class="check" aria-hidden="true">&#10003;</span> GTM &amp; GA4 implementation specialist</li>
						<li><span class="check" aria-hidden="true">&#10003;</span> 6+ years managing paid media for SMBs</li>
					</ul>
				</div>
			</div>
		</div>
	</section>

	<!-- ============ SECTION 6: SERVICES — Calendly touchpoint 4 ============ -->
	<section class="section" id="services">
		<div class="container">
			<p class="eyebrow center" data-reveal>SERVICES</p>
			<h2 class="section-title center" data-reveal>Where I can help you grow</h2>

			<div class="grid grid-3" data-reveal-group>
				<?php foreach ( $mm_coaching_services as $service ) :
					$icon = isset( $service['icon'] ) ? $service['icon'] : 'web';
				?>
					<div class="card" data-reveal>
						<div class="icon-badge">
							<?php if ( 'ads' === $icon ) : ?>
								<svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4 4h16v12H7l-3 3V4z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/></svg>
							<?php elseif ( 'track' === $icon ) : ?>
								<svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4 19V9M12 19V5M20 19v-6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
							<?php else : ?>
								<svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><rect x="3" y="4" width="18" height="16" rx="2" stroke="currentColor" stroke-width="1.6"/><path d="M3 9h18M8 4v5" stroke="currentColor" stroke-width="1.6"/></svg>
							<?php endif; ?>
						</div>
						<h3><?php echo esc_html( $service['title'] ); ?></h3>
						<p><?php echo esc_html( $service['desc'] ); ?></p>
					</div>
				<?php endforeach; ?>
			</div>

			<div class="center" style="margin-top:2.5rem;" data-reveal>
				<a href="<?php echo esc_url( $mm_coaching_calendly_url ); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-primary btn-lg">
					<?php echo esc_html( $mm_coaching_cta_label ); ?>
				</a>
			</div>
		</div>
	</section>

	<!-- ============ SECTION 7: HOW IT WORKS ============ -->
	<section class="section section-alt" id="process">
		<div class="container">
			<p class="eyebrow center" data-reveal>HOW IT WORKS</p>
			<h2 class="section-title center" data-reveal>Three steps to measurable results</h2>

			<div class="process-list" data-reveal-group>
				<?php foreach ( $mm_coaching_steps as $step ) : ?>
					<div class="process-step" data-reveal>
						<div>
							<span class="process-num"><?php echo esc_html( $step['num'] ); ?></span>
							<h3><?php echo esc_html( $step['title'] ); ?></h3>
							<p><?php echo esc_html( $step['desc'] ); ?></p>
						</div>
						<div class="process-media" aria-hidden="true"></div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<!-- ============ SECTION 8: RESULTS / CASE STUDIES — Calendly touchpoint 5 ============ -->
	<section class="section" id="results">
		<div class="container">
			<p class="eyebrow center" data-reveal>RESULTS</p>
			<h2 class="section-title center" data-reveal><?php echo esc_html( $mm_coaching_result_heading ); ?></h2>

			<div class="grid grid-3" data-reveal-group style="margin-bottom:3rem;">
				<?php foreach ( $mm_coaching_metrics as $m ) : ?>
					<div class="stat card" data-reveal>
						<span class="metric-value"><?php echo wp_kses_post( $m['value'] ); ?></span>
						<span class="metric-label"><?php echo esc_html( $m['label'] ); ?></span>
					</div>
				<?php endforeach; ?>
			</div>

			<div class="case-study" data-reveal>
				<div class="case-study-copy">
					<span class="tag">Client Story</span>
					<h3>From zero tracking to a profitable lead machine &mdash; in 60 days.</h3>
					<p>A Berlin-based legal services firm was running Google Ads with no conversion tracking and no idea which campaigns drove enquiries. We rebuilt their GA4 setup, fixed their landing pages, and restructured their campaigns &mdash; lead volume tripled and cost per lead dropped by 44%.</p>
				</div>
				<div class="case-study-metrics">
					<div class="metric">
						<span class="metric-value">3&times;</span>
						<span class="metric-label">Leads per month</span>
					</div>
					<div class="metric">
						<span class="metric-value">44%</span>
						<span class="metric-label">Lower cost per lead</span>
					</div>
				</div>
			</div>

			<div class="center" style="margin-top:2.5rem;" data-reveal>
				<a href="<?php echo esc_url( $mm_coaching_calendly_url ); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-primary btn-lg">
					<?php echo esc_html( $mm_coaching_cta_label ); ?>
				</a>
			</div>
		</div>
	</section>

	<!-- ============ SECTION 9: TESTIMONIALS ============ -->
	<section class="section section-alt" id="testimonials">
		<div class="container">
			<p class="eyebrow center" data-reveal>TESTIMONIALS</p>
			<h2 class="section-title center" data-reveal>What clients say</h2>

			<div class="grid grid-3" data-reveal-group>
				<?php foreach ( $mm_coaching_testimonials as $t ) : ?>
					<figure class="card testimonial-card" data-reveal>
						<span class="stars" aria-hidden="true">&#9733;&#9733;&#9733;&#9733;&#9733;</span>
						<blockquote>&ldquo;<?php echo esc_html( $t['quote'] ); ?>&rdquo;</blockquote>
						<figcaption>
							<span class="avatar" aria-hidden="true"><?php echo esc_html( $t['initials'] ); ?></span>
							<span>
								<strong><?php echo esc_html( $t['name'] ); ?></strong><br>
								<?php echo esc_html( $t['role'] ); ?>
							</span>
						</figcaption>
					</figure>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<!-- ============ SECTION 10: FAQ ============ -->
	<section class="section" id="faq">
		<div class="container">
			<p class="eyebrow center" data-reveal>FAQ</p>
			<h2 class="section-title center" data-reveal>Common questions</h2>

			<div class="faq-list" data-reveal>
				<?php foreach ( $mm_coaching_faq as $faq ) : ?>
					<div class="faq-item">
						<button class="faq-question" aria-expanded="false">
							<?php echo esc_html( $faq['q'] ); ?>
							<span class="faq-icon" aria-hidden="true">&#8964;</span>
						</button>
						<div class="faq-answer">
							<p><?php echo wp_kses_post( $faq['a'] ); ?></p>
						</div>
					</div>
				<?php endforeach; ?>
			</div>

			<p class="faq-contact" data-reveal>
				Still have questions? Reach out at
				<a href="mailto:<?php echo esc_attr( $mm_coaching_contact_email ); ?>">
					<?php echo esc_html( $mm_coaching_contact_email ); ?>
				</a>
			</p>
		</div>
	</section>

	<!-- ============ SECTION 11: CTA FOOTER — Calendly touchpoint 6 ============ -->
	<section class="cta-section" id="contact">
		<div class="cta-glow" aria-hidden="true"></div>
		<div class="container cta-inner" data-reveal>
			<p class="eyebrow center" style="margin-bottom:1.5rem;">FREE CONSULTATION</p>
			<div class="brand" style="justify-content:center;margin-bottom:14px;">
				<span class="brand-mark" aria-hidden="true">M</span>
				<span class="brand-name">Mazz Marketing</span>
			</div>
			<h2><?php echo esc_html( $mm_coaching_cta_heading ); ?></h2>
			<p><?php echo esc_html( $mm_coaching_cta_body ); ?></p>
			<a href="<?php echo esc_url( $mm_coaching_calendly_url ); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-primary btn-lg">
				<?php echo esc_html( $mm_coaching_cta_label ); ?>
			</a>
			<div class="footer-links-row">
				<a href="#about">About</a>
				<a href="#services">Services</a>
				<a href="#results">Results</a>
				<a href="#faq">FAQ</a>
				<a href="mailto:<?php echo esc_attr( $mm_coaching_contact_email ); ?>">Contact</a>
			</div>
		</div>
	</section>

</main>

<footer class="site-footer">
	<div class="container footer-bottom">
		<p>Mazz Marketing &copy; <?php echo esc_html( gmdate( 'Y' ) ); ?>. All rights reserved.</p>
	</div>
</footer>

<?php get_footer(); ?>
