@extends(tessa_view('layouts.app'))

@section('main')
    <div class="flex flex-col flex-auto justify-center items-center">
        <div class="text-center w-full max-w-full md:max-w-md p-6 overflow-hidden relative">
            <div class="mb-16">
                <h3 class="text-2xl font-bold mb-2">Login To Admin</h3>
                <p class="opacity-75 text-sm">Enter your details to login to your account:</p>
            </div>
            <form method="POST" action="{{route('tessa.auth.login')}}" class="mb-6">
                @csrf
                <div class="mb-6">
                    <input class="bg-gray-200 border-gray-200 leading-4 shadow-none outline-none block w-full px-8 py-4"
                           type="text" placeholder="Email" name="email" required>
                </div>
                <div class="mb-6">
                    <input class="bg-gray-200 border-gray-200 leading-4 shadow-none outline-none block w-full px-8 py-4"
                           type="password" placeholder="Password" name="password" required>
                </div>
                <div class="flex mb-6">
                    <label class="w-1/2 text-left">
                        <input class="form-checkbox border-gray-500" type="checkbox">
                        <span>Remember me</span>
                    </label>
                    <div class="w-1/2 text-right">
                        <a href="{{url('admin/password/reset')}}" class="text-right hover:font-bold hover:text-primary">Forget Password?</a>
                    </div>
                </div>
                <div class="mb-6">
                    <button type="submit" class="text-center leading-4 text-white rounded-large bg-gradient-primary px-8 py-4">Login
                    </button>
                </div>
            </form>
            <div>
                <span class="mr-3">Don't have an account yet?</span>
                <a href="{{url('admin/register')}}" class="text-right hover:font-bold hover:text-primary">Register</a>
            </div>
        </div>
    </div>
@endsection