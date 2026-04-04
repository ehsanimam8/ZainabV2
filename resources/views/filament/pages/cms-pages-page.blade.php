<x-filament-panels::page>
                <section id="view-cms-pages" class="content-view">
                    <div class="flex justify-between items-center" style="margin-bottom:var(--space-6);">
                        <div>
                            <h1 class="ui-page-title">Pages</h1>
                            <p style="color:var(--color-body-gray);">Create and manage public website pages. Publish to make them live.</p>
                        </div>
                        <button class="btn btn-primary" onclick="window.location.href='/admin/cms-pages/create'">+ New Page</button>
                    </div>

                    <!-- Status tabs -->
                    <div style="display:flex;gap:0;border-bottom:2px solid var(--color-light-gray);margin-bottom:var(--space-6);">
                        <button onclick="filterPages(this,'all')" class="cms-tab active-tab" style="padding:10px 20px;background:none;border:none;cursor:pointer;font-weight:600;font-size:14px;color:var(--color-deep-teal);border-bottom:3px solid var(--color-deep-teal);margin-bottom:-2px;">All <span style="background:var(--color-deep-teal);color:white;border-radius:10px;padding:1px 7px;font-size:11px;margin-left:4px;">8</span></button>
                        <button onclick="filterPages(this,'published')" class="cms-tab" style="padding:10px 20px;background:none;border:none;cursor:pointer;font-size:14px;color:var(--color-body-gray);">Published <span style="background:#16a34a;color:white;border-radius:10px;padding:1px 7px;font-size:11px;margin-left:4px;">5</span></button>
                        <button onclick="filterPages(this,'draft')" class="cms-tab" style="padding:10px 20px;background:none;border:none;cursor:pointer;font-size:14px;color:var(--color-body-gray);">Draft <span style="background:var(--color-body-gray);color:white;border-radius:10px;padding:1px 7px;font-size:11px;margin-left:4px;">2</span></button>
                        <button onclick="filterPages(this,'archived')" class="cms-tab" style="padding:10px 20px;background:none;border:none;cursor:pointer;font-size:14px;color:var(--color-body-gray);">Archived <span style="background:var(--color-mid-gray);color:white;border-radius:10px;padding:1px 7px;font-size:11px;margin-left:4px;">1</span></button>
                    </div>

                    <div class="card" style="padding:0;overflow:hidden;">
                        <table style="width:100%;border-collapse:collapse;text-align:left;">
                            <thead style="background:var(--color-light-gray);border-bottom:2px solid var(--color-mid-gray);">
                                <tr>
                                    <th style="padding:12px 24px;font-size:12px;color:var(--color-body-gray);text-transform:uppercase;">Title</th>
                                    <th style="padding:12px;font-size:12px;color:var(--color-body-gray);text-transform:uppercase;">Slug / URL</th>
                                    <th style="padding:12px;font-size:12px;color:var(--color-body-gray);text-transform:uppercase;">In Nav</th>
                                    <th style="padding:12px;font-size:12px;color:var(--color-body-gray);text-transform:uppercase;">Status</th>
                                    <th style="padding:12px;font-size:12px;color:var(--color-body-gray);text-transform:uppercase;">Last Modified</th>
                                    <th style="padding:12px 24px;font-size:12px;color:var(--color-body-gray);text-transform:uppercase;text-align:right;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cmsPages as $page)
                                <tr style="border-bottom:1px solid var(--color-light-gray);">
                                    <td style="padding:14px 24px;"><span style="font-weight:600;color:var(--color-deep-navy);">{{ $page->title }}</span><br><span style="font-size:12px;color:var(--color-body-gray);">{{ Str::limit($page->meta_description ?? 'Page content', 40) }}</span></td>
                                    <td style="padding:14px 12px;font-size:13px;color:var(--color-deep-teal);">{{ $page->slug }}</td>
                                    <td style="padding:14px 12px;">
                                        @if($page->public_nav)
                                            <span style="background:#dcfce7;color:#16a34a;font-size:11px;font-weight:700;padding:3px 8px;border-radius:4px;">Yes</span>
                                        @else
                                            <span style="background:var(--color-light-gray);color:var(--color-body-gray);font-size:11px;font-weight:700;padding:3px 8px;border-radius:4px;">No</span>
                                        @endif
                                    </td>
                                    <td style="padding:14px 12px;">
                                        @if($page->status === 'Published')
                                            <span class="status-pill status-enrolled">Published</span>
                                        @else
                                            <span class="status-pill" style="background:#fef3c7;color:#d97706;">Draft</span>
                                        @endif
                                    </td>
                                    <td style="padding:14px 12px;font-size:13px;color:var(--color-body-gray);">{{ $page->published_at ? $page->published_at->format('M j, Y') : 'Draft' }}</td>
                                    <td style="padding:14px 24px;text-align:right;"><a href="#" style="color:var(--color-deep-teal);font-size:13px;margin-right:12px;">Preview</a><a href="/admin/cms-pages/{{ $page->id }}/edit" style="color:var(--color-deep-teal);font-size:13px;">Edit</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </section>


</x-filament-panels::page>