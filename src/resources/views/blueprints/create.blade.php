<!DOCTYPE html>
<html>
<head>
    <title>Add Blueprint - {{ $area->name }}</title>
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

<main style="padding:36px; max-width:850px; margin:auto;">

    <a href="{{ route('areas.show', $area->slug) }}"
       style="display:inline-block; margin-bottom:22px; color:#60a5fa; text-decoration:none; font-weight:bold;">
        ← Back to {{ $area->name }}
    </a>

    <section style="background:rgba(15,23,42,0.90); border:1px solid #334155; border-radius:18px; padding:28px;">
        <p style="margin:0 0 8px; color:#94a3b8; letter-spacing:1px;">
            CREATE AREA BLUEPRINT
        </p>

        <h1 style="margin:0 0 8px; font-size:38px;">
            Add Blueprint
        </h1>

        <p style="color:#94a3b8; margin-bottom:28px;">
            Add a production blueprint into {{ $area->name }}.
        </p>

        @if ($errors->any())
            <div style="background:#7f1d1d; border:1px solid #ef4444; color:white; padding:16px; border-radius:12px; margin-bottom:22px;">
                <strong>Input error:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('blueprints.store', $area->slug) }}">
            @csrf

            <div style="margin-bottom:18px;">
                <label style="display:block; margin-bottom:8px; color:#bfdbfe;">
                    Blueprint Name
                </label>

                <input type="text" name="name" value="{{ old('name') }}" placeholder="Example: Ferrium Farm"
                       style="width:100%; padding:12px; border-radius:10px; border:1px solid #334155; background:#020617; color:white;">
            </div>

            <div style="margin-bottom:18px;">
                <label style="display:block; margin-bottom:8px; color:#bfdbfe;">
                    Result Item
                </label>

                <select name="result_item_id"
                        style="width:100%; padding:12px; border-radius:10px; border:1px solid #334155; background:#020617; color:white;">
                    <option value="">-- Select Result Item --</option>

                    @foreach ($items as $item)
                        <option value="{{ $item->id }}" {{ old('result_item_id') == $item->id ? 'selected' : '' }}>
                            {{ $item->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div style="margin-bottom:18px;">
                <label style="display:block; margin-bottom:8px; color:#bfdbfe;">
                    Machine
                </label>

                <select name="machine_id"
                        style="width:100%; padding:12px; border-radius:10px; border:1px solid #334155; background:#020617; color:white;">
                    <option value="">-- Select Machine --</option>

                    @foreach ($machines as $machine)
                        <option value="{{ $machine->id }}" {{ old('machine_id') == $machine->id ? 'selected' : '' }}>
                            {{ $machine->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div style="margin-bottom:18px;">
                <label style="display:block; margin-bottom:8px; color:#bfdbfe;">
                    Craft Time (seconds)
                </label>

                <input type="number" name="craft_time" value="{{ old('craft_time') }}" placeholder="Example: 30"
                       style="width:100%; padding:12px; border-radius:10px; border:1px solid #334155; background:#020617; color:white;">
            </div>

            <div style="margin-bottom:24px;">
                <label style="display:block; margin-bottom:8px; color:#bfdbfe;">
                    Notes
                </label>

                <textarea name="notes" rows="4" placeholder="Optional blueprint note..."
                          style="width:100%; padding:12px; border-radius:10px; border:1px solid #334155; background:#020617; color:white;">{{ old('notes') }}</textarea>
            </div>

            <button type="submit"
                    style="background:#60a5fa; color:#020617; border:none; padding:13px 18px; border-radius:10px; font-weight:bold; cursor:pointer;">
                Save Blueprint
            </button>
        </form>
    </section>

</main>

</body>
</html>