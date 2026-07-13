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
