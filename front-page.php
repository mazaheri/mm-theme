<?php
/**
 * The site homepage — a direct port of final/index.html (the approved
 * design). Copy and markup are intentionally static, matching the source
 * file exactly; only the founder photo path is resolved to the theme's
 * asset URL.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$about_photo_id  = mm_theme_find_attachment_by_source_path( get_template_directory() . '/content/images/homepage/about-photo.png' );
$about_photo_url = $about_photo_id
	? wp_get_attachment_image_url( $about_photo_id, 'full' )
	: get_template_directory_uri() . '/content/images/homepage/about-photo.png';

get_header();
?>

<header class="site-header">
  <div class="container header-inner">
    <a href="#" class="logo">Mazz Marketing</a>
    <nav class="nav">
      <a href="#problem">The Challenge</a>
      <a href="#how-it-works">How I Work</a>
      <a href="#services">Services</a>
      <a href="#about">About</a>
      <a href="#faq">FAQ</a>
    </nav>
    <a href="#contact" class="btn btn-primary btn-small header-cta meetergo-modal-button" link="https://cal.meetergo.com/pourya-mazaheri-fard/30-min-meeting-with-pourya">
      <span class="header-cta-full">Request an early consultation</span>
      <span class="header-cta-short">Request a call</span>
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
          <span class="avatar-photo avatar-photo-accent" aria-hidden="true">
            <!-- TODO: replace with a real founder photo — this warm gradient is the page's one deliberate color accent -->
          </span>
          <span class="eyebrow">Technical Marketing Manager · SEO · Paid Media · Analytics · AI Automation</span>
        </div>
        <h1>Make your next marketing decision with clarity—not guesswork.</h1>
        <p class="hero-sub">I'm Pourya Mazaheri, founder of Mazz Marketing. I help growing businesses identify what needs attention first, then connect strategy, SEO, paid media, websites, analytics and AI-enabled workflows into a system they can measure and improve.</p>

        <!-- TODO: re-enable once the real hero video is ready — replace with an embedded video (direct-to-camera, using the Problem section script)
        <div class="hero-video">
          <div class="video-placeholder">
            <span class="play-icon" aria-hidden="true">&#9658;</span>
            <span>Video coming soon</span>
          </div>
        </div>
        -->

        <div class="hero-ctas">
          <a href="#contact" class="btn btn-primary btn-large meetergo-modal-button" link="https://cal.meetergo.com/pourya-mazaheri-fard/30-min-meeting-with-pourya">Find your next marketing priority &rarr;</a>
          <a href="#how-it-works" class="btn btn-secondary btn-large">Explore how I work</a>
        </div>
        <p class="hero-microcopy">30 minutes. One focused conversation. A clearer next step. No obligation to continue.</p>
      </div>
    </section>

    <!-- PROBLEM -->
    <section id="problem" class="section">
      <div class="container narrow">
        <span class="eyebrow eyebrow-center">The Challenge</span>
        <h2 class="center">Marketing gets expensive when the pieces do not work together.</h2>

        <p>Most businesses do not have one marketing problem. They have several disconnected ones.</p>

        <p>Ads may generate clicks, while the website does not convert. Content may be published consistently, but it is not connected to an offer. Data may exist, but it may not be reliable or useful enough to guide decisions. Leads may arrive, then receive inconsistent follow-up.</p>

        <blockquote class="pull-quote">
          This does not mean your marketing is broken or that someone failed. <span class="highlight">It often means the system was built in the wrong order,</span> measured incompletely, or never connected end to end.
        </blockquote>

        <p>My role is not to take control away from you. It is to help you understand what matters, choose the right priority, and build a practical path forward.</p>

        <a href="#contact" class="btn btn-primary meetergo-modal-button" link="https://cal.meetergo.com/pourya-mazaheri-fard/30-min-meeting-with-pourya">Clarify what needs attention first &rarr;</a>
        <p class="hero-microcopy">You do not need to know whether the issue is SEO, ads, tracking, your website or something else. A website link and a short description of your goal are enough to start.</p>
      </div>
    </section>
  </div>

  <!-- APPROACH -->
  <section id="approach" class="section section-alt">
    <div class="container narrow">
      <span class="eyebrow eyebrow-center">How I Think About It</span>
      <h2 class="center">Clear strategy. Reliable data. Practical execution.</h2>
      <p class="center services-sub">I do not start by selling a channel, a campaign type or a tool. We start by understanding the business, the offer, the customer journey and the gap that is currently limiting progress.</p>

      <div class="approach-grid">
        <div class="approach-card">
          <span class="step-number">01</span>
          <h3>Strategy before tactics</h3>
          <p>Before spending more on ads, content or software, clarify who you need to reach, what you are offering, and what action you want people to take.</p>
        </div>
        <div class="approach-card">
          <span class="step-number">02</span>
          <h3>Data before opinions</h3>
          <p>Marketing decisions should be informed by what customers actually do — not by vanity metrics, vague reports or assumptions.</p>
        </div>
        <div class="approach-card">
          <span class="step-number">03</span>
          <h3>Systems before scale</h3>
          <p>Before increasing budget or workload, make sure the website, tracking, follow-up and core workflows can handle more demand.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- HOW I WORK -->
  <section id="how-it-works" class="section section-alt">
    <div class="container narrow">
      <span class="eyebrow eyebrow-center">How I Work</span>
      <h2 class="center">One clear starting point. Different ways to work together.</h2>

      <div class="process-steps">
        <div class="process-step">
          <span class="step-number">01</span>
          <h3>Clarity call</h3>
          <p>We review your current situation, the main growth goal and the area that needs attention first.</p>
        </div>
        <div class="process-step">
          <span class="step-number">02</span>
          <h3>Priorities and next steps</h3>
          <p>You leave with a clearer view of what to focus on, what not to do yet, and whether a deeper engagement would be useful.</p>
        </div>
        <div class="process-step">
          <span class="step-number">03</span>
          <h3>Choose the right level of support</h3>
          <p>You may take the direction and implement it yourself, work with me collaboratively, or bring me in for defined strategic or technical support.</p>
        </div>
      </div>

      <h3 class="choice-heading choice-heading-big center">Choose the right level of support</h3>
      <div class="choice-grid">
        <div class="choice-card">
          <div class="choice-icon" aria-hidden="true">
            <svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
              <circle cx="32" cy="32" r="28" fill="var(--bg)" stroke="var(--border)"/>
              <path d="M20 34l8 8 16-18" stroke="var(--text)" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </div>
          <h4>You implement</h4>
          <p>You receive clear direction, frameworks and priorities, then execute with your own team or independently.</p>
        </div>
        <div class="choice-card choice-card-highlight">
          <div class="choice-icon" aria-hidden="true">
            <svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
              <circle cx="24" cy="26" r="9" fill="var(--surface)" stroke="var(--text)" stroke-width="2"/>
              <circle cx="42" cy="26" r="9" fill="var(--text)"/>
              <path d="M12 50c0-8 6-13 12-13s12 5 12 13" stroke="var(--text)" stroke-width="2" fill="none"/>
              <path d="M30 50c0-8 6-13 12-13s12 5 12 13" fill="var(--text)"/>
            </svg>
          </div>
          <h4>We work together</h4>
          <p>We solve the problem collaboratively while building the understanding and systems you can keep using.</p>
        </div>
        <div class="choice-card">
          <div class="choice-icon" aria-hidden="true">
            <svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
              <rect x="14" y="14" width="36" height="36" rx="10" fill="var(--text)"/>
              <path d="M24 32l6 6 12-14" stroke="var(--surface)" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </div>
          <h4>I support the execution</h4>
          <p>I provide focused strategic and technical support for the agreed scope, from audit through implementation.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- SERVICES -->
  <section id="services" class="section section-alt">
    <div class="container">
      <span class="eyebrow eyebrow-center">Ways I Can Help</span>
      <h2 class="center">Ways I can help</h2>
      <p class="center services-sub">Engagements are designed around the bottleneck that matters most right now. That may be strategy, conversion, visibility, tracking or a workflow that is taking too much time to run manually.</p>

      <div class="services-grid">
        <div class="service-card">
          <div class="service-icon" aria-hidden="true">
            <svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
              <circle cx="32" cy="32" r="22" fill="none" stroke="var(--border)" stroke-width="4"/>
              <path d="M32 10a22 22 0 0 1 0 44" stroke="url(#g6)" stroke-width="4" stroke-linecap="round"/>
              <circle cx="32" cy="32" r="6" fill="var(--text)"/>
              <defs><linearGradient id="g6" x1="32" y1="10" x2="32" y2="54"><stop stop-color="#f5a623"/><stop offset="0.5" stop-color="#e8548c"/><stop offset="1" stop-color="#9b4de0"/></linearGradient></defs>
            </svg>
          </div>
          <h3>Marketing Strategy &amp; Growth Roadmaps</h3>
          <p>For businesses that need clarity on positioning, priorities, customer journeys, offers and the right order of marketing activity.</p>
        </div>

        <div class="service-card">
          <div class="service-icon" aria-hidden="true">
            <svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
              <rect x="8" y="36" width="10" height="20" rx="2" fill="var(--text-dim)"/>
              <rect x="27" y="24" width="10" height="32" rx="2" fill="var(--text)"/>
              <rect x="46" y="12" width="10" height="44" rx="2" fill="url(#g1)"/>
              <defs><linearGradient id="g1" x1="46" y1="12" x2="56" y2="56"><stop stop-color="#f5a623"/><stop offset="1" stop-color="#9b4de0"/></linearGradient></defs>
            </svg>
          </div>
          <h3>Google Ads, Meta Ads &amp; Conversion</h3>
          <p>For businesses that need paid media connected to a stronger offer, a clearer conversion path and meaningful measurement — not just more traffic.</p>
        </div>

        <div class="service-card">
          <div class="service-icon" aria-hidden="true">
            <svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
              <rect x="10" y="14" width="44" height="36" rx="6" fill="var(--bg)" stroke="var(--border)"/>
              <rect x="10" y="14" width="44" height="9" rx="6" fill="var(--text)"/>
              <circle cx="16" cy="18.5" r="1.6" fill="var(--surface)"/>
              <circle cx="21" cy="18.5" r="1.6" fill="var(--surface)"/>
              <rect x="18" y="30" width="20" height="4" rx="2" fill="url(#g4)"/>
              <rect x="18" y="38" width="28" height="4" rx="2" fill="var(--border)"/>
              <defs><linearGradient id="g4" x1="18" y1="30" x2="38" y2="34"><stop stop-color="#f5a623"/><stop offset="1" stop-color="#e8548c"/></linearGradient></defs>
            </svg>
          </div>
          <h3>SEO, Websites &amp; Measurement</h3>
          <p>For businesses that want their website to become a measurable growth asset, rather than a brochure that looks good but does not create demand or conversions.</p>
        </div>

        <div class="service-card service-card-center">
          <div class="service-icon" aria-hidden="true">
            <svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
              <rect x="10" y="30" width="10" height="24" rx="2" fill="var(--border)"/>
              <rect x="27" y="18" width="10" height="36" rx="2" fill="var(--text-dim)"/>
              <rect x="44" y="8" width="10" height="46" rx="2" fill="url(#g5)"/>
              <circle cx="49" cy="8" r="6" fill="url(#g5)"/>
              <defs><linearGradient id="g5" x1="44" y1="8" x2="54" y2="54"><stop stop-color="#9b4de0"/><stop offset="1" stop-color="#f5a623"/></linearGradient></defs>
            </svg>
          </div>
          <h3>AI-Enabled Marketing Systems</h3>
          <p>For teams and independent professionals who want to reduce repetitive work across content, lead generation, follow-up, reporting and marketing operations — without losing quality, brand control or human judgement.</p>
        </div>
      </div>

      <div class="compare-cta">
        <a href="#contact" class="btn btn-primary meetergo-modal-button" link="https://cal.meetergo.com/pourya-mazaheri-fard/30-min-meeting-with-pourya">Discuss the right starting point &rarr;</a>
      </div>
    </div>
  </section>

  <!--
  HIDDEN FOR NOW — content pending, re-enable once real material is ready.

  <section id="example" class="section section-alt"> ... A Real Example ... </section>
  <section id="testimonials" class="section section-alt"> ... What Clients Say ... </section>

  See homepage-draft/hidden-sections.html for the full markup.
  -->

  <!-- PERSONAL COLLABORATION -->
  <section id="collaboration" class="section">
    <div class="container narrow-tight">
      <span class="eyebrow eyebrow-center">How This Is Different</span>
      <h2 class="center compare-heading">Direct expertise, not a hand-off process.</h2>

      <p>When you work with Mazz Marketing, you work directly with me.</p>

      <p>That means the person who understands the strategy is also involved in the analysis, the recommendations and the work itself. There is no sales call followed by a hand-off to someone who has never heard the full context.</p>

      <p>You should not need to become dependent on unclear reports or black-box marketing. My role is to help you make better decisions and build capabilities that remain useful after the project ends.</p>

      <div class="compare-grid">
        <div class="compare-card compare-without">
          <h3>Common agency model</h3>
          <ul class="compare-list">
            <li><span class="compare-icon compare-icon-no" aria-hidden="true">&#8226;</span>A sales call, then a hand-off to whoever is available</li>
            <li><span class="compare-icon compare-icon-no" aria-hidden="true">&#8226;</span>Reports built around channel metrics, not shared context</li>
            <li><span class="compare-icon compare-icon-no" aria-hidden="true">&#8226;</span>Recommendations shaped by the services being sold</li>
          </ul>
        </div>
        <div class="compare-card compare-with">
          <h3>Working with Mazz Marketing</h3>
          <ul class="compare-list">
            <li><span class="compare-icon compare-icon-yes" aria-hidden="true">&#10003;</span>One person, involved from the first call through the work itself</li>
            <li><span class="compare-icon compare-icon-yes" aria-hidden="true">&#10003;</span>Decisions explained in plain terms, tied to your goal</li>
            <li><span class="compare-icon compare-icon-yes" aria-hidden="true">&#10003;</span>Direction shaped by evidence, not by which service is easiest to sell</li>
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
        <span class="eyebrow">About Pourya Mazaheri</span>
        <p>I'm Pourya Mazaheri, a Technical Marketing Manager and the founder of Mazz Marketing.</p>
        <p>My work sits at the intersection of strategy and execution: SEO, Google Ads, Meta Ads, websites, conversion paths, analytics, tracking and AI-enabled marketing workflows.</p>
        <p>I work best with people who value clear thinking, direct communication and practical progress. Sometimes the right answer is to improve a campaign. Sometimes it is to fix the website, the offer, the tracking or the follow-up process first. And sometimes the most honest answer is that more advertising is not the next move.</p>
        <p>Mazz Marketing is where I turn this work into focused consulting, implementation support, practical frameworks and, over time, educational resources for people who want to understand and improve their own marketing systems.</p>
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
        <span class="eyebrow">About Pourya Mazaheri</span>
        <p>I'm Pourya Mazaheri, a Technical Marketing Manager and the founder of Mazz Marketing. My work sits at the intersection of strategy and execution: SEO, Google Ads, Meta Ads, websites, conversion paths, analytics, tracking and AI-enabled marketing workflows.</p>
        <a href="#contact" class="btn btn-primary meetergo-modal-button" link="https://cal.meetergo.com/pourya-mazaheri-fard/30-min-meeting-with-pourya">Request an early consultation &rarr;</a>
      </div>
    </div>
  </div>

  <!-- FUTURE EDUCATION -->
  <section id="resources" class="section section-alt">
    <div class="container narrow center">
      <span class="eyebrow eyebrow-center">Coming Soon — The MAIA Method by Mazz Marketing</span>
      <h2>MAIA — Marketing AI Automations</h2>
      <p class="services-sub">The complete system to build AI-powered marketing workflows for content, leads, ads, sales and reporting.</p>
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

          <!-- connection lines (workflow motif) -->
          <g stroke="url(#maia-grad)" stroke-width="1.5" stroke-linecap="round" opacity="0.55">
            <line x1="150" y1="120" x2="270" y2="90"/>
            <line x1="150" y1="120" x2="270" y2="160"/>
            <line x1="270" y1="90" x2="390" y2="120"/>
            <line x1="270" y1="160" x2="390" y2="120"/>
            <line x1="390" y1="120" x2="490" y2="90"/>
            <line x1="390" y1="120" x2="490" y2="150"/>
          </g>

          <!-- nodes -->
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
      <p>Mazz Marketing is building a growing library of practical insights, templates and learning experiences for marketers, founders and small teams — starting with MAIA.</p>
    </div>
  </section>

  <!-- FAQ -->
  <section id="faq" class="section">
    <div class="container narrow">
      <span class="eyebrow eyebrow-center">FAQ</span>
      <h2 class="center">Questions people ask before booking</h2>
      <div class="faq-list">
        <details class="faq-item">
          <summary>What happens on the first call?</summary>
          <p>We review your current situation, the main growth goal and the area that needs attention first. You leave with a clearer view of what to focus on and what not to do yet.</p>
        </details>
        <details class="faq-item">
          <summary>Do I need to know whether the issue is SEO, ads, tracking or my website?</summary>
          <p>No. You do not need to diagnose the problem before booking. A website link and a short description of your goal are enough to start — we clarify the most useful next step together.</p>
        </details>
        <details class="faq-item">
          <summary>Do you only work with businesses already running ads?</summary>
          <p>No. The right answer depends on the business, the goal and the evidence. Sometimes that means ads or SEO, sometimes it means website or tracking work first, and sometimes it means waiting until the foundations are ready.</p>
        </details>
        <details class="faq-item">
          <summary>Can you work with my existing team or freelancer?</summary>
          <p>Yes. I can work alongside an existing team or freelancer, provide direction they implement, or take on a defined piece of the work myself.</p>
        </details>
        <details class="faq-item">
          <summary>Do you offer AI automation services?</summary>
          <p>Yes. This includes reducing repetitive work across content, lead generation, follow-up, reporting and marketing operations, without losing quality, brand control or human judgement.</p>
        </details>
        <details class="faq-item">
          <summary>Will you offer training and courses?</summary>
          <p>Yes, over time. Mazz Marketing is building a library of practical insights, frameworks and training based on real marketing work. See the section above to get notified.</p>
        </details>
        <details class="faq-item">
          <summary>What if I am not ready to hire a consultant?</summary>
          <p>Requesting the call does not commit you to a paid project. The goal is clearer decisions, not dependence — you remain in control of how, or whether, you implement the direction.</p>
        </details>
      </div>
    </div>
  </section>

  <!-- FINAL CTA -->
  <section id="contact" class="section cta-final">
    <div class="container narrow center">
      <h2>Not sure what to fix first?</h2>
      <p>Request a focused 30-minute clarity call. We will discuss your current marketing situation, the goal that matters most and the most useful next step for your business.</p>
      <p>You are not committing to a project by requesting the call. The purpose is to gain clarity before spending more time, budget or energy in the wrong place.</p>
      <div class="meetergo-iframe" link="https://cal.meetergo.com/pourya-mazaheri-fard/30-min-meeting-with-pourya" data-align="center"></div>
      <p class="cta-microcopy">You do not need to know whether the issue is SEO, ads, tracking, your website or something else. A website link and a short description of your goal are enough to start.</p>
    </div>
  </section>

</main>

<footer class="site-footer">
  <div class="container footer-inner">
    <p class="footer-copyright">&copy; 2026 Mazz Marketing. All rights reserved.</p>
    <nav class="footer-links">
      <a href="/impressum.html">Impressum</a>
      <a href="/datenschutzerklaerung.html">Datenschutzerklärung</a>
    </nav>
  </div>
</footer>


<script>
(function () {
  var field = document.getElementById('floating-icons-field');
  if (!field) return;
  var section = field.closest('.hero-bg-wrap');
  if (!section) return;

  var icons = Array.prototype.slice.call(field.querySelectorAll('.floating-icon'));
  var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  // Reveal icons on scroll into view.
  if ('IntersectionObserver' in window) {
    var revealObserver = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          var delay = icons.indexOf(entry.target) * 70;
          setTimeout(function () { entry.target.classList.add('is-visible'); }, delay);
          revealObserver.unobserve(entry.target);
        }
      });
    }, { threshold: 0.2 });
    icons.forEach(function (icon) { revealObserver.observe(icon); });
  } else {
    icons.forEach(function (icon) { icon.classList.add('is-visible'); });
  }

  if (reduceMotion || !window.matchMedia('(hover: hover)').matches) return;

  // Cursor-repel effect: icons push away from the pointer, spring back when it's gone.
  var mouseX = -9999;
  var mouseY = -9999;
  var ticking = false;
  var REPEL_RADIUS = 140;
  var REPEL_STRENGTH = 40;

  function updateIcons() {
    icons.forEach(function (icon) {
      var inner = icon.querySelector('.floating-icon-inner');
      var rect = icon.getBoundingClientRect();
      var cx = rect.left + rect.width / 2;
      var cy = rect.top + rect.height / 2;
      var dx = cx - mouseX;
      var dy = cy - mouseY;
      var dist = Math.sqrt(dx * dx + dy * dy);

      if (dist < REPEL_RADIUS) {
        var force = (1 - dist / REPEL_RADIUS) * REPEL_STRENGTH;
        var angle = Math.atan2(dy, dx);
        var pushX = Math.cos(angle) * force;
        var pushY = Math.sin(angle) * force;
        inner.style.setProperty('--repel-x', pushX.toFixed(1) + 'px');
        inner.style.setProperty('--repel-y', pushY.toFixed(1) + 'px');
        inner.style.transform = 'translate(var(--repel-x), var(--repel-y))';
      } else {
        inner.style.transform = '';
      }
    });
    ticking = false;
  }

  section.addEventListener('mousemove', function (event) {
    mouseX = event.clientX;
    mouseY = event.clientY;
    if (!ticking) {
      window.requestAnimationFrame(updateIcons);
      ticking = true;
    }
  });

  section.addEventListener('mouseleave', function () {
    mouseX = -9999;
    mouseY = -9999;
    window.requestAnimationFrame(updateIcons);
  });
})();
</script>

<!-- meetergo widget: powers the inline scheduler above and every .meetergo-modal-button CTA on this page -->
<script defer src="https://cdn.meetergo.com/v4/integration.js"></script>

<?php get_footer(); ?>
