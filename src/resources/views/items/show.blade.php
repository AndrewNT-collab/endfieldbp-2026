<!DOCTYPE html>
<html>
<head>
    <title>{{ $item->name }}</title>
</head>

<body style="background:#0f172a; color:white; font-family:sans-serif; padding:40px;">

    <a href="{{ route('items.index') }}" style="color:#38bdf8; text-decoration:none;">
        ← Back to Items
    </a>

    <div style="
        background:#1e293b;
        padding:30px;
        border-radius:16px;
        margin-top:25px;
        max-width:700px;
    ">

        <h1 style="font-size:42px; margin-bottom:10px;">
            {{ $item->name }}
        </h1>

        <p style="color:#94a3b8; font-size:18px;">
            Category: {{ $item->category }}
        </p>

        <hr style="border-color:#334155; margin:25px 0;">

        <p style="font-size:18px; line-height:1.7;">
            {{ $item->description }}
        </p>

        <p style="margin-top:25px;">
            <strong>Source:</strong> {{ $item->source }}
        </p>

        <p>
            <strong>Location:</strong> {{ $item->location }}
        </p>

    </div>

</body>
</html>