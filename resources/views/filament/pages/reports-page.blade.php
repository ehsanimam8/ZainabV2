<x-filament-panels::page>
                <section id="view-reports" class="content-view hidden">
                    <div class="flex justify-between items-center" style="margin-bottom: var(--space-6);">
                        <div>
                            <h1 class="ui-page-title">Reports</h1>
                            <p style="color: var(--color-body-gray);">Generate, filter, and download institutional reports.</p>
                        </div>
                        <button class="btn btn-outline" onclick="showToast('Scheduled report export queued')"><i data-lucide="clock" style="width:14px;vertical-align:middle;margin-right:6px;"></i>Schedule Export</button>
                    </div>

                    <!-- Global Filters Bar -->
                    <div class="card flex items-center gap-4" style="margin-bottom:var(--space-6);flex-wrap:wrap;padding:14px 20px;">
                        <span style="font-size:12px;font-weight:700;text-transform:uppercase;letter-spacing:0.06em;color:var(--color-body-gray);white-space:nowrap;">Filter by:</span>
                        <div class="flex gap-3 flex-wrap flex-1">
                            <select id="rpt-term" onchange="applyReportFilters()" style="padding:7px 12px;border:1px solid var(--color-mid-gray);border-radius:8px;font-size:13px;background:white;">
                                <option value="">All Terms</option>
                                <option value="spring-2026" selected>Spring 2026</option>
                                <option value="fall-2025">Fall 2025</option>
                                <option value="spring-2025">Spring 2025</option>
                            </select>
                            <select id="rpt-program" onchange="applyReportFilters()" style="padding:7px 12px;border:1px solid var(--color-mid-gray);border-radius:8px;font-size:13px;background:white;">
                                <option value="">All Programs</option>
                                <option value="theology">Full-time Theology</option>
                                <option value="arabic">Arabic Language</option>
                                <option value="quran">Quranic Studies</option>
                            </select>
                            <select id="rpt-format" style="padding:7px 12px;border:1px solid var(--color-mid-gray);border-radius:8px;font-size:13px;background:white;">
                                <option value="pdf">PDF</option>
                                <option value="excel">Excel (CSV)</option>
                            </select>
                            <div style="display:flex;gap:8px;align-items:center;background:var(--color-light-gray);border-radius:8px;padding:4px 8px;">
                                <label style="font-size:12px;font-weight:600;white-space:nowrap;">Date Range:</label>
                                <input type="date" id="rpt-from" value="2026-01-01" style="border:none;background:transparent;font-size:12px;font-family:inherit;">
                                <span style="color:var(--color-body-gray);">–</span>
                                <input type="date" id="rpt-to" value="2026-03-15" style="border:none;background:transparent;font-size:12px;font-family:inherit;">
                            </div>
                        </div>
                        <div id="rpt-filter-badge" style="font-size:12px;color:var(--color-deep-teal);font-weight:600;white-space:nowrap;">Spring 2026 · All Programs</div>
                    </div>

                    <!-- Report Type Cards -->
                    <h3 style="font-size:14px; font-weight:700; margin-bottom: var(--space-4);">Generate a Report</h3>
                    <div class="quick-actions-grid" style="grid-template-columns: repeat(4, 1fr); margin-bottom: var(--space-8);">
                        <div class="action-card" style="align-items:flex-start; padding: var(--space-4);" onclick="generateReport('Enrollment Report')">
                            <i data-lucide="users" style="color: var(--color-deep-teal); width:28px; height:28px;"></i>
                            <span style="font-size:13px; text-align:left;">Enrollment Report</span>
                            <span style="font-size:11px; color: var(--color-body-gray); text-align:left;">Enrollment by program, state, and term.</span>
                        </div>
                        <div class="action-card" style="align-items:flex-start; padding: var(--space-4);" onclick="generateReport('Financial Report')">
                            <i data-lucide="credit-card" style="color: var(--color-mauve-rose); width:28px; height:28px;"></i>
                            <span style="font-size:13px; text-align:left;">Financial Report</span>
                            <span style="font-size:11px; color: var(--color-body-gray); text-align:left;">Collections, outstanding, and payment states.</span>
                        </div>
                        <div class="action-card" style="align-items:flex-start; padding: var(--space-4);" onclick="generateReport('Attendance Report')">
                            <i data-lucide="calendar-check" style="color: var(--color-deep-teal); width:28px; height:28px;"></i>
                            <span style="font-size:13px; text-align:left;">Attendance Report</span>
                            <span style="font-size:11px; color: var(--color-body-gray); text-align:left;">Per-student and per-course attendance.</span>
                        </div>
                        <div class="action-card" style="align-items:flex-start; padding: var(--space-4);" onclick="generateReport('Academic Progress Report')">
                            <i data-lucide="award" style="color: var(--color-mauve-rose); width:28px; height:28px;"></i>
                            <span style="font-size:13px; text-align:left;">Academic Progress</span>
                            <span style="font-size:11px; color: var(--color-body-gray); text-align:left;">Gradebook summary and completion rates.</span>
                        </div>
                        <div class="action-card" style="align-items:flex-start; padding: var(--space-4);" onclick="generateReport('Bulk Transcripts')">
                            <i data-lucide="scroll" style="color: var(--color-deep-teal); width:28px; height:28px;"></i>
                            <span style="font-size:13px; text-align:left;">Transcripts (Bulk)</span>
                            <span style="font-size:11px; color: var(--color-body-gray); text-align:left;">Per-student PDF transcripts for completed programs.</span>
                        </div>
                        <div class="action-card" style="align-items:flex-start; padding: var(--space-4);" onclick="generateReport('CRM Funnel Report')">
                            <i data-lucide="funnel" style="color: var(--color-deep-teal); width:28px; height:28px;"></i>
                            <span style="font-size:13px; text-align:left;">CRM Funnel Report</span>
                            <span style="font-size:11px; color: var(--color-body-gray); text-align:left;">Inquiry-to-enrollment conversion rates.</span>
                        </div>
                        <div class="action-card" style="align-items:flex-start; padding: var(--space-4);" onclick="generateReport('Notification Log')">
                            <i data-lucide="bell" style="color: var(--color-deep-teal); width:28px; height:28px;"></i>
                            <span style="font-size:13px; text-align:left;">Notification Log</span>
                            <span style="font-size:11px; color: var(--color-body-gray); text-align:left;">Delivery and open rate by template.</span>
                        </div>
                        <div class="action-card" style="align-items:flex-start; padding: var(--space-4);" onclick="generateReport('Custom Report')">
                            <i data-lucide="bar-chart-3" style="color: var(--color-mauve-rose); width:28px; height:28px;"></i>
                            <span style="font-size:13px; text-align:left;">Custom Report</span>
                            <span style="font-size:11px; color: var(--color-body-gray); text-align:left;">Build a report with custom filters and fields.</span>
                        </div>
                    </div>

                    <!-- Generating indicator (hidden by default) -->
                    <div id="rpt-generating" class="hidden" style="background:var(--color-deep-teal);color:white;border-radius:8px;padding:14px 20px;margin-bottom:var(--space-4);display:flex;align-items:center;gap:12px;">
                        <i data-lucide="loader" style="width:16px;animation:spin 1s linear infinite;"></i>
                        <span id="rpt-generating-label">Generating Enrollment Report…</span>
                        <span style="font-size:12px;opacity:0.7;margin-left:auto;">Spring 2026 · All Programs · PDF</span>
                    </div>

                    <!-- Recent Reports -->
                    <div class="card" style="padding:0;overflow:hidden;">
                        <div style="padding:16px 20px;border-bottom:1px solid var(--color-light-gray);display:flex;justify-content:space-between;align-items:center;">
                            <h3 style="font-size:15px;font-weight:700;">Recently Generated</h3>
                            <input type="text" placeholder="Search reports…" oninput="filterReportHistory(this.value)" style="padding:6px 12px;border:1px solid var(--color-mid-gray);border-radius:8px;font-size:12px;width:200px;">
                        </div>
                        <table style="width:100%; border-collapse:collapse; font-size:13px;">
                            <thead style="background:var(--color-light-gray);">
                                <tr style="border-bottom:2px solid var(--color-mid-gray);text-align:left;">
                                    <th style="padding:10px 20px;font-size:11px;color:var(--color-body-gray);text-transform:uppercase;">Report Name</th>
                                    <th style="padding:10px;font-size:11px;color:var(--color-body-gray);text-transform:uppercase;">Filters Applied</th>
                                    <th style="padding:10px;font-size:11px;color:var(--color-body-gray);text-transform:uppercase;">Generated By</th>
                                    <th style="padding:10px;font-size:11px;color:var(--color-body-gray);text-transform:uppercase;">Date</th>
                                    <th style="padding:10px;font-size:11px;color:var(--color-body-gray);text-transform:uppercase;">Format</th>
                                    <th style="padding:10px 20px;"></th>
                                </tr>
                            </thead>
                            <tbody id="rpt-history-tbody">
                                <tr style="border-bottom:1px solid var(--color-light-gray);">
                                    <td style="padding:10px 20px; font-weight:600;">Enrollment Report</td>
                                    <td style="padding:10px; font-size:12px; color:var(--color-body-gray);">Spring 2026 · All Programs</td>
                                    <td style="padding:10px; color: var(--color-body-gray);">Ehsan Ahmad</td>
                                    <td style="padding:10px; color: var(--color-body-gray);">Mar 15, 2026</td>
                                    <td style="padding:10px;"><span class="badge badge-error">PDF</span></td>
                                    <td style="padding:10px 20px;"><button class="btn btn-outline" style="font-size:11px; padding:4px 10px;" onclick="showToast('Downloading Enrollment Report PDF…')">Download</button></td>
                                </tr>
                                <tr style="border-bottom:1px solid var(--color-light-gray);">
                                    <td style="padding:10px 20px; font-weight:600;">Financial Report</td>
                                    <td style="padding:10px; font-size:12px; color:var(--color-body-gray);">Feb 2026 · All Programs</td>
                                    <td style="padding:10px; color: var(--color-body-gray);">Mariam Iqbal</td>
                                    <td style="padding:10px; color: var(--color-body-gray);">Mar 01, 2026</td>
                                    <td style="padding:10px;"><span class="badge badge-success">Excel</span></td>
                                    <td style="padding:10px 20px;"><button class="btn btn-outline" style="font-size:11px; padding:4px 10px;" onclick="showToast('Downloading Financial Report CSV…')">Download</button></td>
                                </tr>
                                <tr style="border-bottom:1px solid var(--color-light-gray);">
                                    <td style="padding:10px 20px; font-weight:600;">Attendance Report</td>
                                    <td style="padding:10px; font-size:12px; color:var(--color-body-gray);">Week of Mar 10 · Full-time Theology</td>
                                    <td style="padding:10px; color: var(--color-body-gray);">Fatima Hassan</td>
                                    <td style="padding:10px; color: var(--color-body-gray);">Mar 14, 2026</td>
                                    <td style="padding:10px;"><span class="badge badge-error">PDF</span></td>
                                    <td style="padding:10px 20px;"><button class="btn btn-outline" style="font-size:11px; padding:4px 10px;" onclick="showToast('Downloading Attendance Report PDF…')">Download</button></td>
                                </tr>
                                <tr style="border-bottom:1px solid var(--color-light-gray);">
                                    <td style="padding:10px 20px; font-weight:600;">Academic Progress Report</td>
                                    <td style="padding:10px; font-size:12px; color:var(--color-body-gray);">Fall 2025 · Arabic Language</td>
                                    <td style="padding:10px; color: var(--color-body-gray);">Ehsan Ahmad</td>
                                    <td style="padding:10px; color: var(--color-body-gray);">Jan 10, 2026</td>
                                    <td style="padding:10px;"><span class="badge badge-success">Excel</span></td>
                                    <td style="padding:10px 20px;"><button class="btn btn-outline" style="font-size:11px; padding:4px 10px;" onclick="showToast('Downloading Academic Progress CSV…')">Download</button></td>
                                </tr>
                                <tr>
                                    <td style="padding:10px 20px; font-weight:600;">CRM Funnel Report</td>
                                    <td style="padding:10px; font-size:12px; color:var(--color-body-gray);">Q4 2025 · All Programs</td>
                                    <td style="padding:10px; color: var(--color-body-gray);">Mariam Iqbal</td>
                                    <td style="padding:10px; color: var(--color-body-gray);">Dec 30, 2025</td>
                                    <td style="padding:10px;"><span class="badge badge-error">PDF</span></td>
                                    <td style="padding:10px 20px;"><button class="btn btn-outline" style="font-size:11px; padding:4px 10px;" onclick="showToast('Downloading CRM Funnel PDF…')">Download</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section>

</x-filament-panels::page>