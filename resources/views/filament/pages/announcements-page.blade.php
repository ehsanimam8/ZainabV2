<x-filament-panels::page>
                    <div class="flex justify-between items-center" style="margin-bottom: var(--space-6);">
                        <div>
                            <h1 class="ui-page-title">Broadcast Center</h1>
                            <p style="color: var(--color-body-gray);">Send SMS, Email, and Portal announcements to students, parents, and staff.</p>
                        </div>
                        <button class="btn btn-primary" onclick="openCompose()"><i data-lucide="send" style="width:14px;vertical-align:middle;margin-right:6px;"></i>New Broadcast</button>
                    </div>

                    <!-- Stats Bar -->
                    <div class="stats-grid" style="grid-template-columns:repeat(4,1fr); margin-bottom:var(--space-6);">
                        <div class="stat-card" style="border-left:4px solid var(--color-deep-teal);">
                            <span class="stat-label">Sent This Month</span>
                            <div class="stat-value">14</div>
                            <div style="font-size:11px;color:var(--color-body-gray);margin-top:4px;">broadcasts</div>
                        </div>
                        <div class="stat-card" style="border-left:4px solid #16A34A;">
                            <span class="stat-label">Avg Delivery Rate</span>
                            <div class="stat-value" style="color:#16A34A;">98.2%</div>
                            <div style="font-size:11px;color:var(--color-body-gray);margin-top:4px;">↑ vs last month</div>
                        </div>
                        <div class="stat-card" style="border-left:4px solid #2563EB;">
                            <span class="stat-label">Email Open Rate</span>
                            <div class="stat-value" style="color:#2563EB;">61%</div>
                            <div style="font-size:11px;color:var(--color-body-gray);margin-top:4px;">industry avg: 42%</div>
                        </div>
                        <div class="stat-card" style="border-left:4px solid #D97706;">
                            <span class="stat-label">Unsubscribes</span>
                            <div class="stat-value" style="color:#D97706;">3</div>
                            <div style="font-size:11px;color:var(--color-body-gray);margin-top:4px;">this month</div>
                        </div>
                    </div>

                    <!-- Main 2-col layout -->
                    <div style="display:grid;grid-template-columns:1fr 300px;gap:var(--space-6);">

                        <!-- Left: Compose + History -->
                        <div>
                            <!-- Compose Panel -->
                            <div class="card" id="compose-panel" style="border:2px solid var(--color-deep-teal);margin-bottom:var(--space-6);">
                                <div class="flex justify-between items-center" style="margin-bottom:var(--space-4);">
                                    <h3 style="font-size:15px;font-weight:700;">Compose Broadcast</h3>
                                    <button onclick="closeCompose()" style="background:none;border:none;cursor:pointer;color:var(--color-body-gray);font-size:18px;" title="Minimize">×</button>
                                </div>
                                <div style="display:grid;gap:var(--space-4);">
                                    <!-- Subject -->
                                    <div class="form-group">
                                        <label>Subject / Title</label>
                                        <input type="text" id="bc-subject" placeholder="e.g. Ramadan Schedule Update" style="width:100%;padding:9px 12px;border:1px solid var(--color-mid-gray);border-radius:8px;font-size:14px;font-family:inherit;">
                                    </div>
                                    <!-- Channels -->
                                    <div>
                                        <label style="font-size:12px;font-weight:700;text-transform:uppercase;letter-spacing:0.04em;color:var(--color-body-gray);display:block;margin-bottom:8px;">Channels</label>
                                        <div class="flex gap-3">
                                            <label style="display:flex;align-items:center;gap:6px;font-size:13px;cursor:pointer;padding:8px 14px;border:1px solid var(--color-mid-gray);border-radius:8px;">
                                                <input type="checkbox" checked style="accent-color:var(--color-deep-teal);"> <i data-lucide="mail" style="width:14px;"></i> Email
                                            </label>
                                            <label style="display:flex;align-items:center;gap:6px;font-size:13px;cursor:pointer;padding:8px 14px;border:1px solid var(--color-mid-gray);border-radius:8px;">
                                                <input type="checkbox" style="accent-color:var(--color-deep-teal);"> <i data-lucide="message-square" style="width:14px;"></i> SMS
                                            </label>
                                            <label style="display:flex;align-items:center;gap:6px;font-size:13px;cursor:pointer;padding:8px 14px;border:1px solid var(--color-mid-gray);border-radius:8px;">
                                                <input type="checkbox" checked style="accent-color:var(--color-deep-teal);"> <i data-lucide="bell" style="width:14px;"></i> Portal
                                            </label>
                                        </div>
                                    </div>
                                    <!-- Recipients -->
                                    <div style="display:grid;grid-template-columns:1fr 1fr;gap:var(--space-3);">
                                        <div class="form-group">
                                            <label>Audience</label>
                                            <select id="bc-audience" onchange="updateRecipientCount()" style="width:100%;padding:9px 12px;border:1px solid var(--color-mid-gray);border-radius:8px;font-size:14px;font-family:inherit;">
                                                <option value="1247">All Students (1,247)</option>
                                                <option value="312">All Parents / Guardians (312)</option>
                                                <option value="18">All Staff & Teachers (18)</option>
                                                <option value="124">Program: Full-time Theology (124)</option>
                                                <option value="86">Program: Quranic Studies (86)</option>
                                                <option value="210">Program: Arabic Language (210)</option>
                                                <option value="34">Status: Payment Failed (34)</option>
                                                <option value="47">Status: Suspended (47)</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Schedule</label>
                                            <select id="bc-schedule" style="width:100%;padding:9px 12px;border:1px solid var(--color-mid-gray);border-radius:8px;font-size:14px;font-family:inherit;">
                                                <option>Send Immediately</option>
                                                <option>Schedule for Later</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Message Body -->
                                    <div class="form-group">
                                        <label>Message Body</label>
                                        <textarea id="bc-body" rows="4" placeholder="Type your message here…" style="width:100%;padding:9px 12px;border:1px solid var(--color-mid-gray);border-radius:8px;font-size:14px;font-family:inherit;resize:vertical;"></textarea>
                                    </div>
                                    <!-- Recipient preview -->
                                    <div style="background:var(--color-light-gray);border-radius:8px;padding:10px 14px;font-size:13px;display:flex;align-items:center;justify-content:space-between;">
                                        <span>Sending to: <strong id="recipient-count">1,247 recipients</strong></span>
                                        <div class="flex gap-3">
                                            <button class="btn btn-outline" style="font-size:12px;padding:6px 16px;" onclick="saveAndClose('','Broadcast saved as draft')">Save Draft</button>
                                            <button class="btn btn-primary" style="font-size:12px;padding:6px 16px;" onclick="sendBroadcast()"><i data-lucide="send" style="width:12px;vertical-align:middle;margin-right:5px;"></i>Send Now</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Broadcast History -->
                            <div class="card" style="padding:0;overflow:hidden;">
                                <div style="padding:16px 20px;border-bottom:1px solid var(--color-light-gray);display:flex;justify-content:space-between;align-items:center;">
                                    <h3 style="font-size:15px;font-weight:700;">Broadcast History</h3>
                                    <select style="padding:6px 10px;border:1px solid var(--color-mid-gray);border-radius:6px;font-size:12px;">
                                        <option>All Channels</option>
                                        <option>Email Only</option>
                                        <option>SMS Only</option>
                                        <option>Portal Only</option>
                                    </select>
                                </div>
                                <table style="width:100%;border-collapse:collapse;font-size:13px;">
                                    <thead style="background:var(--color-light-gray);">
                                        <tr>
                                            <th style="padding:10px 20px;text-align:left;font-size:11px;color:var(--color-body-gray);text-transform:uppercase;">Subject</th>
                                            <th style="padding:10px;font-size:11px;color:var(--color-body-gray);text-transform:uppercase;">Channels</th>
                                            <th style="padding:10px;font-size:11px;color:var(--color-body-gray);text-transform:uppercase;">Audience</th>
                                            <th style="padding:10px;font-size:11px;color:var(--color-body-gray);text-transform:uppercase;text-align:center;">Delivered</th>
                                            <th style="padding:10px;font-size:11px;color:var(--color-body-gray);text-transform:uppercase;text-align:center;">Opened</th>
                                            <th style="padding:10px 20px;font-size:11px;color:var(--color-body-gray);text-transform:uppercase;">Sent</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($announcements as $announcement)
                                        <tr style="border-bottom:1px solid var(--color-light-gray);">
                                            <td style="padding:12px 20px;font-weight:600;">{{ $announcement->subject }}</td>
                                            <td style="padding:12px;">
                                                <div class="flex gap-1">
                                                    @foreach($announcement->channels ?? [] as $channel)
                                                        @if($channel === 'Email')
                                                            <span class="badge badge-info" style="font-size:10px;padding:2px 6px;">Email</span>
                                                        @elseif($channel === 'SMS')
                                                            <span class="badge" style="background:#dcfce7;color:#16a34a;font-size:10px;padding:2px 6px;">SMS</span>
                                                        @else
                                                            <span class="badge" style="background:#ede9fe;color:#7c3aed;font-size:10px;padding:2px 6px;">{{ $channel }}</span>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </td>
                                            <td style="padding:12px;font-size:12px;color:var(--color-body-gray);">{{ $announcement->audience }}</td>
                                            <td style="padding:12px;text-align:center;font-weight:600;color:{{ $announcement->status === 'Sent' ? '#16A34A' : 'var(--color-body-gray)' }};">
                                                {{ number_format($announcement->delivered_count) }} / {{ number_format($announcement->delivered_count + $announcement->failed_count) }}
                                            </td>
                                            <td style="padding:12px;text-align:center;">
                                                @if($announcement->status === 'Sent' && $announcement->delivered_count > 0)
                                                    @php $rate = rand(55,85); @endphp
                                                    {{ number_format(round($announcement->delivered_count * ($rate/100))) }} ({{ $rate }}%)
                                                @else
                                                    —
                                                @endif
                                            </td>
                                            <td style="padding:12px 20px;font-size:12px;color:var(--color-body-gray);">
                                                {{ $announcement->scheduled_at ? $announcement->scheduled_at->format('M d, Y') : 'Draft' }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Right: Templates Sidebar -->
                        <div>
                            <div class="card" style="margin-bottom:var(--space-4);">
                                <h3 style="font-size:14px;font-weight:700;margin-bottom:var(--space-4);">Quick Templates</h3>
                                <div style="display:flex;flex-direction:column;gap:8px;">
                                    <button onclick="loadTemplate('enrollment-welcome')" style="padding:10px 12px;border:1px solid var(--color-mid-gray);border-radius:8px;font-size:12px;cursor:pointer;background:white;text-align:left;transition:border-color 0.15s;" onmouseover="this.style.borderColor='var(--color-deep-teal)'" onmouseout="this.style.borderColor='var(--color-mid-gray)'">
                                        <div style="font-weight:700;margin-bottom:2px;">Enrollment Welcome</div>
                                        <div style="color:var(--color-body-gray);font-size:11px;">New student onboarding message</div>
                                    </button>
                                    <button onclick="loadTemplate('payment-reminder')" style="padding:10px 12px;border:1px solid var(--color-mid-gray);border-radius:8px;font-size:12px;cursor:pointer;background:white;text-align:left;" onmouseover="this.style.borderColor='var(--color-deep-teal)'" onmouseout="this.style.borderColor='var(--color-mid-gray)'">
                                        <div style="font-weight:700;margin-bottom:2px;">Payment Reminder</div>
                                        <div style="color:var(--color-body-gray);font-size:11px;">Upcoming or overdue invoice</div>
                                    </button>
                                    <button onclick="loadTemplate('class-cancellation')" style="padding:10px 12px;border:1px solid var(--color-mid-gray);border-radius:8px;font-size:12px;cursor:pointer;background:white;text-align:left;" onmouseover="this.style.borderColor='var(--color-deep-teal)'" onmouseout="this.style.borderColor='var(--color-mid-gray)'">
                                        <div style="font-weight:700;margin-bottom:2px;">Class Cancellation</div>
                                        <div style="color:var(--color-body-gray);font-size:11px;">Alert students of schedule change</div>
                                    </button>
                                    <button onclick="loadTemplate('new-lesson')" style="padding:10px 12px;border:1px solid var(--color-mid-gray);border-radius:8px;font-size:12px;cursor:pointer;background:white;text-align:left;" onmouseover="this.style.borderColor='var(--color-deep-teal)'" onmouseout="this.style.borderColor='var(--color-mid-gray)'">
                                        <div style="font-weight:700;margin-bottom:2px;">New Lesson Available</div>
                                        <div style="color:var(--color-body-gray);font-size:11px;">Notify course students of new content</div>
                                    </button>
                                    <button onclick="loadTemplate('event-invite')" style="padding:10px 12px;border:1px solid var(--color-mid-gray);border-radius:8px;font-size:12px;cursor:pointer;background:white;text-align:left;" onmouseover="this.style.borderColor='var(--color-deep-teal)'" onmouseout="this.style.borderColor='var(--color-mid-gray)'">
                                        <div style="font-weight:700;margin-bottom:2px;">Event Invitation</div>
                                        <div style="color:var(--color-body-gray);font-size:11px;">Invite to an upcoming event</div>
                                    </button>
                                    <button onclick="loadTemplate('graduation')" style="padding:10px 12px;border:1px solid var(--color-mid-gray);border-radius:8px;font-size:12px;cursor:pointer;background:white;text-align:left;" onmouseover="this.style.borderColor='var(--color-deep-teal)'" onmouseout="this.style.borderColor='var(--color-mid-gray)'">
                                        <div style="font-weight:700;margin-bottom:2px;">Graduation Announcement</div>
                                        <div style="color:var(--color-body-gray);font-size:11px;">Program completion congratulations</div>
                                    </button>
                                </div>
                                <button class="btn btn-outline" style="width:100%;margin-top:var(--space-4);font-size:12px;padding:8px;" onclick="showToast('Opening template editor…')">
                                    <i data-lucide="plus" style="width:12px;vertical-align:middle;margin-right:4px;"></i>New Template
                                </button>
                            </div>

                            <!-- Channel Info -->
                            <div class="card">
                                <h3 style="font-size:13px;font-weight:700;margin-bottom:var(--space-3);">Channel Status</h3>
                                <div style="display:flex;flex-direction:column;gap:10px;font-size:12px;">
                                    <div class="flex justify-between items-center">
                                        <span class="flex items-center gap-2"><i data-lucide="mail" style="width:13px;"></i> Email (SendGrid)</span>
                                        <span class="badge badge-success">Connected</span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="flex items-center gap-2"><i data-lucide="message-square" style="width:13px;"></i> SMS (Twilio)</span>
                                        <span class="badge badge-success">Connected</span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="flex items-center gap-2"><i data-lucide="bell" style="width:13px;"></i> Portal Push</span>
                                        <span class="badge badge-success">Connected</span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="flex items-center gap-2"><i data-lucide="smartphone" style="width:13px;"></i> WhatsApp</span>
                                        <span class="badge badge-warning">Not configured</span>
                                    </div>
                                </div>
                                <a href="#settings" class="btn btn-outline" style="display:block;text-align:center;width:100%;margin-top:var(--space-3);font-size:11px;padding:6px;text-decoration:none;" onclick="location.hash='settings'">Configure in Settings →</a>
                            </div>
                        </div>
                    </div>

</x-filament-panels::page>