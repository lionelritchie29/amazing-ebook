@extends('_layout')

@section('title', 'Update Profile')

@section('header', __('content.update_profile'))

@section('content')
<div class="mt-8">
  <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
    <form action="{{ route('updateProfile') }}" class="space-y-6" enctype="multipart/form-data" method="POST">
      @csrf
      @method("put")

      <div class="mx-auto">
        <img class="w-auto rounded mx-auto object-contain h-48" src="{{ asset('storage' . $user->display_picture_link) }}" alt="">
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700">
          {{__('content.first_name')}}
        </label>
        <div class="mt-1">
          <input value="{{$user->first_name}}" name="first_name" type="text" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>
        @error('first_name') <small class="text-red-500">{{$message}}</small> @enderror
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700">
          {{__('content.middle_name')}}
        </label>
        <div class="mt-1">
          <input value="{{$user->middle_name ? $user->middle_name : '' }}" name="middle_name" type="text" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>
        @error('middle_name') <small class="text-red-500">{{$message}}</small> @enderror
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700">
          {{__('content.last_name')}}
        </label>
        <div class="mt-1">
          <input value="{{$user->last_name}}" name="last_name" type="text" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>
        @error('last_name') <small class="text-red-500">{{$message}}</small> @enderror
      </div>

      <div>
        <label for="email" class="block text-sm font-medium text-gray-700">
          {{__('content.email')}}
        </label>
        <div class="mt-1">
          <input value="{{$user->email}}" id="email" name="email" type="text" autocomplete="email" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>
        @error('email') <small class="text-red-500">{{$message}}</small> @enderror
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700">
          {{__('content.gender')}}
        </label>
        <div class="mt-1 flex">
          @foreach ($genders as $gender)
          <div class="mr-5">
            <input name="gender" {{ $gender->gender_id == $user->gender_id ? 'checked' : '' }} type="radio" value="{{ $gender->gender_id }}">
              {{$gender->gender_desc}}
          </div>
          @endforeach
        </div>
        @error('gender') <small class="text-red-500">{{$message}}</small> @enderror
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700">
          {{__('content.role')}}
        </label>
        <select name="role" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
          @foreach($roles as $role)
            <option {{ $role->role_id == $user->role_id ? 'selected' : '' }} value={{ $role->role_id }}>
              {{ $role->role_desc }}
            </option>
          @endforeach
        </select>
        @error('role') <small class="text-red-500">{{$message}}</small> @enderror
      </div>

      <div>
        <label for="password" class="block text-sm font-medium text-gray-700">
          {{__('content.password')}}
        </label>
        <div class="mt-1">
          <input value="{{ $user->password }}" id="password" name="password" type="password" autocomplete="current-password" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>
        @error('password') <small class="text-red-500">{{$message}}</small> @enderror
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700">
          {{__('content.display_picture')}}
        </label>
        <input type="file" name="picture">
      </div>
      @error('picture') <small class="text-red-500">{{$message}}</small> @enderror

      <div>
        <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
          {{__('content.update')}}
        </button>
      </div>
    </form>
  </div>
</div>
@endsection
