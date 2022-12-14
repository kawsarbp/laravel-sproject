<x-layouts :categories="$categories" >
    <x-slot name="title">Sign Up</x-slot>


    <div class="row g-5">
        <div class="col-md-8">
            <div class="bg-light py-5 rounded mb-3">
                <div class="row justify-content-center">
                    <div class="col-md-7 col-lg-8">
                        @if(session()->has('message'))
                        <div class="alert alert-{{ session('type') }}">{{ session('message') }}</div>
                        @endif
                        <h4 class="mb-3">Sign Up Form</h4>
                        <form action="{{ route('register') }}" method="POST" class="needs-validation" novalidate="">
                            @csrf
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <label for="first_name" class="form-label">First name</label>
                                    <input type="text" class="form-control " id="first_name" name="first_name" placeholder="Enter First Name" value="{{ old('first_name') }}" autofocus >
                                    @error('first_name') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-sm-6">
                                    <label for="last_name" class="form-label">Last name</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name" value="{{ old('last_name') }}">
                                    @error('last_name')  <span class="text-danger">{{ $message }} </span> @enderror
                                </div>

                                <div class="col-12">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control " id="email" placeholder="E-mail"  value="{{ old('email') }}" >
                                    @error('email')  <span class="text-danger">{{ $message }} </span> @enderror
                                </div>

                                <div class="col-12">
                                    <label for="password" class="form-label ">Password</label>
                                    <input type="password" name="password" class="form-control" id="password" placeholder="Enter Your Password">
                                    @error('password')  <span class="text-danger">{{ $message }} </span> @enderror
                                </div>

                                <div class="col-12">
                                    <label for="confirm_password" class="form-label ">Password</label>
                                    <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Enter Your Confirm Password">

                                </div>

                            </div>
                            <hr class="my-4">
                            <button class="btn btn-outline-primary" type="submit">Sign Up</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="position-sticky" style="top: 2rem;">
                <x-about></x-about>

                <x-archives></x-archives>

                <x-elsewhere></x-elsewhere>

            </div>
        </div>
    </div>
</x-layouts>
