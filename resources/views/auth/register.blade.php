<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>register</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!----css3---->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

</head>

<body>
    <div class="m-5">

        <!--Errors_any-->
        <x-errors />

        <!--form_create_account-->
        <form action="{{ route('register') }}" method="post">
            @csrf

            <x-form.text name="name" type="text" label="Name" />

            <x-form.text name="email" type="email" label="Email" />

            <x-form.text name="password" type="password" label="Password" />

            <x-form.text name="phone" type="tel" label="Phone" />

            <x-form.text name="age" type="number" label="Age" />

            <x-form.select name="gender" :options="['male', 'faminine']" />

            <x-form.text name="address" type="text" label="Address" />

            <button type="submit" class="btn btn-primary">save</button>
        </form>
    </div>

</body>

</html>
