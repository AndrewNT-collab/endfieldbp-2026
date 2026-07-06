<!DOCTYPE html>
<html>
<head>
    <title>{{ $blueprint->name ?? 'Blueprint Detail' }}</title>
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

<main style="padding:36px; max-width:1100px; margin:auto;">

    <a href="{{ url()->previous() }}"
       style="display:inline-block; margin-bottom:22px; color:#ffffff; text-decoration:none; font-weight:bold; padding:10px 14px; border-radius:10px; border:1px solid #000000; background:#212121;">
        ← Return
    </a>

    <section style="background:#212121; border:1px solid #3a3a3a; border-radius:18px; padding:28px; margin-bottom:26px;">
        <p style="margin:0 0 8px; color:#b0b0b0;">Blueprint Result</p>

        <div style="display:flex; align-items:center; gap:22px; flex-wrap:wrap;">
            @if ($blueprint->image)
                <img src="{{ asset('storage/' . $blueprint->image) }}"
                    alt="{{ $blueprint->name }}"
                    style="width:92px; height:92px; object-fit:contain; background:#171717; border:1px solid #3a3a3a; border-radius:16px; padding:10px;">
            @elseif ($blueprint->resultItem?->image)
                <a href="{{ route('items.show', $blueprint->resultItem) }}">
                    <img src="{{ asset('storage/' . $blueprint->resultItem->image) }}"
                        alt="{{ $blueprint->resultItem->name }}"
                        style="width:92px; height:92px; object-fit:contain; background:#171717; border:1px solid #3a3a3a; border-radius:16px; padding:10px;">
                </a>
            @endif

            <div>
                <h1 style="margin:0; font-size:36px;">
                    {{ $blueprint->resultItem->name ?? $blueprint->name ?? 'Unknown Item' }}
                </h1>

                <p style="margin:8px 0 0; color:#d4d4d4;">
                    {{ $blueprint->notes ?? 'No notes available.' }}
                </p>
            </div>
        </div>

        <div style="display:flex; gap:12px; margin-top:20px; flex-wrap:wrap;">
            <span style="background:#2f2f2f; color:#f5f5f5; padding:7px 12px; border-radius:999px; font-size:13px; border:1px solid #444;">
                Machine: {{ $blueprint->machine->name ?? '-' }}
            </span>

            <span style="background:#2f2f2f; color:#f5f5f5; padding:7px 12px; border-radius:999px; font-size:13px; border:1px solid #444;">
                Craft Time: {{ $blueprint->craft_time ?? '-' }} sec
            </span>

            <span style="background:#E6EB18; color:#111111; padding:7px 12px; border-radius:999px; font-size:13px; border:1px solid #111111;">
                Area: {{ $blueprint->area->name ?? '-' }}
            </span>
        </div>
    </section>

    <section style="background:#212121; border:1px solid #3a3a3a; border-radius:18px; padding:24px; margin-bottom:26px;">
        <h2 style="margin-top:0; color:#f5f5f5;">Production Recipe</h2>

        <div style="display:grid; grid-template-columns:1fr 2fr 1.5fr 0.8fr; border:1px solid #3a3a3a; border-radius:14px; overflow:hidden;">
            <div style="padding:14px; background:#2a2a2a; font-weight:bold;">Facility</div>
            <div style="padding:14px; background:#2a2a2a; font-weight:bold;">Cost</div>
            <div style="padding:14px; background:#2a2a2a; font-weight:bold;">Product</div>
            <div style="padding:14px; background:#2a2a2a; font-weight:bold;">Time</div>

            <div style="padding:16px; border-top:1px solid #3a3a3a;">
                <strong>{{ $blueprint->machine->name ?? '-' }}</strong>
            </div>

            <div style="padding:16px; border-top:1px solid #3a3a3a; display:flex; gap:14px; flex-wrap:wrap;">
                @forelse ($blueprint->materials as $material)
                    <a href="{{ $material->item ? route('items.show', $material->item) : '#' }}"
                       style="color:#f5f5f5; text-decoration:none; text-align:center;">
                        @if ($material->item?->image)
                            <img src="{{ asset('storage/' . $material->item->image) }}"
                                 alt="{{ $material->item->name }}"
                                 style="width:58px; height:58px; object-fit:contain; background:#171717; border:1px solid #3a3a3a; border-radius:12px; padding:8px;">
                        @else
                            <div style="width:58px; height:58px; display:flex; align-items:center; justify-content:center; background:#171717; border:1px solid #3a3a3a; border-radius:12px; padding:8px;">
                                ?
                            </div>
                        @endif

                        <div style="margin-top:6px; font-size:13px;">
                            {{ $material->item->name ?? 'Unknown' }}
                        </div>

                        <strong style="color:#E6EB18;">x{{ $material->amount ?? 1 }}</strong>
                    </a>
                @empty
                    <span style="color:#b0b0b0;">No material data available.</span>
                @endforelse
            </div>

            <div style="padding:16px; border-top:1px solid #3a3a3a;">
                <a href="{{ $blueprint->resultItem ? route('items.show', $blueprint->resultItem) : '#' }}"
                   style="color:#f5f5f5; text-decoration:none; text-align:center; display:inline-block;">
                    @if ($blueprint->resultItem?->image)
                        <img src="{{ asset('storage/' . $blueprint->resultItem->image) }}"
                             alt="{{ $blueprint->resultItem->name }}"
                             style="width:64px; height:64px; object-fit:contain; background:#171717; border:1px solid #3a3a3a; border-radius:12px; padding:8px;">
                    @else
                        <div style="width:64px; height:64px; display:flex; align-items:center; justify-content:center; background:#171717; border:1px solid #3a3a3a; border-radius:12px; padding:8px;">
                            ?
                        </div>
                    @endif

                    <div style="margin-top:6px; font-size:14px;">
                        {{ $blueprint->resultItem->name ?? '-' }}
                    </div>

                    <strong style="color:#E6EB18;">x1</strong>
                </a>
            </div>

            <div style="padding:16px; border-top:1px solid #3a3a3a; display:flex; align-items:center;">
                {{ $blueprint->craft_time ?? '-' }}s
            </div>
        </div>
    </section>

    <section style="display:grid; grid-template-columns:1fr 1fr; gap:22px;">
        <div style="background:#212121; border:1px solid #3a3a3a; border-radius:18px; padding:24px;">
            <h2 style="margin-top:0; color:#f5f5f5;">Production Info</h2>

            <p style="color:#b0b0b0;">Blueprint Name</p>
            <h3>{{ $blueprint->name ?? '-' }}</h3>

            <p style="color:#b0b0b0;">Required Machine</p>
            <h3>{{ $blueprint->machine->name ?? '-' }}</h3>

            <p style="color:#b0b0b0;">Blueprint ID</p>
            <h3>#{{ $blueprint->id }}</h3>
        </div>

        <div style="background:#212121; border:1px solid #3a3a3a; border-radius:18px; padding:24px;">
            <h2 style="margin-top:0; color:#f5f5f5;">Tree Crafting</h2>
            <p style="color:#b0b0b0;">
                Tree crafting belum aktif. Nanti bagian ini bisa diisi recursive recipe dari material ke product.
            </p>
        </div>
    </section>

</main>

</body>
</html>