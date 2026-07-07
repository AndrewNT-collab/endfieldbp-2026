<!DOCTYPE html>
<html>
<head>
    <link
    rel="stylesheet"
    href="https://unpkg.com/aos@2.3.4/dist/aos.css">
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

<script
src="https://unpkg.com/aos@2.3.4/dist/aos.js">
</script>

<script>
AOS.init({
    duration: 800,
    delay: 0,
    once: true,
    offset: 200
});
</script>

<nav data-aos="fade-down"
    style="
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
        <a href="{{ route('dashboard') }}" style="color:#111111; text-decoration:none; font-weight:700; padding-bottom:4px;">Dashboard</a>
        <a href="{{ route('items.index') }}" style="color:#111111; text-decoration:none;">Factory DB</a>
        <a href="{{ route('map') }}" style="color:#111111; text-decoration:none;">Map</a>
        <a href="{{ route('tracker.index') }}" style="color:#111111; text-decoration:none;">Tracker</a>
    </div>
</nav>

<main style="padding:36px; max-width:1180px; margin:auto;">
    @auth
        <section
            data-aos="fade-up"
            data-aos-delay="100"
            style="
                background:#212121;
                border:1px solid #3a3a3a;
                border-radius:18px;
                padding:28px;
                display:flex;
                justify-content:space-between;
                align-items:center;
                margin-bottom:34px;
                cursor:pointer;
            "
        >

        <div style="display:flex; align-items:center; gap:22px;">

            <a href="{{ route('profile.edit') }}"
            style="text-decoration:none;">

            @if(session('avatar'))
            <img
                src="{{ asset('storage/' . session('avatar')) }}"
                style="
                    width:80px;
                    height:80px;
                    border-radius:16px;
                    object-fit:cover;
                    border:1px solid #404040;
                    transition:.2s;
                "
                onmouseover="this.style.borderColor='#E6EB18'"
                onmouseout="this.style.borderColor='#404040'"
            >
            @else
            <div
                style="
                    width:80px;
                    height:80px;
                    border-radius:16px;
                    background:#2a2a2a;
                    color:#d4d4d4;
                    display:flex;
                    align-items:center;
                    justify-content:center;
                    font-size:34px;
                    border:1px solid #404040;
                    transition:.2s;
                "
                onmouseover="this.style.borderColor='#E6EB18'"
                onmouseout="this.style.borderColor='#404040'"
            >
                👤
            </div>
            @endif
            </a>

            <div>
                <h1 datastyle="margin:0 0 8px;">
                    {{ session('username', 'Endministrator') }}
                </h1>

                <p style="margin:0; color:#a3a3a3;">
                    UID: {{ session('uid') }}
                    
                    {{ session('game_server') }}
                </p>

                <div style="margin-top:12px; display:flex; gap:8px; flex-wrap:wrap;">
                    <!-- tag -->
                </div>
            </div>

        </div>

        <div>
            <img id="endfieldLogo"
                src="{{ asset('images/EFL.webp') }}"
                style="
                    width:120px;
                    height:120px;
                    object-fit:contain;
                    background:#171717;
                    border:1px solid rgba(255,255,255,.18);
                    padding:14px;
                    cursor:pointer;
                ">
        </div>

    </section>

    @else

    <section
        data-aos="fade-up"
        style="
            background:#212121;
            border:1px solid #3a3a3a;
            border-radius:18px;
            padding:32px;
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:34px;
        ">

        <div>
            <h1 style="margin:0;font-size:30px;">
                Welcome, Endministrator.
            </h1>

            <p style="margin-top:8px;color:#9ca3af;">
                Login with Discord to synchronize your Endfield profile.
            </p>
        </div>

        <a href="{{ route('discord.login') }}"
        style="
                background:#5865F2;
                color:white;
                text-decoration:none;
                padding:14px 22px;
                border-radius:12px;
                font-weight:bold;
        ">
            Login with Discord
        </a>

    </section>

    @endauth

    <h2 data-aos="fade-up" style="font-size:18px; letter-spacing:1px; color:#FFFFFF;">
        Protocol Automation-Core (PAC) Area
    </h2>

    <section data-aos="fade-up" data-aos-delay="250" style="display:grid; grid-template-columns:repeat(2, 1fr); gap:20px; margin-top:18px;">

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
                                    Result: {{ $blueprint->resultItem?->name ?? '-' }} |
                                    Machines:
                                    @if($blueprint->machines->count())
                                        {{ $blueprint->machines->pluck('name')->join(', ') }}
                                    @else
                                        -
                                    @endif
                                    |
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

<script>

let tapCount = 0;
let tapTimer;

function logoTap() {
    tapCount++;

    clearTimeout(tapTimer);
    tapTimer = setTimeout(() => {
        tapCount = 0;
    }, 2000);

    if (tapCount >= 5) {
        tapCount = 0;

        const popup = document.createElement("div");

        popup.innerHTML = `
            <div id="monkeyPopup"
                style="
                    position:fixed;
                    inset:0;
                    z-index:99999;
                    background:#000;
                    display:flex;
                    align-items:center;
                    justify-content:center;
                    flex-direction:column;
                ">

                <img
                    src="{{ asset('images/easter.jpg') }}"
                    style="
                        max-width:90vw;
                        max-height:80vh;
                        border-radius:20px;
                    "
                >

                <h1 style="
                    color:white;
                    margin-top:20px;
                    font-size:42px;
                ">
                    🐵 YOU FOUND A MONKEY 🐵
                </h1>

            </div>
        `;

        document.body.appendChild(popup);

        setTimeout(() => {
            const existingPopup = document.getElementById("monkeyPopup");
            if (existingPopup) {
                existingPopup.parentElement.remove();
            }
        }, 1000);
    }
}

document.getElementById("endfieldLogo").addEventListener("click", function(e) {
    e.preventDefault();
    e.stopPropagation();
    logoTap();
});

</script>

</body>
</html>