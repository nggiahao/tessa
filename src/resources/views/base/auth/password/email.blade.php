@extends(tessa_view('layouts.app'))

@section('main')
    <div class="flex flex-col flex-auto justify-center items-center">
        <div class="text-center w-full max-w-full md:max-w-md p-6 overflow-hidden relative">
            <div class="mb-16">
                <h3 class="text-2xl font-bold mb-2">Forgotten Password ?</h3>
                <p class="opacity-75 text-sm">Enter your email to reset your password:</p>
            </div>
            <form method="POST" action="{{route('tessa.auth.login')}}" class="mb-6">
                @csrf
                <div class="mb-6">
                    <input class="bg-gray-200 border-gray-200 leading-4 shadow-none outline-none block w-full px-8 py-4"
                           type="text" placeholder="Email" name="email" required>
                </div>

                <div class="mb-6">
                    <button type="submit" class="text-center border text-white rounded-lg bg-primary px-8 py-4">Request
                    </button>
                </div>
            </form>
            <div>
                <a href="{{url('admin/register')}}" class="hover:font-bold hover:text-primary">Register</a>
                /
                <a href="{{url('admin/login')}}" class="hover:font-bold hover:text-primary">Login</a>
            </div>
        </div>
    </div>
@endsection