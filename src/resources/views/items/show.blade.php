<!DOCTYPE html>
<html>
<head>
    <title>{{ $item->name }}</title>
</head>

<body style="
margin:0;
padding:40px;
font-family:Arial,sans-serif;
color:white;

background:
radial-gradient(circle at top right,
rgba(230,235,24,.06),
transparent 35%),
linear-gradient(
180deg,
#1b1b1b 0%,
#111111 45%,
#0a0a0a 100%
);
">

<div style="
position:fixed;
top:0;
left:0;
width:100%;
height:4px;
background:#E6EB18;
box-shadow:0 0 18px rgba(230,235,24,.45);
z-index:999;
"></div>

<div style="
position:fixed;
inset:0;
pointer-events:none;
opacity:.025;
background:
repeating-linear-gradient(
-45deg,
#fff100 0px,
#fff100 24px,
transparent 24px,
transparent 56px
);
z-index:0;
"></div>

<div style="
max-width:1400px;
margin:auto;
position:relative;
z-index:2;
">
    <a href="{{ route('items.index') }}"
    style="
    display:inline-block;
    margin-bottom:30px;
    padding:12px 24px;
    background:#1b1b1b;
    color:white;
    text-decoration:none;
    border:1px solid #333;
    border-radius:12px;
    transition:.2s;
    ">
        ← Return
    </a>

    <div style="
    display:flex;
    justify-content:space-between;
    gap:40px;
    ">

        <div style="flex:1;">

            <h1 style="
            font-size:72px;
            font-weight:700;
            margin:0;
            letter-spacing:-2px;
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
            margin-top:40px;
            border:1px solid #d9ff00;
            padding:28px;
            border-radius:16px;
            background:#111;
            min-height:120px;
            ">
                <h3>Item Description</h3>

                <p>
                    {{ $item->description }}
                </p>
            </div>

        </div>

        <div style="
        width:350px;
        background:#111;
        border:1px solid #333;
        padding:24px;
        text-align:center;
        border-radius:12px;
        box-shadow:0 0 20px rgba(0,0,0,.4);
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
    margin-top:60px;
    background:#111;
    padding:30px;
    border-radius:20px;
    border:1px solid #222;
    ">

        <h2 style="
        font-size:32px;
        margin-bottom:30px;
        ">
            Blueprint Tree
        </h2>

        <div style="
        overflow-x:auto;
        padding-bottom:20px;
        ">

            <div style="
            display:flex;
            align-items:center;
            gap:30px;
            min-width:max-content;
            ">

                {{-- Materials --}}
                @foreach($item->producedBy->materials as $material)

                    <div style="
                    width:180px;
                    height:170px;
                    background:linear-gradient(
                        180deg,
                        #242424,
                        #171717
                    );
                    border:1px solid #353535;
                    border-radius:18px;
                    display:flex;
                    flex-direction:column;
                    justify-content:center;
                    align-items:center;
                    box-shadow:0 0 25px rgba(0,0,0,.5);
                    ">

                        @if($material->item->image)
                            <img
                            src="{{ asset('storage/'.$material->item->image) }}"
                            style="
                            width:60px;
                            height:60px;
                            object-fit:contain;
                            margin-bottom:10px;
                            ">
                        @endif

                        <div style="
                        font-size:26px;
                        font-weight:bold;
                        color:#E6EB18;
                        ">
                            {{ $material->amount }}x
                        </div>

                        <div style="
                        margin-top:8px;
                        text-align:center;
                        font-size:18px;
                        ">
                            {{ $material->item->name }}
                        </div>

                    </div>

                    @if(!$loop->last)
                        <div style="
                        font-size:70px;
                        font-weight:bold;
                        color:#E6EB18;
                        ">
                            +
                        </div>
                    @endif

                @endforeach

                {{-- Arrow --}}
                <div style="
                font-size:70px;
                font-weight:bold;
                color:#E6EB18;
                text-shadow:
                0 0 15px rgba(230,235,24,.4);
                ">
                    ➜
                </div>

                {{-- Machine --}}
                <div style="
                width:240px;
                height:190px;
                background:linear-gradient(
                    180deg,
                    #303030,
                    #1f1f1f
                );
                border:1px solid #444;
                border-radius:20px;
                display:flex;
                flex-direction:column;
                justify-content:center;
                align-items:center;
                box-shadow:
                0 0 30px rgba(0,0,0,.5);
                ">

                @php
                    $machine = $item->producedBy->machines->first();
                @endphp

                    @if($machine && $machine->image)
                        <img
                        src="{{ asset('storage/'.$machine->image) }}"
                        style="
                        width:70px;
                        height:70px;
                        object-fit:contain;
                        margin-bottom:10px;
                        ">
                    @else
                        <div style="
                        font-size:42px;
                        margin-bottom:10px;
                        ">
                            🏭
                        </div>
                    @endif

                    <div style="
                    font-size:22px;
                    font-weight:bold;
                    text-align:center;
                    ">
                        {{ $item->producedBy->machines->pluck('name')->join(', ') }}
                    </div>

                    <div style="
                    margin-top:12px;
                    color:#bbb;
                    ">
                        {{ $item->producedBy->craft_time }} sec
                    </div>

                </div>

                {{-- Arrow --}}
                <div style="
                font-size:70px;
                color:#E6EB18;
                ">
                    ➜
                </div>

                {{-- Result --}}
                <div style="
                width:220px;
                height:170px;
                background:linear-gradient(
                    180deg,
                    #2d2d2d,
                    #1f1f1f
                );
                border:1px solid #555;
                border-radius:18px;
                display:flex;
                flex-direction:column;
                justify-content:center;
                align-items:center;
                box-shadow:0 0 25px rgba(0,0,0,.5);
                ">

                    @if($item->image)
                        <img
                        src="{{ asset('storage/'.$item->image) }}"
                        style="
                        width:70px;
                        height:70px;
                        object-fit:contain;
                        margin-bottom:10px;
                        ">
                    @endif

                    <div style="
                    font-size:22px;
                    font-weight:bold;
                    text-align:center;
                    ">
                        {{ $item->name }}
                    </div>

                </div>

            </div>

        </div>

    </div>

    @else

    <div style="
    margin-top:50px;
    background:linear-gradient(
    180deg,
    #111111,
    #0b0b0b
    );
    padding:35px;
    border-radius:20px;
    border:1px solid #252525;
    box-shadow:0 0 30px rgba(0,0,0,.5);
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