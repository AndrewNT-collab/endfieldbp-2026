<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet"
    href="https://unpkg.com/aos@2.3.4/dist/aos.css">
    <title>Tracker</title>
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
            style="color:#111111; text-decoration:none;">
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
                font-weight:700;
            ">
            Tracker
        </a>
    </div>

</nav>

<div data-aos="fade-up" data-aos-delay="100"style="padding:40px;">
    <h1 style="
    font-size:42px;
    margin-bottom:30px;
    ">
    Blueprint Tracker
    </h1>

    <form method="GET"
    style="
    display:flex;
    gap:20px;
    margin-bottom:40px;
    flex-wrap:wrap;
    ">

        {{-- Search --}}
        <input
            type="text"
            name="search"
            placeholder="Search item..."
            value="{{ request('search') }}"
            style="
            padding:12px;
            width:250px;
            background:#1a1a1a;
            color:white;
            border:1px solid #333;
            border-radius:10px;
            "
        >

        {{-- Area --}}
        <select
            name="area"
            style="
            padding:12px;
            background:#1a1a1a;
            color:white;
            border:1px solid #333;
            border-radius:10px;
            "
        >
            <option value="">All Area</option>
            <option value="Valley IV"
                {{ request('area') == 'Valley IV' ? 'selected' : '' }}>
                Valley IV
            </option>

            <option value="Wuling"
                {{ request('area') == 'Wuling' ? 'selected' : '' }}>
                Wuling
            </option>
        </select>

        {{-- Sort --}}
        <select
            name="sort"
            style="
            padding:12px;
            background:#1a1a1a;
            color:white;
            border:1px solid #333;
            border-radius:10px;
            "
        >
            <option value="">Sort</option>
            <option value="name"
                {{ request('sort') == 'name' ? 'selected' : '' }}>
                Name
            </option>

            <option value="time"
                {{ request('sort') == 'time' ? 'selected' : '' }}>
                Craft Time
            </option>
        </select>

        <button
            type="submit"
            style="
            padding:12px 20px;
            background:#E6EB18;
            border:none;
            border-radius:10px;
            font-weight:bold;
            "
        >
            Search
        </button>

    </form>

    @foreach($blueprints as $bp)

    <div style="
    background:#181818;
    padding:20px;
    border-radius:15px;
    margin-bottom:20px;
    border:1px solid #333;
    ">

        <h2 style="margin:0 0 10px 0;">
            {{ $bp->resultItem->name }}
        </h2>

        <p>
            Area:
            {{ $bp->area->name ?? '-' }}
        </p>

        <p>
            Machine:
            {{ $bp->machines->pluck('name')->join(', ') }}
        </p>

        <p>
            Craft Time:
            {{ $bp->craft_time }} sec
        </p>

        <a
            href="{{ route('items.show',$bp->resultItem) }}"
            style="
            display:inline-block;
            margin-top:10px;
            padding:10px 16px;
            background:#E6EB18;
            color:black;
            text-decoration:none;
            border-radius:10px;
            font-weight:bold;
            "
        >
            Open Blueprint
        </a>

    </div>

@endforeach
</div>
</body>
</html>