<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function() {
        $("select").change(function() {
            $(this).find("option:selected").each(function() {
                var optionValue = $(this).attr("value");
                if (optionValue) {
                    $(".box").not("." + optionValue).hide();
                    $("." + optionValue).show();
                } else {
                    $(".box").hide();
                }
            });
        }).change();
    });
</script>

<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}" class="space-y-6">
            @csrf

            <!-- Name Input -->
            <div>
                <x-label for="name" value="{{ __('Name') }}" class="font-semibold text-lg" />
                <x-input id="name" class="block mt-2 w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 shadow-sm" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Enter your name" />
            </div>

            <!-- Email Input -->
            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" class="font-semibold text-lg" />
                <x-input id="email" class="block mt-2 w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 shadow-sm" type="email" name="email" :value="old('email')" required autocomplete="email" placeholder="Enter your email" />
            </div>

            <!-- Password Input -->
            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" class="font-semibold text-lg" />
                <x-input id="password" class="block mt-2 w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 shadow-sm" type="password" name="password" required autocomplete="password" placeholder="Enter your password" />
            </div>

            <!-- Confirm Password Input -->
            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" class="font-semibold text-lg" />
                <x-input id="password_confirmation" class="block mt-2 w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 shadow-sm" type="password" name="password_confirmation" required autocomplete="password" placeholder="Confirm your password" />
            </div>

            <!-- Role Selection -->
            <div class="mt-4">
                <x-label for="role" value="{{ __('Select Role') }}" class="font-semibold text-lg" />
                <select id='role' name="role" required class="block w-full mt-2 px-4 py-3 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 shadow-sm">
                    <option value="">Choose your role</option>
                    <option value="customer">Customer</option>
                    <option value="caregiver">Caregiver</option>
                    <option value="deliver">Deliver</option>
                    <option value="volunteer">Volunteer</option>
                    <option value="admin">Admin</option>
                </select>
            </div>

            <!-- Role-specific Fields (Customer, Caregiver, Deliver, etc.) -->
            <div class="customer box mt-6">
                <div class="mt-4">
                    <x-label for="age" value="{{ __('Age') }}" class="font-semibold text-lg" />
                    <x-input id="age" class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 shadow-sm" type="number" min="18" max="105" name="age" autocomplete="age" placeholder="Enter your age" />
                </div>

                <div class="mt-4">
                    <x-label for="disease" value="{{ __('Disease') }}" class="font-semibold text-lg" />
                    <x-input id="disease" class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 shadow-sm" type="text" name="disease" autocomplete="disease" placeholder="Enter any disease" />
                </div>

                <div class="mt-4">
                    <x-label for="disability" value="{{ __('Disability') }}" class="font-semibold text-lg" />
                    <x-input id="disability" class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 shadow-sm" type="text" name="disability" autocomplete="disability" placeholder="Enter your disability (if any)" />
                </div>

                <div class="mt-4">
                    <x-label for="address" value="{{ __('Address') }}" class="font-semibold text-lg" />
                    <x-input id="address" class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 shadow-sm" type="text" name="address" autocomplete="address" placeholder="Enter your address" />
                </div>

                <div class="mt-4">
                    <x-label for="phone_number" value="{{ __('Phone Number') }}" class="font-semibold text-lg" />
                    <x-input id="phone_number" class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 shadow-sm" type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="123-456-7890" name="phone_number" autocomplete="phone_number" />
                </div>
            </div>
            <div class="caregiver box">
                <x-label for="working_day" value = "{{ __('Working Day') }}" />
                <div class="mt-4">
                    <x-label for="working_day1" value="{{ __('Monday') }}" />
                    <x-input id="working_day" type="checkbox" name="working_day[]" value="Monday" />
                </div>
                <div class="mt-4">
                    <x-label for="working_day2" value="{{ __('Tuesday') }}" />
                    <x-input id="working_day" type="checkbox" name="working_day[]" value="Tuesday" />
                </div>
                <div class="mt-4">
                    <x-label for="working_day3" value="{{ __('Wednesday') }}" />
                    <x-input id="working_day" type="checkbox" name="working_day[]" value="Wednesday" />
                </div>
                <div class="mt-4">
                    <x-label for="working_day4" value="{{ __('Thursday') }}" />
                    <x-input id="working_day" type="checkbox" name="working_day[]" value="Thursday" />
                </div>
                <div class="mt-4">
                    <x-label for="working_day5" value="{{ __('Friday') }}" />
                    <x-input id="working_day" type="checkbox" name="working_day[]" value="Friday" />
                </div>
                <div class="mt-4">
                    <x-label for="working_day6" value="{{ __('Saturday') }}" />
                    <x-input id="working_day" type="checkbox" name="working_day[]" value="Saturday" />
                </div>
                <div class="mt-4">
                    <x-label for="working_day7" value="{{ __('Sunday') }}" />
                    <x-input id="working_day" type="checkbox" name="working_day[]" value="Sunday" />
                </div>
            </div>
            <div class="deliver box">
                <div class="mt-4">
                    <x-label for="vehicle_type" value="{{ __('Vehicle Type') }}" />
                    <div>
                        <input type="radio" id="two_wheeler" name="vehicle" value="two_wheeler">
                        <label for="two_wheeler">Two Wheeler</label>
                    </div>
                    <div>
                        <input type="radio" id="four_wheeler" name="vehicle" value="four_wheeler">
                        <label for="four_wheeler">Four Wheeler</label>
                    </div>
                </div>
                <div class="mt-4">
                    <x-label for="company_name" value="{{ __('Company Name') }}" />
                    <x-input id="company_name" class="block mt-1 w-full" type="text" name="company_name"
                        autocomplete="company_name" />
                </div>
                <div class="mt-4">
                    <x-label for="rider_location" value="{{ __('Location') }}" />
                    <x-input id="rider_location" class="block mt-1 w-full" type="text" name="rider_location"
                        autocomplete="rider_location" />
                </div>
                <div class="mt-4">
                    <x-label for="rider_phone_number" value="{{ __('Phone Number') }}" />
                    <x-input id="rider_phone_number" class="block mt-1 w-full" type="tel"
                        pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="123-456-7890" name="rider_phone_number"
                        autocomplete="rider_phone_number" />
                </div>
            </div>
            
            <!-- Terms and Conditions -->
            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-6">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" />
                            <div class="ml-2 text-sm">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                    'terms_of_service' =>
                                        '<a target="_blank" href="' . route('terms.show') . '" class="underline text-indigo-600 hover:text-indigo-900 font-semibold">' . __('Terms of Service') . '</a>',
                                    'privacy_policy' =>
                                        '<a target="_blank" href="' . route('policy.show') . '" class="underline text-indigo-600 hover:text-indigo-900 font-semibold">' . __('Privacy Policy') . '</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <!-- Submit Button -->
            <div class="flex items-center justify-end mt-6">
                <a class="underline text-sm text-indigo-600 hover:text-indigo-900 font-semibold" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
                <x-button class="ml-4 py-3 px-6 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg shadow-md transition duration-150">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
