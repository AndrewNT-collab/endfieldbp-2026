<!DOCTYPE html>
<html>
<head>
    <title>Factory Blueprints</title>
</head>

<body style="
    margin:0;
    background:
        linear-gradient(rgba(2,6,23,0.92), rgba(2,6,23,0.96)),
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
        <a href="{{ route('blueprints.index') }}" style="color:#60a5fa; text-decoration:none;">Factory DB</a>
        <a href="{{ route('map') }}" style="color:#111111; text-decoration:none;">Map</a>
        <a href="{{ route('tracker.index') }}" style="color:#111111; text-decoration:none;">Tracker</a>
    </div>
</nav>

<main style="padding:36px; max-width:1350px; margin:auto;">

    <a href="{{ route('dashboard') }}"
       style="display:inline-block; margin-bottom:22px; color:#60a5fa; text-decoration:none; font-weight:bold;">
        ← Back to Dashboard
    </a>

    <section style="background:rgba(15,23,42,0.88); border:1px solid #334155; border-radius:18px; padding:28px; margin-bottom:32px;">
        <p style="margin:0 0 8px; color:#94a3b8; letter-spacing:1px;">
            FACTORY DATABASE
        </p>

        <h1 style="margin:0; font-size:42px;">
            Factory Blueprint Database
        </h1>

        <p style="color:#94a3b8; margin-bottom:0;">
            All production recipes registered in the Endfield Industry System.
        </p>
    </section>

    <section style="display:grid; grid-template-columns:repeat(auto-fill, minmax(480px, 1fr)); gap:24px;">

        @foreach ($blueprints as $blueprint)

            <div style="background:rgba(15,23,42,0.90); border:1px solid #334155; border-radius:18px; padding:24px;">

                <div style="display:flex; justify-content:space-between; gap:16px; align-items:flex-start;">
                    <div>
                        <p style="margin:0 0 6px; color:#94a3b8; font-size:13px;">
                            RESULT ITEM
                        </p>

                        <h2 style="margin:0; font-size:28px;">
                            {{ $blueprint->resultItem->name ?? 'Unknown Item' }}
                        </h2>
                    </div>

                    <span style="background:#dbeafe; color:#1e3a8a; padding:7px 12px; border-radius:999px; font-size:13px; font-weight:bold;">
                        {{ $blueprint->machines->pluck('name')->join(', ') ?: 'No Machine' }}
                    </span>
                </div>

                <div style="display:flex; gap:12px; margin-top:18px; flex-wrap:wrap;">
                    <span style="background:#1e293b; border:1px solid #334155; padding:8px 12px; border-radius:10px;">
                        ⏱ {{ $blueprint->craft_time ?? '-' }} sec
                    </span>

                    <span style="background:#1e293b; border:1px solid #334155; padding:8px 12px; border-radius:10px;">
                        📦 {{ $blueprint->materials->count() }} materials
                    </span>

                    <span style="background:#1e293b; border:1px solid #334155; padding:8px 12px; border-radius:10px;">
                        ⚙️ Efficiency 75%
                    </span>
                </div>

                <div style="background:#020617; border:1px solid #334155; border-radius:14px; padding:18px; margin-top:22px;">
                    <h3 style="margin-top:0; color:#bfdbfe;">
                        Required Materials
                    </h3>

                    @forelse ($blueprint->materials as $material)
                        <div style="display:flex; justify-content:space-between; padding:10px 0; border-bottom:1px solid #334155;">
                            <span>● {{ $material->item->name ?? 'Unknown Material' }}</span>
                            <strong>x{{ $material->amount ?? 1 }}</strong>
                        </div>
                    @empty
                        <p style="color:#94a3b8;">No materials available.</p>
                    @endforelse
                </div>

                <div style="background:#111827; border:1px solid #334155; border-radius:14px; padding:18px; margin-top:20px;">
                    <strong style="color:#38bdf8;">Production Formula</strong>

                    <div style="margin-top:12px; line-height:1.8; color:#e5e7eb;">
                        @forelse ($blueprint->materials as $material)
                            {{ $material->item->name ?? 'Unknown Material' }} x{{ $material->amount ?? 1 }}

                            @if (!$loop->last)
                                +
                            @endif
                        @empty
                            No material
                        @endforelse

                        <br><br>
                        ↓
                        <br>
                        ⚙️ {{ $blueprint->machines->pluck('name')->join(', ') ?: 'No Machine' }}
                        <br>
                        ↓
                        <br>
                        📦 {{ $blueprint->resultItem->name ?? 'Unknown Item' }}
                    </div>
                </div>

                <div style="margin-top:22px;">
                    <div style="width:100%; height:8px; background:#1e293b; border-radius:999px; overflow:hidden;">
                        <div style="width:75%; height:100%; background:#38bdf8;"></div>
                    </div>

                    <p style="color:#94a3b8; margin-top:8px; font-size:13px;">
                        Factory efficiency simulation: 75%
                    </p>
                </div>

                <div style="margin-top:22px; display:flex; gap:10px; flex-wrap:wrap;">
                    <a href="{{ route('blueprints.show', $blueprint->id) }}"
                       style="background:#60a5fa; color:#020617; padding:10px 15px; border-radius:10px; text-decoration:none; font-weight:bold;">
                        View Detail
                    </a>

                    <a href="#"
                       style="background:#334155; color:#e5e7eb; padding:10px 15px; border-radius:10px; text-decoration:none; font-weight:bold;">
                        Track Production
                    </a>
                </div>

            </div>

        @endforeach

    </section>

</main>

</body>
</html>