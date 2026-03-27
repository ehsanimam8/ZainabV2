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
                            <div class="stat-value" style="color: var(--color-deep-teal);">$8,450</div>
                            <div style="font-size:11px; color: var(--color-body-gray); margin-top:4px;">across 34 students</div>
                        </div>
                        <div class="stat-card" style="border-left: 4px solid #16A34A;">
                            <span class="stat-label">Collected This Month</span>
                            <div class="stat-value" style="color: #16A34A;">$12,300</div>
                            <div style="font-size:11px; color: var(--color-body-gray); margin-top:4px;">↑ 8% vs last month</div>
                        </div>
                        <div class="stat-card" style="border-left: 4px solid #DC2626;">
                            <span class="stat-label">Failed Payments</span>
                            <div class="stat-value" style="color: #DC2626;">7</div>
                            <div style="font-size:11px; color: var(--color-body-gray); margin-top:4px;">require follow-up</div>
                        </div>
                        <div class="stat-card" style="border-left: 4px solid #D97706;">
                            <span class="stat-label">Auto-charges (7 days)</span>
                            <div class="stat-value" style="color: #D97706;">$3,150</div>
                            <div style="font-size:11px; color: var(--color-body-gray); margin-top:4px;">21 invoices due</div>
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
                                    <tr style="border-bottom:1px solid var(--color-light-gray);">
                                        <td style="padding:10px; font-weight:600;">#INV-0091</td>
                                        <td style="padding:10px;">Zainab Ahmed</td>
                                        <td style="padding:10px; color: var(--color-body-gray);">Islamic Theology</td>
                                        <td style="padding:10px; font-weight:700;">$150.00</td>
                                        <td style="padding:10px; color: var(--color-body-gray);">Mar 25, 2026</td>
                                        <td style="padding:10px;"><span class="badge badge-success">Active</span></td>
                                        <td style="padding:10px; text-align:center;">0</td>
                                        <td style="padding:10px;"><button class="btn btn-outline" style="font-size:11px; padding:4px 10px;" onclick="showToast('Opening invoice #INV-0091…')">View</button></td>
                                    </tr>
                                    <tr style="border-bottom:1px solid var(--color-light-gray);">
                                        <td style="padding:10px; font-weight:600;">#INV-0087</td>
                                        <td style="padding:10px;">Omar Farooq</td>
                                        <td style="padding:10px; color: var(--color-body-gray);">Arabic Language</td>
                                        <td style="padding:10px; font-weight:700;">$299.00</td>
                                        <td style="padding:10px; color: #DC2626; font-weight:600;">Mar 01, 2026 ⚠</td>
                                        <td style="padding:10px;"><span class="badge badge-error">Payment Failed</span></td>
                                        <td style="padding:10px; text-align:center;">1</td>
                                        <td style="padding:10px;"><button class="btn btn-primary" style="font-size:11px; padding:4px 10px;" onclick="showToast('Retry payment queued for Omar Farooq')">Retry</button></td>
                                    </tr>
                                    <tr style="border-bottom:1px solid var(--color-light-gray);">
                                        <td style="padding:10px; font-weight:600;">#INV-0083</td>
                                        <td style="padding:10px;">Aisha Siddiqui</td>
                                        <td style="padding:10px; color: var(--color-body-gray);">Quranic Studies</td>
                                        <td style="padding:10px; font-weight:700;">$200.00</td>
                                        <td style="padding:10px; color: var(--color-body-gray);">Feb 15, 2026</td>
                                        <td style="padding:10px;"><span class="badge badge-warning">Suspended</span></td>
                                        <td style="padding:10px; text-align:center;">2</td>
                                        <td style="padding:10px;"><button class="btn btn-outline" style="font-size:11px; padding:4px 10px; color: #16A34A; border-color:#16A34A;" onclick="showToast('Aisha Siddiqui reactivated — enrollment resumed')">Reactivate</button></td>
                                    </tr>
                                    <tr style="border-bottom:1px solid var(--color-light-gray);">
                                        <td style="padding:10px; font-weight:600;">#INV-0079</td>
                                        <td style="padding:10px;">Hassan Malik</td>
                                        <td style="padding:10px; color: var(--color-body-gray);">Islamic Theology</td>
                                        <td style="padding:10px; font-weight:700;">$450.00</td>
                                        <td style="padding:10px; color: var(--color-body-gray);">Jan 10, 2026</td>
                                        <td style="padding:10px;"><span class="badge" style="background:#FEF3C7; color:#B45309;">Abandoned</span></td>
                                        <td style="padding:10px; text-align:center;">0</td>
                                        <td style="padding:10px;"><button class="btn btn-outline" style="font-size:11px; padding:4px 10px;" onclick="showToast('Resume enrollment link sent to Hassan Malik')">Send Resume Link</button></td>
                                    </tr>
                                    <tr>
                                        <td style="padding:10px; font-weight:600;">#INV-0072</td>
                                        <td style="padding:10px;">Sara Khan</td>
                                        <td style="padding:10px; color: var(--color-body-gray);">Arabic Language</td>
                                        <td style="padding:10px; font-weight:700;">$299.00</td>
                                        <td style="padding:10px; color: var(--color-body-gray);">Dec 01, 2025</td>
                                        <td style="padding:10px;"><span class="badge" style="background:#ECFDF5; color:#059669;">Completed</span></td>
                                        <td style="padding:10px; text-align:center;">0</td>
                                        <td style="padding:10px;"><button class="btn btn-outline" style="font-size:11px; padding:4px 10px;" onclick="showToast('Receipt for #INV-0072 downloaded')">Receipt</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>

</x-filament-panels::page>