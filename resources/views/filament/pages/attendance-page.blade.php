<x-filament-panels::page>
                <section id="view-attendance" class="content-view hidden">
                    <div class="flex justify-between items-center" style="margin-bottom: var(--space-6);">
                        <div>
                            <h1 class="ui-page-title">Attendance Tracking</h1>
                            <p style="color: var(--color-body-gray);">Session-based attendance marking for all courses.
                            </p>
                        </div>
                        <div class="flex gap-4">
                            <button class="btn btn-outline">Export</button>
                            <button class="btn btn-primary">+ Mark Attendance</button>
                        </div>
                    </div>

                    <div class="card" style="padding: 0; overflow-x: auto;">
                        <div style="padding: var(--space-4); border-bottom: 1px solid var(--color-light-gray);"
                            class="flex gap-4">
                            <select
                                style="padding: 8px 12px; border: 1px solid var(--color-mid-gray); border-radius: 6px;">
                                <option>Intro to Theology (Fall 2026)</option>
                                <option>Arabic Grammar 101</option>
                            </select>
                            <button class="btn btn-outline" style="font-size: 13px; padding: 6px 12px;">Mark All
                                Present</button>
                        </div>
                        <table style="width: 100%; border-collapse: collapse; font-size: 13px; text-align: center;">
                            <thead style="background: var(--color-deep-navy); color: white;">
                                <tr>
                                    <th
                                        style="padding: 12px 24px; text-align: left; position: sticky; left: 0; background: var(--color-deep-navy);">
                                        Student</th>
                                    <th style="padding: 12px; font-size: 11px;">Mar 10<br><span
                                            style="font-weight: normal; opacity: 0.7;">Week 1</span></th>
                                    <th style="padding: 12px; font-size: 11px;">Mar 12<br><span
                                            style="font-weight: normal; opacity: 0.7;">Week 1</span></th>
                                    <th style="padding: 12px; font-size: 11px;">Mar 17<br><span
                                            style="font-weight: normal; opacity: 0.7;">Week 2</span></th>
                                    <th style="padding: 12px; font-size: 11px;">Mar 19<br><span
                                            style="font-weight: normal; opacity: 0.7;">Week 2</span></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="border-bottom: 1px solid var(--color-light-gray);">
                                    <td
                                        style="padding: 12px 24px; text-align: left; font-weight: 600; position: sticky; left: 0; background: white;">
                                        Zainab Ahmed</td>
                                    <td style="padding: 12px;">
                                        <div
                                            style="width: 28px; height: 28px; background: #dcfce7; color: #16a34a; border-radius: 4px; display: flex; align-items: center; justify-content: center; margin: 0 auto; font-weight: bold; cursor: pointer;">
                                            P</div>
                                    </td>
                                    <td style="padding: 12px;">
                                        <div
                                            style="width: 28px; height: 28px; background: #dcfce7; color: #16a34a; border-radius: 4px; display: flex; align-items: center; justify-content: center; margin: 0 auto; font-weight: bold; cursor: pointer;">
                                            P</div>
                                    </td>
                                    <td style="padding: 12px;">
                                        <div
                                            style="width: 28px; height: 28px; background: #f3f4f6; color: #9ca3af; border-radius: 4px; display: flex; align-items: center; justify-content: center; margin: 0 auto; font-weight: bold; cursor: pointer;">
                                            —</div>
                                    </td>
                                    <td style="padding: 12px;">
                                        <div
                                            style="width: 28px; height: 28px; background: #f3f4f6; color: #9ca3af; border-radius: 4px; display: flex; align-items: center; justify-content: center; margin: 0 auto; font-weight: bold; cursor: pointer;">
                                            —</div>
                                    </td>
                                </tr>
                                <tr style="border-bottom: 1px solid var(--color-light-gray);">
                                    <td
                                        style="padding: 12px 24px; text-align: left; font-weight: 600; position: sticky; left: 0; background: white;">
                                        Fatima Al-Hassan</td>
                                    <td style="padding: 12px;">
                                        <div
                                            style="width: 28px; height: 28px; background: #fee2e2; color: #dc2626; border-radius: 4px; display: flex; align-items: center; justify-content: center; margin: 0 auto; font-weight: bold; cursor: pointer;">
                                            A</div>
                                    </td>
                                    <td style="padding: 12px;">
                                        <div
                                            style="width: 28px; height: 28px; background: #dcfce7; color: #16a34a; border-radius: 4px; display: flex; align-items: center; justify-content: center; margin: 0 auto; font-weight: bold; cursor: pointer;">
                                            P</div>
                                    </td>
                                    <td style="padding: 12px;">
                                        <div
                                            style="width: 28px; height: 28px; background: #f3f4f6; color: #9ca3af; border-radius: 4px; display: flex; align-items: center; justify-content: center; margin: 0 auto; font-weight: bold; cursor: pointer;">
                                            —</div>
                                    </td>
                                    <td style="padding: 12px;">
                                        <div
                                            style="width: 28px; height: 28px; background: #f3f4f6; color: #9ca3af; border-radius: 4px; display: flex; align-items: center; justify-content: center; margin: 0 auto; font-weight: bold; cursor: pointer;">
                                            —</div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section>

</x-filament-panels::page>