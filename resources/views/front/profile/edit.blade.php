<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit-Profile</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!----css3---->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

</head>

<body>
    <div class="m-5">
        <!--Errors_any-->
        <x-errors />
        <x-alert type="success" />

        <form action="{{ route('front.profile.update') }}" method="post">
            @csrf
            @method('patch')

            <x-form.text name="name" type="text" label="Name"
            value="{{ $user->patient->name }}" />

            <x-form.text name="phone" type="tel" label="Phone"
            value="{{ $user->patient->phone }}" />

            <x-form.text name="date_of_birth" type="date" label="Date of birth"
            value="{{ $user->patient->date_of_birth }}" />

            <x-form.select name="gender" :options="['male', 'faminine']"
            value="{{ $user->patient->gender }}" />

            <x-form.text name="address" type="text" label="Address"
            value="{{ $user->patient->address }}" />

            <button type="submit" class="btn btn-primary">Edit Save</button>

        </form>
    </div>

</body>
</html>
