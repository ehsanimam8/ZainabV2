<x-filament-panels::page>
	<div class="flex justify-between items-center" style="margin-bottom: var(--space-6);">
		<div>
			<h1 class="ui-page-title text-2xl font-bold">CRM — Inquiry Pipeline</h1>
			<p style="color: var(--color-body-gray);">Track prospects from first inquiry through to active enrollment.</p>
		</div>
		<button class="btn btn-primary bg-primary-600 text-white px-4 py-2 rounded-lg" onclick="window.location.href='/admin/contacts/create'">
			<x-heroicon-o-plus style="width:14px; vertical-align:middle; margin-right:6px; display:inline;" /> Log Inquiry
		</button>
	</div>

	<!-- Pipeline Stats -->
	<div class="stats-grid grid grid-cols-4 gap-4 mb-8">
		<div class="card p-6 bg-white rounded-xl shadow-sm border border-gray-200"><span class="stat-label text-sm text-gray-500 uppercase tracking-widest font-bold block mb-2">Total Contacts</span><div class="stat-value text-3xl font-bold" style="color: #2563EB;">{{ $stats['total'] }}</div></div>
		<div class="card p-6 bg-white rounded-xl shadow-sm border border-gray-200"><span class="stat-label text-sm text-gray-500 uppercase tracking-widest font-bold block mb-2">Total Students</span><div class="stat-value text-3xl font-bold" style="color: #D97706;">{{ $stats['students'] }}</div></div>
		<div class="card p-6 bg-white rounded-xl shadow-sm border border-gray-200"><span class="stat-label text-sm text-gray-500 uppercase tracking-widest font-bold block mb-2">Total Donors</span><div class="stat-value text-3xl font-bold" style="color: #7C3AED;">{{ $stats['donors'] }}</div></div>
		<div class="card p-6 bg-white rounded-xl shadow-sm border border-gray-200"><span class="stat-label text-sm text-gray-500 uppercase tracking-widest font-bold block mb-2">Volunteers</span><div class="stat-value text-3xl font-bold" style="color: #16A34A;">{{ $stats['volunteers'] }}</div></div>
	</div>

	<!-- Recent Inquiries Table -->
	<div class="bg-white rounded-xl shadow-sm border border-gray-200 mt-8">
		<div class="p-6 border-b border-gray-200">
			<h3 style="font-size:15px; font-weight:700;">Global Contacts Index</h3>
		</div>
		<table style="width:100%; border-collapse:collapse; font-size:13px;">
			<thead class="bg-gray-50 border-b border-gray-200">
				<tr style="text-align:left;">
					<th style="padding:12px 24px; font-weight: 600; color: #4b5563;">Name</th>
					<th style="padding:12px 24px; font-weight: 600; color: #4b5563;">Email</th>
					<th style="padding:12px 24px; font-weight: 600; color: #4b5563;">Flags</th>
					<th style="padding:12px 24px; font-weight: 600; color: #4b5563;">Join Date</th>
					<th style="padding:12px 24px;"></th>
				</tr>
			</thead>
			<tbody class="divide-y divide-gray-200">
                @forelse($contacts as $contact)
				<tr class="hover:bg-gray-50">
					<td style="padding:12px 24px; font-weight:600;">{{ $contact->first_name }} {{ $contact->last_name }}</td>
					<td style="padding:12px 24px; color: #6b7280;">{{ $contact->email }}</td>
					<td style="padding:12px 24px;">
                        @foreach($contact->relationship_flags ?? [] as $flag)
                            <span class="inline-flex items-center rounded-md bg-blue-50 px-2 py-1 text-xs font-medium text-blue-700 ring-1 ring-inset ring-blue-700/10">{{ $flag }}</span>
                        @endforeach
                    </td>
					<td style="padding:12px 24px; color: #6b7280;">{{ $contact->created_at->format('M d, Y') }}</td>
					<td style="padding:12px 24px;"><a href="/admin/contacts/{{ $contact->id }}" class="text-sm font-semibold text-primary-600 hover:text-primary-500">Open</a></td>
				</tr>
                @empty
                <tr><td colspan="5" style="padding:20px;text-align:center;color:#6b7280;">No contacts found.</td></tr>
                @endforelse
			</tbody>
		</table>
	</div>
</x-filament-panels::page>
