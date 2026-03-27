<x-filament-panels::page>
                <section id="view-custom-fields" class="content-view">
                    <div class="flex justify-between items-center" style="margin-bottom:var(--space-6);">
                        <div>
                            <h1 class="ui-page-title">Custom Fields</h1>
                            <p style="color:var(--color-body-gray);">Define additional data fields for any entity. Fields auto-render in forms, profiles, and registration screens.</p>
                        </div>
                        <button class="btn btn-primary" onclick="openModal('modal-add-custom-field')">+ Add Field</button>
                    </div>

                    <!-- Entity tabs -->
                    <div style="display:flex;gap:0;border-bottom:2px solid var(--color-light-gray);margin-bottom:var(--space-6);">
                        <button onclick="switchCFEntity(this,'cf-student')" class="cf-tab" style="padding:10px 20px;background:none;border:none;cursor:pointer;font-weight:600;font-size:14px;color:var(--color-deep-teal);border-bottom:3px solid var(--color-deep-teal);margin-bottom:-2px;">Student Profile</button>
                        <button onclick="switchCFEntity(this,'cf-crm')" class="cf-tab" style="padding:10px 20px;background:none;border:none;cursor:pointer;font-size:14px;color:var(--color-body-gray);">CRM Contact</button>
                        <button onclick="switchCFEntity(this,'cf-program')" class="cf-tab" style="padding:10px 20px;background:none;border:none;cursor:pointer;font-size:14px;color:var(--color-body-gray);">Program</button>
                        <button onclick="switchCFEntity(this,'cf-course')" class="cf-tab" style="padding:10px 20px;background:none;border:none;cursor:pointer;font-size:14px;color:var(--color-body-gray);">Course</button>
                        <button onclick="switchCFEntity(this,'cf-event')" class="cf-tab" style="padding:10px 20px;background:none;border:none;cursor:pointer;font-size:14px;color:var(--color-body-gray);">Event Registration</button>
                    </div>

                    <!-- Student Profile fields -->
                    <div id="cf-student">
                        <div class="card" style="padding:0;overflow:hidden;">
                            <table style="width:100%;border-collapse:collapse;text-align:left;">
                                <thead style="background:var(--color-light-gray);border-bottom:2px solid var(--color-mid-gray);">
                                    <tr>
                                        <th style="padding:12px 24px;font-size:12px;color:var(--color-body-gray);text-transform:uppercase;">Field Name</th>
                                        <th style="padding:12px;font-size:12px;color:var(--color-body-gray);text-transform:uppercase;">Type</th>
                                        <th style="padding:12px;font-size:12px;color:var(--color-body-gray);text-transform:uppercase;">Visibility</th>
                                        <th style="padding:12px;font-size:12px;color:var(--color-body-gray);text-transform:uppercase;">Appears In</th>
                                        <th style="padding:12px 24px;font-size:12px;color:var(--color-body-gray);text-transform:uppercase;text-align:right;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($customFields->where('entity', 'Student Profile') as $field)
                                    <tr style="border-bottom:1px solid var(--color-light-gray);">
                                        <td style="padding:14px 24px;"><i data-lucide="grip-vertical" style="width:14px;color:var(--color-mid-gray);margin-right:10px;cursor:grab;"></i><span style="font-weight:600;">{{ $field->name }}</span></td>
                                        <td style="padding:14px 12px;"><span style="background:#dbeafe;color:#1d4ed8;font-size:11px;font-weight:700;padding:3px 8px;border-radius:4px;">{{ $field->type }}</span></td>
                                        <td style="padding:14px 12px;">
                                            @if($field->visibility === 'Required')
                                                <span style="background:#fef3c7;color:#d97706;font-size:11px;font-weight:700;padding:3px 8px;border-radius:4px;">Required</span>
                                            @elseif($field->visibility === 'Admin Only')
                                                <span style="background:#f0f0f0;color:#374151;font-size:11px;font-weight:700;padding:3px 8px;border-radius:4px;">Admin Only</span>
                                            @else
                                                <span style="background:#dcfce7;color:#166534;font-size:11px;font-weight:700;padding:3px 8px;border-radius:4px;">{{ $field->visibility }}</span>
                                            @endif
                                        </td>
                                        <td style="padding:14px 12px;font-size:13px;color:var(--color-body-gray);">
                                            @if($field->show_on_profile && $field->show_on_registration) Profile &middot; Registration
                                            @elseif($field->show_on_profile) Profile
                                            @elseif($field->show_on_registration) Registration
                                            @else &mdash; @endif
                                        </td>
                                        <td style="padding:14px 24px;text-align:right;"><a href="#" onclick="openModal('modal-add-custom-field')" style="color:var(--color-deep-teal);font-size:13px;margin-right:12px;">Edit</a><a href="#" style="color:#dc2626;font-size:13px;">Delete</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Other entity panels (hidden by default) -->
                    <div id="cf-crm" style="display:none;"><div class="card" style="text-align:center;padding:48px;color:var(--color-body-gray);">No custom fields defined for CRM Contacts yet. <button onclick="openModal('modal-add-custom-field')" style="background:none;border:none;cursor:pointer;color:var(--color-deep-teal);font-weight:600;">Add the first one →</button></div></div>
                    <div id="cf-program" style="display:none;"><div class="card" style="text-align:center;padding:48px;color:var(--color-body-gray);">No custom fields defined for Programs yet. <button onclick="openModal('modal-add-custom-field')" style="background:none;border:none;cursor:pointer;color:var(--color-deep-teal);font-weight:600;">Add the first one →</button></div></div>
                    <div id="cf-course" style="display:none;"><div class="card" style="text-align:center;padding:48px;color:var(--color-body-gray);">No custom fields defined for Courses yet. <button onclick="openModal('modal-add-custom-field')" style="background:none;border:none;cursor:pointer;color:var(--color-deep-teal);font-weight:600;">Add the first one →</button></div></div>
                    <div id="cf-event" style="display:none;">
                        <div class="card" style="padding:0;overflow:hidden;">
                            <table style="width:100%;border-collapse:collapse;text-align:left;">
                                <thead style="background:var(--color-light-gray);border-bottom:2px solid var(--color-mid-gray);">
                                    <tr>
                                        <th style="padding:12px 24px;font-size:12px;color:var(--color-body-gray);text-transform:uppercase;">Field Name</th>
                                        <th style="padding:12px;font-size:12px;color:var(--color-body-gray);text-transform:uppercase;">Type</th>
                                        <th style="padding:12px;font-size:12px;color:var(--color-body-gray);text-transform:uppercase;">Visibility</th>
                                        <th style="padding:12px 24px;font-size:12px;color:var(--color-body-gray);text-transform:uppercase;text-align:right;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($customFields->where('entity', 'Event Registration') as $field)
                                    <tr style="border-bottom:1px solid var(--color-light-gray);">
                                        <td style="padding:14px 24px;"><span style="font-weight:600;">{{ $field->name }}</span></td>
                                        <td style="padding:14px 12px;"><span style="background:#dbeafe;color:#1d4ed8;font-size:11px;font-weight:700;padding:3px 8px;border-radius:4px;">{{ $field->type }}</span></td>
                                        <td style="padding:14px 12px;">
                                            @if($field->visibility === 'Required')
                                                <span style="background:#fef3c7;color:#d97706;font-size:11px;font-weight:700;padding:3px 8px;border-radius:4px;">Required</span>
                                            @elseif($field->visibility === 'Admin Only')
                                                <span style="background:#f0f0f0;color:#374151;font-size:11px;font-weight:700;padding:3px 8px;border-radius:4px;">Admin Only</span>
                                            @else
                                                <span style="background:#dcfce7;color:#166534;font-size:11px;font-weight:700;padding:3px 8px;border-radius:4px;">{{ $field->visibility }}</span>
                                            @endif
                                        </td>
                                        <td style="padding:14px 24px;text-align:right;"><a href="#" onclick="openModal('modal-add-custom-field')" style="color:var(--color-deep-teal);font-size:13px;margin-right:12px;">Edit</a><a href="#" style="color:#dc2626;font-size:13px;">Delete</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>

</x-filament-panels::page>