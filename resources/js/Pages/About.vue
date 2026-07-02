<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
</script>

<template>
    <GuestLayout>
        <section class="bg-gradient-to-br from-slate-900 via-slate-800 to-amber-900 py-24 text-white">
            <div class="mx-auto max-w-6xl px-6">
                <p class="text-sm uppercase tracking-[0.3em] text-amber-300">About us</p>
                <h1 class="mt-4 text-4xl font-semibold sm:text-5xl">Crafting extraordinary journeys in Madagascar</h1>
                <p class="mt-6 max-w-3xl text-lg text-slate-200">
                    Andemia crée des expériences de voyage premium, entre confort raffiné, découvertes authentiques et services sur mesure.
                </p>
            </div>
        </section>

        <section class="mx-auto max-w-6xl px-6 py-16">
            <div class="grid gap-8 md:grid-cols-3">
                <div class="rounded-2xl border border-slate-200 bg-white p-8 shadow-sm">
                    <h2 class="text-xl font-semibold text-slate-900">Tailor-made travel</h2>
                    <p class="mt-3 text-slate-600">Des séjours personnalisés pour chaque profil, à votre rythme et selon vos envies.</p>
                </div>
                <div class="rounded-2xl border border-slate-200 bg-white p-8 shadow-sm">
                    <h2 class="text-xl font-semibold text-slate-900">Local expertise</h2>
                    <p class="mt-3 text-slate-600">Une équipe passionnée qui connaît parfaitement les plus beaux trésors de Madagascar.</p>
                </div>
                <div class="rounded-2xl border border-slate-200 bg-white p-8 shadow-sm">
                    <h2 class="text-xl font-semibold text-slate-900">Luxury comfort</h2>
                    <p class="mt-3 text-slate-600">Un mélange parfait d’élégance, de sécurité et de confort tout au long du voyage.</p>
                </div>
            </div>
        </section>
    </GuestLayout>
</template>
