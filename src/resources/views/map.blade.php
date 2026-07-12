<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet"
    href="https://unpkg.com/aos@2.3.4/dist/aos.css">
    <title>Endfield Maps</title>
</head>

<body style="
    margin:0;
    background:linear-gradient(rgba(40,40,40,0.55), rgba(20,20,20,0.82)), url('{{ asset("images/bg.jpg") }}');
    background-size:cover;
    background-position:center;
    background-attachment:fixed;
    color:#f5f5f5;
    font-family:Arial, sans-serif;
">

<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

<script>
AOS.init({
    duration: 600,
    once: true
});
</script>

<nav
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
            style="color:#111111; text-decoration:none;">
            Dashboard
        </a>

        <a href="{{ route('items.index') }}"
            style="color:#111111; text-decoration:none;">
            Factory DB
        </a>

        <a href="{{ route('map') }}"
            style="color:#111111; text-decoration:none;font-weight:700">
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
    <h1 data-aos="fade-up"style="margin:0 0 8px; font-size:42px;">Area Map</h1>
    <p data-aos="fade-up"style="margin:0 0 28px; color:#FFFFFF;">Choose one region to open its local map.</p>

    <section style="display:grid; grid-template-columns:repeat(2,1fr); gap:22px;">
        <a href="{{ route('maps.valley-iv') }}" style="text-decoration:none; color:#f5f5f5;">
            <div data-aos="fade-up" style="background:#212121; border:1px solid #3a3a3a; border-radius:18px; overflow:hidden;">
                <img src="{{ asset('images/maps/MapV.jpg') }}" alt="Valley IV Map" style="width:100%; height:260px; object-fit:cover; display:block;">
                <div style="padding:22px;">
                    <p style="margin:0 0 8px; color:#b0b0b0; letter-spacing:1px;">REGION MAP</p>
                    <h2 style="margin:0;">Valley IV</h2>
                    <p style="color:#b0b0b0;">Valley-IV Area</p>
                </div>
            </div>
        </a>

        <a href="{{ route('maps.wuling') }}" style="text-decoration:none; color:#f5f5f5;">
            <div data-aos="fade-up" data-aos-delay="100" style="background:#212121; border:1px solid #3a3a3a; border-radius:18px; overflow:hidden;">
                <img src="{{ asset('images/maps/MapW.jpg') }}" alt="Wuling Map" style="width:100%; height:260px; object-fit:cover; display:block;">
                <div style="padding:22px;">
                    <p style="margin:0 0 8px; color:#b0b0b0; letter-spacing:1px;">REGION MAP</p>
                    <h2 style="margin:0;">Wuling</h2>
                    <p style="color:#b0b0b0;">Wuling Area</p>
                </div>
            </div>
        </a>
    </section>
</main>

</body>
</html>