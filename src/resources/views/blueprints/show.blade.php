<!DOCTYPE html>
<html>
<head>
    <title>Blueprint Detail</title>
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

<main style="padding:36px; max-width:1000px; margin:auto;">

    <a href="{{ route('blueprints.index') }}"
       style="display:inline-block; margin-bottom:22px; color:#60a5fa; text-decoration:none; font-weight:bold;">
        ← Back to Blueprint DB
    </a>

    <section style="background:rgba(15,23,42,0.90); border:1px solid #334155; border-radius:18px; padding:28px; margin-bottom:26px;">
        <p style="margin:0 0 8px; color:#94a3b8;">Blueprint Result</p>

        <h1 style="margin:0; font-size:34px;">
            {{ $blueprint->resultItem->name ?? 'Unknown Item' }}
        </h1>

        <div style="display:flex; gap:12px; margin-top:18px; flex-wrap:wrap;">
            <span style="background:#dbeafe; color:#1e3a8a; padding:7px 12px; border-radius:999px; font-size:13px;">
                Machine: {{ $blueprint->machine->name ?? '-' }}
            </span>

            <span style="background:#e0f2fe; color:#075985; padding:7px 12px; border-radius:999px; font-size:13px;">
                Output: {{ $blueprint->output_qty ?? 1 }}
            </span>

            <span style="background:#e0e7ff; color:#3730a3; padding:7px 12px; border-radius:999px; font-size:13px;">
                Craft Time: {{ $blueprint->craft_time ?? '-' }} sec
            </span>
        </div>
    </section>

    <section style="display:grid; grid-template-columns:1fr 1fr; gap:22px;">

        <div style="background:rgba(15,23,42,0.90); border:1px solid #334155; border-radius:18px; padding:24px;">
            <h2 style="margin-top:0; color:#bfdbfe;">Production Info</h2>

            <p style="color:#94a3b8;">Result Item</p>
            <h3>{{ $blueprint->resultItem->name ?? '-' }}</h3>

            <p style="color:#94a3b8;">Required Machine</p>
            <h3>{{ $blueprint->machine->name ?? '-' }}</h3>

            <p style="color:#94a3b8;">Blueprint ID</p>
            <h3>#{{ $blueprint->id }}</h3>
        </div>

        <div style="background:rgba(15,23,42,0.90); border:1px solid #334155; border-radius:18px; padding:24px;">
            <h2 style="margin-top:0; color:#bfdbfe;">Required Materials</h2>

            @forelse ($blueprint->materials as $material)
                <div style="display:flex; justify-content:space-between; padding:12px 0; border-bottom:1px solid #334155;">
                    <span>● {{ $material->item->name ?? 'Unknown Material' }}</span>
                    <strong>x{{ $material->quantity ?? 1 }}</strong>
                </div>
            @empty
                <p style="color:#94a3b8;">No material data available.</p>
            @endforelse
        </div>

    </section>

</main>

</body>
</html>