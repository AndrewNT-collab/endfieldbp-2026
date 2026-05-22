<!DOCTYPE html>
<html>
<head>
    <title>Endfield Blueprint Dashboard</title>
</head>

<body style="
    margin:0;
    background:
        linear-gradient(rgba(2,6,23,0.88), rgba(2,6,23,0.94)),
        url('{{ asset("images/bg.jpg") }}');
    background-size:cover;
    background-position:center;
    background-attachment:fixed;
    color:#e5e7eb;
    font-family:Arial, sans-serif;
">

    <nav style="height:64px; background:rgba(15,23,42,0.92); display:flex; align-items:center; justify-content:space-between; padding:0 32px; border-bottom:1px solid #334155;">
        <div style="display:flex; align-items:center; gap:12px;">
            <div style="background:#60a5fa; color:#020617; padding:10px; border-radius:10px; font-weight:bold;">EB</div>
            <strong>Endfield Blueprint</strong>
        </div>

        <div style="display:flex; gap:26px;">
            <a href="{{ route('dashboard') }}" style="color:#60a5fa; text-decoration:none;">Dashboard</a>
            <a href="{{ route('items.index') }}" style="color:#e5e7eb; text-decoration:none;">Blueprint DB</a>
            <a href="#" style="color:#e5e7eb; text-decoration:none;">Map</a>
            <a href="#" style="color:#e5e7eb; text-decoration:none;">Tracker</a>
        </div>

        <div style="display:flex; align-items:center; gap:14px;">
            <span>🔔</span>
            <div style="background:#60a5fa; color:#020617; border-radius:50%; width:38px; height:38px; display:flex; align-items:center; justify-content:center; font-weight:bold;">EN</div>
        </div>
    </nav>

    <main style="padding:36px; max-width:1180px; margin:auto;">

        <section style="background:rgba(15,23,42,0.88); border:1px solid #334155; border-radius:18px; padding:28px; display:flex; justify-content:space-between; align-items:center; margin-bottom:34px;">
            <div style="display:flex; gap:22px; align-items:center;">
                <div style="width:80px; height:80px; border-radius:16px; background:#1e3a8a; color:#bfdbfe; display:flex; align-items:center; justify-content:center; font-size:34px;">👤</div>

                <div>
                    <h1 style="margin:0 0 8px; font-size:28px;">Endministrator</h1>
                    <p style="margin:0; color:#94a3b8;">UID: 100-000-000 · Asia Server</p>
                    <div style="margin-top:12px;">
                        <span style="background:#dbeafe; color:#1e3a8a; padding:6px 10px; border-radius:999px; font-size:13px;">Valley IV</span>
                        <span style="background:#e0f2fe; color:#075985; padding:6px 10px; border-radius:999px; font-size:13px;">AIC Active</span>
                        <span style="background:#e0e7ff; color:#3730a3; padding:6px 10px; border-radius:999px; font-size:13px;">Patch 1.2</span>
                    </div>
                </div>
            </div>

            <div style="text-align:right;">
                <p style="margin:0; color:#94a3b8;">Current Area</p>
                <h2 style="margin:6px 0;">Wuling City</h2>
                <p style="color:#60a5fa; margin:0;">AIC Online</p>
            </div>
        </section>

        <h2 style="font-size:18px; letter-spacing:1px; color:#94a3b8;">BLUEPRINT PER AREA</h2>

        <section style="display:grid; grid-template-columns:repeat(2, 1fr); gap:20px; margin-top:18px;">

            @php
                $areas = [
                    ['Valley IV', 'Main AIC Hub base', 'Main PAC', ['Buck Capsule A', 'HC Valley Battery', 'Ferrium Component', 'Cryston Component']],
                    ['Wuling', 'Main AIC - Wuling City', 'Main PAC', ['LC / SC Wuling Battery', 'Xaranite Component', 'Cryston Component', 'Yuzhen Syringe A/C']],
                    ['SubPAC Valley IV', 'Valley Pass - Sky Park Power Review', 'Sub-PAC', ['LC Valley Battery', 'SC Valley Battery', 'Automation-Core', 'Zipline Tower Materials']],
                    ['SubPAC Wuling', 'Jingyu Valley', 'Sub-PAC', ['Xaranite', 'Xenon', 'Heavy Xaranite', 'Hetonic Component']],
                ];
            @endphp

            @foreach ($areas as $area)
                <div style="background:rgba(15,23,42,0.88); border:1px solid #334155; border-radius:16px; padding:22px;">
                    <div style="display:flex; justify-content:space-between; align-items:start;">
                        <div>
                            <h3 style="margin:0; font-size:22px;">{{ $area[0] }}</h3>
                            <p style="color:#94a3b8; margin-top:6px;">{{ $area[1] }}</p>
                        </div>
                        <span style="background:#dbeafe; color:#1e3a8a; padding:6px 10px; border-radius:999px; font-size:12px;">{{ $area[2] }}</span>
                    </div>

                    <ul style="list-style:none; padding:0; margin-top:20px;">
                        @foreach ($area[3] as $blueprint)
                            <li style="padding:10px 0; border-bottom:1px solid #334155; display:flex; justify-content:space-between;">
                                <span>● {{ $blueprint }}</span>
                                <span style="color:#94a3b8;">10/min</span>
                            </li>
                        @endforeach
                    </ul>

                    <div style="margin-top:18px;">
                        <a href="{{ route('blueprints.index') }}"style="background:#60a5fa; color:#020617; padding:10px 14px; border-radius:10px; text-decoration:none; font-weight:bold;">
                           Open Blueprint
                        </a>
                    </div>
                </div>
            @endforeach

        </section>

    </main>

</body>
</html>