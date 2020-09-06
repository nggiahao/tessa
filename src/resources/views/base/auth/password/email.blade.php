@extends(tessa_view('layouts.app'))

@section('content')
    <section class="p-6 md:p-8 mt-24 flex flex-col items-center">
        <p class="text-3xl">
            RESET PASSWORD
        </p>

        <div class="bg-gray-200 w-full max-w-lg shadow-lg rounded-lg mt-2 px-4 md:px-8 pt-6">
            <form method="POST" class="text-sm">
                <div class="mb-4">
                    <label class="block text-sm font-light uppercase tracking-wider mb-2" for="email">E-mail address</label>
                    <input class="shadow appearance-none border border-gray-200 rounded w-full py-2 px-3 bg-white leading-tight focus:outline-none focus:shadow-outline" name="email" type="text" placeholder="Email">
                </div>

                <div class="flex items-center justify-between">
                    <button class="bg-blue-500 text-white font-light py-2 px-4 rounded shadow-lg focus:outline-none focus:shadow-outline" type="submit">
                        Send Password Reset Link
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection