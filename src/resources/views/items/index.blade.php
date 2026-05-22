<!DOCTYPE html>
<html>
<head>
    <title>Endfield Blueprint System</title>
</head>

<body style="background:#0f172a; color:white; font-family:sans-serif; padding:40px;">

    <h1 style="font-size:40px; margin-bottom:30px;">
        Endfield Factory Blueprint System
    </h1>

    @foreach ($items as $item)

        <a href="{{ route('items.show', $item) }}" style="
            display:block;
            background:#1e293b;
            padding:20px;
            border-radius:12px;
            margin-bottom:20px;
            color:white;
            text-decoration:none;
        ">

            <h2 style="font-size:28px;">
                {{ $item->name }}
            </h2>

            <p>
                {{ $item->category }}
            </p>

            <p style="margin-top:10px;">
                {{ $item->description }}
            </p>

            <p style="margin-top:10px; color:#94a3b8;">
                Source: {{ $item->source }}
            </p>

            <p style="color:#94a3b8;">
                Location: {{ $item->location }}
            </p>

        </a>

    @endforeach

</body>
</html>