<x-filament-panels::page>
                <section id="view-cms-nav-builder" class="content-view">
                    <div class="flex justify-between items-center" style="margin-bottom:var(--space-6);">
                        <div>
                            <h1 class="ui-page-title">Navigation Builder</h1>
                            <p style="color:var(--color-body-gray);">Control which pages appear in the public website navigation bar and their order.</p>
                        </div>
                        <button class="btn btn-primary" onclick="saveAndClose(null,'Navigation saved successfully')">Save Changes</button>
                    </div>
                    <div style="display:grid;grid-template-columns:1fr 1fr;gap:var(--space-6);">
                        <!-- Current Nav -->
                        <div class="card">
                            <h3 style="font-size:16px;font-weight:700;color:var(--color-deep-navy);margin-bottom:var(--space-4);">Current Navigation <span style="font-size:12px;color:var(--color-body-gray);font-weight:400;">(drag to reorder)</span></h3>
                            <div id="nav-builder-list">
                                @foreach($navItems as $item)
                                <div class="nav-builder-item" style="display:flex;align-items:center;gap:12px;padding:12px 16px;border:1px solid var(--color-mid-gray);border-radius:8px;margin-bottom:8px;background:white;cursor:grab;">
                                    <x-heroicon-o-bars-2 style="width:16px;color:var(--color-body-gray);flex-shrink:0;" />
                                    <span style="flex:1;font-weight:600;font-size:14px;">{{ $item->label }}</span>
                                    <span style="font-size:12px;color:var(--color-body-gray);">{{ $item->url }}</span>
                                    <button onclick="this.closest('.nav-builder-item').remove()" style="background:none;border:none;cursor:pointer;color:#dc2626;font-size:16px;" title="Remove from nav">✕</button>
                                </div>
                                @endforeach
                            </div>
                            <p style="font-size:12px;color:var(--color-body-gray);margin-top:var(--space-3);">Enroll button always appears at the far right of the nav automatically.</p>
                        </div>
                        <!-- Add from pages -->
                        <div class="card">
                            <h3 style="font-size:16px;font-weight:700;color:var(--color-deep-navy);margin-bottom:var(--space-4);">Available Pages</h3>
                            <p style="font-size:13px;color:var(--color-body-gray);margin-bottom:var(--space-4);">Click a page to add it to the navigation.</p>
                            <div style="display:flex;flex-direction:column;gap:8px;">
                                <div style="display:flex;justify-content:space-between;align-items:center;padding:10px 14px;border:1px dashed var(--color-mid-gray);border-radius:8px;">
                                    <div><span style="font-weight:600;font-size:14px;">Scholarship Program</span><span style="font-size:12px;color:var(--color-body-gray);margin-left:8px;">/scholarships</span></div>
                                    <button onclick="saveAndClose(null,'Page added to navigation')" class="btn btn-outline" style="font-size:12px;padding:4px 12px;">+ Add</button>
                                </div>
                                <div style="display:flex;justify-content:space-between;align-items:center;padding:10px 14px;border:1px dashed var(--color-mid-gray);border-radius:8px;">
                                    <div><span style="font-weight:600;font-size:14px;">Donate</span><span style="font-size:12px;color:var(--color-body-gray);margin-left:8px;">/donate</span></div>
                                    <button onclick="saveAndClose(null,'Page added to navigation')" class="btn btn-outline" style="font-size:12px;padding:4px 12px;">+ Add</button>
                                </div>
                            </div>
                            <div style="margin-top:var(--space-6);padding-top:var(--space-4);border-top:1px solid var(--color-light-gray);">
                                <p style="font-size:13px;font-weight:600;color:var(--color-deep-navy);margin-bottom:var(--space-3);">Or add a custom link</p>
                                <div class="form-group" style="margin-bottom:8px;"><label>Label</label><input type="text" placeholder="e.g. Donate"></div>
                                <div class="form-group" style="margin-bottom:12px;"><label>URL</label><input type="text" placeholder="e.g. /donate or https://..."></div>
                                <button onclick="saveAndClose(null,'Custom link added to navigation')" class="btn btn-primary" style="width:100%;">Add Custom Link</button>
                            </div>
                        </div>
                    </div>
                </section>


</x-filament-panels::page>