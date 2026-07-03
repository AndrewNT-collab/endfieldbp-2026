<!DOCTYPE html>
<html>
<head>
    <title>Factory DB</title>
</head>

<body style="
background:#101010;
color:white;
font-family:Arial;
padding:40px;
">

<h1 style="
font-size:42px;
margin-bottom:30px;
">
Factory Database
</h1>

<div style="
display:grid;
grid-template-columns:repeat(auto-fill,100px);
gap:16px;
">

@foreach($items as $item)

<a
href="{{ route('items.show',$item) }}"
style="
width:100px;
height:100px;
background:#1a1a1a;
border:1px solid #333;
border-radius:10px;
display:flex;
align-items:center;
justify-content:center;
text-decoration:none;
overflow:hidden;
"
>

@if($item->image)

<img
src="{{ asset('storage/'.$item->image) }}"
style="
width:100%;
height:100%;
object-fit:cover;
">

@else

<div style="
font-size:12px;
text-align:center;
padding:5px;
color:white;
">
{{ $item->name }}
</div>

@endif

</a>

@endforeach

</div>

</body>
</html>