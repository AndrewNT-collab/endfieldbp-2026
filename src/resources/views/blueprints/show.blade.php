<!DOCTYPE html>
<html>
<head>
    <title>{{ $blueprint->name ?? 'Blueprint Detail' }}</title>
</head>

<body style="
    margin:0;
    background:
        linear-gradient(rgba(2,6,23,0.90), rgba(2,6,23,0.96)),
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
        <a href="{{ route('dashboard') }}" style="color:#e5e7eb; text-decoration:none;">Dashboard</a>
        <a href="{{ route('blueprints.index') }}" style="color:#60a5fa; text-decoration:none;">Blueprint DB</a>
        <a href="#" style="color:#e5e7eb; text-decoration:none;">Map</a>
        <a href="#" style="color:#e5e7eb; text-decoration:none;">Tracker</a>
    </div>
</nav>

<main style="padding:36px; max-width:1100px; margin:auto;">

    <a href="{{ url()->previous() }}"
       style="display:inline-block; margin-bottom:22px; color:#60a5fa; text-decoration:none; font-weight:bold;">
        ← Return
    </a>

    <section style="background:rgba(15,23,42,0.90); border:1px solid #334155; border-radius:18px; padding:28px; margin-bottom:26px;">
        <p style="margin:0 0 8px; color:#94a3b8;">Blueprint Result</p>

        <div style="display:flex; align-items:center; gap:22px; flex-wrap:wrap;">
            @if ($blueprint->image)
                <img src="{{ asset('storage/' . $blueprint->image) }}"
                    alt="{{ $blueprint->name }}"
                    style="width:92px; height:92px; object-fit:contain; background:rgba(2,6,23,0.70); border:1px solid #334155; border-radius:16px; padding:10px;">
            @elseif ($blueprint->resultItem?->image)
                <a href="{{ route('items.show', $blueprint->resultItem) }}">
                    <img src="{{ asset('storage/' . $blueprint->resultItem->image) }}"
                        alt="{{ $blueprint->resultItem->name }}"
                        style="width:92px; height:92px; object-fit:contain; background:rgba(2,6,23,0.70); border:1px solid #334155; border-radius:16px; padding:10px;">
                </a>
            @endif


            <div>
                <h1 style="margin:0; font-size:36px;">
                    {{ $blueprint->resultItem->name ?? $blueprint->name ?? 'Unknown Item' }}
                </h1>

                <p style="margin:8px 0 0; color:#bfdbfe;">
                    {{ $blueprint->notes ?? 'No notes available.' }}
                </p>
            </div>
        </div>

        <div style="display:flex; gap:12px; margin-top:20px; flex-wrap:wrap;">
            <span style="background:#dbeafe; color:#1e3a8a; padding:7px 12px; border-radius:999px; font-size:13px;">
                Machine: {{ $blueprint->machine->name ?? '-' }}
            </span>

            <span style="background:#e0e7ff; color:#3730a3; padding:7px 12px; border-radius:999px; font-size:13px;">
                Craft Time: {{ $blueprint->craft_time ?? '-' }} sec
            </span>

            <span style="background:#dcfce7; color:#166534; padding:7px 12px; border-radius:999px; font-size:13px;">
                Area: {{ $blueprint->area->name ?? '-' }}
            </span>
        </div>
    </section>

    <section style="background:rgba(15,23,42,0.90); border:1px solid #334155; border-radius:18px; padding:24px; margin-bottom:26px;">
        <h2 style="margin-top:0; color:#bfdbfe;">Production Recipe</h2>

        <div style="display:grid; grid-template-columns:1fr 2fr 1.5fr 0.8fr; border:1px solid #334155; border-radius:14px; overflow:hidden;">
            <div style="padding:14px; background:rgba(30,41,59,0.85); font-weight:bold;">Facility</div>
            <div style="padding:14px; background:rgba(30,41,59,0.85); font-weight:bold;">Cost</div>
            <div style="padding:14px; background:rgba(30,41,59,0.85); font-weight:bold;">Product</div>
            <div style="padding:14px; background:rgba(30,41,59,0.85); font-weight:bold;">Time</div>

            <div style="padding:16px; border-top:1px solid #334155;">
                <strong>{{ $blueprint->machine->name ?? '-' }}</strong>
            </div>

            <div style="padding:16px; border-top:1px solid #334155; display:flex; gap:14px; flex-wrap:wrap;">
                @forelse ($blueprint->materials as $material)
                    <a href="{{ $material->item ? route('items.show', $material->item) : '#' }}"
                       style="color:#e5e7eb; text-decoration:none; text-align:center;">
                        @if ($material->item?->image)
                            <img src="{{ asset('storage/' . $material->item->image) }}"
                                 alt="{{ $material->item->name }}"
                                 style="width:58px; height:58px; object-fit:contain; background:#020617; border:1px solid #334155; border-radius:12px; padding:8px;">
                        @else
                            <div style="width:58px; height:58px; display:flex; align-items:center; justify-content:center; background:#020617; border:1px solid #334155; border-radius:12px; padding:8px;">
                                ?
                            </div>
                        @endif

                        <div style="margin-top:6px; font-size:13px;">
                            {{ $material->item->name ?? 'Unknown' }}
                        </div>

                        <strong style="color:#93c5fd;">x{{ $material->amount ?? 1 }}</strong>
                    </a>
                @empty
                    <span style="color:#94a3b8;">No material data available.</span>
                @endforelse
            </div>

            <div style="padding:16px; border-top:1px solid #334155;">
                <a href="{{ $blueprint->resultItem ? route('items.show', $blueprint->resultItem) : '#' }}"
                   style="color:#e5e7eb; text-decoration:none; text-align:center; display:inline-block;">
                    @if ($blueprint->resultItem?->image)
                        <img src="{{ asset('storage/' . $blueprint->resultItem->image) }}"
                             alt="{{ $blueprint->resultItem->name }}"
                             style="width:64px; height:64px; object-fit:contain; background:#020617; border:1px solid #334155; border-radius:12px; padding:8px;">
                    @else
                        <div style="width:64px; height:64px; display:flex; align-items:center; justify-content:center; background:#020617; border:1px solid #334155; border-radius:12px; padding:8px;">
                            ?
                        </div>
                    @endif

                    <div style="margin-top:6px; font-size:14px;">
                        {{ $blueprint->resultItem->name ?? '-' }}
                    </div>

                    <strong style="color:#93c5fd;">x1</strong>
                </a>
            </div>

            <div style="padding:16px; border-top:1px solid #334155; display:flex; align-items:center;">
                {{ $blueprint->craft_time ?? '-' }}s
            </div>
        </div>
    </section>

    <section style="display:grid; grid-template-columns:1fr 1fr; gap:22px;">
        <div style="background:rgba(15,23,42,0.90); border:1px solid #334155; border-radius:18px; padding:24px;">
            <h2 style="margin-top:0; color:#bfdbfe;">Production Info</h2>

            <p style="color:#94a3b8;">Blueprint Name</p>
            <h3>{{ $blueprint->name ?? '-' }}</h3>

            <p style="color:#94a3b8;">Required Machine</p>
            <h3>{{ $blueprint->machine->name ?? '-' }}</h3>

            <p style="color:#94a3b8;">Blueprint ID</p>
            <h3>#{{ $blueprint->id }}</h3>
        </div>

        <div style="background:rgba(15,23,42,0.90); border:1px solid #334155; border-radius:18px; padding:24px;">
            <h2 style="margin-top:0; color:#bfdbfe;">Tree Crafting</h2>
            <p style="color:#94a3b8;">
                Tree crafting belum aktif. Nanti bagian ini bisa diisi recursive recipe dari material ke product.
            </p>
        </div>
    </section>

</main>

</body>
</html>