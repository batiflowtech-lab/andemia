<script setup>
import Navigation from '@/Components/Navigation.vue';
</script>

<template>
  <div>
    <Navigation />

    <main class="min-h-screen bg-gray-100">
      <div class="mx-auto max-w-7xl px-4 py-8">
        <slot />
      </div>
    </main>

    <footer class="bg-white border-t">
      <div class="max-w-7xl mx-auto px-4 py-6 text-center text-sm text-gray-500">
        © {{ new Date().getFullYear() }} Andemia. Tous droits réservés.
      </div>
    </footer>
  </div>
</template>
