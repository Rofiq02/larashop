@extends('layouts.global')

@section('title', 'Edit User')

@section('content')
    
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{ route('users.update', [$user->id]) }}" method="POST">
        @csrf 
        <input type="hidden" value="PUT" name="_method">

        <label for="name">Name</label>
            <input
                value="{{ $user->name }}"
                class="form-control"
                placeholder="Full Name"
                type="text"
                name="name"
                id="name" />
            
            <br>

            <label for="username">Username</label>
            <input
                value="{{ $user->username }}"
                class="form-control"
                placeholder="Username"
                type="text"
                name="username"
                id="username" 
                disabled/>

            <br>

            <label for="">Status</label>
            <br>
            <input {{$user->status == "ACTIVE" ? "checked" : ""}}
                value="ACTIVE"
                type="radio"
                class="form-control"
                id="active"
                name="status">
                <label for="active">Active</label>

            <input {{$user->status == "INACTIVE" ? "checked" : ""}}
                value="INACTIVE"
                type="radio"
                class="form-control"
                id="inactive"
                name="status">
                <label for="inactive">Inactive</label>

            <label for="">Roles</label>
            <br>
            <input
                type="checkbox"
                {{ in_array("ADMIN", json_decode($user->roles)) ? "checked" : "" }}
                name="roles[]"
                id="ADMIN"
                value="ADMIN" />
                <label for="ADMIN">Administrator</label>

            <input
                type="checkbox"
                {{ in_array("STAFF", json_decode($user->roles)) ? "checked" : "" }}
                name="roles[]"
                id="STAFF"
                value="STAFF" />
                <label for="STAFF">Staff</label>

            <input
                type="checkbox"
                {{ in_array("CUSTOMER", json_decode($user->roles)) ? "checked" : "" }}
                name="roles[]"
                id="CUSTOMER"
                value="CUSTOMER" />
                <label for="CUSTOMER">Customer</label>

            <br>
            <br>

            <label for="phone">Phone Number</label>
            <br>
            <input
                type="text"
                name="phone"
                class="form-control" />

            <br>

            <label for="address">Address</label>
            <textarea
                name="address"
                id="address"
                class="form-control">
            </textarea>

            <br>

            <label for="avatar">Avatar Image</label>
            <br>
            @if($user->avatar)
                <img src="{{ asset('storage/'.$user->avatar) }}" width="120px">
            @else
                No Avatar
            @endif
            <input
                id="avatar"
                name="avatar"
                type="file"
                class="form-control" />
            <small class="text-muted">Kosongkan jika tidak ingin merubah avatar</small>

            <hr class="my-3">

            <label for="email">Email</label>
            <input
                class="form-control"
                placeholder="user@mail.com"
                type="email"
                name="email"
                id="email" 
                disabled/>

            <br>

            <input
                class="btn btn-primary"
                type="submit"
                value="save" />
    </form>

@endsection