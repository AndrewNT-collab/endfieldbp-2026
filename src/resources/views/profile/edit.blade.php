<!DOCTYPE html>
<html>
<head>
    <title>Edit Profile</title>
</head>

<body style="
    margin:0;
    background:
        linear-gradient(rgba(40,40,40,0.55), rgba(20,20,20,0.82)),
        url('{{ asset('images/bg.jpg') }}');
    background-size:cover;
    background-position:center;
    background-attachment:fixed;
    color:#f5f5f5;
    font-family:Arial,sans-serif;
">

<nav style="
    height:64px;
    background:#E6EB18;
    display:flex;
    align-items:center;
    padding:0 34px;
    border-bottom:2px solid #111111;
">

    <div style="
        background:#1f1f1f;
        color:white;
        padding:10px 14px;
        border-radius:10px;
        font-weight:bold;
    ">
        EB
    </div>

    <strong style="
        color:#111111;
        margin-left:14px;
        font-size:18px;
    ">
        Endfield Blueprint
    </strong>

</nav>


<main style="
    max-width:900px;
    margin:auto;
    padding:40px;
">

    <section style="
        background:#212121;
        border:1px solid #3a3a3a;
        border-radius:20px;
        padding:30px;
    ">

        <h1 style="
            margin-top:0;
            font-size:36px;
        ">
            Edit Profile
        </h1>

        <form method="POST"
              action="{{ route('profile.update') }}"
              enctype="multipart/form-data">

            @csrf
            @method('PATCH')

            <!-- Avatar -->
            <div style="margin-bottom:25px;">

                <label style="
                    display:block;
                    margin-bottom:10px;
                    font-weight:bold;
                ">
                    Avatar
                </label>

                <input type="file"
                       name="avatar"

                       style="
                       width:100%;
                       background:#141414;
                       color:white;
                       border:1px solid #444;
                       padding:14px;
                       border-radius:10px;
                ">
            </div>

            <!-- Username -->
            <div style="margin-bottom:25px;">

                <label style="
                    display:block;
                    margin-bottom:10px;
                    font-weight:bold;
                ">
                    Username
                </label>

                <input type="text"
                       name="name"
                       value="{{ old('name', auth()->user()->name) }}"

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
            <div style="margin-bottom:25px;">

                <label style="
                    display:block;
                    margin-bottom:10px;
                    font-weight:bold;
                ">
                    UID
                </label>

                <input type="text"
                       name="uid"
                       value="{{ old('uid', auth()->user()->uid) }}"

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
            <div style="margin-bottom:25px;">

                <label style="
                    display:block;
                    margin-bottom:10px;
                    font-weight:bold;
                ">
                    Server
                </label>

                <select name="server"

                        style="
                        width:100%;
                        background:#141414;
                        color:white;
                        border:1px solid #444;
                        padding:14px;
                        border-radius:10px;
                ">
                    <option>Asia</option>
                    <option>America</option>
                    <option>Europe</option>
                </select>

            </div>

            <!-- Tag 1 -->
            <div style="margin-bottom:25px;">

                <label style="display:block;margin-bottom:10px;font-weight:bold;">
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
            <div style="margin-bottom:25px;">

                <label style="display:block;margin-bottom:10px;font-weight:bold;">
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

                <label style="display:block;margin-bottom:10px;font-weight:bold;">
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

            <button type="submit"

                style="
                background:#E6EB18;
                color:#111111;
                border:none;
                padding:14px 20px;
                border-radius:12px;
                font-weight:bold;
                cursor:pointer;
            ">
                Save Profile
            </button>

        </form>

    </section>

</main>

</body>
</html>
```
