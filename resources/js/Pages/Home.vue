<script setup>
import { nextTick, onMounted, ref } from 'vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import video0 from '../../video/video0.mp4';
import video1 from '../../video/video1.mp4';
import video2 from '../../video/video2.mp4';

const videos = [video0, video1, video2];
const currentVideoIndex = ref(0);
const nextVideoIndex = ref(1);
const currentVideoRef = ref(null);
const nextVideoRef = ref(null);
const isTransitioning = ref(false);

const playNextVideo = () => {
    if (isTransitioning.value) return;

    isTransitioning.value = true;
    const nextIndex = (currentVideoIndex.value + 1) % videos.length;
    nextVideoIndex.value = nextIndex;

    nextTick(() => {
        nextVideoRef.value?.play().catch(() => {});
    });

    setTimeout(() => {
        currentVideoIndex.value = nextIndex;
        isTransitioning.value = false;
        nextTick(() => {
            currentVideoRef.value?.play().catch(() => {});
        });
    }, 800);
};

const startPlayback = async () => {
    await nextTick();
    currentVideoRef.value?.play().catch(() => {});
    nextVideoRef.value?.play().catch(() => {});
};

onMounted(() => {
    startPlayback();
});
</script>

<template>
    <GuestLayout :overlay-header="true">
        <section class="relative h-screen w-full overflow-hidden bg-black">
            <video
                ref="currentVideoRef"
                :key="videos[currentVideoIndex]"
                class="absolute inset-0 h-full w-full object-cover transition-opacity duration-800"
                :class="isTransitioning ? 'opacity-0' : 'opacity-100'"
                :src="videos[currentVideoIndex]"
                autoplay
                muted
                playsinline
                preload="auto"
                controlslist="nodownload noplaybackrate"
                disablePictureInPicture
                oncontextmenu="return false;"
                @canplay="startPlayback"
                @ended="playNextVideo"
            />

            <video
                ref="nextVideoRef"
                :key="videos[nextVideoIndex]"
                class="absolute inset-0 h-full w-full object-cover transition-opacity duration-800"
                :class="isTransitioning ? 'opacity-100' : 'opacity-0'"
                :src="videos[nextVideoIndex]"
                autoplay
                muted
                playsinline
                preload="auto"
                controlslist="nodownload noplaybackrate"
                disablePictureInPicture
                oncontextmenu="return false;"
                @canplay="startPlayback"
            />

            <div class="absolute inset-0 bg-black/35" />

            <div class="relative z-10 flex h-full items-center justify-center px-6 text-center text-white">
                <div class="max-w-3xl">
                    <h1 class="text-4xl font-bold sm:text-6xl">
                        Bienvenue sur Andemia
                    </h1>

                    <p class="mt-6 text-lg text-white/90 sm:text-xl">
                        Votre partenaire pour des solutions modernes.
                    </p>
                </div>
            </div>
        </section>
    </GuestLayout>
</template>