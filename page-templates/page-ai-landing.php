<?php
/**
 * Template Name: AI Landing Page
 *
 * Full marketing landing page: hero, benefits, features, services, process,
 * case study, testimonials, pricing, comparison, team, FAQ, footer CTA.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$mm_ai_hero_eyebrow  = get_theme_mod( 'mm_ai_hero_eyebrow', 'AI MARKETING FOR GROWING BRANDS' );
$mm_ai_hero_heading  = get_theme_mod( 'mm_ai_hero_heading', 'Marketing that thinks as fast as you grow.' );
$mm_ai_hero_subhead  = get_theme_mod( 'mm_ai_hero_subhead', 'AI-driven strategy paired with hands-on execution — campaigns, content, and automation built to compound results.' );
$mm_ai_founder_quote = get_theme_mod( 'mm_ai_founder_quote', "We don't guess — we test, measure, and scale what actually moves revenue." );
$mm_ai_founder_name  = get_theme_mod( 'mm_ai_founder_name', 'Pourya Mazaheri, Founder' );
$mm_ai_contact_email = get_theme_mod( 'mm_ai_contact_email', 'hello@mazzmarketing.com' );

$mm_ai_faqs = get_option( 'mm_ai_landing_faq' );
if ( ! is_array( $mm_ai_faqs ) || empty( $mm_ai_faqs ) ) {
	$mm_ai_faqs = [
		[
			'q' => 'What services do you offer?',
			'a' => 'We handle paid media, lifecycle marketing, content production, and marketing automation — either as a full-service partner or focused on the specific channel you need help with.',
		],
		[
			'q' => 'How long does onboarding take?',
			'a' => 'Most clients are fully onboarded and live within two to three weeks, starting with the growth assessment and moving straight into a phased rollout.',
		],
		[
			'q' => 'Do I need any technical setup on my end?',
			'a' => 'No. We handle the technical integration with your ad accounts, CRM, and analytics tools — you just need admin access to grant permissions.',
		],
		[
			'q' => 'How is our data handled?',
			'a' => 'Your data stays in your own ad accounts and analytics platforms wherever possible. Anything we process directly is encrypted and never shared with third parties.',
		],
		[
			'q' => 'Can this actually grow with my business?',
			'a' => 'Yes — our packages are built to scale from a single channel up to a fully automated, multi-channel system as your budget and team grow.',
		],
	];
}

$mm_ai_team = get_option( 'mm_ai_landing_team' );
if ( ! is_array( $mm_ai_team ) || empty( $mm_ai_team ) ) {
	$mm_ai_team = [
		[ 'name' => 'Pourya Mazaheri', 'role' => 'Founder &amp; CEO', 'initials' => 'PM' ],
		[ 'name' => 'Mahsa Sanati', 'role' => 'Strategy &amp; Operations', 'initials' => 'MS' ],
		[ 'name' => 'Jonas Lindqvist', 'role' => 'Creative Director', 'initials' => 'JL' ],
		[ 'name' => 'Amara Klein', 'role' => 'Client Success', 'initials' => 'AK' ],
	];
}

get_header();
?>

<a class="skip-link" href="#main">Skip to content</a>

<header class="site-header" id="site-header">
	<div class="container header-inner">
		<a href="#top" class="brand">
			<span class="brand-mark" aria-hidden="true">M</span>
			<span class="brand-name">Mazz Marketing</span>
		</a>

		<nav class="main-nav" aria-label="Primary">
			<a href="#features">Features</a>
			<a href="#services">Services</a>
			<a href="#pricing">Pricing</a>
			<a href="#work">Work</a>
			<a href="#faq">FAQ</a>
		</nav>

		<div class="header-actions">
			<a href="#contact" class="btn btn-ghost">Contact</a>
			<a href="#contact" class="btn btn-primary">Get Started</a>
			<button class="nav-toggle" id="navToggle" aria-label="Toggle menu" aria-expanded="false">
				<span></span><span></span><span></span>
			</button>
		</div>
	</div>
	<nav class="mobile-nav" id="mobileNav" aria-label="Mobile">
		<a href="#features">Features</a>
		<a href="#services">Services</a>
		<a href="#pricing">Pricing</a>
		<a href="#work">Work</a>
		<a href="#faq">FAQ</a>
		<a href="#contact" class="btn btn-primary">Get Started</a>
	</nav>
</header>

<main id="main">

	<!-- ============ HERO ============ -->
	<section class="hero" id="top">
		<div class="hero-glow" aria-hidden="true"></div>
		<div class="container hero-inner">
			<p class="eyebrow" data-reveal>&#10024; <?php echo esc_html( $mm_ai_hero_eyebrow ); ?></p>
			<h1 data-reveal><?php echo esc_html( $mm_ai_hero_heading ); ?></h1>
			<p class="hero-subhead" data-reveal>
				<?php echo esc_html( $mm_ai_hero_subhead ); ?>
			</p>
			<div class="hero-ctas" data-reveal>
				<a href="#contact" class="btn btn-primary">Start a Project</a>
				<a href="#services" class="btn btn-outline">See Our Services</a>
			</div>
			<p class="founder-quote" data-reveal>
				&ldquo;<?php echo esc_html( $mm_ai_founder_quote ); ?>&rdquo;
				<cite>&mdash; <?php echo esc_html( $mm_ai_founder_name ); ?></cite>
			</p>
		</div>
	</section>

	<!-- ============ BENEFITS ============ -->
	<section class="section" id="benefits">
		<div class="container">
			<p class="eyebrow center" data-reveal>WHY CHOOSE US</p>
			<h2 class="section-title center" data-reveal>Built for brands who want proof, not promises</h2>

			<div class="grid grid-3" data-reveal-group>
				<div class="card benefit-card" data-reveal>
					<h3>Real-Time Analytics</h3>
					<p>Stay ahead with accurate, real-time performance tracking.</p>
				</div>
				<div class="card benefit-card" data-reveal>
					<h3>AI-Driven Growth</h3>
					<p>Make smarter moves with accurate, real-time business insights.</p>
				</div>
				<div class="card benefit-card" data-reveal>
					<h3>Sync in Real Time</h3>
					<p>Connect with your team instantly to track progress and updates.</p>
				</div>
			</div>
		</div>
	</section>

	<!-- ============ FEATURES ============ -->
	<section class="section section-alt" id="features">
		<div class="container">
			<p class="eyebrow center" data-reveal>FEATURES</p>
			<h2 class="section-title center" data-reveal>All features in one tool</h2>

			<div class="grid grid-4" data-reveal-group>
				<div class="card feature-card" data-reveal>
					<div class="icon-badge icon-badge-sm">
						<svg viewBox="0 0 24 24" fill="none"><path d="M12 2l2.4 6.6L21 11l-6.6 2.4L12 20l-2.4-6.6L3 11l6.6-2.4L12 2z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/></svg>
					</div>
					<h3>Cutting-Edge AI</h3>
					<p>Adaptive models that learn from every campaign and get sharper over time.</p>
				</div>
				<div class="card feature-card" data-reveal>
					<div class="icon-badge icon-badge-sm">
						<svg viewBox="0 0 24 24" fill="none"><rect x="3" y="4" width="18" height="16" rx="2" stroke="currentColor" stroke-width="1.6"/><path d="M3 9h18M8 4v5" stroke="currentColor" stroke-width="1.6"/></svg>
					</div>
					<h3>Automated Workflows</h3>
					<p>From lead capture to follow-up, repetitive tasks run themselves.</p>
				</div>
				<div class="card feature-card" data-reveal>
					<div class="icon-badge icon-badge-sm">
						<svg viewBox="0 0 24 24" fill="none"><path d="M4 19V9M12 19V5M20 19v-6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
					</div>
					<h3>Insightful Analytics</h3>
					<p>Clear reporting that connects marketing activity to pipeline and revenue.</p>
				</div>
				<div class="card feature-card" data-reveal>
					<div class="icon-badge icon-badge-sm">
						<svg viewBox="0 0 24 24" fill="none"><path d="M12 3a7 7 0 00-7 7c0 3 2 4.5 2 6.5V18h10v-1.5c0-2 2-3.5 2-6.5a7 7 0 00-7-7z" stroke="currentColor" stroke-width="1.6"/><path d="M9.5 21h5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
					</div>
					<h3>AI-Powered Support</h3>
					<p>Always-on virtual assistants handle FAQs and qualify leads.</p>
				</div>
			</div>
		</div>
	</section>

	<!-- ============ SERVICES ============ -->
	<section class="section" id="services">
		<div class="container">
			<p class="eyebrow center" data-reveal>SERVICES</p>
			<h2 class="section-title center" data-reveal>Our AI-driven services</h2>

			<div class="grid grid-2" data-reveal-group>
				<div class="card service-card" data-reveal>
					<div class="icon-badge">
						<svg viewBox="0 0 24 24" fill="none"><path d="M4 4h16v12H7l-3 3V4z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/></svg>
					</div>
					<h3>AI Strategy Consulting</h3>
					<p>Get expert guidance to implement AI solutions that drive business growth.</p>
				</div>
				<div class="card service-card" data-reveal>
					<div class="icon-badge">
						<svg viewBox="0 0 24 24" fill="none"><path d="M5 5h14v10l-4 4H5V5z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/><path d="M8 9h8M8 13h5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
					</div>
					<h3>Content Generation</h3>
					<p>We provide seamless content creation that generates captivating, on-brand copy.</p>
				</div>
				<div class="card service-card" data-reveal>
					<div class="icon-badge">
						<svg viewBox="0 0 24 24" fill="none"><rect x="4" y="5" width="16" height="14" rx="3" stroke="currentColor" stroke-width="1.6"/><circle cx="9" cy="11" r="1.2" fill="currentColor"/><circle cx="15" cy="11" r="1.2" fill="currentColor"/><path d="M9 15c1 1 5 1 6 0" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/></svg>
					</div>
					<h3>AI-Powered Chatbots</h3>
					<p>Conversational assistants trained on your offer, qualifying leads 24/7.</p>
				</div>
				<div class="card service-card" data-reveal>
					<div class="icon-badge">
						<svg viewBox="0 0 24 24" fill="none"><path d="M17 3l4 4-4 4M7 21l-4-4 4-4" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/><path d="M21 7H9a4 4 0 00-4 4M3 17h12a4 4 0 004-4" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg>
					</div>
					<h3>Automated Workflows</h3>
					<p>End-to-end nurture sequences that move leads from click to close.</p>
				</div>
			</div>
		</div>
	</section>

	<!-- ============ PROCESS ============ -->
	<section class="section section-alt" id="process">
		<div class="container">
			<p class="eyebrow center" data-reveal>PROCESS</p>
			<h2 class="section-title center" data-reveal>Simple &amp; scalable</h2>

			<div class="process-list" data-reveal-group>
				<div class="process-step" data-reveal>
					<div>
						<span class="process-num">01</span>
						<h3>Growth Assessment</h3>
						<p>We audit your funnel, channels, and data to find the highest-leverage opportunities first.</p>
					</div>
					<div class="process-media" aria-hidden="true"></div>
				</div>
				<div class="process-step" data-reveal>
					<div>
						<span class="process-num">02</span>
						<h3>Deploy with Confidence</h3>
						<p>Campaigns, automations, and content go live on a phased rollout so nothing breaks in production.</p>
					</div>
					<div class="process-media" aria-hidden="true"></div>
				</div>
				<div class="process-step" data-reveal>
					<div>
						<span class="process-num">03</span>
						<h3>Ongoing Support &amp; Optimization</h3>
						<p>After launch, we provide support and refine your systems to keep them performing at their best.</p>
					</div>
					<div class="process-media" aria-hidden="true"></div>
				</div>
			</div>
		</div>
	</section>

	<!-- ============ CASE STUDY / WORK ============ -->
	<section class="section" id="work">
		<div class="container">
			<p class="eyebrow center" data-reveal>PROJECTS</p>
			<h2 class="section-title center" data-reveal>Proven impact &amp; results</h2>
			<p class="section-subtitle center" data-reveal>Explore projects that reflect our marketing expertise &amp; real world impact</p>

			<div class="case-study" data-reveal>
				<div class="case-study-copy">
					<span class="tag">Project 01</span>
					<h3>NovaFit &mdash; Performance Marketing for a DTC Fitness Brand</h3>
					<p>We rebuilt NovaFit's paid and lifecycle marketing around an AI-optimized bidding layer and automated retention flows, replacing a patchwork of manual campaigns.</p>
				</div>
				<div class="case-study-metrics">
					<div class="metric">
						<span class="metric-value">164%</span>
						<span class="metric-label">Increase in return on ad spend</span>
					</div>
					<div class="metric">
						<span class="metric-value">38%</span>
						<span class="metric-label">Reduction in cost per acquisition</span>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- ============ TESTIMONIALS ============ -->
	<section class="section section-alt" id="testimonials">
		<div class="container">
			<p class="eyebrow center" data-reveal>CUSTOMERS</p>
			<h2 class="section-title center" data-reveal>What our clients say</h2>
			<p class="section-subtitle center" data-reveal>Join brands who trust us to grow their business.</p>

			<div class="grid grid-3" data-reveal-group>
				<figure class="card testimonial-card" data-reveal>
					<span class="stars" aria-hidden="true">&#9733;&#9733;&#9733;&#9733;&#9733;</span>
					<blockquote>&ldquo;Mazz Marketing plugged straight into our team and shipped faster than any agency we've worked with.&rdquo;</blockquote>
					<figcaption>
						<span class="avatar" aria-hidden="true">RK</span>
						<span><strong>Rana Karimi</strong><br>Head of Growth, Studioline</span>
					</figcaption>
				</figure>
				<figure class="card testimonial-card" data-reveal>
					<span class="stars" aria-hidden="true">&#9733;&#9733;&#9733;&#9733;&#9733;</span>
					<blockquote>&ldquo;Within two months our lead quality improved and our cost per lead dropped by a third.&rdquo;</blockquote>
					<figcaption>
						<span class="avatar" aria-hidden="true">DT</span>
						<span><strong>Daniel Tran</strong><br>VP Marketing, Fieldworks</span>
					</figcaption>
				</figure>
				<figure class="card testimonial-card" data-reveal>
					<span class="stars" aria-hidden="true">&#9733;&#9733;&#9733;&#9733;&#9733;</span>
					<blockquote>&ldquo;The automation work alone gave our small team back ten hours a week.&rdquo;</blockquote>
					<figcaption>
						<span class="avatar" aria-hidden="true">SO</span>
						<span><strong>Sara Ostad</strong><br>Founder, Loomly Goods</span>
					</figcaption>
				</figure>
			</div>

			<div class="grid grid-3" data-reveal-group>
				<div class="stat" data-reveal>
					<span class="metric-value">120+</span>
					<span class="metric-label">Projects Completed</span>
				</div>
				<div class="stat" data-reveal>
					<span class="metric-value">94%</span>
					<span class="metric-label">Client Satisfaction</span>
				</div>
				<div class="stat" data-reveal>
					<span class="metric-value">6+</span>
					<span class="metric-label">Years of Experience</span>
				</div>
			</div>
		</div>
	</section>

	<!-- ============ PRICING ============ -->
	<section class="section" id="pricing">
		<div class="container">
			<p class="eyebrow center" data-reveal>PRICING</p>
			<h2 class="section-title center" data-reveal>Simple price for all</h2>
			<p class="section-subtitle center" data-reveal>Flexible pricing plans that fit your budget &amp; scale with your needs.</p>

			<div class="pricing-toggle" data-reveal>
				<button type="button" class="active">Monthly</button>
				<button type="button">Yearly</button>
				<span class="badge">30% off</span>
			</div>

			<div class="grid grid-3 pricing-grid" data-reveal-group>
				<div class="card pricing-card" data-reveal>
					<h3>Starter</h3>
					<p class="price"><span>$800</span>/mo</p>
					<p class="pricing-desc">Ideal for businesses ready to explore AI-driven marketing.</p>
					<a href="#contact" class="btn btn-outline btn-block">Get Started</a>
					<ul class="pricing-features">
						<li>Campaign management (1 channel)</li>
						<li>Monthly performance reporting</li>
						<li>Basic automation setup</li>
						<li>Email support</li>
					</ul>
				</div>

				<div class="card pricing-card pricing-featured" data-reveal>
					<h3>Pro <span class="pricing-badge">&#128293; Popular</span></h3>
					<p class="price"><span>$1,700</span>/mo</p>
					<p class="pricing-desc">Built for companies that want to gain an edge with automation.</p>
					<a href="#contact" class="btn btn-primary btn-block">Get Started</a>
					<ul class="pricing-features">
						<li>Campaign management (3 channels)</li>
						<li>Weekly reporting + strategist calls</li>
						<li>Custom automation workflows</li>
						<li>Priority support</li>
					</ul>
				</div>

				<div class="card pricing-card" data-reveal>
					<h3>Enterprise</h3>
					<p class="price"><span>$4,700</span>/mo</p>
					<p class="pricing-desc">For businesses aiming to fully scale their marketing systems.</p>
					<a href="#contact" class="btn btn-outline btn-block">Get Started</a>
					<ul class="pricing-features">
						<li>Unlimited channels &amp; integrations</li>
						<li>Dedicated strategist &amp; analyst</li>
						<li>Custom reporting dashboards</li>
						<li>24/7 priority support</li>
					</ul>
				</div>
			</div>
			<p class="pricing-note" data-reveal>&#127895;&#65039; We donate 2% of every membership to local youth education programs</p>
		</div>
	</section>

	<!-- ============ COMPARISON ============ -->
	<section class="section section-alt" id="comparison">
		<div class="container">
			<p class="eyebrow center" data-reveal>COMPARISON</p>
			<h2 class="section-title center" data-reveal>Precision vs. basic</h2>
			<p class="section-subtitle center" data-reveal>See how our approach outperforms typical agencies.</p>

			<div class="comparison-table" data-reveal>
				<div class="comparison-col comparison-col-highlight">
					<h3>Mazz Marketing</h3>
					<ul>
						<li><span class="check">&#10003;</span> Automated, AI-optimized workflows</li>
						<li><span class="check">&#10003;</span> Strategy personalized to your funnel</li>
						<li><span class="check">&#10003;</span> Real-time performance insights</li>
						<li><span class="check">&#10003;</span> Systems that scale with you</li>
						<li><span class="check">&#10003;</span> Rapid, AI-assisted content</li>
					</ul>
					<a href="#contact" class="btn btn-primary btn-block">Get Started</a>
				</div>
				<div class="comparison-col">
					<h3>Typical Agencies</h3>
					<ul>
						<li><span class="check">&#10003;</span> Manual, spreadsheet-driven processes</li>
						<li><span class="check">&#10003;</span> Generic, one-size-fits-all strategy</li>
						<li><span class="check">&#10003;</span> Reporting delivered monthly, if at all</li>
						<li><span class="check">&#10003;</span> Systems that break as you grow</li>
						<li><span class="check">&#10003;</span> Slow, manual content creation</li>
					</ul>
				</div>
			</div>
		</div>
	</section>

	<!-- ============ TEAM ============ -->
	<section class="section" id="team">
		<div class="container">
			<p class="eyebrow center" data-reveal>TEAM</p>
			<h2 class="section-title center" data-reveal>Team behind the results</h2>
			<p class="section-subtitle center" data-reveal>Meet the people driving Mazz Marketing forward.</p>

			<div class="grid grid-4" data-reveal-group>
				<?php foreach ( $mm_ai_team as $member ) : ?>
					<div class="team-card" data-reveal>
						<h3><?php echo esc_html( $member['name'] ); ?></h3>
						<p><?php echo wp_kses_post( $member['role'] ); ?></p>
						<div class="team-socials">
							<a href="#" aria-label="X"><svg viewBox="0 0 24 24"><path d="M18.9 2H22l-7.6 8.7L23.3 22H16.7l-5.2-6.8L5.6 22H2.4l8.1-9.3L1.5 2h6.8l4.7 6.2L18.9 2zm-1.2 18h1.7L7.4 4H5.6l12.1 16z"/></svg></a>
							<a href="#" aria-label="Instagram"><svg viewBox="0 0 24 24"><path d="M12 2.2c3.2 0 3.6 0 4.85.07 1.17.05 2.02.24 2.5.4a5 5 0 0 1 1.8 1.17 5 5 0 0 1 1.17 1.8c.16.48.35 1.33.4 2.5.06 1.25.07 1.65.07 4.85s0 3.6-.07 4.85c-.05 1.17-.24 2.02-.4 2.5a5 5 0 0 1-1.17 1.8 5 5 0 0 1-1.8 1.17c-.48.16-1.33.35-2.5.4-1.25.06-1.65.07-4.85.07s-3.6 0-4.85-.07c-1.17-.05-2.02-.24-2.5-.4a5 5 0 0 1-1.8-1.17 5 5 0 0 1-1.17-1.8c-.16-.48-.35-1.33-.4-2.5C2.2 15.6 2.2 15.2 2.2 12s0-3.6.07-4.85c.05-1.17.24-2.02.4-2.5a5 5 0 0 1 1.17-1.8A5 5 0 0 1 5.65 1.68c.48-.16 1.33-.35 2.5-.4C9.4 1.2 9.8 1.2 12 1.2zm0 1.8c-3.15 0-3.52 0-4.76.07-.96.04-1.48.2-1.82.34-.46.18-.79.4-1.13.74-.34.34-.56.67-.74 1.13-.14.34-.3.86-.34 1.82C3.15 8.35 3.15 8.72 3.15 12s0 3.65.06 4.9c.04.96.2 1.48.34 1.82.18.46.4.79.74 1.13.34.34.67.56 1.13.74.34.14.86.3 1.82.34 1.24.06 1.61.07 4.76.07s3.52 0 4.76-.07c.96-.04 1.48-.2 1.82-.34.46-.18.79-.4 1.13-.74.34-.34.56-.67.74-1.13.14-.34.3-.86.34-1.82.06-1.25.07-1.62.07-4.9s0-3.65-.07-4.9c-.04-.96-.2-1.48-.34-1.82a3.2 3.2 0 0 0-.74-1.13 3.2 3.2 0 0 0-1.13-.74c-.34-.14-.86-.3-1.82-.34C15.52 4 15.15 4 12 4zm0 3.4a4.6 4.6 0 1 1 0 9.2 4.6 4.6 0 0 1 0-9.2zm0 1.8a2.8 2.8 0 1 0 0 5.6 2.8 2.8 0 0 0 0-5.6zm5.85-3.4a1.1 1.1 0 1 1-2.2 0 1.1 1.1 0 0 1 2.2 0z"/></svg></a>
							<a href="#" aria-label="LinkedIn"><svg viewBox="0 0 24 24"><path d="M20.45 20.45h-3.55v-5.57c0-1.33-.02-3.03-1.85-3.03-1.86 0-2.14 1.45-2.14 2.94v5.66H9.36V9h3.41v1.56h.05c.48-.9 1.63-1.85 3.36-1.85 3.6 0 4.27 2.37 4.27 5.45v6.29zM5.34 7.43a2.07 2.07 0 1 1 0-4.14 2.07 2.07 0 0 1 0 4.14zM7.12 20.45H3.56V9h3.56v11.45z"/></svg></a>
						</div>
						<span class="avatar avatar-lg" aria-hidden="true"><?php echo esc_html( $member['initials'] ); ?></span>
					</div>
					<?php
				endforeach;
				?>
			</div>
		</div>
	</section>

	<!-- ============ FAQ ============ -->
	<section class="section section-alt" id="faq">
		<div class="container">
			<p class="eyebrow center" data-reveal>FAQS</p>
			<h2 class="section-title center" data-reveal>Questions? Answers!</h2>
			<p class="section-subtitle center" data-reveal>Find some quick answers to the most common questions.</p>

			<div class="faq-list" data-reveal>
				<?php foreach ( $mm_ai_faqs as $faq ) : ?>
					<div class="faq-item">
						<button class="faq-question" aria-expanded="false">
							<?php echo esc_html( $faq['q'] ); ?>
							<span class="faq-icon" aria-hidden="true">&#8964;</span>
						</button>
						<div class="faq-answer">
							<p><?php echo wp_kses_post( $faq['a'] ); ?></p>
						</div>
					</div>
					<?php
				endforeach;
				?>
			</div>

			<p class="faq-contact" data-reveal>
				Still have questions? Reach out at <a href="mailto:<?php echo esc_attr( $mm_ai_contact_email ); ?>"><?php echo esc_html( $mm_ai_contact_email ); ?></a>
			</p>
		</div>
	</section>

	<!-- ============ CTA / FOOTER RIPPLE BOOKEND ============ -->
	<section class="cta-section" id="contact">
		<div class="cta-glow" aria-hidden="true"></div>
		<div class="container cta-inner" data-reveal>
			<div class="socials">
				<a href="#" aria-label="X"><svg viewBox="0 0 24 24"><path d="M18.9 2H22l-7.6 8.7L23.3 22H16.7l-5.2-6.8L5.6 22H2.4l8.1-9.3L1.5 2h6.8l4.7 6.2L18.9 2zm-1.2 18h1.7L7.4 4H5.6l12.1 16z"/></svg></a>
				<a href="https://www.instagram.com/mazz_marketing" target="_blank" rel="noopener noreferrer" aria-label="Instagram"><svg viewBox="0 0 24 24"><path d="M12 2.2c3.2 0 3.6 0 4.85.07 1.17.05 2.02.24 2.5.4a5 5 0 0 1 1.8 1.17 5 5 0 0 1 1.17 1.8c.16.48.35 1.33.4 2.5.06 1.25.07 1.65.07 4.85s0 3.6-.07 4.85c-.05 1.17-.24 2.02-.4 2.5a5 5 0 0 1-1.17 1.8 5 5 0 0 1-1.8 1.17c-.48.16-1.33.35-2.5.4-1.25.06-1.65.07-4.85.07s-3.6 0-4.85-.07c-1.17-.05-2.02-.24-2.5-.4a5 5 0 0 1-1.8-1.17 5 5 0 0 1-1.17-1.8c-.16-.48-.35-1.33-.4-2.5C2.2 15.6 2.2 15.2 2.2 12s0-3.6.07-4.85c.05-1.17.24-2.02.4-2.5a5 5 0 0 1 1.17-1.8A5 5 0 0 1 5.65 1.68c.48-.16 1.33-.35 2.5-.4C9.4 1.2 9.8 1.2 12 1.2zm0 1.8c-3.15 0-3.52 0-4.76.07-.96.04-1.48.2-1.82.34-.46.18-.79.4-1.13.74-.34.34-.56.67-.74 1.13-.14.34-.3.86-.34 1.82C3.15 8.35 3.15 8.72 3.15 12s0 3.65.06 4.9c.04.96.2 1.48.34 1.82.18.46.4.79.74 1.13.34.34.67.56 1.13.74.34.14.86.3 1.82.34 1.24.06 1.61.07 4.76.07s3.52 0 4.76-.07c.96-.04 1.48-.2 1.82-.34.46-.18.79-.4 1.13-.74.34-.34.56-.67.74-1.13.14-.34.3-.86.34-1.82.06-1.25.07-1.62.07-4.9s0-3.65-.07-4.9c-.04-.96-.2-1.48-.34-1.82a3.2 3.2 0 0 0-.74-1.13 3.2 3.2 0 0 0-1.13-.74c-.34-.14-.86-.3-1.82-.34C15.52 4 15.15 4 12 4zm0 3.4a4.6 4.6 0 1 1 0 9.2 4.6 4.6 0 0 1 0-9.2zm0 1.8a2.8 2.8 0 1 0 0 5.6 2.8 2.8 0 0 0 0-5.6zm5.85-3.4a1.1 1.1 0 1 1-2.2 0 1.1 1.1 0 0 1 2.2 0z"/></svg></a>
				<a href="https://www.linkedin.com/in/pourya-mazaheri-fard-2b4299390/" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn"><svg viewBox="0 0 24 24"><path d="M20.45 20.45h-3.55v-5.57c0-1.33-.02-3.03-1.85-3.03-1.86 0-2.14 1.45-2.14 2.94v5.66H9.36V9h3.41v1.56h.05c.48-.9 1.63-1.85 3.36-1.85 3.6 0 4.27 2.37 4.27 5.45v6.29zM5.34 7.43a2.07 2.07 0 1 1 0-4.14 2.07 2.07 0 0 1 0 4.14zM7.12 20.45H3.56V9h3.56v11.45z"/></svg></a>
			</div>
			<div class="brand" style="justify-content:center;margin-bottom:14px;">
				<span class="brand-mark" aria-hidden="true">M</span>
				<span class="brand-name">Mazz Marketing</span>
			</div>
			<h2>Marketing systems built for tomorrow's growth</h2>
			<a href="mailto:<?php echo esc_attr( $mm_ai_contact_email ); ?>" class="btn btn-primary">Start a Project</a>

			<div class="footer-links-row">
				<a href="#features">Features</a>
				<a href="#contact">Contact</a>
				<a href="#work">Projects</a>
				<a href="#faq">FAQ</a>
				<a href="#">Privacy</a>
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
