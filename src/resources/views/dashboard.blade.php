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

<nav
    data-aos="fade-down"
    style="
        height:64px;
        background:#E6EB18;
        display:flex;
        align-items:center;
        justify-content:space-between;
        padding:0 34px;
        border-bottom:2px solid #111111;
        position:relative;
        overflow:hidden;
    "
>

    <!-- Hazard Stripe -->
    <div
        style="
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
            clip-path:polygon(18% 0,100% 0,100% 100%,0 100%);
            pointer-events:none;
            z-index:1;
        ">
    </div>

    <!-- Logo -->
    <div
        style="
            display:flex;
            align-items:center;
            gap:14px;
            z-index:2;
            flex-shrink:0;
        "
    >
        <img
            src="{{ asset('images/HG.webp') }}"
            alt="Hypergryph"
            style="
                width:48px;
                height:48px;
            "
        >

        <div
            style="
                display:flex;
                flex-direction:column;
                line-height:1.1;
            "
        >
            <span
                style="
                    font-size:18px;
                    font-weight:700;
                    color:#111111;
                "
            >
                Endfield Industries
            </span>

            <span
                style="
                    font-size:11px;
                    color:#444;
                    letter-spacing:1px;
                    text-transform:uppercase;
                "
            >
                Endfield Factory Blueprint System
            </span>
        </div>
    </div>

<!-- Navigation -->
    <div
        style="
            display:flex;
            align-items:center;
            gap:34px;
            margin-left:48px;
            margin-right:400px;
            z-index:2;
        "
    >
        <a href="{{ route('dashboard') }}"
            style="color:#111111; text-decoration:none; font-weight:700; text-shadow:-1px -1px 0 #fff100, 1px -1px 0 #fff100, -1px 1px 0 #fff100, 1px 1px 0 #fff100;">
            Dashboard
        </a>

        <a href="{{ route('items.index') }}"
            style="color:#111111; text-decoration:none; text-shadow:-1px -1px 0 #fff100, 1px -1px 0 #fff100, -1px 1px 0 #fff100, 1px 1px 0 #fff100;">
            Factory DB
        </a>

        <a href="{{ route('map') }}"
            style="color:#111111; text-decoration:none; text-shadow:-1px -1px 0 #fff100, 1px -1px 0 #fff100, -1px 1px 0 #fff100, 1px 1px 0 #fff100;">
            Map
        </a>

        <a href="{{ route('tracker.index') }}"
            style="
                color:#111111;
                text-decoration:none;
                background:#E6EB18;
                padding:0 10px;
                position:relative;
                z-index:2;
            ">
            Tracker
        </a>
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

            @php
                $avatar = auth()->user()->avatar_url
                    ? asset('storage/' . auth()->user()->avatar_url)
                    : auth()->user()->discord_avatar;
            @endphp

            @if($avatar)
            <img
                src="{{ $avatar }}"
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
                "
            >
                👤
            </div>

            @endif
            </a>

        <div>

            <h1 style="margin:0 0 8px;">
                {{ auth()->user()->display_name }}
            </h1>

            @if(auth()->user()->bio)
                <p style="margin:0 0 14px; color:#bdbdbd; font-style:italic;">
                    {{ auth()->user()->bio }}
                </p>
            @endif

            <div style="color:#a3a3a3; line-height:1.8;">

                <div>
                    UID :
                    <strong style="color:#fff;">
                        {{ auth()->user()->uid ?? 'Not Assigned' }}
                    </strong>
                </div>

                <div>
                    Server :
                    <strong style="color:#fff;">
                        {{ auth()->user()->server ?? '-' }}
                    </strong>
                </div>

                <div>
                    Joined :
                    <strong style="color:#fff;">
                        {{ auth()->user()->created_at->format('d M Y') }}
                    </strong>
                </div>

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
            display:inline-flex;
            align-items:center;
            gap:10px;
            font-weight:600;
        ">

        <svg
            xmlns="http://www.w3.org/2000/svg"
            width="24"
            height="24"
            fill="white"
            viewBox="0 0 127.14 96.36">
            <path d="M107.7 8.07A105.15 105.15 0 0 0 81.47 0a72.06 72.06 0 0 0-3.36 6.83 97.68 97.68 0 0 0-29.11 0A72.37 72.37 0 0 0 45.64 0a105.89 105.89 0 0 0-26.27 8.14C2.79 33.35-1.71 57.94.54 82.18A105.73 105.73 0 0 0 32.71 96.36a77.7 77.7 0 0 0 6.89-11.31 68.42 68.42 0 0 1-10.84-5.18c.91-.66 1.8-1.34 2.66-2.04a75.57 75.57 0 0 0 64.3 0c.87.71 1.76 1.39 2.66 2.04a68.68 68.68 0 0 1-10.86 5.19 77 77 0 0 0 6.89 11.3A105.25 105.25 0 0 0 126.6 82.2c2.64-28.08-4.52-52.45-18.9-74.13ZM42.45 65.69c-6.27 0-11.41-5.73-11.41-12.81s5-12.81 11.41-12.81c6.46 0 11.52 5.78 11.41 12.81 0 7.08-5 12.81-11.41 12.81Zm42.24 0c-6.27 0-11.41-5.73-11.41-12.81s5-12.81 11.41-12.81c6.46 0 11.52 5.78 11.41 12.81 0 7.08-4.95 12.81-11.41 12.81Z"/>
        </svg>

        <span>Login with Discord</span>

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
                    src="{{ asset('images/easter.jpeg') }}"
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
        }, 2000);
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