<x-filament-panels::page>
	<div id="crm-events-list-panel">
		<div class="flex justify-between items-center" style="margin-bottom:var(--space-6);">
			<div>
				<h1 class="ui-page-title text-2xl font-bold">Events</h1>
				<p style="color:var(--color-body-gray);">One-time gatherings — seminars, open days, fundraisers, workshops — with public registration.</p>
			</div>
			<button class="btn btn-primary bg-primary-600 text-white px-4 py-2 rounded-lg" onclick="window.location.href='/admin/events/create'">+ Create Event</button>
		</div>

		<!-- Stats strip -->
		<div class="stats-grid grid grid-cols-4 gap-4 mb-6">
			<div class="card p-6 bg-white rounded-xl shadow-sm border border-gray-200"><span class="stat-label text-sm text-gray-500 uppercase tracking-widest font-bold block mb-2">Upcoming Events</span><div class="stat-value text-3xl font-bold">{{ $stats['upcoming'] }}</div></div>
			<div class="card p-6 bg-white rounded-xl shadow-sm border border-gray-200"><span class="stat-label text-sm text-gray-500 uppercase tracking-widest font-bold block mb-2">Total Registrants</span><div class="stat-value text-3xl font-bold">{{ number_format($stats['registrants']) }}</div></div>
			<div class="card p-6 bg-white rounded-xl shadow-sm border border-gray-200"><span class="stat-label text-sm text-gray-500 uppercase tracking-widest font-bold block mb-2">Paid Revenue</span><div class="stat-value text-3xl font-bold text-teal-600">${{ number_format($stats['revenue'], 2) }}</div></div>
			<div class="card p-6 bg-white rounded-xl shadow-sm border border-gray-200"><span class="stat-label text-sm text-gray-500 uppercase tracking-widest font-bold block mb-2">Pending Payment</span><div class="stat-value text-3xl font-bold text-rose-600">{{ $stats['pending'] }}</div></div>
		</div>

		<div class="card bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
			<table style="width:100%;border-collapse:collapse;text-align:left;">
				<thead class="bg-gray-50 border-b border-gray-200">
					<tr>
						<th style="padding:12px 24px;font-size:12px;color:#4b5563;text-transform:uppercase;font-weight:600;">Event</th>
						<th style="padding:12px;font-size:12px;color:#4b5563;text-transform:uppercase;font-weight:600;">Date & Time</th>
						<th style="padding:12px;font-size:12px;color:#4b5563;text-transform:uppercase;font-weight:600;">Type</th>
						<th style="padding:12px;font-size:12px;color:#4b5563;text-transform:uppercase;font-weight:600;">Registrants</th>
						<th style="padding:12px;font-size:12px;color:#4b5563;text-transform:uppercase;font-weight:600;">Status</th>
						<th style="padding:12px 24px;font-size:12px;color:#4b5563;text-transform:uppercase;text-align:right;font-weight:600;">Actions</th>
					</tr>
				</thead>
				<tbody class="divide-y divide-gray-200">
					@foreach($events as $event)
					<tr class="hover:bg-gray-50">
						<td style="padding:14px 24px;"><span style="font-weight:600;color:#1e293b;">{{ $event->title }}</span><br><span style="font-size:12px;color:#6b7280;">{{ $event->description }}</span></td>
						<td style="padding:14px 12px;font-size:13px;">{{ $event->start_date ? $event->start_date->format('M d, Y') : '—' }}<br>
							<span style="color:#6b7280;">{{ $event->start_date ? $event->start_date->format('g:i A') : '' }} – {{ $event->end_date ? $event->end_date->format('g:i A') : '' }}</span>
						</td>
						<td style="padding:14px 12px;">
							@if($event->pricing_type === 'Paid')
								<span style="background:#fef9c3;color:#854d0e;font-size:11px;font-weight:700;padding:3px 8px;border-radius:4px;">Paid · ${{ number_format($event->ticket_price, 0) }}</span>
							@else
								<span style="background:#dcfce7;color:#166534;font-size:11px;font-weight:700;padding:3px 8px;border-radius:4px;">Free</span>
							@endif
						</td>
						<td style="padding:14px 12px;">
							@if($event->mock_registrants > 0)
								<button onclick="showEventDetail('{{ addslashes($event->title) }}')" style="background:none;border:none;cursor:pointer;color:#0f766e;font-weight:600;">{{ $event->mock_registrants }} <span style="font-weight:400;font-size:12px;">view →</span></button>
							@else
								<span style="color:#6b7280;font-size:13px;">0</span>
							@endif
						</td>
						<td style="padding:14px 12px;">
							@if($event->status === 'Registration Open')
								<span class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">Registration Open</span>
							@elseif($event->status === 'Coming Soon')
								<span class="inline-flex items-center rounded-md bg-yellow-50 px-2 py-1 text-xs font-medium text-yellow-800 ring-1 ring-inset ring-yellow-600/20">Coming Soon</span>
							@else
								<span class="inline-flex items-center rounded-md bg-gray-50 px-2 py-1 text-xs font-medium text-gray-700 ring-1 ring-inset ring-gray-600/20">{{ $event->status }}</span>
							@endif
						</td>
						<td style="padding:14px 24px;text-align:right;">
							<a href="/admin/events/{{ $event->id }}/edit" style="color:#0f766e;font-size:13px;margin-right:12px;">Edit</a>
							@if($event->status === 'Registration Open')
								<a href="#" style="color:#dc2626;font-size:13px;">Close Reg.</a>
							@else
								<a href="#" style="color:#0f766e;font-size:13px;">Open Reg.</a>
							@endif
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

	<!-- Event Detail Sub-panel -->
	<div id="crm-event-detail-panel" style="display:none; margin-top: 32px;" class="bg-gray-50 p-6 rounded-xl border border-gray-200">
		<div style="margin-bottom:var(--space-4);">
			<button onclick="hideEventDetail()" style="background:none;border:none;cursor:pointer;color:#0f766e;font-size:14px;font-weight:600;display:flex;align-items:center;gap:6px;">
				<x-heroicon-o-arrow-left style="width:16px;" /> Back to Events
			</button>
		</div>
		<div class="flex justify-between items-center" style="margin-bottom:var(--space-6);">
			<div>
				<h1 class="ui-page-title text-2xl font-bold" id="event-detail-title">Event Name</h1>
				<p style="color:#6b7280;" id="event-detail-meta">Date · Location · Type</p>
			</div>
			<div class="flex gap-3">
				<button class="btn btn-outline border border-gray-300 px-4 py-2 rounded-lg bg-white">Export CSV</button>
				<button class="btn btn-primary bg-primary-600 text-white px-4 py-2 rounded-lg" onclick="window.location.href='/admin/events'">Manage Event</button>
			</div>
		</div>
		<!-- Event stats -->
		<div class="stats-grid grid grid-cols-4 gap-4 mb-6">
			<div class="card p-6 bg-white rounded-xl shadow-sm border border-gray-200"><span class="stat-label text-sm text-gray-500 uppercase tracking-widest font-bold block mb-2">Total Registered</span><div class="stat-value text-2xl font-bold">148</div></div>
			<div class="card p-6 bg-white rounded-xl shadow-sm border border-gray-200"><span class="stat-label text-sm text-gray-500 uppercase tracking-widest font-bold block mb-2">Paid</span><div class="stat-value text-2xl font-bold text-teal-600">141</div></div>
			<div class="card p-6 bg-white rounded-xl shadow-sm border border-gray-200"><span class="stat-label text-sm text-gray-500 uppercase tracking-widest font-bold block mb-2">Pending Payment</span><div class="stat-value text-2xl font-bold text-rose-600">7</div></div>
			<div class="card p-6 bg-white rounded-xl shadow-sm border border-gray-200"><span class="stat-label text-sm text-gray-500 uppercase tracking-widest font-bold block mb-2">Attended</span><div class="stat-value text-2xl font-bold">—</div></div>
		</div>
		<!-- Registrant table -->
		<div class="card bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
			<div style="padding:16px 24px;border-bottom:1px solid #e5e7eb;display:flex;justify-content:space-between;align-items:center;">
				<h3 style="font-size:16px;font-weight:700;color:#1e293b;">Registrants</h3>
				<input type="text" placeholder="Search registrants..." class="px-3 py-2 border border-gray-300 rounded-lg text-sm" style="width:220px;">
			</div>
			<table style="width:100%;border-collapse:collapse;text-align:left;">
				<thead class="bg-gray-50 border-b border-gray-200">
					<tr>
						<th style="padding:12px 24px;font-size:12px;color:#4b5563;text-transform:uppercase;font-weight:600;">Name</th>
						<th style="padding:12px;font-size:12px;color:#4b5563;text-transform:uppercase;font-weight:600;">Email</th>
						<th style="padding:12px;font-size:12px;color:#4b5563;text-transform:uppercase;font-weight:600;">Registered</th>
						<th style="padding:12px;font-size:12px;color:#4b5563;text-transform:uppercase;font-weight:600;">Payment</th>
						<th style="padding:12px 24px;font-size:12px;color:#4b5563;text-transform:uppercase;font-weight:600;">Attendance</th>
					</tr>
				</thead>
				<tbody class="divide-y divide-gray-200">
					<tr class="hover:bg-gray-50">
						<td style="padding:12px 24px;font-weight:600;">Fatima Al-Hassan</td>
						<td style="padding:12px;font-size:13px;color:#6b7280;">fatima@email.com</td>
						<td style="padding:12px;font-size:13px;">Mar 10, 2026</td>
						<td style="padding:12px;"><span class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">Paid</span></td>
						<td style="padding:12px 24px;"><select class="px-2 py-1 border border-gray-300 rounded-md text-xs bg-white"><option>—</option><option>Attended</option><option>No-show</option></select></td>
					</tr>
					<tr class="hover:bg-gray-50">
						<td style="padding:12px 24px;font-weight:600;">Maryam Khalid</td>
						<td style="padding:12px;font-size:13px;color:#6b7280;">maryam@email.com</td>
						<td style="padding:12px;font-size:13px;">Mar 12, 2026</td>
						<td style="padding:12px;"><span class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">Paid</span></td>
						<td style="padding:12px 24px;"><select class="px-2 py-1 border border-gray-300 rounded-md text-xs bg-white"><option>—</option><option>Attended</option><option>No-show</option></select></td>
					</tr>
					<tr class="hover:bg-gray-50">
						<td style="padding:12px 24px;font-weight:600;">Sara Al-Amin</td>
						<td style="padding:12px;font-size:13px;color:#6b7280;">sara@email.com</td>
						<td style="padding:12px;font-size:13px;">Mar 14, 2026</td>
						<td style="padding:12px;"><span class="inline-flex items-center rounded-md bg-yellow-50 px-2 py-1 text-xs font-medium text-yellow-800 ring-1 ring-inset ring-yellow-600/20">Pending</span></td>
						<td style="padding:12px 24px;"><select class="px-2 py-1 border border-gray-300 rounded-md text-xs bg-white"><option>—</option><option>Attended</option><option>No-show</option></select></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>

	<script>
		function showEventDetail(name) {
			document.getElementById('crm-events-list-panel').style.display = 'none';
			document.getElementById('crm-event-detail-panel').style.display = 'block';
			document.getElementById('event-detail-title').innerText = name;
		}
		function hideEventDetail() {
			document.getElementById('crm-events-list-panel').style.display = 'block';
			document.getElementById('crm-event-detail-panel').style.display = 'none';
		}
	</script>
</x-filament-panels::page>
