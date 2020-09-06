@extends(tessa_view('layouts.app'))

@section('content')
    <section class="p-6 md:p-8 mt-24 flex flex-col items-center">
        <p class="text-3xl">
            REGISTER
        </p>

        <div class="bg-gray-200 w-full max-w-lg shadow-lg rounded-lg mt-2 px-4 md:px-8 pt-6">
            <form method="POST" class="text-sm">
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block text-sm font-light uppercase tracking-wider mb-2" for="name">Name</label>
                        <input class="shadow appearance-none border border-gray-200 rounded w-full py-2 px-3 bg-white text-gray-500 leading-tight focus:outline-none focus:shadow-outline" name="name" type="text" placeholder="Email" value="John Doe">
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block text-sm font-light uppercase tracking-wider mb-2" for="email">Email</label>
                        <input class="shadow appearance-none border border-gray-200 rounded w-full py-2 px-3 bg-white text-gray-500 leading-tight focus:outline-none focus:shadow-outline" name="email" type="text" placeholder="Email" value="admin@example.com">
                    </div>
                </div>

                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block text-sm font-light uppercase tracking-wider mb-2" for="password">Password</label>
                        <input class="shadow appearance-none border border-gray-200 rounded w-full py-2 px-3 bg-white text-gray-500 mb-3 leading-tight focus:outline-none focus:shadow-outline" name="password" type="password" placeholder="Password" value="password123">
                    </div>
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block text-sm font-light uppercase tracking-wider mb-2" for="password">Password Confirmation</label>
                        <input class="shadow appearance-none border border-gray-200 rounded w-full py-2 px-3 bg-white text-gray-500 mb-3 leading-tight focus:outline-none focus:shadow-outline" name="password_confirmation" type="password" placeholder="Password Confirmation" value="password123">
                    </div>
                </div>

                <div class="flex items-center justify-between my-6">
                    <button class="bg-blue-500 text-white font-light py-2 px-4 rounded shadow-lg focus:outline-none focus:shadow-outline" type="submit">Register</button>
                    <a class="inline-block align-baseline font-light text-right text-sm text-gray-500 hover:text-gray-600" href="https://starter.lartisan.dev/login">Already have an account? Login!</a>
                </div>
            </form>
        </div>
    </section>
@endsection