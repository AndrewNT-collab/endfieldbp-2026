<!DOCTYPE html>
<html>
<head>
    <title>Wuling Map</title>
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

<nav style="height:64px; background:#E6EB18; display:flex; align-items:center; padding:0 34px; border-bottom:2px solid #111111; position:relative; overflow:hidden;">
    <div style="position:absolute; right:0; top:0; width:360px; height:64px; background:repeating-linear-gradient(-45deg,#111111 0px,#111111 30px,#E6EB18 30px,#E6EB18 54px); clip-path:polygon(18% 0,100% 0,100% 100%,0 100%); z-index:1;"></div>

    <div style="display:flex; align-items:center; gap:14px; position:relative; z-index:2;">
        <div style="background:#1f1f1f; color:#f5f5f5; padding:10px 14px; border-radius:10px; font-weight:bold; border:1px solid #404040;">EB</div>
        <strong style="color:#111111; font-size:18px;">Endfield Blueprint</strong>
    </div>

    <div style="position:absolute; left:50%; transform:translateX(-50%); display:flex; align-items:center; gap:34px; z-index:2;">
        <a href="{{ route('dashboard') }}" style="color:#111111; text-decoration:none; font-weight:700;">Dashboard</a>
        <a href="{{ route('items.index') }}" style="color:#111111; text-decoration:none;">Blueprint DB</a>
        <a href="{{ route('map') }}" style="color:#111111; text-decoration:none;">Map</a>
        <a href="#" style="color:#111111; text-decoration:none;">Tracker</a>
    </div>
</nav>

<main style="padding:36px; max-width:1300px; margin:auto;">
    <a href="{{ route('map') }}" style="display:inline-block; margin-bottom:22px; color:#ffffff; text-decoration:none; font-weight:bold; padding:10px 14px; border-radius:10px; border:1px solid #000000; background:#212121;">← Back to Map</a>

    <h1 style="margin:0 0 8px; font-size:42px;">Wuling Map</h1>
    <p style="margin:0 0 24px; color:#b0b0b0;">Select a location inside Wuling.</p>

    <section style="position:relative; background:#212121; border:1px solid #3a3a3a; border-radius:18px; overflow:hidden;">
        <img src="{{ asset('images/maps/MapW.jpg') }}" alt="Wuling Map" style="width:100%; display:block;">

        <a href="{{ route('areas.show', 'wuling') }}" style="position:absolute; left:45%; top:50%; background:#E6EB18; color:#111111; padding:10px 14px; border-radius:10px; text-decoration:none; font-weight:bold; border:1px solid #111111;">
            Main PAC
        </a>

        <a href="{{ route('areas.show', 'sub-pac-wuling') }}" style="position:absolute; left:63%; top:36%; background:#212121; color:#f5f5f5; padding:10px 14px; border-radius:10px; text-decoration:none; font-weight:bold; border:1px solid #444;">
            Sub PAC
        </a>
    </section>
</main>

</body>
</html>