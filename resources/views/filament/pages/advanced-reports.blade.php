<x-filament-panels::page>
    <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px;">
        
        <!-- Revenue Overview Widget -->
        <div class="card" style="grid-column: span 2; padding: 24px; background: white; border-radius: 12px; border: 1px solid var(--color-light-gray);">
            <h3 style="font-weight: 700; color: var(--color-deep-navy); margin-bottom: 8px;">Revenue Over Time</h3>
            <p style="color: var(--color-body-gray); margin-bottom: 16px; font-size: 14px;">Total Lifetime Revenue: <strong style="color: #16a34a;">${{ number_format($revenue['total_all_time'], 2) }}</strong></p>
            
            <table style="width: 100%; border-collapse: collapse; text-align: left; font-size: 14px;">
                <thead>
                    <tr style="border-bottom: 2px solid var(--color-light-gray);">
                        <th style="padding: 12px 8px; color: var(--color-body-gray);">Month</th>
                        <th style="padding: 12px 8px; color: var(--color-body-gray);">Revenue Collected</th>
                        <th style="padding: 12px 8px; color: var(--color-body-gray);">Trend</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($revenue['labels'] as $index => $month)
                        <tr style="border-bottom: 1px solid var(--color-light-gray);">
                            <td style="padding: 12px 8px; font-weight: 600;">{{ $month }}</td>
                            <td style="padding: 12px 8px; color: #16a34a; font-weight: 700;">${{ number_format($revenue['data'][$index], 2) }}</td>
                            <td style="padding: 12px 8px;">
                                @if($index > 0 && $revenue['data'][$index] > $revenue['data'][$index-1])
                                    <span style="color: #16a34a; display: flex; align-items: center; gap: 4px;">
                                        <svg style="width:16px;height:16px" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                                        Up
                                    </span>
                                @elseif($index > 0 && $revenue['data'][$index] < $revenue['data'][$index-1])
                                    <span style="color: #dc2626; display: flex; align-items: center; gap: 4px;">
                                        <svg style="width:16px;height:16px" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6"></path></svg>
                                        Down
                                    </span>
                                @else
                                    <span style="color: var(--color-body-gray);">-</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Enrollment Stats Widget -->
        <div style="display: flex; flex-direction: column; gap: 24px;">
            <div class="card" style="padding: 24px; background: white; border-radius: 12px; border: 1px solid var(--color-light-gray); text-align: center;">
                <h3 style="font-size: 14px; text-transform: uppercase; color: var(--color-body-gray); letter-spacing: 0.05em; margin-bottom: 8px;">Active Enrollments</h3>
                <div style="font-size: 48px; font-weight: 800; color: var(--color-deep-teal);">{{ $enrollmentCount['active'] }}</div>
            </div>
            
            <div class="card" style="padding: 24px; background: white; border-radius: 12px; border: 1px solid var(--color-light-gray); text-align: center;">
                <h3 style="font-size: 14px; text-transform: uppercase; color: var(--color-body-gray); letter-spacing: 0.05em; margin-bottom: 8px;">Completed Enrollments</h3>
                <div style="font-size: 48px; font-weight: 800; color: #16a34a;">{{ $enrollmentCount['completed'] }}</div>
            </div>

            <div class="card" style="padding: 24px; background: white; border-radius: 12px; border: 1px solid var(--color-light-gray); text-align: center;">
                <h3 style="font-size: 14px; text-transform: uppercase; color: var(--color-body-gray); letter-spacing: 0.05em; margin-bottom: 8px;">Suspended Accounts</h3>
                <div style="font-size: 48px; font-weight: 800; color: #dc2626;">{{ $enrollmentCount['suspended'] }}</div>
            </div>
        </div>

    </div>
</x-filament-panels::page>
