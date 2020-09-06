@extends(tessa_view('layouts.app'))

@section('content')
    <section class="p-6 md:p-8 mt-24 flex flex-col items-center">
        <p class="text-3xl">
            LOGIN
        </p>

        <div class="bg-gray-200 w-full max-w-lg shadow-lg rounded-lg mt-2 px-4 md:px-8 pt-6">
            <form action="{{route('tessa.auth.login')}}" method="POST" class="text-sm">
                {!! csrf_field() !!}
                <div class="mb-4">
                    <label class="block text-sm font-light uppercase tracking-wider mb-2" for="email">Email</label>
                    <input class="shadow appearance-none border border-gray-200 rounded w-full py-2 px-3 bg-white leading-tight focus:outline-none focus:shadow-outline" name="email" type="text" placeholder="Email">
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-light uppercase tracking-wider mb-2" for="password">Password</label>
                    <input class="shadow appearance-none border border-gray-200 rounded w-full py-2 px-3 bg-white mb-3 leading-tight focus:outline-none focus:shadow-outline" name="password" type="password" placeholder="Password">
                </div>

                <div class="flex items-center justify-between">
                    <button class="bg-blue-500 text-white font-light py-2 px-4 rounded shadow-lg focus:outline-none focus:shadow-outline" type="submit">Sign In</button>
                    <a class="inline-block align-baseline font-light text-right text-sm" href="#">Forgot Password?</a>
                </div>

                <div class="my-6">
                    <a class="inline-block align-baseline font-light text-sm" href="https://starter.lartisan.dev/register">Don't have an account? Create one now!</a>
                </div>
            </form>
        </div>
    </section>
@endsection