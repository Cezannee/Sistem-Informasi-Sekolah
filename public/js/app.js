(function () {
  // Greeting + date
  const greetingChip = document.getElementById('greetingChip');
  const todayText = document.getElementById('todayText');

  if (greetingChip) {
    const h = new Date().getHours();
    let greet = 'Selamat datang';
    if (h >= 4 && h < 11) greet = 'Selamat pagi';
    else if (h >= 11 && h < 15) greet = 'Selamat siang';
    else if (h >= 15 && h < 19) greet = 'Selamat sore';
    else greet = 'Selamat malam';
    greetingChip.textContent = greet;
  }

  if (todayText) {
    const d = new Date();
    const fmt = new Intl.DateTimeFormat('id-ID', {
      weekday: 'long',
      day: '2-digit',
      month: 'long',
      year: 'numeric',
    });
    todayText.textContent = fmt.format(d);
  }

  // Count up animation
  function animateCount(el, to) {
    const duration = 700;
    const start = 0;
    const t0 = performance.now();

    function frame(now) {
      const p = Math.min(1, (now - t0) / duration);
      const val = Math.floor(start + (to - start) * (1 - Math.pow(1 - p, 3))); // easeOutCubic
      el.textContent = val.toLocaleString('id-ID');
      if (p < 1) requestAnimationFrame(frame);
    }
    requestAnimationFrame(frame);
  }

  document.querySelectorAll('.js-count').forEach((el) => {
    const to = parseInt(el.dataset.count || '0', 10);
    animateCount(el, isNaN(to) ? 0 : to);
  });

  // Dismissible tip
  const tip = document.getElementById('dashTip');
  const dismissBtn = document.getElementById('dismissTipBtn');
  const TIP_KEY = 'simsekolah_dash_tip_hidden';

  if (tip) {
    const hidden = localStorage.getItem(TIP_KEY) === '1';
    if (hidden) tip.style.display = 'none';
  }

  if (dismissBtn && tip) {
    dismissBtn.addEventListener('click', () => {
      tip.style.display = 'none';
      localStorage.setItem(TIP_KEY, '1');
    });
  }
})();

