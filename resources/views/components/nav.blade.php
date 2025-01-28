@props([])


<div class="sidebar-header mt-4">
    <h3 class="flex items-center">
        @if ($user_role === 'admin')
            <img src="{{ asset('img/logo.jpg') }}" style="border-radius: 50px;" class="img-fluid rounded-full mr-3" />
            <span> admin.{{ $user_name }}</span>
        @else
            <img src="{{ asset('img/logo1.png') }}" style="border-radius: 50px;" class="img-fluid rounded-full mr-3" />
            <span> dr.{{ $user_name }}</span>
        @endif
        <br>

    </h3>
</div>
<br>
<hr style="background-color: #fff">

<ul class="list-unstyled component m-0">

    @foreach ($items as $item)
        @if ($item['title'] === 'Admins' && $user_role === 'admin')
        @else
            @if ($item['title'] === 'Records')
                <li>
                    <input type="checkbox" id="menu1" style="display: none;">
                    <label for="menu1" class="record"><i class="bi bi-list icon_list"></i>record</label>
                    <ul>
                        <li><a href="{{ route('appointment.record') }}"><i class="material-icons">looks_one</i>Appoitments</a></li>
                        <li><a href="{{ route('patients.index') }}"><i class="material-icons">looks_two</i>Patients</a></li>
                    </ul>
                </li>
            @else
                <li class="{{ $active == $item['route'] ? 'active' : '' }}">
                    <a href="{{ route($item['route']) }}" class=""><i
                            class="material-icons">{{ $item['icon'] }}</i>{{ $item['title'] }}</a>
                </li>
            @endif
        @endif
    @endforeach

</ul>
