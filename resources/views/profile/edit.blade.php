<x-app-layout>
    <section class="wsus_product mt_145 pb_100">
        <div class="container">
            <div class="">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>
            <br>
            <br>
            <div class="">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
