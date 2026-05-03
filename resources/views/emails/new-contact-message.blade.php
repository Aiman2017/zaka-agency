<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<style>
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body { font-family: 'Inter', Arial, sans-serif; background: #f0f4f8; color: #1f2937; }
    .wrapper { max-width: 620px; margin: 32px auto; }
    .card { background: #ffffff; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 24px rgba(0,0,0,.08); }

    /* Header */
    .header { background: linear-gradient(135deg, #0d1b2a 0%, #1a6fc4 100%); padding: 36px 32px; text-align: center; }
    .header .brand { color: #c9aa71; font-size: 1.5rem; font-weight: 900; letter-spacing: -0.5px; }
    .header .brand span { color: #fff; }
    .header h2 { color: #fff; font-size: 1.1rem; font-weight: 600; margin-top: 10px; opacity: .9; }

    /* Body */
    .body { padding: 32px; }
    .intro { color: #6b7280; font-size: .92rem; line-height: 1.6; margin-bottom: 24px; }

    /* Info grid */
    .info-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-bottom: 24px; }
    .info-item { background: #f8fafc; border: 1px solid #e5e7eb; border-radius: 10px; padding: 14px 16px; }
    .info-item .label { font-size: .72rem; font-weight: 700; text-transform: uppercase; letter-spacing: .6px; color: #9ca3af; margin-bottom: 4px; }
    .info-item .value { font-size: .93rem; font-weight: 600; color: #111827; }
    .info-item .value a { color: #1a6fc4; text-decoration: none; }
    .info-item.full { grid-column: 1 / -1; }

    /* Badges */
    .badges { display: flex; flex-wrap: wrap; gap: 8px; margin-bottom: 20px; }
    .badge { background: #eff6ff; color: #1d4ed8; border: 1px solid #bfdbfe; border-radius: 20px; padding: 4px 12px; font-size: .78rem; font-weight: 600; }
    .badge.gold { background: #fef9ec; color: #92400e; border-color: #fde68a; }

    /* Message box */
    .message-label { font-size: .8rem; font-weight: 700; text-transform: uppercase; letter-spacing: .6px; color: #6b7280; margin-bottom: 8px; }
    .message-box { background: #f8fafc; border: 1px solid #e5e7eb; border-left: 4px solid #1a6fc4; border-radius: 10px; padding: 18px 20px; font-size: .95rem; line-height: 1.7; color: #374151; white-space: pre-wrap; }

    /* CTA */
    .cta { text-align: center; margin-top: 28px; }
    .btn { display: inline-block; background: linear-gradient(135deg, #1a6fc4, #0f4f96); color: #fff !important; text-decoration: none; padding: 13px 28px; border-radius: 10px; font-weight: 700; font-size: .95rem; letter-spacing: .3px; }

    /* Footer */
    .footer { background: #f8fafc; border-top: 1px solid #e5e7eb; padding: 20px 32px; text-align: center; color: #9ca3af; font-size: .78rem; line-height: 1.6; }

    @media (max-width: 480px) {
        .info-grid { grid-template-columns: 1fr; }
        .body { padding: 20px; }
        .header { padding: 24px 20px; }
    }
</style>
</head>
<body>
<div class="wrapper">
    <div class="card">

        {{-- Header --}}
        <div class="header">
            <div class="brand">Zaka-<span>Agency</span></div>
            <h2>You have a new message from the website</h2>
        </div>

        {{-- Body --}}
        <div class="body">
            <p class="intro">
                A visitor filled out the contact form on your website.
                Here are the details:
            </p>

            {{-- Sender info --}}
            <div class="info-grid">
                <div class="info-item">
                    <div class="label">Full Name</div>
                    <div class="value">{{ $contactMessage->name }}</div>
                </div>
                <div class="info-item">
                    <div class="label">Email</div>
                    <div class="value"><a href="mailto:{{ $contactMessage->email }}">{{ $contactMessage->email }}</a></div>
                </div>
                @if($contactMessage->phone)
                <div class="info-item">
                    <div class="label">Phone</div>
                    <div class="value"><a href="tel:{{ $contactMessage->phone }}">{{ $contactMessage->phone }}</a></div>
                </div>
                @endif
                @if($contactMessage->nationality)
                <div class="info-item">
                    <div class="label">Nationality</div>
                    <div class="value">{{ $contactMessage->nationality }}</div>
                </div>
                @endif
            </div>

            {{-- Interests --}}
            @if($contactMessage->service || $contactMessage->country)
            <div class="badges">
                @if($contactMessage->service)
                    <span class="badge">{{ $contactMessage->service }}</span>
                @endif
                @if($contactMessage->country)
                    <span class="badge gold">{{ $contactMessage->country }}</span>
                @endif
            </div>
            @endif

            {{-- Message --}}
            <div class="message-label">Message</div>
            <div class="message-box">{{ $contactMessage->message }}</div>

            {{-- CTA --}}
            <div class="cta">
                <a href="{{ route('admin.messages.index') }}" class="btn">Open Messages Inbox</a>
            </div>
        </div>

        {{-- Footer --}}
        <div class="footer">
            This is an automated notification from your Zaka-Agency website.<br/>
            Message received on {{ $contactMessage->created_at->format('F j, Y \a\t H:i') }}
        </div>

    </div>
</div>
</body>
</html>
