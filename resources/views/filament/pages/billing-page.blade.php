<x-filament-panels::page>
                <section id="view-billing" class="content-view hidden">
                    <div class="flex justify-between items-center" style="margin-bottom: var(--space-6);">
                        <div>
                            <h1 class="ui-page-title">Billing & Payments</h1>
                            <p style="color: var(--color-body-gray);">Manage tuition, invoices, and payment states.</p>
                        </div>
                        <div class="flex gap-4">
                            <button class="btn btn-outline" onclick="showToast('Invoice list exported to CSV')">Export</button>
                            <button class="btn btn-primary" onclick="openInvoiceCreator()"><i data-lucide="plus" style="width:14px; vertical-align:middle; margin-right:6px;"></i>New Invoice</button>
                        </div>
                    </div>

                    <!-- Stats Bar -->
                    <div class="stats-grid">
                        <div class="stat-card" style="border-left: 4px solid var(--color-deep-teal);">
                            <span class="stat-label">Outstanding Balance</span>
                            <div class="stat-value" style="color: var(--color-deep-teal);">${{ number_format($metrics['outstandingBalance'], 2) }}</div>
                            <div style="font-size:11px; color: var(--color-body-gray); margin-top:4px;">across {{ $metrics['outstandingStudents'] }} students</div>
                        </div>
                        <div class="stat-card" style="border-left: 4px solid #16A34A;">
                            <span class="stat-label">Collected This Month</span>
                            <div class="stat-value" style="color: #16A34A;">${{ number_format($metrics['collectedThisMonth'], 2) }}</div>
                            <div style="font-size:11px; color: var(--color-body-gray); margin-top:4px;">Real-time successful sync</div>
                        </div>
                        <div class="stat-card" style="border-left: 4px solid #DC2626;">
                            <span class="stat-label">Failed Payments</span>
                            <div class="stat-value" style="color: #DC2626;">{{ collect($metrics['failedPayments'])->max() }}</div>
                            <div style="font-size:11px; color: var(--color-body-gray); margin-top:4px;">require follow-up</div>
                        </div>
                        <div class="stat-card" style="border-left: 4px solid #D97706;">
                            <span class="stat-label">Auto-charges (7 days)</span>
                            <div class="stat-value" style="color: #D97706;">${{ number_format($metrics['autoCharges'], 2) }}</div>
                            <div style="font-size:11px; color: var(--color-body-gray); margin-top:4px;">{{ $metrics['autoChargesCount'] }} invoices due</div>
                        </div>
                    </div>

                    <!-- Payment State Legend -->
                    <div class="card" style="margin-bottom: var(--space-6);">
                        <h3 style="font-size: 14px; font-weight:700; margin-bottom: var(--space-3);">Enrollment Payment States</h3>
                        <div class="flex gap-3" style="flex-wrap: wrap;">
                            <span class="badge" style="background:#EFF6FF; color:#2563EB;">Pending</span>
                            <span class="badge badge-success">Active</span>
                            <span class="badge badge-error">Payment Failed</span>
                            <span class="badge badge-warning">Suspended</span>
                            <span class="badge" style="background:#F3F4F6; color:#6B7280;">Expired</span>
                            <span class="badge" style="background:#F3F4F6; color:#6B7280;">Withdrawn</span>
                            <span class="badge" style="background:#ECFDF5; color:#059669;">Completed</span>
                            <span class="badge" style="background:#FEF3C7; color:#B45309;">Abandoned</span>
                        </div>
                        <p style="font-size:12px; color: var(--color-body-gray); margin-top: var(--space-3);">
                            <strong>Note:</strong> Reactivation is a transition event (Suspended → Active), tracked via <code>reactivation_count</code>. Abandoned state sends a resume-enrollment deep link (not a magic link).
                        </p>
                    </div>

                    <!-- Filters + Invoice List -->
                    <div class="card">
                        <div class="flex justify-between items-center" style="margin-bottom: var(--space-4); flex-wrap: wrap; gap: var(--space-3);">
                            <h3 style="font-size: 15px; font-weight:700;">Invoice List</h3>
                            <div class="flex gap-3" style="flex-wrap:wrap;">
                                <select style="padding: 8px 12px; border: 1px solid var(--color-mid-gray); border-radius: 8px; font-size: 13px;">
                                    <option>All States</option>
                                    <option>Pending</option>
                                    <option>Active</option>
                                    <option>Payment Failed</option>
                                    <option>Suspended</option>
                                    <option>Abandoned</option>
                                </select>
                                <input type="text" placeholder="Search student…" style="padding: 8px 12px; border: 1px solid var(--color-mid-gray); border-radius: 8px; font-size: 13px; width:180px;">
                            </div>
                        </div>
                        <div style="overflow-x: auto;">
                            <table style="width:100%; border-collapse:collapse; font-size:13px;">
                                <thead>
                                    <tr style="border-bottom:2px solid var(--color-light-gray); text-align:left;">
                                        <th style="padding:10px;">Invoice #</th>
                                        <th style="padding:10px;">Student</th>
                                        <th style="padding:10px;">Program</th>
                                        <th style="padding:10px;">Amount</th>
                                        <th style="padding:10px;">Due Date</th>
                                        <th style="padding:10px;">State</th>
                                        <th style="padding:10px;">Reactivations</th>
                                        <th style="padding:10px;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($invoices as $invoice)
                                    <tr style="border-bottom:1px solid var(--color-light-gray);">
                                        <td style="padding:10px; font-weight:600;">#INV-{{ str_pad(substr($invoice->id, 0, 4), 4, '0', STR_PAD_LEFT) }}</td>
                                        <td style="padding:10px;">{{ $invoice->user->first_name ?? 'User' }} {{ $invoice->user->last_name ?? '' }}</td>
                                        <td style="padding:10px; color: var(--color-body-gray);">{{ config('app.name') }} Tuition</td>
                                        <td style="padding:10px; font-weight:700;">${{ number_format($invoice->amount, 2) }}</td>
                                        <td style="padding:10px; color: {{ \Carbon\Carbon::parse($invoice->due_date)->isPast() && $invoice->status !== 'Completed' ? '#DC2626' : 'var(--color-body-gray)' }};">
                                            {{ \Carbon\Carbon::parse($invoice->due_date)->format('M d, Y') }}
                                            @if(\Carbon\Carbon::parse($invoice->due_date)->isPast() && $invoice->status !== 'Completed') ⚠ @endif
                                        </td>
                                        <td style="padding:10px;">
                                            @if($invoice->status === 'Pending')
                                                <span class="badge" style="background:#EFF6FF; color:#2563EB;">Pending</span>
                                            @elseif($invoice->status === 'Overdue' || $invoice->status === 'Payment Failed')
                                                <span class="badge badge-error">{{ $invoice->status }}</span>
                                            @else
                                                <span class="badge badge-success">{{ $invoice->status }}</span>
                                            @endif
                                        </td>
                                        <td style="padding:10px; text-align:center;">{{ $invoice->enrollment->reactivation_count ?? 0 }}</td>
                                        <td style="padding:10px;">
                                            <a href="/admin/invoices/{{ $invoice->id }}/edit" class="btn btn-outline" style="font-size:11px; padding:4px 10px; display:inline-block; text-decoration:none;">View</a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="8" style="padding:20px; text-align:center; color: var(--color-body-gray);">No invoices found.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>

</x-filament-panels::page>