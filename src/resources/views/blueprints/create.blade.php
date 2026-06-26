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
        <a href="{{ route('items.index') }}" style="color:#111111; text-decoration:none;">Blueprint DB</a>
        <a href="{{ route('map') }}" style="color:#111111; text-decoration:none;">Map</a>
        <a href="#" style="color:#111111; text-decoration:none;">Tracker</a>
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
                    Blueprint Item
                </label>

                <input type="hidden" name="name" id="blueprintName" value="{{ old('name') }}">
                <input type="hidden" name="result_item_id" id="resultItemId" value="{{ old('result_item_id') }}">

                <div style="position:relative;">
                    <button type="button"
                            onclick="toggleItemDropdown()"
                            id="selectedItemButton"
                            style="width:100%; box-sizing:border-box; padding:14px; border-radius:10px; border:1px solid #4a4a4a; background:#141414; color:#f5f5f5; display:flex; align-items:center; gap:12px; cursor:pointer; text-align:left;">
                        <span style="color:#9ca3af;">-- Select Blueprint Item --</span>
                    </button>

                    <div id="itemDropdown"
                         style="display:none; position:absolute; z-index:20; top:58px; left:0; right:0; max-height:280px; overflow-y:auto; background:#141414; border:1px solid #4a4a4a; border-radius:10px; padding:8px;">
                        @foreach ($craftableItems as $item)
                            <button type="button"
                                    onclick="selectBlueprintItem('{{ $item->id }}', @js($item->name), '{{ $item->image ? asset('storage/' . $item->image) : '' }}')"
                                    style="width:100%; padding:10px; background:transparent; border:0; color:#f5f5f5; display:flex; align-items:center; gap:12px; cursor:pointer; text-align:left; border-radius:8px;"
                                    onmouseover="this.style.background='#212121'"
                                    onmouseout="this.style.background='transparent'">
                                @if ($item->image)
                                    <img src="{{ asset('storage/' . $item->image) }}"
                                         style="width:42px; height:42px; object-fit:contain; background:#171717; border:1px solid #3a3a3a; border-radius:8px; padding:5px;">
                                @else
                                    <div style="width:42px; height:42px; display:flex; align-items:center; justify-content:center; background:#171717; border:1px solid #3a3a3a; border-radius:8px; flex-shrink:0;">?</div>
                                @endif

                                <span>{{ $item->name }}</span>
                            </button>
                        @endforeach
                    </div>
                </div>
            </div>

            <div style="margin-bottom:24px;">
                <label style="display:block; margin-bottom:8px; font-weight:bold;">
                    Machines
                </label>

                <div id="machinesWrapper">

                    <div style="margin-bottom:12px;">
                        <select name="machines[]"
                            style="
                            width:100%;
                            box-sizing:border-box;
                            padding:14px;
                            border-radius:10px;
                            border:1px solid #4a4a4a;
                            background:#141414;
                            color:#f5f5f5;
                            ">
                            <option value="">-- Select Machine --</option>

                            @foreach ($machines as $machine)
                                <option value="{{ $machine->id }}">
                                    {{ $machine->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <button
                    type="button"
                    onclick="addMachineRow()"
                    style="
                    background:#2f2f2f;
                    color:#f5f5f5;
                    padding:10px 14px;
                    border-radius:10px;
                    border:1px solid #444;
                    font-weight:bold;
                    cursor:pointer;
                    ">
                    + Add Machine
                </button>

            </div>

            <div style="margin-bottom:24px;">
                <label style="display:block; margin-bottom:8px; font-weight:bold;">
                    Materials
                </label>

                <div id="materialsWrapper">
                    <div style="display:grid; grid-template-columns:1fr 120px; gap:12px; margin-bottom:12px;">
                        <select name="materials[0][item_id]"
                                style="width:100%; box-sizing:border-box; padding:14px; border-radius:10px; border:1px solid #4a4a4a; background:#141414; color:#f5f5f5;">
                            <option value="">-- Select Material --</option>
                            @foreach ($materialItems as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>

                        <input type="number"
                               name="materials[0][amount]"
                               min="1"
                               placeholder="Qty"
                               style="width:100%; box-sizing:border-box; padding:14px; border-radius:10px; border:1px solid #4a4a4a; background:#141414; color:#f5f5f5;">
                    </div>
                </div>

                <button type="button"
                        onclick="addMaterialRow()"
                        style="background:#2f2f2f; color:#f5f5f5; padding:10px 14px; border-radius:10px; border:1px solid #444; font-weight:bold; cursor:pointer;">
                    + Add Material
                </button>
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

<script>
function toggleItemDropdown() {
    const dropdown = document.getElementById('itemDropdown');
    dropdown.style.display = dropdown.style.display === 'none' ? 'block' : 'none';
}

function selectBlueprintItem(id, name, imageUrl) {
    document.getElementById('blueprintName').value = name;
    document.getElementById('resultItemId').value = id;

    const button = document.getElementById('selectedItemButton');

    if (imageUrl) {
        button.innerHTML = `
            <img src="${imageUrl}" style="width:42px; height:42px; object-fit:contain; background:#171717; border:1px solid #3a3a3a; border-radius:8px; padding:5px;">
            <strong>${name}</strong>
        `;
    } else {
        button.innerHTML = `
            <div style="width:42px; height:42px; display:flex; align-items:center; justify-content:center; background:#171717; border:1px solid #3a3a3a; border-radius:8px;">?</div>
            <strong>${name}</strong>
        `;
    }

    document.getElementById('itemDropdown').style.display = 'none';
}

let materialIndex = 1;

function addMaterialRow() {
    const wrapper = document.getElementById('materialsWrapper');

    const row = document.createElement('div');
    row.style = 'display:grid; grid-template-columns:1fr 120px; gap:12px; margin-bottom:12px;';

    row.innerHTML = `
        <select name="materials[${materialIndex}][item_id]"
                style="width:100%; box-sizing:border-box; padding:14px; border-radius:10px; border:1px solid #4a4a4a; background:#141414; color:#f5f5f5;">
            <option value="">-- Select Material --</option>
            @foreach ($materialItems as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>

        <input type="number"
               name="materials[${materialIndex}][amount]"
               min="1"
               placeholder="Qty"
               style="width:100%; box-sizing:border-box; padding:14px; border-radius:10px; border:1px solid #4a4a4a; background:#141414; color:#f5f5f5;">
    `;

    wrapper.appendChild(row);
    materialIndex++;
}

function addMachineRow()
{
    const wrapper = document.getElementById('machinesWrapper');

    const row = document.createElement('div');

    row.style.marginBottom = '12px';

    row.innerHTML = `
        <select name="machines[]"
            style="
            width:100%;
            box-sizing:border-box;
            padding:14px;
            border-radius:10px;
            border:1px solid #4a4a4a;
            background:#141414;
            color:#f5f5f5;
            ">
            <option value="">-- Select Machine --</option>

            @foreach ($machines as $machine)
                <option value="{{ $machine->id }}">
                    {{ $machine->name }}
                </option>
            @endforeach
        </select>
    `;

    wrapper.appendChild(row);
}

document.addEventListener('click', function(event) {
    const dropdown = document.getElementById('itemDropdown');
    const button = document.getElementById('selectedItemButton');

    if (!dropdown.contains(event.target) && !button.contains(event.target)) {
        dropdown.style.display = 'none';
    }
});
</script>

</body>
</html>