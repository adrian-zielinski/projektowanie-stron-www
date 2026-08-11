/* Kalendarz rezerwacji: pobiera zajętość AJAX-em, wybór zakresu, walidacja kolizji. */
(function () {
	var cal = document.getElementById('rez-cal');
	if (!cal) return;
	var ajax = cal.dataset.ajax;
	var now = new Date();
	var view = { y: now.getFullYear(), m: now.getMonth() + 1 };
	var busyCache = {};
	var sel = { start: null, end: null };
	var MONTHS = ['styczeń','luty','marzec','kwiecień','maj','czerwiec','lipiec','sierpień','wrzesień','październik','listopad','grudzień'];

	function pad(n){ return (n < 10 ? '0' : '') + n; }
	function iso(y, m, d){ return y + '-' + pad(m) + '-' + pad(d); }
	function todayIso(){ var t = new Date(); return iso(t.getFullYear(), t.getMonth()+1, t.getDate()); }

	function load(y, m, cb) {
		var key = y + '-' + m;
		if (busyCache[key]) return cb(busyCache[key]);
		fetch(ajax + '?action=rez_month&y=' + y + '&m=' + m)
			.then(function(r){ return r.json(); })
			.then(function(d){ busyCache[key] = d; cb(d); });
	}

	function render() {
		load(view.y, view.m, function (data) {
			document.getElementById('rez-title').textContent = MONTHS[view.m-1] + ' ' + view.y;
			var days = document.getElementById('rez-days');
			days.innerHTML = '';
			var firstDow = (new Date(view.y, view.m - 1, 1).getDay() + 6) % 7; // pn=0
			for (var i = 0; i < firstDow; i++) days.appendChild(document.createElement('span'));
			for (var d = 1; d <= data.days; d++) {
				var b = document.createElement('button');
				b.type = 'button';
				b.textContent = d;
				var dayIso = iso(view.y, view.m, d);
				var isBusy = data.busy.indexOf(d) !== -1;
				var isPast = dayIso < todayIso();
				b.className = 'rez__day' + (isBusy ? ' is-busy' : '') + (isPast ? ' is-past' : '');
				if (sel.start && dayIso === sel.start) b.classList.add('is-sel');
				if (sel.start && sel.end && dayIso > sel.start && dayIso <= sel.end) b.classList.add('is-sel');
				if (!isBusy && !isPast) b.addEventListener('click', pick.bind(null, dayIso));
				else b.disabled = true;
				days.appendChild(b);
			}
		});
	}

	function rangeFree(a, b) {
		// sprawdź kolizję w załadowanych miesiącach zakresu
		var cur = new Date(a); var end = new Date(b);
		while (cur <= end) {
			var key = cur.getFullYear() + '-' + (cur.getMonth() + 1);
			var data = busyCache[key];
			if (data && data.busy.indexOf(cur.getDate()) !== -1
				&& iso(cur.getFullYear(), cur.getMonth()+1, cur.getDate()) !== b) return false;
			cur.setDate(cur.getDate() + 1);
		}
		return true;
	}

	function pick(dayIso) {
		if (!sel.start || (sel.start && sel.end)) { sel = { start: dayIso, end: null }; }
		else if (dayIso > sel.start) {
			if (!rangeFree(sel.start, dayIso)) { sel = { start: dayIso, end: null }; }
			else { sel.end = dayIso; }
		} else { sel = { start: dayIso, end: null }; }
		document.getElementById('rez-start').value = sel.start || '';
		document.getElementById('rez-end').value = sel.end || '';
		document.getElementById('rez-range').value = sel.end
			? sel.start + '  →  ' + sel.end
			: (sel.start ? sel.start + '  →  (wybierz koniec)' : '');
		render();
	}

	document.getElementById('rez-prev').addEventListener('click', function () {
		if (--view.m < 1) { view.m = 12; view.y--; } render();
	});
	document.getElementById('rez-next').addEventListener('click', function () {
		if (++view.m > 12) { view.m = 1; view.y++; } render();
	});
	document.getElementById('rez-form').addEventListener('submit', function (e) {
		if (!sel.start || !sel.end) {
			e.preventDefault();
			document.getElementById('rez-range').value = 'Najpierw wybierz daty w kalendarzu';
		}
	});
	render();
})();
