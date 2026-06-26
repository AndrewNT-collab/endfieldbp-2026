<!DOCTYPE html>
<html>
<head>
    <title>Edit Profile - Endfield Blueprint</title>
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
        <a href="{{ route('dashboard') }}" style="color:#111111; text-decoration:none;">Dashboard</a>
        <a href="{{ route('items.index') }}" style="color:#111111; text-decoration:none;">Blueprint DB</a>
        <a href="{{ route('map') }}" style="color:#111111; text-decoration:none;">Map</a>
        <a href="#" style="color:#111111; text-decoration:none;">Tracker</a>
    </div>

</nav>

<main style="max-width:700px; margin:auto; padding:40px;">

    <section style="background:#212121; border:1px solid #3a3a3a; border-radius:20px; padding:34px;">

        <h1 style="margin-top:0; font-size:28px;">Edit Profile</h1>

        @if(session('success'))
            <div style="background:#1a2e1a; border:1px solid #3a6b3a; color:#7dda7d; padding:12px 16px; border-radius:10px; margin-bottom:24px;">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST"
            action="{{ route('profile.update') }}"
            enctype="multipart/form-data">

            @csrf

            <label>Profile Photo</label>

            <!-- Avatar -->
            <div style="margin-bottom:28px;">

                <label style="display:block; margin-bottom:12px; font-weight:bold; color:#d4d4d4;">
                    Profile Photo
                </label>

                <!-- Preview foto -->
                <div style="margin-bottom:14px;">
                    @if(session('avatar'))
                        <img
                            id="avatarPreview"
                            src="{{ asset('storage/' . session('avatar')) }}"
                            style="
                                width:90px;
                                height:90px;
                                border-radius:14px;
                                object-fit:cover;
                                border:1px solid #404040;
                            ">
                    @else
                        <div id="avatarPlaceholder" style="
                            width:90px;
                            height:90px;
                            border-radius:14px;
                            background:#2a2a2a;
                            color:#d4d4d4;
                            display:flex;
                            align-items:center;
                            justify-content:center;
                            font-size:34px;
                            border:1px solid #404040;
                        ">
                            👤
                        </div>
                        <img id="avatarPreview"
                             src=""
                             style="
                                width:90px;
                                height:90px;
                                border-radius:14px;
                                object-fit:cover;
                                border:1px solid #404040;
                                display:none;
                             ">
                    @endif
                </div>

                <input
                    type="file"
                    name="avatar"
                    id="avatarInput"
                    accept="image/*"
                    onchange="previewAvatar(event)"
                    style="
                        width:100%;
                        box-sizing:border-box;
                        background:#141414;
                        color:white;
                        border:1px solid #444;
                        padding:12px;
                        border-radius:10px;
                    ">
                <small style="color:#666; margin-top:6px; display:block;">JPG, PNG, WEBP — maks 2MB</small>

            </div>

            <!-- Username -->
            <div style="margin-bottom:22px;">
                <label style="display:block; margin-bottom:10px; font-weight:bold; color:#d4d4d4;">
                    Username
                </label>
                <input type="text"
                       name="username"
                       value="{{ session('username', 'Endministrator') }}"
                       style="
                           width:100%;
                           box-sizing:border-box;
                           background:#141414;
                           color:white;
                           border:1px solid #444;
                           padding:14px;
                           border-radius:10px;
                       ">
            </div>

            <!-- UID -->
            <div style="margin-bottom:22px;">
                <label style="display:block; margin-bottom:10px; font-weight:bold; color:#d4d4d4;">
                    UID
                </label>
                <input type="text"
                       name="uid"
                       value="{{ session('uid', '100-000-000') }}"
                       style="
                           width:100%;
                           box-sizing:border-box;
                           background:#141414;
                           color:white;
                           border:1px solid #444;
                           padding:14px;
                           border-radius:10px;
                       ">
            </div>

            <!-- Server -->
            <div style="margin-bottom:22px;">
                <label style="display:block; margin-bottom:10px; font-weight:bold; color:#d4d4d4;">
                    Server
                </label>
                <select name="server" style="
                    width:100%;
                    background:#141414;
                    color:white;
                    border:1px solid #444;
                    padding:14px;
                    border-radius:10px;
                ">
                    <option {{ session('game_server') == 'Asia Server' ? 'selected' : '' }}>Asia Server</option>
                    <option {{ session('game_server') == 'America Server' ? 'selected' : '' }}>America Server</option>
                    <option {{ session('game_server') == 'Europe Server' ? 'selected' : '' }}>Europe Server</option>
                </select>
            </div>

            <!-- Tag 1 -->
            <div style="margin-bottom:22px;">
                <label style="display:block; margin-bottom:10px; font-weight:bold; color:#d4d4d4;">
                    Badge 1
                </label>
                <input type="text"
                       name="tag1"
                       value="{{ session('tag1', 'Valley IV') }}"
                       style="
                           width:100%;
                           box-sizing:border-box;
                           background:#141414;
                           color:white;
                           border:1px solid #444;
                           padding:14px;
                           border-radius:10px;
                       ">
            </div>

            <!-- Tag 2 -->
            <div style="margin-bottom:22px;">
                <label style="display:block; margin-bottom:10px; font-weight:bold; color:#d4d4d4;">
                    Badge 2
                </label>
                <input type="text"
                       name="tag2"
                       value="{{ session('tag2', 'AIC Active') }}"
                       style="
                           width:100%;
                           box-sizing:border-box;
                           background:#141414;
                           color:white;
                           border:1px solid #444;
                           padding:14px;
                           border-radius:10px;
                       ">
            </div>

            <!-- Tag 3 -->
            <div style="margin-bottom:30px;">
                <label style="display:block; margin-bottom:10px; font-weight:bold; color:#d4d4d4;">
                    Badge 3
                </label>
                <input type="text"
                       name="tag3"
                       value="{{ session('tag3', 'Patch 1.2') }}"
                       style="
                           width:100%;
                           box-sizing:border-box;
                           background:#141414;
                           color:white;
                           border:1px solid #444;
                           padding:14px;
                           border-radius:10px;
                       ">
            </div>

            <div style="display:flex; gap:12px;">
                <button type="submit" style="
                    background:#E6EB18;
                    color:#111111;
                    border:none;
                    padding:14px 24px;
                    border-radius:12px;
                    font-weight:bold;
                    font-size:15px;
                    cursor:pointer;
                ">
                    Save Profile
                </button>

                <a href="{{ route('dashboard') }}" style="
                    background:#2a2a2a;
                    color:#d4d4d4;
                    border:1px solid #444;
                    padding:14px 24px;
                    border-radius:12px;
                    font-weight:bold;
                    font-size:15px;
                    text-decoration:none;
                    display:inline-flex;
                    align-items:center;
                ">
                    Cancel
                </a>
            </div>

        </form>

    </section>

</main>

<script>
function previewAvatar(event) {
    const file = event.target.files[0];
    if (!file) return;

    const reader = new FileReader();
    reader.onload = function(e) {
        const preview = document.getElementById('avatarPreview');
        const placeholder = document.getElementById('avatarPlaceholder');

        preview.src = e.target.result;
        preview.style.display = 'block';

        if (placeholder) placeholder.style.display = 'none';
    };
    reader.readAsDataURL(file);
}
</script>

</body>
</html>