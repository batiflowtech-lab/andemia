<script setup>
import { useI18n } from 'vue-i18n';

const { locale } = useI18n();

const changeLanguage = (lang) => {
    locale.value = lang;
    localStorage.setItem('language', lang);
};
</script>

<template>
    <div class="flex items-center gap-2">
        <button
            @click="changeLanguage('fr')"
            :class="[
                'rounded-full px-3 py-1 text-sm font-medium transition',
                locale === 'fr'
                    ? 'bg-amber-500 text-white'
                    : 'bg-slate-100 text-slate-700 hover:bg-slate-200'
            ]"
        >
            {{ $t('common.french') }}
        </button>
        <button
            @click="changeLanguage('en')"
            :class="[
                'rounded-full px-3 py-1 text-sm font-medium transition',
                locale === 'en'
                    ? 'bg-amber-500 text-white'
                    : 'bg-slate-100 text-slate-700 hover:bg-slate-200'
            ]"
        >
            {{ $t('common.english') }}
        </button>
    </div>
</template>
