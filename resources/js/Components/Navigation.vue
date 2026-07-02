<script setup>
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';

const open = ref(false);
</script>

<template>
  <nav class="bg-white border-b border-slate-200 shadow-sm">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        <div class="flex items-center">
          <Link href="/" class="text-xl font-bold text-slate-900">Andemia</Link>
          <div class="hidden sm:ml-10 sm:flex sm:space-x-8">
            <Link href="/" class="inline-flex items-center px-1 pt-1 text-sm font-medium text-slate-700 hover:text-slate-900">Accueil</Link>
            <Link href="/about" class="inline-flex items-center px-1 pt-1 text-sm font-medium text-slate-700 hover:text-slate-900">À propos</Link>
            <Link href="/services" class="inline-flex items-center px-1 pt-1 text-sm font-medium text-slate-700 hover:text-slate-900">Services</Link>
            <Link href="/gallery" class="inline-flex items-center px-1 pt-1 text-sm font-medium text-slate-700 hover:text-slate-900">Galerie</Link>
            <Link href="/blog" class="inline-flex items-center px-1 pt-1 text-sm font-medium text-slate-700 hover:text-slate-900">Blog</Link>
          </div>
        </div>

        <div class="hidden sm:flex sm:items-center sm:space-x-4">
          <Link href="/login" class="text-sm font-medium text-slate-700 hover:text-slate-900">Login</Link>
          <Link href="/register" class="inline-flex items-center rounded-full border border-slate-200 bg-slate-50 px-4 py-2 text-sm font-semibold text-slate-900 hover:bg-slate-100">Inscription</Link>
        </div>

        <div class="flex sm:hidden">
          <button @click="open = !open" type="button" class="inline-flex items-center justify-center rounded-md p-2 text-slate-700 hover:bg-slate-100 hover:text-slate-900 focus:outline-none">
            <span class="sr-only">Open menu</span>
            <svg v-if="!open" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <svg v-else class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
      </div>
    </div>

    <div v-show="open" class="sm:hidden border-t border-slate-200 bg-white">
      <div class="space-y-1 px-2 pt-2 pb-3">
        <Link href="/" class="block rounded-md px-3 py-2 text-base font-medium text-slate-700 hover:bg-slate-100">Accueil</Link>
        <Link href="/about" class="block rounded-md px-3 py-2 text-base font-medium text-slate-700 hover:bg-slate-100">À propos</Link>
        <Link href="/services" class="block rounded-md px-3 py-2 text-base font-medium text-slate-700 hover:bg-slate-100">Services</Link>
        <Link href="/gallery" class="block rounded-md px-3 py-2 text-base font-medium text-slate-700 hover:bg-slate-100">Galerie</Link>
        <Link href="/blog" class="block rounded-md px-3 py-2 text-base font-medium text-slate-700 hover:bg-slate-100">Blog</Link>
        <Link href="/login" class="block rounded-md px-3 py-2 text-base font-medium text-slate-700 hover:bg-slate-100">Login</Link>
        <Link href="/register" class="block rounded-md px-3 py-2 text-base font-medium text-slate-700 hover:bg-slate-100">Inscription</Link>
      </div>
    </div>
  </nav>
</template>
