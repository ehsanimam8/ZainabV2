<x-filament-panels::page>
                <section id="view-cms-posts" class="content-view">
                    <div class="flex justify-between items-center" style="margin-bottom:var(--space-6);">
                        <div>
                            <h1 class="ui-page-title">Posts & Blog</h1>
                            <p style="color:var(--color-body-gray);">Announcements, articles, and blog posts for the public website.</p>
                        </div>
                        <button class="btn btn-primary" onclick="openModal('modal-create-post')">+ New Post</button>
                    </div>
                    <div class="card" style="padding:0;overflow:hidden;">
                        <table style="width:100%;border-collapse:collapse;text-align:left;">
                            <thead style="background:var(--color-light-gray);border-bottom:2px solid var(--color-mid-gray);">
                                <tr>
                                    <th style="padding:12px 24px;font-size:12px;color:var(--color-body-gray);text-transform:uppercase;">Title</th>
                                    <th style="padding:12px;font-size:12px;color:var(--color-body-gray);text-transform:uppercase;">Category</th>
                                    <th style="padding:12px;font-size:12px;color:var(--color-body-gray);text-transform:uppercase;">Status</th>
                                    <th style="padding:12px;font-size:12px;color:var(--color-body-gray);text-transform:uppercase;">Scheduled</th>
                                    <th style="padding:12px 24px;font-size:12px;color:var(--color-body-gray);text-transform:uppercase;text-align:right;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cmsPosts as $post)
                                <tr style="border-bottom:1px solid var(--color-light-gray);">
                                    <td style="padding:14px 24px;"><span style="font-weight:600;">{{ $post->title }}</span><br><span style="font-size:12px;color:var(--color-body-gray);">By {{ $post->author_name }} &middot; {{ $post->created_at->format('M j') }}</span></td>
                                    <td style="padding:14px 12px;">
                                        @if($post->category === 'Announcement')
                                            <span style="background:var(--color-blush);color:var(--color-mauve-rose);font-size:11px;font-weight:700;padding:3px 8px;border-radius:4px;">Announcement</span>
                                        @elseif($post->category === 'Program Update')
                                            <span style="background:#dbeafe;color:#1d4ed8;font-size:11px;font-weight:700;padding:3px 8px;border-radius:4px;">Program Update</span>
                                        @else
                                            <span style="background:#f0fdf4;color:#15803d;font-size:11px;font-weight:700;padding:3px 8px;border-radius:4px;">{{ $post->category }}</span>
                                        @endif
                                    </td>
                                    <td style="padding:14px 12px;">
                                        @if($post->status === 'Published')
                                            <span class="status-pill status-enrolled">Published</span>
                                        @else
                                            <span class="status-pill" style="background:#fef3c7;color:#d97706;">Draft</span>
                                        @endif
                                    </td>
                                    <td style="padding:14px 12px;font-size:13px;color:var(--color-body-gray);">
                                        {{ $post->scheduled_at ? $post->scheduled_at->format('M j, Y') : '—' }}
                                    </td>
                                    <td style="padding:14px 24px;text-align:right;">
                                        <a href="#" style="color:var(--color-deep-teal);font-size:13px;margin-right:12px;">Edit</a>
                                        @if($post->status === 'Published')
                                            <a href="#" style="color:#dc2626;font-size:13px;">Unpublish</a>
                                        @else
                                            <a href="#" style="color:var(--color-deep-teal);font-size:13px;">Publish Now</a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </section>


</x-filament-panels::page>