/* Mazz Marketing — Lead-Gen Landing Page v1 JS
   Handles: ripple-orb canvas animation, scroll-reveal, mobile nav, form submit */

(function () {
  'use strict';

  /* -------------------------------------------------------------------------
     Ripple-Orb canvas animation
     Draws concentric pulsing rings that grow outward from the canvas center,
     coloured with the purple→pink brand gradient.
  --------------------------------------------------------------------------- */
  function initOrb() {
    var canvas = document.getElementById('lgOrbCanvas');
    if (!canvas) return;

    var ctx = canvas.getContext('2d');
    var W = canvas.width;
    var H = canvas.height;
    var cx = W / 2;
    var cy = H / 2;
    var rings = [];
    var MAX_RINGS = 6;
    var SPAWN_INTERVAL = 900; // ms between new rings
    var lastSpawn = 0;

    function spawnRing() {
      rings.push({ radius: 18, opacity: 0.7, life: 0 });
    }

    function lerp(a, b, t) {
      return a + (b - a) * t;
    }

    function draw(timestamp) {
      ctx.clearRect(0, 0, W, H);

      // Core orb
      var coreGrad = ctx.createRadialGradient(cx, cy, 0, cx, cy, 55);
      coreGrad.addColorStop(0, 'rgba(200, 120, 255, 0.95)');
      coreGrad.addColorStop(0.5, 'rgba(168, 85, 247, 0.75)');
      coreGrad.addColorStop(1, 'rgba(236, 72, 153, 0.0)');
      ctx.beginPath();
      ctx.arc(cx, cy, 55, 0, Math.PI * 2);
      ctx.fillStyle = coreGrad;
      ctx.fill();

      // Inner glow dot
      var dotGrad = ctx.createRadialGradient(cx, cy, 0, cx, cy, 26);
      dotGrad.addColorStop(0, 'rgba(255, 255, 255, 0.9)');
      dotGrad.addColorStop(1, 'rgba(200, 120, 255, 0)');
      ctx.beginPath();
      ctx.arc(cx, cy, 26, 0, Math.PI * 2);
      ctx.fillStyle = dotGrad;
      ctx.fill();

      // Spawn new ring on interval
      if (timestamp - lastSpawn > SPAWN_INTERVAL) {
        if (rings.length < MAX_RINGS) spawnRing();
        lastSpawn = timestamp;
      }

      // Draw and update rings
      for (var i = rings.length - 1; i >= 0; i--) {
        var ring = rings[i];
        ring.radius += 1.1;
        ring.opacity = Math.max(0, 0.7 - (ring.radius / 130));

        if (ring.opacity <= 0) {
          rings.splice(i, 1);
          continue;
        }

        // Colour shifts purple → pink as ring expands
        var t = ring.radius / 130;
        var r = Math.round(lerp(168, 236, t));
        var g = Math.round(lerp(85, 72, t));
        var b = Math.round(lerp(247, 153, t));

        ctx.beginPath();
        ctx.arc(cx, cy, ring.radius, 0, Math.PI * 2);
        ctx.strokeStyle = 'rgba(' + r + ',' + g + ',' + b + ',' + ring.opacity + ')';
        ctx.lineWidth = 1.5;
        ctx.stroke();
      }

      requestAnimationFrame(draw);
    }

    // Kick off
    spawnRing();
    requestAnimationFrame(draw);
  }

  /* -------------------------------------------------------------------------
     Scroll-reveal
     Observes elements with [data-lg-reveal] and adds .is-visible when in view.
  --------------------------------------------------------------------------- */
  function initReveal() {
    if (!('IntersectionObserver' in window)) {
      // Fallback: show everything immediately
      document.querySelectorAll('[data-lg-reveal]').forEach(function (el) {
        el.classList.add('is-visible');
      });
      return;
    }

    var observer = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible');
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });

    document.querySelectorAll('[data-lg-reveal]').forEach(function (el) {
      observer.observe(el);
    });
  }

  /* -------------------------------------------------------------------------
     Mobile nav toggle
  --------------------------------------------------------------------------- */
  function initMobileNav() {
    var toggle = document.getElementById('lgNavToggle');
    var mobileNav = document.getElementById('lgMobileNav');
    if (!toggle || !mobileNav) return;

    toggle.addEventListener('click', function () {
      var isOpen = mobileNav.classList.toggle('is-open');
      toggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
    });

    // Close on link click
    mobileNav.querySelectorAll('a').forEach(function (a) {
      a.addEventListener('click', function () {
        mobileNav.classList.remove('is-open');
        toggle.setAttribute('aria-expanded', 'false');
      });
    });
  }

  /* -------------------------------------------------------------------------
     Lead capture form — client-side feedback only
     (Real submission handled server-side via WordPress / plugin)
  --------------------------------------------------------------------------- */
  function initForm() {
    var form = document.getElementById('lgLeadForm');
    if (!form) return;

    form.addEventListener('submit', function (e) {
      var btn = form.querySelector('.lg-submit-btn');
      if (btn) {
        btn.textContent = 'Sending…';
        btn.disabled = true;
      }
      // Allow the native form submission to proceed (action URL set on element)
    });
  }

  /* -------------------------------------------------------------------------
     Sticky header shadow on scroll
  --------------------------------------------------------------------------- */
  function initHeaderScroll() {
    var header = document.querySelector('.lg-header');
    if (!header) return;

    window.addEventListener('scroll', function () {
      if (window.scrollY > 8) {
        header.style.borderBottomColor = 'rgba(168, 85, 247, 0.25)';
      } else {
        header.style.borderBottomColor = '';
      }
    }, { passive: true });
  }

  /* -------------------------------------------------------------------------
     Boot
  --------------------------------------------------------------------------- */
  document.addEventListener('DOMContentLoaded', function () {
    initOrb();
    initReveal();
    initMobileNav();
    initForm();
    initHeaderScroll();
  });

}());
