<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" />
            
            @if($user->google_id || is_null($user->password))
                <div class="mt-1 block w-full px-4 py-2 bg-white/5 border border-white/10 rounded-xl text-gray-500 cursor-not-allowed text-sm">
                    {{ $user->name }}
                </div>
                <p class="mt-1 text-xs text-gray-500">Linked to Google Account. Name cannot be changed.</p>
            @else
                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            @endif
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            
            @if($user->google_id || is_null($user->password))
                <div class="mt-1 block w-full px-4 py-2 bg-white/5 border border-white/10 rounded-xl text-gray-500 cursor-not-allowed text-sm">
                    {{ $user->email }}
                </div>
                <p class="mt-1 text-xs text-gray-500">Linked to Google Account. Email cannot be changed.</p>
            @else
                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
                <x-input-error class="mt-2" :messages="$errors->get('email')" />
            @endif

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
           
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>


                </div>
            @endif
        </div>

        <!-- Role Display -->
        <div>
            <x-input-label for="role" :value="__('Role')" />
            <x-text-input id="role" type="text" class="mt-1 block w-full bg-gray-100 dark:bg-gray-900 text-gray-500 cursor-not-allowed" :value="strtoupper($user->role)" disabled />
            <p class="mt-1 text-xs text-gray-500">Roles are managed by administrators.</p>
        </div>

        <div class="flex items-center gap-4">
            @if($user->google_id || is_null($user->password))
                <a href="https://myaccount.google.com/" target="_blank" class="inline-flex items-center px-4 py-2 bg-white/10 border border-white/10 rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-white/20 transition ease-in-out duration-150">
                    {{ __('Manage Google Account') }}
                </a>
            @else
                <x-primary-button>{{ __('Save') }}</x-primary-button>


            @endif
        </div>
    </form>
</section>
