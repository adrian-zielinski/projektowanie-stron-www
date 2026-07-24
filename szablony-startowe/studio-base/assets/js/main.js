/* studio-base — silnik: nawigacja, menu mobilne, animacje na scroll */
(function () {
  var nav = document.getElementById('nav');
  if (nav && !nav.classList.contains('solid')) {
    addEventListener('scroll', function () {
      nav.classList.toggle('scrolled', scrollY > 60);
    }, { passive: true });
  }
  var burger = document.getElementById('burger');
  var mobile = document.getElementById('mobile');
  if (burger && mobile) {
    burger.addEventListener('click', function () { mobile.classList.add('open'); });
    var mc = document.getElementById('mclose');
    if (mc) mc.addEventListener('click', function () { mobile.classList.remove('open'); });
    mobile.querySelectorAll('a').forEach(function (a) {
      a.addEventListener('click', function () { mobile.classList.remove('open'); });
    });
  }
  var reduce = matchMedia('(prefers-reduced-motion:reduce)').matches;
  var els = document.querySelectorAll('.reveal,.radial');
  if (!reduce && 'IntersectionObserver' in window) {
    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (e) {
        if (e.isIntersecting) { e.target.classList.add('in'); io.unobserve(e.target); }
      });
    }, { threshold: 0.16, rootMargin: '0px 0px -8% 0px' });
    els.forEach(function (el) { io.observe(el); });
  } else {
    els.forEach(function (el) { el.classList.add('in'); });
  }

  // Radial „Terapia łączona" — linie rysowane wg realnych pozycji węzłów (spójne i responsywne)
  function drawRadial() {
    document.querySelectorAll('.radial').forEach(function (radial) {
      var svg = radial.querySelector('.radial__svg');
      var grid = radial.querySelector('.radial__grid');
      var emblem = radial.querySelector('.emblem');
      if (!svg || !grid || !emblem) return;
      if (getComputedStyle(svg).display === 'none') { svg.innerHTML = ''; return; }
      var gr = grid.getBoundingClientRect();
      if (gr.width < 2) return;
      var eb = emblem.getBoundingClientRect();
      var cx = eb.left + eb.width / 2 - gr.left, cy = eb.top + eb.height / 2 - gr.top, r = eb.width / 2 - 2;
      svg.setAttribute('viewBox', '0 0 ' + Math.round(gr.width) + ' ' + Math.round(gr.height));
      svg.setAttribute('preserveAspectRatio', 'none');
      var d = '';
      radial.querySelectorAll('.node__ic').forEach(function (ic) {
        var b = ic.getBoundingClientRect();
        var nx = b.left + b.width / 2 - gr.left, ny = b.top + b.height / 2 - gr.top;
        var ang = Math.atan2(ny - cy, nx - cx);
        var sx = cx + Math.cos(ang) * r, sy = cy + Math.sin(ang) * r;
        var ex = nx - Math.cos(ang) * (b.width / 2 + 3), ey = ny - Math.sin(ang) * (b.height / 2 + 3);
        var mx = (sx + ex) / 2, my = (sy + ey) / 2 + (ey < cy ? -14 : 14);
        d += '<path d="M' + sx.toFixed(1) + ',' + sy.toFixed(1) + ' Q' + mx.toFixed(1) + ',' + my.toFixed(1) + ' ' + ex.toFixed(1) + ',' + ey.toFixed(1) + '"/>';
      });
      svg.innerHTML = d;
    });
  }
  var rt;
  addEventListener('resize', function () { clearTimeout(rt); rt = setTimeout(drawRadial, 140); }, { passive: true });
  addEventListener('load', drawRadial);
  if (document.fonts && document.fonts.ready) document.fonts.ready.then(drawRadial);
  setTimeout(drawRadial, 300); setTimeout(drawRadial, 1100);
})();
