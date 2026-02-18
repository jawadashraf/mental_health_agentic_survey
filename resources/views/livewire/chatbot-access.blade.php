<div class="min-h-screen flex flex-col items-center justify-center bg-gray-50 dark:bg-gray-900 px-4">
    <div
        class="max-w-md w-full bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-8 border border-gray-100 dark:border-gray-700">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">Restricted Access</h1>
            <p class="text-gray-600 dark:text-gray-400">Please enter the access code to use the chatbots.</p>
        </div>

        <form wire:submit="verify" class="space-y-6">
            <div>
                <label for="code" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Access Code
                </label>
                <input wire:model="code" type="password" id="code"
                    class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-200 outline-none"
                    placeholder="••••••" autofocus>
                @error('code')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 px-4 rounded-xl shadow-lg hover:shadow-xl transition duration-200 flex items-center justify-center space-x-2">
                <span>Grant Access</span>
                <svg wire:loading.remove wire:target="verify" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                    viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                        clip-rule="evenodd" />
                </svg>
                <svg wire:loading wire:target="verify" class="animate-spin h-5 w-5 text-white"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor"
                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                    </path>
                </svg>
            </button>
        </form>

        <div class="mt-8 pt-8 border-t border-gray-100 dark:border-gray-700 text-center">
            <p class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-4">Or scan with your phone</p>
            <div class="inline-block p-3 bg-white rounded-2xl shadow-sm border border-gray-100 dark:border-gray-600">
                <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{ urlencode(route('chat', ['access_code' => '123456'])) }}"
                    alt="QR Code Access" class="w-32 h-32">
            </div>
            <p class="mt-4 text-xs text-gray-500 dark:text-gray-400">
                Scan to instantly unlock chatbot access
            </p>
        </div>

        <div class="mt-8 text-center">
            <a href="/"
                class="text-sm text-gray-500 hover:text-indigo-600 dark:text-gray-400 dark:hover:text-indigo-400 transition duration-200">
                &larr; Back to Home
            </a>
        </div>
    </div>
</div>