<x-filament-panels::page>
                    <div style="margin-bottom: var(--space-6);">
                        <h1 class="ui-page-title">Settings</h1>
                        <p style="color: var(--color-body-gray);">Configure organizational settings, academic year, and integrations.</p>
                    </div>

                    <!-- Settings Tabs -->
                    <div style="display:flex; gap:0; border-bottom: 2px solid var(--color-light-gray); margin-bottom: var(--space-6);">
                        <button onclick="switchSettingsTab('general', this)" style="padding:10px 20px; font-size:13px; font-weight:700; border:none; background:none; border-bottom: 3px solid var(--color-deep-teal); color: var(--color-deep-teal); cursor:pointer;" id="stab-general">General</button>
                        <button onclick="switchSettingsTab('academic', this)" style="padding:10px 20px; font-size:13px; font-weight:700; border:none; background:none; color: var(--color-body-gray); cursor:pointer;" id="stab-academic">Academic Year</button>
                        <button onclick="switchSettingsTab('payments', this)" style="padding:10px 20px; font-size:13px; font-weight:700; border:none; background:none; color: var(--color-body-gray); cursor:pointer;" id="stab-payments">Payments</button>
                        <button onclick="switchSettingsTab('portal', this)" style="padding:10px 20px; font-size:13px; font-weight:700; border:none; background:none; color: var(--color-body-gray); cursor:pointer;" id="stab-portal">Portal</button>
                        <button onclick="switchSettingsTab('integrations', this)" style="padding:10px 20px; font-size:13px; font-weight:700; border:none; background:none; color: var(--color-body-gray); cursor:pointer;" id="stab-integrations">Integrations</button>
                    </div>

                    <!-- General Panel -->
                    <div id="settings-panel-general">
                        <div class="card" style="max-width:640px;">
                            <h3 style="font-size:15px; font-weight:700; margin-bottom:var(--space-6);">Organization</h3>
                            <div style="display:grid; gap:var(--space-4);">
                                <div>
                                    <label style="display:block; font-size:13px; font-weight:700; margin-bottom:6px;">Organization Name</label>
                                    <input type="text" value="Zainab Center" style="width:100%; padding:10px 14px; border:1px solid var(--color-mid-gray); border-radius:8px; font-size:14px; font-family:inherit;">
                                </div>
                                <div>
                                    <label style="display:block; font-size:13px; font-weight:700; margin-bottom:6px;">Support Email</label>
                                    <input type="email" value="info@zainabcenter.com" style="width:100%; padding:10px 14px; border:1px solid var(--color-mid-gray); border-radius:8px; font-size:14px; font-family:inherit;">
                                </div>
                                <div>
                                    <label style="display:block; font-size:13px; font-weight:700; margin-bottom:6px;">Timezone</label>
                                    <select style="width:100%; padding:10px 14px; border:1px solid var(--color-mid-gray); border-radius:8px; font-size:14px; font-family:inherit;">
                                        <option selected>America/Toronto (EST/EDT)</option>
                                        <option>America/New_York</option>
                                        <option>Europe/London</option>
                                    </select>
                                </div>
                                <div>
                                    <label style="display:block; font-size:13px; font-weight:700; margin-bottom:6px;">Default Language</label>
                                    <select style="width:100%; padding:10px 14px; border:1px solid var(--color-mid-gray); border-radius:8px; font-size:14px; font-family:inherit;">
                                        <option selected>English</option>
                                        <option>Arabic</option>
                                        <option>Urdu</option>
                                    </select>
                                </div>
                            </div>
                            <button class="btn btn-primary" style="margin-top:var(--space-6);">Save Changes</button>
                        </div>
                    </div>

                    <!-- Academic Year Panel (hidden) -->
                    <div id="settings-panel-academic" style="display:none;">
                        <div class="card" style="max-width:640px;">
                            <h3 style="font-size:15px; font-weight:700; margin-bottom:var(--space-4);">Academic Year Configuration</h3>
                            <div style="display:grid; gap:var(--space-4);">
                                <div class="flex gap-4">
                                    <div style="flex:1;">
                                        <label style="display:block; font-size:13px; font-weight:700; margin-bottom:6px;">Academic Year Start</label>
                                        <input type="date" value="2026-09-01" style="width:100%; padding:10px 14px; border:1px solid var(--color-mid-gray); border-radius:8px; font-size:14px; font-family:inherit;">
                                    </div>
                                    <div style="flex:1;">
                                        <label style="display:block; font-size:13px; font-weight:700; margin-bottom:6px;">Academic Year End</label>
                                        <input type="date" value="2027-06-30" style="width:100%; padding:10px 14px; border:1px solid var(--color-mid-gray); border-radius:8px; font-size:14px; font-family:inherit;">
                                    </div>
                                </div>
                                <div>
                                    <label style="display:block; font-size:13px; font-weight:700; margin-bottom:6px;">Term Structure</label>
                                    <select style="width:100%; padding:10px 14px; border:1px solid var(--color-mid-gray); border-radius:8px; font-size:14px; font-family:inherit;">
                                        <option>Semester (2 per year)</option>
                                        <option selected>Trimester (3 per year)</option>
                                        <option>Quarters (4 per year)</option>
                                        <option>Rolling (no fixed terms)</option>
                                    </select>
                                </div>
                                <div>
                                    <label style="display:block; font-size:13px; font-weight:700; margin-bottom:6px;">Current Term</label>
                                    <input type="text" value="Spring 2026" style="width:100%; padding:10px 14px; border:1px solid var(--color-mid-gray); border-radius:8px; font-size:14px; font-family:inherit;">
                                </div>
                            </div>
                            <button class="btn btn-primary" style="margin-top:var(--space-6);">Save Changes</button>
                        </div>
                    </div>

                    <!-- Payments Panel (hidden) -->
                    <div id="settings-panel-payments" style="display:none;">
                        <div class="card" style="max-width:640px;">
                            <h3 style="font-size:15px; font-weight:700; margin-bottom:var(--space-4);">Payment Configuration</h3>
                            <div style="display:grid; gap:var(--space-4);">
                                <div>
                                    <label style="display:block; font-size:13px; font-weight:700; margin-bottom:6px;">Payment Processor</label>
                                    <select style="width:100%; padding:10px 14px; border:1px solid var(--color-mid-gray); border-radius:8px; font-size:14px; font-family:inherit;">
                                        <option selected>Stripe</option>
                                        <option>Moneris</option>
                                        <option>PayPal</option>
                                    </select>
                                </div>
                                <div>
                                    <label style="display:block; font-size:13px; font-weight:700; margin-bottom:6px;">Auto-charge Day of Month</label>
                                    <input type="number" value="25" min="1" max="28" style="width:100%; padding:10px 14px; border:1px solid var(--color-mid-gray); border-radius:8px; font-size:14px; font-family:inherit;">
                                </div>
                                <div>
                                    <label style="display:block; font-size:13px; font-weight:700; margin-bottom:6px;">Abandoned Cart Timeout (hours)</label>
                                    <input type="number" value="72" style="width:100%; padding:10px 14px; border:1px solid var(--color-mid-gray); border-radius:8px; font-size:14px; font-family:inherit;">
                                </div>
                                <div style="display:flex; justify-content:space-between; align-items:center; padding:12px 14px; background: var(--color-light-gray); border-radius:8px;">
                                    <div>
                                        <div style="font-size:13px; font-weight:700;">Enable Installment Plans</div>
                                        <div style="font-size:11px; color: var(--color-body-gray); margin-top:2px;">Allow students to pay tuition in monthly installments</div>
                                    </div>
                                    <div style="width:44px; height:24px; background: var(--color-deep-teal); border-radius:12px; cursor:pointer; position:relative;">
                                        <div style="width:18px; height:18px; background:white; border-radius:50%; position:absolute; top:3px; right:3px;"></div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary" style="margin-top:var(--space-6);">Save Changes</button>
                        </div>
                    </div>

                    <!-- Portal Panel (hidden) -->
                    <div id="settings-panel-portal" style="display:none;">
                        <div class="card" style="max-width:640px;">
                            <h3 style="font-size:15px; font-weight:700; margin-bottom:var(--space-4);">Student Portal Settings</h3>
                            <div style="display:grid; gap:var(--space-4);">
                                <div style="display:flex; justify-content:space-between; align-items:center; padding:12px 14px; background: var(--color-light-gray); border-radius:8px;">
                                    <div>
                                        <div style="font-size:13px; font-weight:700;">Allow Independent Student Login</div>
                                        <div style="font-size:11px; color: var(--color-body-gray); margin-top:2px;"><code>independent_login</code> — toggled per-student, no age threshold automation</div>
                                    </div>
                                    <div style="width:44px; height:24px; background: var(--color-deep-teal); border-radius:12px; cursor:pointer; position:relative;">
                                        <div style="width:18px; height:18px; background:white; border-radius:50%; position:absolute; top:3px; right:3px;"></div>
                                    </div>
                                </div>
                                <div style="display:flex; justify-content:space-between; align-items:center; padding:12px 14px; background: var(--color-light-gray); border-radius:8px;">
                                    <div>
                                        <div style="font-size:13px; font-weight:700;">Show Transcript Download on Portal</div>
                                        <div style="font-size:11px; color: var(--color-body-gray); margin-top:2px;">Transcript scoped per completed program only</div>
                                    </div>
                                    <div style="width:44px; height:24px; background: var(--color-deep-teal); border-radius:12px; cursor:pointer; position:relative;">
                                        <div style="width:18px; height:18px; background:white; border-radius:50%; position:absolute; top:3px; right:3px;"></div>
                                    </div>
                                </div>
                                <div style="display:flex; justify-content:space-between; align-items:center; padding:12px 14px; background: var(--color-light-gray); border-radius:8px;">
                                    <div>
                                        <div style="font-size:13px; font-weight:700;">Enable Coaching Track Indicator</div>
                                        <div style="font-size:11px; color: var(--color-body-gray); margin-top:2px;"><code>is_coaching</code> flag — shows coaching badge on student profile</div>
                                    </div>
                                    <div style="width:44px; height:24px; background: var(--color-mid-gray); border-radius:12px; cursor:pointer; position:relative;">
                                        <div style="width:18px; height:18px; background:white; border-radius:50%; position:absolute; top:3px; left:3px;"></div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary" style="margin-top:var(--space-6);">Save Changes</button>
                        </div>
                    </div>

                    <!-- Integrations Panel (hidden) -->
                    <div id="settings-panel-integrations" style="display:none;">
                        <div style="display:grid; grid-template-columns: 1fr 1fr; gap: var(--space-4);">
                            <div class="card" style="display:flex; gap:var(--space-4); align-items:center;">
                                <div style="width:48px; height:48px; border-radius:8px; background:#635BFF; color:white; display:flex; align-items:center; justify-content:center; font-weight:900; font-size:16px;">S</div>
                                <div style="flex:1;">
                                    <div style="font-size:14px; font-weight:700;">Stripe</div>
                                    <div style="font-size:12px; color: var(--color-body-gray);">Payment processing</div>
                                </div>
                                <span class="badge badge-success">Connected</span>
                            </div>
                            <div class="card" style="display:flex; gap:var(--space-4); align-items:center;">
                                <div style="width:48px; height:48px; border-radius:8px; background:#4A154B; color:white; display:flex; align-items:center; justify-content:center; font-weight:900; font-size:16px;">Sl</div>
                                <div style="flex:1;">
                                    <div style="font-size:14px; font-weight:700;">Slack</div>
                                    <div style="font-size:12px; color: var(--color-body-gray);">Staff notifications</div>
                                </div>
                                <button class="btn btn-outline" style="font-size:11px; padding:4px 10px;">Connect</button>
                            </div>
                            <div class="card" style="display:flex; gap:var(--space-4); align-items:center;">
                                <div style="width:48px; height:48px; border-radius:8px; background:#EA4335; color:white; display:flex; align-items:center; justify-content:center; font-weight:900; font-size:16px;">G</div>
                                <div style="flex:1;">
                                    <div style="font-size:14px; font-weight:700;">Google Meet</div>
                                    <div style="font-size:12px; color: var(--color-body-gray);">Online class sessions</div>
                                </div>
                                <span class="badge badge-success">Connected</span>
                            </div>
                            <div class="card" style="display:flex; gap:var(--space-4); align-items:center;">
                                <div style="width:48px; height:48px; border-radius:8px; background:#1A2F4A; color:white; display:flex; align-items:center; justify-content:center; font-weight:900; font-size:14px;">SMTP</div>
                                <div style="flex:1;">
                                    <div style="font-size:14px; font-weight:700;">SMTP / Mailgun</div>
                                    <div style="font-size:12px; color: var(--color-body-gray);">Transactional email</div>
                                </div>
                                <span class="badge badge-success">Connected</span>
                            </div>
                        </div>
                    </div>

</x-filament-panels::page>