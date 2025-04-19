<h2>Login Form</h2>

@if ($errors->any())
    <ul>
        @foreach ($errors->all as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="/form" method="POST" enctype="multipart/form-data">
    @csrf

    <input type="text" name="name" value="{{ old('name') }}" placeholder="Name">
    @error('name')
        <p style="color: red">{{ $message }}</p>
    @enderror
    <br>

    <input type="email" name="email" value="{{ old('email') }}" placeholder="Email">
    @error('email')
        <p style="color:red">{{ $message }}</p>
    @enderror
    <br>

    <input type="password" name="password" placeholder="Password">
    @error('password')
        <p style="color:red">{{ $message }}</p>
    @enderror
    <br>

    <input type="password" name="conform_password" placeholder="conform password"><br>
    @error('conform_password')
        <p style="color:red">{{ $message }}</p>
    @enderror


    <img style="width: 120px; height: 120px" src="{{ session('user_form.profile_image') }}" alt=""><br>

    <input type="file" name="profile_image" id="">
    @error('profile_image')
        <p style="color:red">{{ $message }}</p>
    @enderror
    <br>


    <button type="submit">Register</button>
</form>
<ul>
    @if (!empty(session('user_form')))
        <div>
            @foreach (session('user_form') as $data)
                <li>{{ $data }}</li>
            @endforeach
        </div>
    @endif


</ul>
