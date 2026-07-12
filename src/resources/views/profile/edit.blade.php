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
    justify-content:space-between;
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
    
    <div
        style="
            display:flex;
            align-items:center;
            gap:14px;
            z-index:2;
            flex-shrink:0;
        "
    >
        <img
            src="{{ asset('images/HG.webp') }}"
            alt="Hypergryph"
            style="
                width:48px;
                height:48px;
            "
        >

        <div
            style="
                display:flex;
                flex-direction:column;
                line-height:1.1;
            "
        >
            <span
                style="
                    font-size:18px;
                    font-weight:700;
                    color:#111111;
                "
            >
                Endfield Industries
            </span>

            <span
                style="
                    font-size:11px;
                    color:#444;
                    letter-spacing:1px;
                    text-transform:uppercase;
                "
            >
                Endfield Factory Blueprint System
            </span>
        </div>
    </div>

<!-- Navigation -->
    <div
        style="
            display:flex;
            align-items:center;
            gap:34px;
            margin-left:400px;
            z-index:2;
        "
    >
        <a href="{{ route('dashboard') }}"
            style="color:#111111; text-decoration:none; font-weight:700; text-shadow:-1px -1px 0 #fff100, 1px -1px 0 #fff100, -1px 1px 0 #fff100, 1px 1px 0 #fff100;">
            Dashboard
        </a>

        <a href="{{ route('items.index') }}"
            style="color:#111111; text-decoration:none; text-shadow:-1px -1px 0 #fff100, 1px -1px 0 #fff100, -1px 1px 0 #fff100, 1px 1px 0 #fff100;">
            Factory DB
        </a>

        <a href="{{ route('map') }}"
            style="color:#111111; text-decoration:none; text-shadow:-1px -1px 0 #fff100, 1px -1px 0 #fff100, -1px 1px 0 #fff100, 1px 1px 0 #fff100;">
            Map
        </a>

        <a href="{{ route('tracker.index') }}"
            style="
                color:#111111;
                text-decoration:none;
                background:#E6EB18;
                padding:0 10px;
                position:relative;
                z-index:2;
            ">
            Tracker
        </a>
        </div>

    @auth
    <div style="margin-left:auto; position:relative; z-index:2;">
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit"
                style="
                    background:#dc2626;
                    color:white;
                    border:none;
                    padding:10px 18px;
                    border-radius:10px;
                    cursor:pointer;
                    font-weight:bold;
                ">
                Logout
            </button>
        </form>
    </div>
    @endauth

</nav>

