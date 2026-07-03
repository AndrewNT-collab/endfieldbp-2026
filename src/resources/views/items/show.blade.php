<!DOCTYPE html>
<html>
<head>
    <title>{{ $item->name }}</title>
</head>

<body style="
margin:0;
background:#101010;
color:white;
font-family:Arial,sans-serif;
padding:40px;
">

<div style="
max-width:1400px;
margin:auto;
">

    <div style="
    display:flex;
    justify-content:space-between;
    gap:40px;
    ">

        <div style="flex:1;">

            <h1 style="
            font-size:56px;
            margin:0;
            ">
                {{ $item->name }}
            </h1>

            <p style="
            color:#E6EB18;
            font-size:20px;
            ">
                {{ $item->category }}
            </p>

            <div style="
            margin-top:30px;
            border:1px solid #E6EB18;
            padding:20px;
            border-radius:8px;
            background:#151515;
            ">
                <h3>Item Description</h3>

                <p>
                    {{ $item->description }}
                </p>
            </div>

        </div>

        <div style="
        width:320px;
        background:#181818;
        border:1px solid #444;
        padding:20px;
        text-align:center;
        ">

            @if($item->image)

                <img
                src="{{ asset('storage/'.$item->image) }}"
                style="
                width:220px;
                height:220px;
                object-fit:contain;
                ">

            @else

                <div style="
                width:220px;
                height:220px;
                background:#222;
                margin:auto;
                display:flex;
                align-items:center;
                justify-content:center;
                ">
                    No Image
                </div>

            @endif

            <hr>

            <p>
                Type:
                {{ $item->category }}
            </p>

        </div>

    </div>


    @if($item->producedBy)

    <div style="
    margin-top:50px;
    background:#151515;
    padding:25px;
    border-radius:10px;
    ">

        <h2>
            Blueprint Tree
        </h2>

        <div style="
        display:flex;
        align-items:center;
        gap:20px;
        flex-wrap:wrap;
        margin-top:30px;
        ">

            @foreach($item->producedBy->materials as $material)

                <div style="
                background:#222;
                padding:15px;
                border-radius:10px;
                ">
                    {{ $material->amount }}x
                    <br>
                    {{ $material->item->name }}
                </div>

                <div style="
                font-size:30px;
                ">
                    +
                </div>

            @endforeach

            <div style="
            font-size:50px;
            color:#E6EB18;
            ">
                ↓
            </div>

            <div style="
            background:#333;
            padding:20px;
            border-radius:10px;
            ">
                ⚙️

                <br><br>

                @if($item->producedBy->machines->count())
                    {{ $item->producedBy->machines->pluck('name')->join(', ') }}
                @endif

                <br><br>

                {{ $item->producedBy->craft_time }}s
            </div>

            <div style="
            font-size:50px;
            color:#E6EB18;
            ">
                →
            </div>

            <div style="
            background:#2a2a2a;
            padding:20px;
            border-radius:10px;
            ">
                📦
                <br><br>
                {{ $item->name }}
            </div>

        </div>

    </div>

    @else

    <div style="
    margin-top:50px;
    background:#151515;
    padding:25px;
    border-radius:10px;
    ">

        <h2>
            Acquisition
        </h2>

        <p>
            Source:
            {{ $item->source ?? '-' }}
        </p>

        <p>
            Location:
            {{ $item->location ?? '-' }}
        </p>

    </div>

    @endif

</div>

</body>
</html>