<x-filament-panels::page>

    <x-filament::fieldset>
        <x-slot name="label">
            Current Subscription Plan
        </x-slot>
        <div class="max-w-md mx-auto rounded-lg shadow-md p-6">
            <h2 class="text-2xl font-semibold">Basic Plan</h2>
            <p class="mt-4 text-gray-600">This is the default plan for clients with units between 1 - 30.Your are currently subscribed to this plan.</p>
            <div class="mt-4">
                <div class="text-lg font-bold text-indigo-600 py-2">KES {{number_format(2500)}} /month</div>
                <p class="text-sm text-gray-500">Billed monthly</p>
            </div>
            <label wire:poll.50ms>
                <x-filament::input.checkbox wire:model="isAgreed" />
                I agree to the <x-filament::link :href="route('filament.manager.pages.pay-page')">
                    Terms & Conditions
                </x-filament::link></span>
            </label>
        </div>

    </x-filament::fieldset>

    @if ($isAgreed)
    <x-filament::fieldset>
        Invoice Area
    </x-filament::fieldset>
    <x-filament::section icon="heroicon-o-user" icon-color="primary" aside>
        <x-slot name="heading">
            Transaction Code
        </x-slot>
        <form wire:submit="create" class="py-4">
            <x-filament::input.wrapper>
                <x-filament::input type="text" wire:model="code" required />
            </x-filament::input.wrapper>
            <br>
            <x-filament::button type="submit" icon="heroicon-m-paper-airplane">
                Submit
            </x-filament::button>
        </form>
        <x-slot name="description">
            <ul class="list-disc">
                <li>Go to Lipa na MPESA</li>
                <li>Select Paybill and use <strong>4237321</strong> as the paybill number</li>
                <li>Use your <strong>National ID number</strong> as Account Number</li>
                <li>Then amount as <strong>2500</strong> and then pay</li>
                <li>After successful transaction , provide the mpesa transaction code and then <strong>Submit</strong></li>
            </ul>

        </x-slot>
    </x-filament::section>
    <div class="content-center">OR</div>
    <x-filament::section aside>
        <x-slot name="heading">
            STK Push
        </x-slot>
        <x-slot name="description">
            <ul class="list-disc">
                <li>Ensure your Mpesa balance is enough to pay the subscription amount above.</li>
                <li>Press <strong>Make payment</strong> and enter your <strong>PIN</strong> </li>
                <li>The active subscription amount will be deducted on successful transaction.</li>
            </ul>
        </x-slot>
        <x-filament::button wire:click="stk_push" icon="heroicon-m-banknotes">
            Make Payment
        </x-filament::button>
    </x-filament::section>
    @endif

</x-filament-panels::page>