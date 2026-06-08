<!DOCTYPE html>
<html>
<head>
    <title>Add Blueprint - {{ $area->name }}</title>
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
        <div style="
            background:#1f1f1f;
            color:#f5f5f5;
            padding:10px 14px;
            border-radius:10px;
            font-weight:bold;
            border:1px solid #404040;
        ">
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
        <a href="{{ route('dashboard') }}" style="color:#111111; text-decoration:none; font-weight:700;">
            Dashboard
        </a>

        <a href="{{ route('items.index') }}" style="color:#111111; text-decoration:none;">
            Blueprint DB
        </a>

        <a href="#" style="color:#111111; text-decoration:none;">
            Map
        </a>

        <a href="#" style="color:#111111; text-decoration:none;">
            Tracker
        </a>
    </div>

</nav>

<main style="padding:36px; max-width:900px; margin:auto;">

    <a href="{{ route('areas.show', $area->slug) }}"
       style="display:inline-block; margin-bottom:22px; color:#ffffff; text-decoration:none; font-weight:bold; padding:10px 14px; border-radius:10px; border:1px solid #000000; background:#212121;">
        ← Back to {{ $area->name }}
    </a>

    <section style="background:#212121; border:1px solid #3a3a3a; border-radius:18px; padding:28px;">
        <p style="margin:0 0 8px; color:#b0b0b0; letter-spacing:1px;">
            CREATE AREA BLUEPRINT
        </p>

        <h1 style="margin:0 0 18px; font-size:42px;">
            Add Blueprint
        </h1>

        <p style="color:#b0b0b0; font-size:17px; margin-bottom:28px;">
            Add a production blueprint into {{ $area->name }}.
        </p>

        <form method="POST" action="{{ route('blueprints.store', $area->slug) }}">
            @csrf

            <div style="margin-bottom:18px;">
                <label style="display:block; margin-bottom:8px; font-weight:bold;">
                    Blueprint Name
                </label>

                <input type="text"
                       name="name"
                       value="{{ old('name') }}"
                       placeholder="Example: Ferrium Farm"
                       required
                       style="width:100%; box-sizing:border-box; padding:14px; border-radius:10px; border:1px solid #4a4a4a; background:#141414; color:#f5f5f5;">
            </div>

            <div style="margin-bottom:18px;">
                <label style="display:block; margin-bottom:8px; font-weight:bold;">
                    Result Item
                </label>

                <select name="result_item_id"
                        style="width:100%; box-sizing:border-box; padding:14px; border-radius:10px; border:1px solid #4a4a4a; background:#141414; color:#f5f5f5;">
                    <option value="">-- Select Result Item --</option>
                    @foreach ($items as $item)
                        <option value="{{ $item->id }}" @selected(old('result_item_id') == $item->id)>
                            {{ $item->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div style="margin-bottom:18px;">
                <label style="display:block; margin-bottom:8px; font-weight:bold;">
                    Machine
                </label>

                <select name="machine_id"
                        style="width:100%; box-sizing:border-box; padding:14px; border-radius:10px; border:1px solid #4a4a4a; background:#141414; color:#f5f5f5;">
                    <option value="">-- Select Machine --</option>
                    @foreach ($machines as $machine)
                        <option value="{{ $machine->id }}" @selected(old('machine_id') == $machine->id)>
                            {{ $machine->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div style="margin-bottom:18px;">
                <label style="display:block; margin-bottom:8px; font-weight:bold;">
                    Craft Time (seconds)
                </label>

                <input type="number"
                       name="craft_time"
                       value="{{ old('craft_time') }}"
                       placeholder="Example: 30"
                       style="width:100%; box-sizing:border-box; padding:14px; border-radius:10px; border:1px solid #4a4a4a; background:#141414; color:#f5f5f5;">
            </div>

            <div style="margin-bottom:24px;">
                <label style="display:block; margin-bottom:8px; font-weight:bold;">
                    Notes
                </label>

                <textarea name="notes"
                          rows="5"
                          placeholder="Optional blueprint note..."
                          style="width:100%; box-sizing:border-box; padding:14px; border-radius:10px; border:1px solid #4a4a4a; background:#141414; color:#f5f5f5;">{{ old('notes') }}</textarea>
            </div>

            <button type="submit"
                    style="background:#E6EB18; color:#111111; padding:13px 18px; border-radius:10px; border:1px solid #111111; font-weight:bold; cursor:pointer;">
                Save Blueprint
            </button>
        </form>
    </section>

</main>

</body>
</html>