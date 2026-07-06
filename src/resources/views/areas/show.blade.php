<!DOCTYPE html>
<html>
<head>
    <title>{{ $area->name }} Blueprint Area</title>
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
        <a href="{{ route('items.index') }}" style="color:#111111; text-decoration:none;">Factory DB</a>
        <a href="{{ route('map') }}" style="color:#111111; text-decoration:none;">Map</a>
        <a href="{{ route('tracker.index') }}" style="color:#111111; text-decoration:none;">Tracker</a>
    </div>
</nav>

<main style="padding:36px; max-width:1200px; margin:auto;">

    <a href="{{ route('dashboard') }}"
       style="display:inline-block; margin-bottom:22px; color:#FFFFFF; text-decoration:none; font-weight:bold; padding:10px 14px; border-radius:10px; border:1px solid #000000; background:#212121;">
        ← Back to Dashboard
    </a>

    <section style="background:#212121; border:1px solid #3a3a3a; border-radius:18px; padding:28px; margin-bottom:28px;">
        <div style="display:flex; justify-content:space-between; align-items:flex-start; gap:20px;">
            <div>
                <p style="margin:0 0 8px; color:#b0b0b0; letter-spacing:1px;">
                    AREA BLUEPRINT STORAGE
                </p>

                <h1 style="margin:0; font-size:42px;">
                    {{ $area->name }}
                </h1>

                <p style="color:#b0b0b0; font-size:18px; margin-bottom:0;">
                    {{ $area->description }}
                </p>
            </div>

            <span style="background:#2f2f2f; color:#d4d4d4; padding:8px 14px; border-radius:999px; font-size:14px; font-weight:bold; border:1px solid #444;">
                {{ $area->type }}
            </span>
        </div>
    </section>

    <section style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
        <div>
            <h2 style="margin:0; color:#f5f5f5;">
                Saved Blueprints
            </h2>

            <p style="margin:6px 0 0; color:#b0b0b0;">
                {{ $area->blueprints->count() }} blueprint saved in this area
            </p>
        </div>

        <a href="{{ route('blueprints.create', $area->slug) }}"
           style="background:#E6EB18; color:#111111; padding:11px 16px; border-radius:10px; text-decoration:none; font-weight:bold; border:1px solid #111111;">
            + Add Blueprint
        </a>
    </section>

    @if ($area->blueprints->count() === 0)

        <section style="background:#1f1f1f; border:1px dashed #4a4a4a; border-radius:18px; padding:60px; text-align:center;">
            <h2 style="margin-top:0; font-size:30px;">
                No Blueprint Added Yet
            </h2>

            <p style="color:#b0b0b0; font-size:18px;">
                This area is empty. Add your first production blueprint for {{ $area->name }}.
            </p>

            <a href="{{ route('blueprints.create', $area->slug) }}"
               style="display:inline-block; margin-top:16px; background:#E6EB18; color:#111111; padding:12px 18px; border-radius:10px; text-decoration:none; font-weight:bold; border:1px solid #111111;">
                + Add First Blueprint
            </a>
        </section>

    @else

        <section style="display:grid; grid-template-columns:repeat(auto-fill, minmax(360px, 1fr)); gap:20px;">

            @foreach ($area->blueprints as $blueprint)

                <div style="background:#212121; border:1px solid #3a3a3a; border-radius:16px; padding:22px;">
                    @if ($blueprint->image)
                        <img src="{{ asset('storage/' . $blueprint->image) }}"
                            alt="{{ $blueprint->name }}"
                            style="width:72px; height:72px; object-fit:contain; background:#171717; border:1px solid #3a3a3a; border-radius:14px; padding:8px; margin-bottom:14px;">
                    @elseif ($blueprint->resultItem?->image)
                        <img src="{{ asset('storage/' . $blueprint->resultItem->image) }}"
                            alt="{{ $blueprint->resultItem->name }}"
                            style="width:72px; height:72px; object-fit:contain; background:#171717; border:1px solid #3a3a3a; border-radius:14px; padding:8px; margin-bottom:14px;">
                    @endif

                    <h3 style="margin:0; font-size:24px;">
                        {{ $blueprint->name ?? 'Untitled Blueprint' }}
                    </h3>

                    <p style="color:#b0b0b0;">
                        Result: {{ $blueprint->resultItem->name ?? 'No result item' }}
                    </p>

                    <p style="color:#b0b0b0;">
                        Machine: {{ $blueprint->machine->name ?? 'No machine' }}
                    </p>

                    <a href="{{ route('blueprints.show', $blueprint->id) }}"
                       style="display:inline-block; margin-top:14px; background:#E6EB18; color:#111111; padding:9px 14px; border-radius:10px; text-decoration:none; font-weight:bold; border:1px solid #111111;">
                        Open Blueprint
                    </a>
                </div>

            @endforeach

        </section>

    @endif

</main>

</body>
</html>