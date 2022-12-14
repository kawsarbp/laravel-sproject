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
                        <h4 class="mb-3">Sign In Form</h4>
                        <form action="{{ route('login') }}" method="POST" class="needs-validation" novalidate="">
                            @csrf
                            <div class="row g-3">
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

                            </div>
                            <hr class="my-4">
                            <button class="btn btn-outline-primary" type="submit">Sign In</button>
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
