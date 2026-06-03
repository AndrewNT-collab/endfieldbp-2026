<!DOCTYPE html>
<html>
<head>
    <title>{{ $area->name }} Blueprint Area</title>
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
        <a href="{{ route('items.index') }}" style="color:#e5e7eb; text-decoration:none;">Blueprint DB</a>
        <a href="#" style="color:#e5e7eb; text-decoration:none;">Map</a>
        <a href="#" style="color:#e5e7eb; text-decoration:none;">Tracker</a>
    </div>
</nav>

<main style="padding:36px; max-width:1200px; margin:auto;">

    <a href="{{ route('dashboard') }}"
       style="display:inline-block; margin-bottom:22px; color:#60a5fa; text-decoration:none; font-weight:bold;">
        ← Back to Dashboard
    </a>

    <section style="background:rgba(15,23,42,0.90); border:1px solid #334155; border-radius:18px; padding:28px; margin-bottom:28px;">
        <div style="display:flex; justify-content:space-between; align-items:flex-start; gap:20px;">
            <div>
                <p style="margin:0 0 8px; color:#94a3b8; letter-spacing:1px;">
                    AREA BLUEPRINT STORAGE
                </p>

                <h1 style="margin:0; font-size:42px;">
                    {{ $area->name }}
                </h1>

                <p style="color:#94a3b8; font-size:18px; margin-bottom:0;">
                    {{ $area->description }}
                </p>
            </div>

            <span style="background:#dbeafe; color:#1e3a8a; padding:8px 14px; border-radius:999px; font-size:14px; font-weight:bold;">
                {{ $area->type }}
            </span>
        </div>
    </section>

    <section style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
        <div>
            <h2 style="margin:0; color:#bfdbfe;">
                Saved Blueprints
            </h2>

            <p style="margin:6px 0 0; color:#94a3b8;">
                {{ $area->blueprints->count() }} blueprint saved in this area
            </p>
        </div>

        <a href="{{ route('blueprints.create', $area->slug) }}"
           style="background:#60a5fa; color:#020617; padding:11px 16px; border-radius:10px; text-decoration:none; font-weight:bold;">
            + Add Blueprint
        </a>
    </section>

    @if ($area->blueprints->count() === 0)

        <section style="background:rgba(15,23,42,0.82); border:1px dashed #475569; border-radius:18px; padding:60px; text-align:center;">
            <h2 style="margin-top:0; font-size:30px;">
                No Blueprint Added Yet
            </h2>

            <p style="color:#94a3b8; font-size:18px;">
                This area is empty. Add your first production blueprint for {{ $area->name }}.
            </p>

            <a href="{{ route('blueprints.create', $area->slug) }}"
               style="display:inline-block; margin-top:16px; background:#60a5fa; color:#020617; padding:12px 18px; border-radius:10px; text-decoration:none; font-weight:bold;">
                + Add First Blueprint
            </a>
        </section>

    @else

        <section style="display:grid; grid-template-columns:repeat(auto-fill, minmax(360px, 1fr)); gap:20px;">

            @foreach ($area->blueprints as $blueprint)

                <div style="background:rgba(15,23,42,0.90); border:1px solid #334155; border-radius:16px; padding:22px;">
                    @if ($blueprint->image)
                        <img src="{{ asset('storage/' . $blueprint->image) }}"
                            alt="{{ $blueprint->name }}"
                            style="width:72px; height:72px; object-fit:contain; background:#020617; border:1px solid #334155; border-radius:14px; padding:8px; margin-bottom:14px;">
                    @elseif ($blueprint->resultItem?->image)
                        <img src="{{ asset('storage/' . $blueprint->resultItem->image) }}"
                            alt="{{ $blueprint->resultItem->name }}"
                            style="width:72px; height:72px; object-fit:contain; background:#020617; border:1px solid #334155; border-radius:14px; padding:8px; margin-bottom:14px;">
                    @endif

                    <h3 style="margin:0; font-size:24px;">
                        {{ $blueprint->name ?? 'Untitled Blueprint' }}
                    </h3>

                    <p style="color:#94a3b8;">
                        Result: {{ $blueprint->resultItem->name ?? 'No result item' }}
                    </p>

                    <p style="color:#94a3b8;">
                        Machine: {{ $blueprint->machine->name ?? 'No machine' }}
                    </p>

                    <a href="{{ route('blueprints.show', $blueprint->id) }}"
                       style="display:inline-block; margin-top:14px; background:#60a5fa; color:#020617; padding:9px 14px; border-radius:10px; text-decoration:none; font-weight:bold;">
                        Open Blueprint
                    </a>
                </div>

            @endforeach

        </section>

    @endif

</main>

</body>
</html>