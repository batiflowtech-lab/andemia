<script setup>
import { onMounted, onUnmounted, ref } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    overlayHeader: {
        type: Boolean,
        default: false,
    },
});

const isScrolled = ref(false);
const isMobileMenuOpen = ref(false);

const handleScroll = () => {
    isScrolled.value = window.scrollY > 20;
};

const toggleMobileMenu = () => {
    isMobileMenuOpen.value = !isMobileMenuOpen.value;
};

onMounted(() => {
    window.addEventListener('scroll', handleScroll);
    handleScroll();
});

onUnmounted(() => {
    window.removeEventListener('scroll', handleScroll);
});
</script>

<template>
    <div class="min-h-screen bg-gray-50">
        <header
            :class="[
                'w-full z-50 transition-all duration-300',
                props.overlayHeader
                    ? isScrolled
                        ? 'fixed inset-x-0 top-0 bg-black/75 backdrop-blur-md shadow-lg'
                        : 'absolute inset-x-0 top-0'
                    : 'sticky top-0 bg-white/90 backdrop-blur-md shadow-sm'
            ]"
        >
            <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4">
                <Link href="/" class="text-2xl font-semibold tracking-[0.2em] uppercase" :class="props.overlayHeader ? 'text-white' : 'text-slate-900'">
                    Andemia
                </Link>

                <nav class="hidden gap-6 md:flex" :class="props.overlayHeader ? 'text-white/90' : 'text-slate-700'">
                    <Link href="/about" class="transition hover:text-amber-400">About us</Link>
                    <Link href="/destination" class="transition hover:text-amber-400">Destination</Link>
                    <Link href="/luxury-journeys" class="transition hover:text-amber-400">Luxury Journeys</Link>
                    <Link href="/classic-madagascar" class="transition hover:text-amber-400">Classique Madagascar</Link>
                    <Link href="/blog" class="transition hover:text-amber-400">Blog</Link>
                    <Link href="/contact" class="transition hover:text-amber-400">Contact</Link>
                </nav>

                <button
                    class="rounded-full border border-white/30 p-2 text-white md:hidden"
                    type="button"
                    @click="toggleMobileMenu"
                >
                    <span class="block h-0.5 w-5 bg-current" />
                    <span class="mt-1 block h-0.5 w-5 bg-current" />
                    <span class="mt-1 block h-0.5 w-5 bg-current" />
                </button>
            </div>

            <div v-if="isMobileMenuOpen" class="border-t border-white/10 bg-black/80 px-6 py-4 md:hidden">
                <nav class="flex flex-col gap-3 text-white">
                    <Link href="/about" class="transition hover:text-amber-400" @click="isMobileMenuOpen = false">About us</Link>
                    <Link href="/destination" class="transition hover:text-amber-400" @click="isMobileMenuOpen = false">Destination</Link>
                    <Link href="/luxury-journeys" class="transition hover:text-amber-400" @click="isMobileMenuOpen = false">Luxury Journeys</Link>
                    <Link href="/classic-madagascar" class="transition hover:text-amber-400" @click="isMobileMenuOpen = false">Classique Madagascar</Link>
                    <Link href="/blog" class="transition hover:text-amber-400" @click="isMobileMenuOpen = false">Blog</Link>
                    <Link href="/contact" class="transition hover:text-amber-400" @click="isMobileMenuOpen = false">Contact</Link>
                </nav>
            </div>
        </header>

        <main :class="props.overlayHeader ? 'w-full' : 'mx-auto max-w-7xl px-6 py-10'">
            <slot />
        </main>

        <footer class="bg-gray-900 text-white mt-10">
            <div class="max-w-7xl mx-auto px-6 py-6 text-center">
                © {{ new Date().getFullYear() }} Andemia. Tous droits réservés.
            </div>
        </footer>
    </div>
</template>