<main style="max-width:700px; margin:auto; padding:40px;">

    @guest
    <section style="
    background:#212121;
    border:1px solid #3a3a3a;
    border-radius:20px;
    padding:40px;
    text-align:center;
    ">

        <h2>Login Required</h2>

        <p style="color:#9ca3af;">
            Login using Discord to edit your Endfield profile.
        </p>

        <a href="{{ route('discord.login') }}"
        style="
                background:#5865F2;
                color:white;
                text-decoration:none;
                padding:14px 26px;
                border-radius:12px;
                font-weight:bold;
                display:inline-block;
        ">
            Login with Discord
        </a>

    </section>

    @else

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

            <!-- Avatar -->
            <div style="margin-bottom:28px;">

                @php
                    $avatar = auth()->user()->avatar_url
                        ? asset('storage/' . auth()->user()->avatar_url)
                        : auth()->user()->discord_avatar;
                @endphp

                <label style="
                    display:block;
                    margin-bottom:12px;
                    font-weight:bold;
                    color:#d4d4d4;
                ">
                    Profile Photo
                </label>

                <img
                    id="avatarPreview"
                    src="{{ $avatar }}"
                    style="
                        width:96px;
                        height:96px;
                        border-radius:18px;
                        object-fit:cover;
                        cursor:pointer;
                        border:1px solid #444;
                        margin-bottom:14px;
                        transition:.2s;
                    "
                    onmouseover="this.style.borderColor='#E6EB18';this.style.transform='scale(1.05)'"
                    onmouseout="this.style.borderColor='#444';this.style.transform='scale(1)'"
                >

                <input
                    type="file"
                    id="avatarInput"
                    name="avatar"
                    accept="image/*"
                    style="
                        width:100%;
                        box-sizing:border-box;
                        background:#141414;
                        color:white;
                        border:1px solid #444;
                        padding:12px;
                        border-radius:10px;
                    "
                >

                <small style="color:#666;">
                    JPG, PNG, WEBP — maks 2MB
                </small>

            </div>

            <!-- Display -->
            <div style="margin-bottom:22px;">

                <label style="display:block; margin-bottom:10px; font-weight:bold; color:#d4d4d4;">
                    Display Name
                </label>

                <input
                    type="text"
                    name="display_name"
                    value="{{ old('display_name', auth()->user()->display_name) }}"
                    style="
                        width:100%;
                        box-sizing:border-box;
                        background:#141414;
                        color:white;
                        border:1px solid #444;
                        padding:14px;
                        border-radius:10px;
                        margin-bottom:18px;
                    "
                >

                <label style="display:block; margin-bottom:10px; font-weight:bold; color:#d4d4d4;">
                    Username
                </label>

                <input
                    type="text"
                    value="@{{ auth()->user()->discord_username }}"
                    readonly
                    style="
                        width:100%;
                        box-sizing:border-box;
                        background:#1a1a1a;
                        color:#9ca3af;
                        border:1px solid #444;
                        padding:14px;
                        border-radius:10px;
                        cursor:not-allowed;
                    "
                >

            </div>

            <!-- UID -->
            <div style="margin-bottom:22px;">

                <label style="display:block; margin-bottom:10px; font-weight:bold; color:#d4d4d4;">
                    UID
                </label>

                <input
                    type="text"
                    value="{{ auth()->user()->uid }}"
                    readonly
                    style="
                        width:100%;
                        box-sizing:border-box;
                        background:#1a1a1a;
                        color:#9ca3af;
                        border:1px solid #444;
                        padding:14px;
                        border-radius:10px;
                        cursor:not-allowed;
                    "
                >

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
                    <option value="Asia Server"
                    {{ old('server', auth()->user()->server) == 'Asia Server' ? 'selected' : '' }}>
                        Asia Server
                    </option>

                    <option value="America Server"
                    {{ old('server', auth()->user()->server) == 'America Server' ? 'selected' : '' }}>
                        America Server
                    </option>

                    <option value="Europe Server"
                    {{ old('server', auth()->user()->server) == 'Europe Server' ? 'selected' : '' }}>
                        Europe Server
                    </option>

                </select>
            </div>

            <!-- Tag 1 -->
            <div style="margin-bottom:22px;">
                <label style="display:block; margin-bottom:10px; font-weight:bold; color:#d4d4d4;">
                    Badge 1
                </label>
                <input type="text"
                       name="tag1"
                       value="{{ old('tag1', auth()->user()->tag1) }}"
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
                       value="{{ old('tag2', auth()->user()->tag2) }}"
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
                       value="{{ old('tag3', auth()->user()->tag3) }}"
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

    @endguest
    

</main>

<div id="avatarModal"
style="
display:none;
position:fixed;
inset:0;
background:rgba(0,0,0,.85);
z-index:99999;
justify-content:center;
align-items:center;
">

    <img id="avatarModalImg"
    style="
        max-width:80vw;
        max-height:80vh;
        border-radius:20px;
        border:2px solid #E6EB18;
    ">

</div>

<script>

const input = document.getElementById('avatarInput');
const preview = document.getElementById('avatarPreview');

const modal = document.getElementById('avatarModal');
const modalImg = document.getElementById('avatarModalImg');

input.addEventListener('change', function(){

    const file = this.files[0];

    if(!file) return;

    preview.src = URL.createObjectURL(file);

});

preview.addEventListener('click', function(){

    modal.style.display = 'flex';
    modalImg.src = preview.src;

});

modal.addEventListener('click', function(){

    modal.style.display = 'none';

});

</script>

</body>
</html>