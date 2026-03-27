<x-filament-panels::page>
	<div class="flex justify-between items-center" style="margin-bottom: var(--space-6);">
		<div>
			<h1 class="ui-page-title text-2xl font-bold">CRM — Inquiry Pipeline</h1>
			<p style="color: var(--color-body-gray);">Track prospects from first inquiry through to active enrollment.</p>
		</div>
		<button class="btn btn-primary bg-primary-600 text-white px-4 py-2 rounded-lg" onclick="openModal('modal-add-household')">
			<x-heroicon-o-plus style="width:14px; vertical-align:middle; margin-right:6px; display:inline;" /> Log Inquiry
		</button>
	</div>

	<!-- Pipeline Stats -->
	<div class="stats-grid grid grid-cols-4 gap-4 mb-8">
		<div class="card p-6 bg-white rounded-xl shadow-sm border border-gray-200"><span class="stat-label text-sm text-gray-500 uppercase tracking-widest font-bold block mb-2">New Inquiries</span><div class="stat-value text-3xl font-bold" style="color: #2563EB;">18</div></div>
		<div class="card p-6 bg-white rounded-xl shadow-sm border border-gray-200"><span class="stat-label text-sm text-gray-500 uppercase tracking-widest font-bold block mb-2">In Contact</span><div class="stat-value text-3xl font-bold" style="color: #D97706;">11</div></div>
		<div class="card p-6 bg-white rounded-xl shadow-sm border border-gray-200"><span class="stat-label text-sm text-gray-500 uppercase tracking-widest font-bold block mb-2">Application Rx</span><div class="stat-value text-3xl font-bold" style="color: #7C3AED;">6</div></div>
		<div class="card p-6 bg-white rounded-xl shadow-sm border border-gray-200"><span class="stat-label text-sm text-gray-500 uppercase tracking-widest font-bold block mb-2">Enrolled (Month)</span><div class="stat-value text-3xl font-bold" style="color: #16A34A;">9</div></div>
	</div>

	<!-- Pipeline Kanban -->
	<div style="display: grid; grid-template-columns: repeat(5, 1fr); gap: 1rem; overflow-x: auto;">
		<!-- Col 1: New Inquiry -->
		<div>
			<div style="background: #EFF6FF; border-radius: 8px 8px 0 0; padding: 8px 12px; font-size: 12px; font-weight: 700; color: #2563EB;">NEW INQUIRY <span style="background: #2563EB; color: white; border-radius: 10px; padding: 1px 7px; margin-left: 6px;">18</span></div>
			<div style="background: #f9fafb; border-radius: 0 0 8px 8px; padding: 12px; display: grid; gap: 8px; min-height: 200px; border: 1px solid #e5e7eb; border-top: none;">
				<div class="bg-white rounded-lg p-3 shadow-sm border border-gray-200 cursor-pointer" onclick="showCRMDetail('Yasmin Osman')">
					<div style="font-weight:700; font-size:13px;">Yasmin Osman</div>
					<div style="font-size:11px; color: #6b7280; margin-top:2px;">Islamic Theology · Web Form</div>
					<div style="font-size:11px; color: #6b7280; margin-top:4px;">Mar 14, 2026</div>
				</div>
				<div class="bg-white rounded-lg p-3 shadow-sm border border-gray-200 cursor-pointer" onclick="showCRMDetail('Bilal Rauf')">
					<div style="font-weight:700; font-size:13px;">Bilal Rauf</div>
					<div style="font-size:11px; color: #6b7280; margin-top:2px;">Arabic Language · Referral</div>
					<div style="font-size:11px; color: #6b7280; margin-top:4px;">Mar 13, 2026</div>
				</div>
			</div>
		</div>
		<!-- Col 2: Contacted -->
		<div>
			<div style="background: #FEF3C7; border-radius: 8px 8px 0 0; padding: 8px 12px; font-size: 12px; font-weight: 700; color: #D97706;">CONTACTED <span style="background: #D97706; color: white; border-radius: 10px; padding: 1px 7px; margin-left: 6px;">11</span></div>
			<div style="background: #f9fafb; border-radius: 0 0 8px 8px; padding: 12px; display: grid; gap: 8px; min-height: 200px; border: 1px solid #e5e7eb; border-top: none;">
				<div class="bg-white rounded-lg p-3 shadow-sm border border-gray-200 cursor-pointer" onclick="showCRMDetail('Amina Sheikh')">
					<div style="font-weight:700; font-size:13px;">Amina Sheikh</div>
					<div style="font-size:11px; color: #6b7280; margin-top:2px;">Quranic Studies · WhatsApp</div>
					<div style="font-size:11px; color: #D97706; margin-top:4px; font-weight: 600;">Follow-up due today</div>
				</div>
			</div>
		</div>
		<!-- Col 3: Application Received -->
		<div>
			<div style="background: #EDE9FE; border-radius: 8px 8px 0 0; padding: 8px 12px; font-size: 12px; font-weight: 700; color: #7C3AED;">APPLICATION RX <span style="background: #7C3AED; color: white; border-radius: 10px; padding: 1px 7px; margin-left: 6px;">6</span></div>
			<div style="background: #f9fafb; border-radius: 0 0 8px 8px; padding: 12px; display: grid; gap: 8px; min-height: 200px; border: 1px solid #e5e7eb; border-top: none;">
				<div class="bg-white rounded-lg p-3 shadow-sm border border-gray-200 cursor-pointer" onclick="showCRMDetail('Khalid Noor')">
					<div style="font-weight:700; font-size:13px;">Khalid Noor</div>
					<div style="font-size:11px; color: #6b7280; margin-top:2px;">Islamic Theology · Email</div>
					<div style="font-size:11px; color: #6b7280; margin-top:4px;">Under review</div>
				</div>
			</div>
		</div>
		<!-- Col 4: Enrollment Review -->
		<div>
			<div style="background: #DCFCE7; border-radius: 8px 8px 0 0; padding: 8px 12px; font-size: 12px; font-weight: 700; color: #16A34A;">ENROLLMENT REVIEW <span style="background: #16A34A; color: white; border-radius: 10px; padding: 1px 7px; margin-left: 6px;">3</span></div>
			<div style="background: #f9fafb; border-radius: 0 0 8px 8px; padding: 12px; display: grid; gap: 8px; min-height: 200px; border: 1px solid #e5e7eb; border-top: none;">
				<div class="bg-white rounded-lg p-3 shadow-sm border-l-4 border-l-green-600 border border-gray-200 cursor-pointer">
					<div style="font-weight:700; font-size:13px;">Noor Rahman</div>
					<div style="font-size:11px; color: #6b7280; margin-top:2px;">Arabic Language</div>
					<div style="font-size:11px; color: #16A34A; margin-top:4px; font-weight: 600;">Ready to enroll ✓</div>
				</div>
			</div>
		</div>
		<!-- Col 5: Enrolled -->
		<div>
			<div style="background: #1e293b; border-radius: 8px 8px 0 0; padding: 8px 12px; font-size: 12px; font-weight: 700; color: white;">ENROLLED <span style="background: rgba(255,255,255,0.2); color: white; border-radius: 10px; padding: 1px 7px; margin-left: 6px;">9</span></div>
			<div style="background: #f9fafb; border-radius: 0 0 8px 8px; padding: 12px; display: grid; gap: 8px; min-height: 200px; border: 1px solid #e5e7eb; border-top: none;">
				<div class="bg-white rounded-lg p-3 shadow-sm border border-gray-200">
					<div style="font-weight:700; font-size:13px;">Zainab Ahmed</div>
					<div style="font-size:11px; color: #6b7280; margin-top:2px;">Islamic Theology</div>
					<div style="font-size:11px; color: #16A34A; margin-top:4px; font-weight: 600;">Enrolled Mar 12</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Recent Inquiries Table -->
	<div class="bg-white rounded-xl shadow-sm border border-gray-200 mt-8">
		<div class="p-6 border-b border-gray-200">
			<h3 style="font-size:15px; font-weight:700;">All Inquiries</h3>
		</div>
		<table style="width:100%; border-collapse:collapse; font-size:13px;">
			<thead class="bg-gray-50 border-b border-gray-200">
				<tr style="text-align:left;">
					<th style="padding:12px 24px; font-weight: 600; color: #4b5563;">Name</th>
					<th style="padding:12px 24px; font-weight: 600; color: #4b5563;">Email</th>
					<th style="padding:12px 24px; font-weight: 600; color: #4b5563;">Program Interest</th>
					<th style="padding:12px 24px; font-weight: 600; color: #4b5563;">Source</th>
					<th style="padding:12px 24px; font-weight: 600; color: #4b5563;">Stage</th>
					<th style="padding:12px 24px; font-weight: 600; color: #4b5563;">Date</th>
					<th style="padding:12px 24px;"></th>
				</tr>
			</thead>
			<tbody class="divide-y divide-gray-200">
				<tr class="hover:bg-gray-50">
					<td style="padding:12px 24px; font-weight:600;">Yasmin Osman</td>
					<td style="padding:12px 24px; color: #6b7280;">yasmin@email.com</td>
					<td style="padding:12px 24px;">Islamic Theology</td>
					<td style="padding:12px 24px;"><span class="inline-flex items-center rounded-md bg-blue-50 px-2 py-1 text-xs font-medium text-blue-700 ring-1 ring-inset ring-blue-700/10">Web Form</span></td>
					<td style="padding:12px 24px;"><span class="inline-flex items-center rounded-md bg-blue-100 px-2 py-1 text-xs font-bold text-blue-800">New Inquiry</span></td>
					<td style="padding:12px 24px; color: #6b7280;">Mar 14</td>
					<td style="padding:12px 24px;"><button class="text-sm font-semibold text-primary-600 hover:text-primary-500">Open</button></td>
				</tr>
				<tr class="hover:bg-gray-50">
					<td style="padding:12px 24px; font-weight:600;">Amina Sheikh</td>
					<td style="padding:12px 24px; color: #6b7280;">amina@email.com</td>
					<td style="padding:12px 24px;">Quranic Studies</td>
					<td style="padding:12px 24px;"><span class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">Referral</span></td>
					<td style="padding:12px 24px;"><span class="inline-flex items-center rounded-md bg-yellow-100 px-2 py-1 text-xs font-bold text-yellow-800">Contacted</span></td>
					<td style="padding:12px 24px; color: #6b7280;">Mar 11</td>
					<td style="padding:12px 24px;"><button class="text-sm font-semibold text-primary-600 hover:text-primary-500">Open</button></td>
				</tr>
			</tbody>
		</table>
	</div>
</x-filament-panels::page>
