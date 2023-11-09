@extends('layouts.location')
@section('content')
        @if(auth()->user()->hasRole('admin'))
        <h2 class="text-white"><a href="/users" style="color:rgb(199,0,0)"><i class="fa-solid fa-arrow-left"></i></a> </h2>
        @endif
    <form action="/UpdateUser" method="post">
    <table class="table w-100 my-5">
        <tr>
            <th class="text-white">
                Nom complet : 
            </th>
            <th>
                <input type="text" name="name" id="name" value = "{{$user->name}}" class="form-control">
            </th>
        </tr>
        <tr>
            <th class="text-white">
                Email : 
            </th>
            <th>
                <input type="email" name="email" id="email" value = "{{$user->email}}" class="form-control">
            </th>
        </tr>
        <tr>
            <th class="text-white">
                Role : 
            </th>
            <th>
            <select name="role" id="role" class="form-control">
                    <option value="1">Admin</option>
                    <option value="3">Commercial</option>
                </select>
            </th>
        </tr>
        <tr>
            <th class="text-white">
                Password : 
            </th>
            <th>
                <a href="/restorePassword/{{$user->id}}" class="btn btn-danger w-50">Reset</a>
            </th>
        </tr>
    </table>
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <input type="hidden" name="id" value="{{$user->id}}">

    <input type="submit" value="Modifier" class="btn btn-info w-100">
    </form>

@if(session()->has('success'))
<div class="alert alert-success my-5" onclick="hide(this)" role="alert">
        {{ session()->get('success') }}
</div>
@endif

<script>
     var active = document.getElementById('users');
        active.classList.add('activer');
        function hide(smp){
        smp.setAttribute('hidden',true);
    }
</script>
@endsection