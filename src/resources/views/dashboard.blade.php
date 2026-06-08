<!DOCTYPE html>
<html>
<head>
    <title>Endfield Blueprint Dashboard</title>
</head>

<body style="
    margin:0;
    background:
        linear-gradient(rgba(40,40,40,0.55), rgba(20,20,20,0.82)),
        url('{{ asset("images/bg.jpg") }}');
    background-size:cover;
    background-position:center;
    background-attachment:fixed;
    color:#f5f5f5;
    font-family:Arial, sans-serif;
">

<nav style="
    height:64px;
    background:#E6EB18;
    display:flex;
    align-items:center;
    padding:0 34px;
    border-bottom:2px solid #111111;
    position:relative;
    overflow:hidden;
">

    <div style="
        position:absolute;
        right:0;
        top:0;
        width:360px;
        height:64px;
        background:repeating-linear-gradient(
            -45deg,
            #111111 0px,
            #111111 30px,
            #E6EB18 30px,
            #E6EB18 54px
        );
        clip-path:polygon(18% 0, 100% 0, 100% 100%, 0 100%);
        pointer-events:none;
        z-index:1;
    "></div>

    <div style="display:flex; align-items:center; gap:14px; position:relative; z-index:2;">
        <div style="background:#1f1f1f; color:#f5f5f5; padding:10px 14px; border-radius:10px; font-weight:bold; border:1px solid #404040;">
            EB
        </div>

        <strong style="color:#111111; font-size:18px;">
            Endfield Blueprint
        </strong>
    </div>

    <div style="
        position:absolute;
        left:50%;
        transform:translateX(-50%);
        display:flex;
        align-items:center;
        gap:34px;
        z-index:2;
    ">
        <a href="{{ route('dashboard') }}" style="color:#111111; text-decoration:none; font-weight:700;">Dashboard</a>
        <a href="{{ route('items.index') }}" style="color:#111111; text-decoration:none;">Blueprint DB</a>
        <a href="{{ route('map') }}" style="color:#111111; text-decoration:none;">Map</a>
        <a href="#" style="color:#111111; text-decoration:none;">Tracker</a>
    </div>

</nav>

<main style="padding:36px; max-width:1180px; margin:auto;">

    <section style="background:#212121; border:1px solid #3a3a3a; border-radius:18px; padding:28px; display:flex; justify-content:space-between; align-items:center; margin-bottom:34px;">
        <div style="display:flex; gap:22px; align-items:center;">
            <div style="width:80px; height:80px; border-radius:16px; background:#2a2a2a; color:#d4d4d4; display:flex; align-items:center; justify-content:center; font-size:34px; border:1px solid #404040;">
                👤
            </div>

            <div>
                <h1 style="margin:0 0 8px; font-size:28px;">Endministrator</h1>

                <p style="margin:0; color:#a3a3a3;">
                    UID: 100-000-000 · Asia Server
                </p>

                <div style="margin-top:12px;">
                    <span style="background:#2f2f2f; color:#f5f5f5; padding:6px 10px; border-radius:999px; font-size:13px; border:1px solid #444;">Valley IV</span>
                    <span style="background:#2f2f2f; color:#f5f5f5; padding:6px 10px; border-radius:999px; font-size:13px; border:1px solid #444;">AIC Active</span>
                    <span style="background:#2f2f2f; color:#f5f5f5; padding:6px 10px; border-radius:999px; font-size:13px; border:1px solid #444;">Patch 1.2</span>
                </div>
            </div>
        </div>

        <div style="display:flex; align-items:center; justify-content:center;">
            <img src="{{ asset('images/EFL.webp') }}"
                 alt="EFLogo"
                 style="width:120px; height:120px; object-fit:contain; border-radius:4px; padding:14px; border:1px solid rgba(255,255,255,0.18); background:#171717;">
        </div>
    </section>

    <h2 style="font-size:18px; letter-spacing:1px; color:#d4d4d4;">
        Protocol Automation-Core (PAC) Area
    </h2>

    <section style="display:grid; grid-template-columns:repeat(2, 1fr); gap:20px; margin-top:18px;">

        @foreach ($areas as $area)
            <div style="background:#212121; border:1px solid #3a3a3a; border-radius:16px; padding:22px;">
                <div style="display:flex; justify-content:space-between; align-items:start;">
                    <div>
                        <h3 style="margin:0; font-size:22px;">{{ $area->name }}</h3>
                        <p style="color:#a3a3a3; margin-top:6px;">{{ $area->description }}</p>
                    </div>

                    <span style="background:#2f2f2f; color:#d4d4d4; padding:6px 10px; border-radius:999px; font-size:12px; border:1px solid #444;">
                        {{ $area->type }}
                    </span>
                </div>

                <div style="margin-top:20px; padding:20px; border:1px dashed #444; border-radius:12px; color:#a3a3a3; background:#1a1a1a;">
                    @if ($area->blueprints->count() > 0)
                        @foreach ($area->blueprints as $blueprint)
                            <div style="margin-bottom:12px;">
                                <strong style="color:#f5f5f5;">{{ $blueprint->name }}</strong><br>
                                <small>
                                    Result: {{ $blueprint->resultItem->name ?? '-' }} |
                                    Machine: {{ $blueprint->machine->name ?? '-' }} |
                                    Time: {{ $blueprint->craft_time ?? '-' }}s
                                </small>
                            </div>
                        @endforeach
                    @else
                        No Blueprint Added Yet
                    @endif
                </div>

                <div style="margin-top:18px;">
                    <a href="{{ route('areas.show', $area->slug) }}"
                       style="background:#E6EB18; color:#020617; padding:10px 14px; border-radius:10px; text-decoration:none; font-weight:bold;">
                        Open Blueprint
                    </a>
                </div>
            </div>
        @endforeach

    </section>

</main>

</body>
</html>