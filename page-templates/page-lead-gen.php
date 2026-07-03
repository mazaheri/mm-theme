<?php
/**
 * Template Name: Lead-Gen Landing Page
 *
 * Dark-gradient lead-gen page: hero with ripple-orb, pain-point section,
 * solution section, testimonials, and lead capture form.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<a class="lg-skip-link" href="#lg-main">Skip to content</a>

<!-- ============================================================
     HEADER / NAV
============================================================ -->
<header class="lg-header" id="lg-top">
	<div class="lg-container lg-header-inner">
		<a href="#lg-top" class="lg-brand">
			<span class="lg-brand-mark" aria-hidden="true">M</span>
			<span>Mazz Marketing</span>
		</a>

		<nav class="lg-main-nav" aria-label="Primary">
			<a href="#lg-pain"><?php esc_html_e( 'The Problem', 'mm-theme' ); ?></a>
			<a href="#lg-solution"><?php esc_html_e( 'Our Solution', 'mm-theme' ); ?></a>
			<a href="#lg-proof"><?php esc_html_e( 'Results', 'mm-theme' ); ?></a>
			<a href="#lg-form"><?php esc_html_e( 'Get Your Audit', 'mm-theme' ); ?></a>
		</nav>

		<div class="lg-header-actions">
			<a href="#lg-form" class="lg-btn lg-btn-outline"><?php esc_html_e( 'Login', 'mm-theme' ); ?></a>
			<a href="#lg-form" class="lg-btn lg-btn-primary"><?php esc_html_e( 'Get Free Audit', 'mm-theme' ); ?></a>
			<button class="lg-nav-toggle" id="lgNavToggle" aria-label="<?php esc_attr_e( 'Toggle menu', 'mm-theme' ); ?>" aria-expanded="false">
				<span></span><span></span><span></span>
			</button>
		</div>
	</div>
	<nav class="lg-mobile-nav" id="lgMobileNav" aria-label="<?php esc_attr_e( 'Mobile', 'mm-theme' ); ?>">
		<a href="#lg-pain"><?php esc_html_e( 'The Problem', 'mm-theme' ); ?></a>
		<a href="#lg-solution"><?php esc_html_e( 'Our Solution', 'mm-theme' ); ?></a>
		<a href="#lg-proof"><?php esc_html_e( 'Results', 'mm-theme' ); ?></a>
		<a href="#lg-form" class="lg-btn lg-btn-primary lg-btn-block"><?php esc_html_e( 'Get Free Audit', 'mm-theme' ); ?></a>
	</nav>
</header>

<main id="lg-main">

	<!-- ============================================================
	     HERO — headline, sub-headline, CTA, ripple-orb
	============================================================ -->
	<section class="lg-hero" id="lg-hero">
		<div class="lg-hero-glow" aria-hidden="true"></div>
		<div class="lg-container lg-hero-inner">

			<p class="lg-eyebrow" data-lg-reveal>&#10024; <?php esc_html_e( 'Free Marketing Audit — Limited Spots', 'mm-theme' ); ?></p>

			<h1 data-lg-reveal>
				<?php esc_html_e( 'Stop Burning Budget on Marketing', 'mm-theme' ); ?><br>
				<span class="lg-gradient-text"><?php esc_html_e( "That Doesn't Convert", 'mm-theme' ); ?></span>
			</h1>

			<p class="lg-hero-subhead" data-lg-reveal>
				<?php esc_html_e( 'Get a free, personalised audit of your marketing funnel and discover exactly where you\'re losing leads — and how to fix it in 30 days.', 'mm-theme' ); ?>
			</p>

			<div class="lg-hero-ctas" data-lg-reveal>
				<a href="#lg-form" class="lg-btn lg-btn-primary"><?php esc_html_e( 'Claim My Free Audit →', 'mm-theme' ); ?></a>
				<a href="#lg-solution" class="lg-btn lg-btn-outline"><?php esc_html_e( 'See How It Works', 'mm-theme' ); ?></a>
			</div>

			<div class="lg-orb-wrap" aria-hidden="true">
				<canvas class="lg-orb-canvas" id="lgOrbCanvas" width="280" height="280"></canvas>
				<span class="lg-orb-label">Mazz</span>
			</div>

		</div>
	</section>

	<!-- Stats strip -->
	<div class="lg-container">
		<div class="lg-stats-row">
			<div class="lg-stat" data-lg-reveal>
				<span class="lg-metric-value">120+</span>
				<span class="lg-metric-label"><?php esc_html_e( 'Audits Completed', 'mm-theme' ); ?></span>
			</div>
			<div class="lg-stat" data-lg-reveal>
				<span class="lg-metric-value">38%</span>
				<span class="lg-metric-label"><?php esc_html_e( 'Avg. CPA Reduction', 'mm-theme' ); ?></span>
			</div>
			<div class="lg-stat" data-lg-reveal>
				<span class="lg-metric-value">164%</span>
				<span class="lg-metric-label"><?php esc_html_e( 'Avg. ROAS Lift', 'mm-theme' ); ?></span>
			</div>
			<div class="lg-stat" data-lg-reveal>
				<span class="lg-metric-value">94%</span>
				<span class="lg-metric-label"><?php esc_html_e( 'Client Satisfaction', 'mm-theme' ); ?></span>
			</div>
		</div>
	</div>

	<!-- ============================================================
	     PAIN-POINT SECTION — 3 bullets about bad marketing
	============================================================ -->
	<section class="lg-section" id="lg-pain">
		<div class="lg-container">

			<p class="lg-eyebrow lg-center" data-lg-reveal><?php esc_html_e( 'Sound Familiar?', 'mm-theme' ); ?></p>
			<h2 class="lg-section-title lg-center" data-lg-reveal>
				<?php esc_html_e( 'Why Most Marketing', 'mm-theme' ); ?><br>
				<?php esc_html_e( "Wastes More Than It Makes", 'mm-theme' ); ?>
			</h2>
			<p class="lg-section-subtitle lg-center" data-lg-reveal>
				<?php esc_html_e( "If any of these hit home, you're leaving serious revenue on the table every single month.", 'mm-theme' ); ?>
			</p>

			<div class="lg-grid-3" data-lg-reveal-group>

				<div class="lg-card lg-pain-card" data-lg-reveal>
					<div class="lg-icon-badge">
						<svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
							<path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z" fill="currentColor"/>
						</svg>
					</div>
					<h3><?php esc_html_e( 'Ad Budget Disappearing with Nothing to Show', 'mm-theme' ); ?></h3>
					<p><?php esc_html_e( "You're spending thousands on paid ads but can't trace a single dollar back to actual revenue. Every month feels like a gamble.", 'mm-theme' ); ?></p>
				</div>

				<div class="lg-card lg-pain-card" data-lg-reveal>
					<div class="lg-icon-badge">
						<svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
							<path d="M3 4h18l-7 8.5V20l-4-2v-5.5L3 4z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/>
							<line x1="3" y1="20" x2="21" y2="4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
						</svg>
					</div>
					<h3><?php esc_html_e( 'Leads Coming In But Not Converting', 'mm-theme' ); ?></h3>
					<p><?php esc_html_e( 'Your funnel is leaking. Visitors arrive, fill out a form — then go cold. No follow-up, no nurture, no deal. Just silence.', 'mm-theme' ); ?></p>
				</div>

				<div class="lg-card lg-pain-card" data-lg-reveal>
					<div class="lg-icon-badge">
						<svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
							<circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="1.7"/>
							<path d="M16.24 7.76l-2.12 6.36-6.36 2.12 2.12-6.36 6.36-2.12z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/>
						</svg>
					</div>
					<h3><?php esc_html_e( 'No Clear Strategy — Just Guessing', 'mm-theme' ); ?></h3>
					<p><?php esc_html_e( 'You post, boost, tweak, and repeat — but without data-driven direction. Every quarter feels like you\'re starting from scratch.', 'mm-theme' ); ?></p>
				</div>

			</div>
		</div>
	</section>

	<!-- ============================================================
	     SOLUTION SECTION — 3 bullets about what Mazz-Marketing does
	============================================================ -->
	<section class="lg-section lg-section-alt" id="lg-solution">
		<div class="lg-container">

			<p class="lg-eyebrow lg-center" data-lg-reveal><?php esc_html_e( 'How We Fix It', 'mm-theme' ); ?></p>
			<h2 class="lg-section-title lg-center" data-lg-reveal>
				<?php esc_html_e( 'AI-Powered Marketing That', 'mm-theme' ); ?><br>
				<span class="lg-gradient-text"><?php esc_html_e( 'Actually Moves Revenue', 'mm-theme' ); ?></span>
			</h2>
			<p class="lg-section-subtitle lg-center" data-lg-reveal>
				<?php esc_html_e( 'Mazz Marketing pairs intelligent automation with hands-on execution — so every channel works together, and nothing falls through the cracks.', 'mm-theme' ); ?>
			</p>

			<div class="lg-grid-3" data-lg-reveal-group>

				<div class="lg-card lg-solution-card" data-lg-reveal>
					<div class="lg-icon-badge">
						<svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
							<path d="M4 19V9M12 19V5M20 19v-6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
						</svg>
					</div>
					<h3><?php esc_html_e( 'Full-Funnel Audit & Clarity', 'mm-theme' ); ?></h3>
					<p><?php esc_html_e( "We map every touchpoint from first click to closed deal, find the leaks, and give you a prioritised action plan — not a 60-page PDF you'll never read.", 'mm-theme' ); ?></p>
				</div>

				<div class="lg-card lg-solution-card" data-lg-reveal>
					<div class="lg-icon-badge">
						<svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
							<path d="M17 3l4 4-4 4M7 21l-4-4 4-4" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
							<path d="M21 7H9a4 4 0 00-4 4M3 17h12a4 4 0 004-4" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/>
						</svg>
					</div>
					<h3><?php esc_html_e( 'AI-Driven Campaigns & Automation', 'mm-theme' ); ?></h3>
					<p><?php esc_html_e( 'We deploy AI-optimised ad strategies, automated lead-nurture sequences, and content systems that compound results month over month.', 'mm-theme' ); ?></p>
				</div>

				<div class="lg-card lg-solution-card" data-lg-reveal>
					<div class="lg-icon-badge">
						<svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
							<path d="M3 17l5-5 4 4 9-9" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
							<path d="M17 7h4v4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
						</svg>
					</div>
					<h3><?php esc_html_e( 'Transparent Reporting You Actually Understand', 'mm-theme' ); ?></h3>
					<p><?php esc_html_e( 'Weekly dashboards that connect marketing activity directly to pipeline and revenue — no vanity metrics, no guesswork, just numbers that matter.', 'mm-theme' ); ?></p>
				</div>

			</div>
		</div>
	</section>

	<!-- ============================================================
	     TESTIMONIALS
	============================================================ -->
	<section class="lg-section" id="lg-proof">
		<div class="lg-container">

			<p class="lg-eyebrow lg-center" data-lg-reveal><?php esc_html_e( 'Real Results', 'mm-theme' ); ?></p>
			<h2 class="lg-section-title lg-center" data-lg-reveal>
				<?php esc_html_e( 'What Clients Say After the Audit', 'mm-theme' ); ?>
			</h2>
			<p class="lg-section-subtitle lg-center" data-lg-reveal>
				<?php esc_html_e( 'Join brands who trust us to grow their business.', 'mm-theme' ); ?>
			</p>

			<div class="lg-grid-3" data-lg-reveal-group>

				<figure class="lg-card lg-testimonial-card" data-lg-reveal>
					<span class="lg-stars" aria-label="<?php esc_attr_e( '5 stars', 'mm-theme' ); ?>">&#9733;&#9733;&#9733;&#9733;&#9733;</span>
					<blockquote>
						<?php esc_html_e( 'The audit was a wake-up call. We found we were wasting 40% of our ad budget on the wrong audience. Within six weeks our cost-per-lead dropped by a third.', 'mm-theme' ); ?>
					</blockquote>
					<figcaption>
						<span class="lg-avatar" aria-hidden="true">RK</span>
						<span>
							<strong><?php esc_html_e( 'Rana Karimi', 'mm-theme' ); ?></strong>
							<?php esc_html_e( 'Head of Growth, Studioline', 'mm-theme' ); ?>
						</span>
					</figcaption>
				</figure>

				<figure class="lg-card lg-testimonial-card" data-lg-reveal>
					<span class="lg-stars" aria-label="<?php esc_attr_e( '5 stars', 'mm-theme' ); ?>">&#9733;&#9733;&#9733;&#9733;&#9733;</span>
					<blockquote>
						<?php esc_html_e( 'Mazz Marketing plugged straight into our team and shipped faster than any agency we\'ve worked with. The automated follow-up sequences alone doubled our show-up rate.', 'mm-theme' ); ?>
					</blockquote>
					<figcaption>
						<span class="lg-avatar" aria-hidden="true">DT</span>
						<span>
							<strong><?php esc_html_e( 'Daniel Tran', 'mm-theme' ); ?></strong>
							<?php esc_html_e( 'VP Marketing, Fieldworks', 'mm-theme' ); ?>
						</span>
					</figcaption>
				</figure>

				<figure class="lg-card lg-testimonial-card" data-lg-reveal>
					<span class="lg-stars" aria-label="<?php esc_attr_e( '5 stars', 'mm-theme' ); ?>">&#9733;&#9733;&#9733;&#9733;&#9733;</span>
					<blockquote>
						<?php esc_html_e( "I expected a generic report. What I got was a 30-day roadmap with specific changes I could hand directly to my team. We saw measurable improvement by week three.", 'mm-theme' ); ?>
					</blockquote>
					<figcaption>
						<span class="lg-avatar" aria-hidden="true">SO</span>
						<span>
							<strong><?php esc_html_e( 'Sara Ostad', 'mm-theme' ); ?></strong>
							<?php esc_html_e( 'Founder, Loomly Goods', 'mm-theme' ); ?>
						</span>
					</figcaption>
				</figure>

			</div>
		</div>
	</section>

	<!-- ============================================================
	     LEAD CAPTURE FORM
	============================================================ -->
	<section class="lg-section lg-form-section" id="lg-form">
		<div class="lg-container">

			<p class="lg-eyebrow lg-center" data-lg-reveal><?php esc_html_e( 'Limited Spots Available', 'mm-theme' ); ?></p>
			<h2 class="lg-section-title lg-center" data-lg-reveal>
				<?php esc_html_e( 'Claim Your Free', 'mm-theme' ); ?><br>
				<span class="lg-gradient-text"><?php esc_html_e( 'Marketing Audit', 'mm-theme' ); ?></span>
			</h2>
			<p class="lg-section-subtitle lg-center" data-lg-reveal>
				<?php esc_html_e( "Fill in your details below. One of our strategists will reach out within 24 hours to schedule your personalised session — completely free, no strings attached.", 'mm-theme' ); ?>
			</p>

			<div class="lg-form-wrap">
				<div class="lg-form" data-lg-reveal>
					<form id="lgLeadForm" method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" novalidate>
						<?php wp_nonce_field( 'mm_lead_gen_submit', 'mm_lead_gen_nonce' ); ?>
						<input type="hidden" name="action" value="mm_lead_gen_submit">

						<div class="lg-field-group">
							<div class="lg-field">
								<label for="lgName"><?php esc_html_e( 'Full Name', 'mm-theme' ); ?></label>
								<input
									type="text"
									id="lgName"
									name="lg_name"
									placeholder="<?php esc_attr_e( 'Jane Smith', 'mm-theme' ); ?>"
									required
									autocomplete="name"
								>
							</div>

							<div class="lg-field">
								<label for="lgEmail"><?php esc_html_e( 'Email Address', 'mm-theme' ); ?></label>
								<input
									type="email"
									id="lgEmail"
									name="lg_email"
									placeholder="<?php esc_attr_e( 'jane@company.com', 'mm-theme' ); ?>"
									required
									autocomplete="email"
								>
							</div>

							<div class="lg-field">
								<label for="lgPhone"><?php esc_html_e( 'Phone Number', 'mm-theme' ); ?></label>
								<input
									type="tel"
									id="lgPhone"
									name="lg_phone"
									placeholder="<?php esc_attr_e( '+1 (555) 000-0000', 'mm-theme' ); ?>"
									autocomplete="tel"
								>
							</div>
						</div>

						<button type="submit" class="lg-btn lg-btn-primary lg-btn-block lg-submit-btn">
							<?php esc_html_e( 'Get My Free Audit →', 'mm-theme' ); ?>
						</button>

						<p class="lg-form-note">
							&#128274; <?php esc_html_e( 'We respect your privacy. No spam, ever. Unsubscribe any time.', 'mm-theme' ); ?>
						</p>
					</form>
				</div>
			</div>

		</div>
	</section>

</main>

<!-- ============================================================
     FOOTER
============================================================ -->
<footer class="lg-footer">
	<div class="lg-container lg-footer-inner">
		<a href="#lg-top" class="lg-brand">
			<span class="lg-brand-mark" aria-hidden="true">M</span>
			<span><?php esc_html_e( 'Mazz Marketing', 'mm-theme' ); ?></span>
		</a>

		<nav class="lg-footer-links" aria-label="<?php esc_attr_e( 'Footer', 'mm-theme' ); ?>">
			<a href="#lg-pain"><?php esc_html_e( 'The Problem', 'mm-theme' ); ?></a>
			<a href="#lg-solution"><?php esc_html_e( 'Solution', 'mm-theme' ); ?></a>
			<a href="#lg-proof"><?php esc_html_e( 'Results', 'mm-theme' ); ?></a>
			<a href="#lg-form"><?php esc_html_e( 'Free Audit', 'mm-theme' ); ?></a>
			<a href="https://www.instagram.com/mazz_marketing" target="_blank" rel="noopener noreferrer">Instagram</a>
			<a href="https://www.linkedin.com/in/pourya-mazaheri-fard-2b4299390/" target="_blank" rel="noopener noreferrer">LinkedIn</a>
			<a href="#"><?php esc_html_e( 'Privacy', 'mm-theme' ); ?></a>
		</nav>

		<p class="lg-footer-copy">
			&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php esc_html_e( 'Mazz Marketing. All rights reserved.', 'mm-theme' ); ?>
		</p>
	</div>
</footer>

<?php get_footer(); ?>
