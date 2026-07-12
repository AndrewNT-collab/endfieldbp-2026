<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet"
    href="https://unpkg.com/aos@2.3.4/dist/aos.css">
    <title>Factory DB</title>
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
            style="color:#111111; text-decoration:none;font-weight:700">
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
            ">
            Tracker
        </a>
    </div>

</nav>

<div data-aos="fade-up"style="padding:40px;">
    <h1 style="
    font-size:42px;
    margin-bottom:30px;
    ">
    Factory Database
    </h1>

    <div data-aos="fade-up" data-aos-delay="150"style="
    display:grid;
    grid-template-columns:repeat(auto-fill,100px);
    gap:16px;
    ">

    @foreach($items as $item)

    <a
    href="{{ route('items.show',$item) }}"
    style="
    width:100px;
    height:100px;
    background:#1a1a1a;
    border:1px solid #333;
    border-radius:10px;
    display:flex;
    align-items:center;
    justify-content:center;
    text-decoration:none;
    overflow:hidden;
    "
    >

    @if($item->image)

    <img 
    src="{{ asset('storage/'.$item->image) }}"
    style="
    width:100%;
    height:100%;
    object-fit:cover;
    ">

    @else

    <div style="
    font-size:12px;
    text-align:center;
    padding:5px;
    color:white;
    ">
    {{ $item->name }}
    </div>

    @endif

    </a>

    @endforeach

    </div>
</div>
</body>
</html>