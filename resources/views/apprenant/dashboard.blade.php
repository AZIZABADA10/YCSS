<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Apprenant Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <x-application-logo class="block h-12 w-auto" />

                    <h1 class="mt-8 text-2xl font-medium text-gray-900">
                        Bienvenue sur votre tableau de bord Apprenant !
                    </h1>

                    <p class="mt-6 text-gray-500 leading-relaxed">
                        C'est ici que vous pouvez suivre vos cours, vos progrès et interagir avec la plateforme.
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
