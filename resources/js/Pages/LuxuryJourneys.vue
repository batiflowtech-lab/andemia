<script setup>
import { computed, ref } from 'vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';

const selectedPack = ref(null);
const selectedSection = ref('section-i');

const offerSections = [
    {
        id: 'section-i',
        label: 'SECTION I',
        title: 'Packs créatifs & thématiques spéciaux',
        intro: 'Des expériences fictives pensées pour des voyageurs en quête d'un séjour sur mesure, à la fois élégant et immersif.',
        theme: 'Photographie',
    },
    {
        id: 'section-ii',
        label: 'SECTION II',
        title: 'THE FASCINATING WORLD SERIE',
        intro: 'Une série fictive d'itinéraires immersifs mêlant luxe, nature, culture et moments de pause raffinés.',
        theme: 'Luxe',
    },
    {
        id: 'section-iii',
        label: 'SECTION III',
        title: 'DESTINATIONS SIGNATURE ANDEMI',
        intro: 'Des escapades fictives révélant les plus beaux paysages et les lieux les plus marquants de Madagascar.',
        theme: 'Aventure',
    },
    {
        id: 'section-iv',
        label: 'SECTION IV',
        title: 'GRAND SUD CIRCUIT — LE CIRCUIT SIGNATURE ANDEMI',
        intro: 'Un programme fictif signature conçu pour vivre le Grand Sud avec intensité, confort et caractère.',
        theme: 'Honeymoon',
    },
];

const packs = [
    {
        id: 'pack-photographe',
        title: 'PACK PHOTOGRAPHE',
        price: 'À partir de 8 900 €',
        duration: '19 jours',
        group: '2 à 6 personnes',
        season: 'Avr-Nov (lumière optimale)',
        theme: 'Photographie',
        section: 'section-i',
        image: '/images/landscape-poster.jpg',
        subtitle: 'Huit destinations choisies pour leur valeur photographique exceptionnelle',
        description:
            'Un circuit volontairement long, pensé pour la lumière, les textures, la faune rare et les compositions impossibles ailleurs.',
        highlights: [
            'Allée des Baobabs au lever et au coucher de soleil',
            'Tsingy de Bemaraha, Isalo, Ranomafana, Montagne d'Ambre',
            'Masoala et Nosy Be pour les paysages marins et forestiers',
        ],
        itinerary: [
            'J1-3 — Antananarivo à Morondava : Allée des Baobabs et sessions privées au lever/coucher de soleil',
            'J4-6 — Morondava à Tsingy de Bemaraha : lumière rasante, formations karstiques et sessions multiples',
            'J7-9 — Tsingy à Isalo : canyons sculptés, golden hour et photographie astro',
            'J10-12 — Isalo à Ranomafana : brume matinale, forêt tropicale humide et faune endémique',
            'J13-14 — Ranomafana à Ambositra : artisanat Zafimaniry et portraits d'artisans',
            'J15-16 — Tana à Montagne d'Ambre : macro, cascades et lumière filtrée',
            'J17-18 — Diego Suarez à Masoala : forêt primaire et pénétration de lumière sous canopée',
            'J19 — Tana à Nosy Be : lagons turquoise, coucher de soleil et sorties sous-marines',
        ],
        accent: 'from-amber-500 to-orange-600',
    },
    {
        id: 'pack-aventure-grand-sud',
        title: 'PACK AVENTURE GRAND SUD',
        price: 'À partir de 6 800 €',
        duration: '12 jours',
        group: '4 à 8 personnes',
        season: 'Toute l'année',
        theme: 'Aventure',
        section: 'section-iii',
        image: '/images/landscape-poster.svg',
        subtitle: 'Grandes formations, circuits de piste et immersion dans la nature',
        description:
            'Un circuit intense et spectaculaire pour explorer les paysages les plus contrastés de Madagascar avec un rythme actif et un cadre premium.',
        highlights: [
            'Isalo, Anakao et routes de piste au cœur du sud',
            'Escapades photographiques et moments d'aventure',
            'Accompagnement local et logistique optimisée',
        ],
        itinerary: [
            'J1-3 — Antananarivo à Fianarantsoa puis Isalo',
            'J4-6 — Exploration du Sud et activités de plein air',
            'J7-10 — Anakao et grand sud avec nuits en hébergement premium',
            'J11-12 — Retour à Tana avec transfert privé',
        ],
        accent: 'from-orange-500 to-amber-600',
    },
    {
        id: 'pack-anjajavy',
        title: 'PACK ANJAJAVY',
        price: 'Sur devis',
        duration: '7 à 10 jours',
        group: '2 à 8 personnes',
        season: 'Toute l'année',
        theme: 'Luxe',
        section: 'section-ii',
        image: '/images/landscape-poster.svg',
        subtitle: 'Safari exclusif, luxe naturel et île privée',
        description:
            'Un séjour haut de gamme pensé pour les voyageurs recherchant l'exclusivité, le confort et l'immersion dans l'un des plus beaux havres naturels de Madagascar.',
        highlights: [
            'Hébergement premium au cœur de la baie',
            'Activités nautiques et safaris privés',
            'Mobilité optimisée avec vols domestiques et transferts premium',
        ],
        itinerary: [
            'Arrivée à Antananarivo puis vol vers le nord-ouest',
            'Séjour à Anjajavy avec excursions privées et moments de détente',
            'Retour progressif vers Tana avec services premium',
        ],
        accent: 'from-emerald-600 to-teal-700',
    },
    {
        id: 'pack-miavana',
        title: 'PACK MIAVANA',
        price: 'Sur devis',
        duration: '6 à 9 jours',
        group: '2 à 8 personnes',
        season: 'Toute l'année',
        theme: 'Luxe',
        section: 'section-ii',
        image: '/images/landscape-poster.jpg',
        subtitle: 'Luxe côtier, privatisé et confort absolu',
        description:
            'Une expérience raffinée entre plages préservées, hébergements élégants et services sur mesure pour un séjour reposant et exclusif.',
        highlights: [
            'Plages préservées et paysages maritimes',
            'Hébergements boutique et villas privées',
            'Transport premium et organisation fluide',
        ],
        itinerary: [
            'Arrivée à Nosy Be ou à Sainte-Marie selon l'itinéraire',
            'Jours de détente, excursions marines et expériences privées',
            'Départ avec services de transfer premium',
        ],
        accent: 'from-sky-600 to-indigo-700',
    },
    {
        id: 'pack-evenement-honeymoon',
        title: 'PACK ÉVÉNEMENT / HONEYMOON',
        price: 'Sur devis',
        duration: '6 à 12 jours',
        group: '2 à 6 personnes',
        season: 'Toute l'année',
        theme: 'Honeymoon',
        section: 'section-iv',
        image: '/images/landscape-poster.svg',
        subtitle: 'Moments spéciaux, intimité et romance',
        description:
            'Des séjours conçus pour célébrer un mariage, un anniversaire ou une étape de vie avec une touche de discrétion, de beauté et d'exclusivité.',
        highlights: [
            'Séjours romantiques et privatisés',
            'Hébergement haut de gamme avec vues exceptionnelles',
            'Organisation sur mesure pour chaque moment de vie',
        ],
        itinerary: [
            'Préparation sur mesure du programme',
            'Séjour premium dans des destinations symboliques',
            'Moments spéciaux personnalisés avec assistance dédiée',
        ],
        accent: 'from-violet-600 to-fuchsia-700',
    },
    {
        id: 'pack-safari-silence',
        title: 'PACK SAFARI SILENCE',
        price: 'À partir de 7 900 €',
        duration: '11 jours',
        group: '2 à 6 personnes',
        season: 'Juil-Nov',
        theme: 'Photographie',
        section: 'section-i',
        image: '/images/landscape-poster.jpg',
        subtitle: 'Un parcours fictif pour découvrir les espaces sauvages au plus près',
        description:
            'Un séjour imaginaire dédié à la contemplation, à la lumière du matin et à la recherche de moments rares.',
        highlights: [
            'Safaris privés',
            'Sessions au lever de soleil',
            'Hébergements discrets',
        ],
        itinerary: [
            'J1-3 — Arrivée et premières sessions',
            'J4-7 — Safaris et observations',
            'J8-11 — Retour progressif',
        ],
        accent: 'from-amber-500 to-orange-600',
    },
    {
        id: 'pack-island-retreat',
        title: 'PACK ISLAND RETREAT',
        price: 'À partir de 10 200 €',
        duration: '9 jours',
        group: '2 à 4 personnes',
        season: 'Toute l'année',
        theme: 'Luxe',
        section: 'section-ii',
        image: '/images/landscape-poster.svg',
        subtitle: 'Une escapade fictive au calme entre îles, plages et services premium',
        description:
            'Un itinéraire imaginaire où chaque détail est pensé pour le confort, la discrétion et la beauté.',
        highlights: [
            'Villas privées',
            'Spa à bord',
            'Cuisine raffinée',
        ],
        itinerary: [
            'J1-3 — Installation sur l'île',
            'J4-6 — Excursions privées',
            'J7-9 — Détente finale',
        ],
        accent: 'from-emerald-600 to-teal-700',
    },
    {
        id: 'pack-desert-dream',
        title: 'PACK DESERT DREAM',
        price: 'À partir de 5 900 €',
        duration: '8 jours',
        group: '4 à 8 personnes',
        season: 'Avr-Oct',
        theme: 'Aventure',
        section: 'section-iii',
        image: '/images/landscape-poster.jpg',
        subtitle: 'Un circuit fictif pour vivre les paysages les plus singuliers et les plus spectaculaires',
        description:
            'Une aventure imaginaire au cœur d'un décor saisissant, entre dunes, vallées et étoiles.',
        highlights: [
            'Randonnées guidées',
            'Camps premium',
            'Observations nocturnes',
        ],
        itinerary: [
            'J1-2 — Accueil et installation',
            'J3-5 — Exploration des paysages',
            'J6-8 — Retour et moments de partage',
        ],
        accent: 'from-orange-500 to-amber-600',
    },
    {
        id: 'pack-moonlight-escape',
        title: 'PACK MOONLIGHT ESCAPE',
        price: 'Sur devis',
        duration: '7 à 10 jours',
        group: '2 à 6 personnes',
        season: 'Toute l'année',
        theme: 'Honeymoon',
        section: 'section-iv',
        image: '/images/landscape-poster.svg',
        subtitle: 'Une escapade fictive romantique sous les étoiles et au rythme du calme',
        description:
            'Un programme imaginaire conçu pour la douceur, la beauté du cadre et la sensation d'exception.',
        highlights: [
            'Dîner privé',
            'Suite romantique',
            'Logistique fluide',
        ],
        itinerary: [
            'J1-2 — Arrivée et installation',
            'J3-6 — Expériences romantiques',
            'J7-10 — Départ en douceur',
        ],
        accent: 'from-violet-600 to-fuchsia-700',
    },
];

const sectionsWithPacks = computed(() =>
    offerSections.map((section) => ({
        ...section,
        packs: packs.filter((pack) => pack.section === section.id),
    }))
);

const currentSection = computed(() =>
    sectionsWithPacks.value.find((section) => section.id === selectedSection.value)
);

const openPackDetails = (pack) => {
    selectedPack.value = selectedPack.value?.title === pack.title ? null : pack;
};

const selectSection = (sectionId) => {
    selectedSection.value = sectionId;
    selectedPack.value = null;
};
</script>

<template>
    <GuestLayout>
        <section class="bg-gradient-to-br from-slate-900 via-slate-800 to-amber-900 py-24 text-white">
            <div class="mx-auto max-w-6xl px-6">
                <p class="text-sm uppercase tracking-[0.3em] text-amber-300">Luxury Journeys</p>
                <h1 class="mt-4 text-4xl font-semibold sm:text-5xl">Creative packs & thematic journeys designed for exceptional moments</h1>
                <p class="mt-6 max-w-3xl text-lg text-slate-200">
                    Andemia Prestige Travel creates premium experiences around your passions, your calendar and your desire for a more meaningful journey through Madagascar.
                </p>
            </div>
        </section>

        <section id="overview" class="mx-auto max-w-6xl px-6 py-16">
            <div class="mb-8">
                <p class="text-sm uppercase tracking-[0.3em] text-amber-600">Section I — Packs créatifs & thématiques spéciaux</p>
                <h2 class="mt-2 text-3xl font-semibold text-slate-900">Expériences exclusives conçues autour d'une passion ou d'un moment de vie</h2>
            </div>

            <div class="rounded-3xl border border-slate-200 bg-white p-8 shadow-sm">
                <h3 class="text-2xl font-semibold text-slate-900">Mobilité Premium Andemia — au-delà du vol domestique</h3>
                <p class="mt-4 text-slate-600">
                    Vols domestiques réguliers inclus par défaut sur la majorité des circuits. Vols charter privés disponibles sur demande pour relier les destinations isolées comme Anjajavy ou Miavana sans correspondances. Transferts hélicoptère disponibles entre certaines étapes pour réduire drastiquement les temps de trajet, avec une logique premium et très pratique pour les itinéraires les plus exigeants.
                </p>
                <div class="mt-6 grid gap-4 md:grid-cols-3">
                    <div class="rounded-2xl bg-slate-50 p-4">
                        <h4 class="font-semibold text-slate-900">Vols charter privés</h4>
                        <p class="mt-2 text-sm text-slate-600">Disponibles sur demande pour Anjajavy, Miavana et autres destinations isolées.</p>
                    </div>
                    <div class="rounded-2xl bg-slate-50 p-4">
                        <h4 class="font-semibold text-slate-900">Transferts hélicoptère</h4>
                        <p class="mt-2 text-sm text-slate-600">Proposés sur plusieurs trajets pour gagner du temps et préserver votre énergie.</p>
                    </div>
                    <div class="rounded-2xl bg-slate-50 p-4">
                        <h4 class="font-semibold text-slate-900">Véhicules de luxe</h4>
                        <p class="mt-2 text-sm text-slate-600">Toyota Land Cruiser VX, Lexus et chauffeur privé sur les longues étapes routières.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="mx-auto max-w-6xl px-6 py-4">
            <div class="mb-8">
                <p class="text-sm uppercase tracking-[0.3em] text-amber-600">Our Signature Journeys</p>
                <h2 class="mt-2 text-3xl font-semibold text-slate-900">Découvrez nos packs créatifs les plus demandés</h2>
            </div>

            <nav class="sticky top-20 z-20 mb-8 rounded-full border border-slate-200 bg-white/90 px-3 py-3 shadow-sm backdrop-blur">
                <div class="flex flex-wrap justify-center gap-2">
                    <button
                        v-for="section in sectionsWithPacks"
                        :key="section.id"
                        @click="selectSection(section.id)"
                        :class="[
                            'rounded-full px-4 py-2 text-sm font-medium transition',
                            selectedSection === section.id
                                ? 'bg-amber-100 text-amber-900'
                                : 'hover:bg-slate-100 text-slate-700'
                        ]"
                    >
                        {{ section.label }}
                    </button>
                </div>
            </nav>

            <div v-if="currentSection" class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                <div class="mb-6">
                    <p class="text-sm uppercase tracking-[0.3em] text-amber-600">{{ currentSection.label }}</p>
                    <h3 class="mt-2 text-2xl font-semibold text-slate-900">{{ currentSection.title }}</h3>
                    <p class="mt-3 max-w-2xl text-slate-600">{{ currentSection.intro }}</p>
                </div>

                <nav v-if="currentSection.packs.length > 1" class="mb-6 flex flex-wrap gap-2 rounded-full border border-slate-200 bg-slate-50 px-3 py-3">
                    <a
                        v-for="pack in currentSection.packs"
                        :key="pack.id"
                        :href="`#${pack.id}`"
                        class="rounded-full px-3 py-2 text-sm font-medium text-slate-700 transition hover:bg-white hover:text-slate-900"
                    >
                        {{ pack.title }}
                    </a>
                </nav>

                <div class="grid gap-8 lg:grid-cols-2">
                    <article
                        v-for="pack in currentSection.packs"
                        :id="pack.id"
                        :key="pack.title"
                        class="group scroll-mt-28 overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm transition-all duration-300 hover:-translate-y-2 hover:shadow-xl"
                    >
                        <div class="overflow-hidden">
                            <img :src="pack.image" :alt="pack.title" class="h-40 w-full object-cover transition duration-500 group-hover:scale-105" />
                        </div>
                        <div class="p-6">
                            <div class="flex items-center justify-between gap-3">
                                <h4 class="text-xl font-semibold text-slate-900">{{ pack.title }}</h4>
                                <span class="rounded-full bg-amber-100 px-3 py-1 text-xs font-semibold uppercase tracking-[0.2em] text-amber-700">
                                    {{ pack.theme }}
                                </span>
                            </div>
                            <p class="mt-2 text-sm uppercase tracking-[0.2em] text-amber-600">
                                {{ pack.price }} • {{ pack.duration }} • {{ pack.group }}
                            </p>
                            <p class="mt-2 text-sm text-slate-500">Saison : {{ pack.season }}</p>
                            <p class="mt-4 text-slate-600">{{ pack.subtitle }}</p>
                            <p class="mt-3 text-slate-600">{{ pack.description }}</p>

                            <ul class="mt-4 space-y-2 text-sm text-slate-600">
                                <li v-for="highlight in pack.highlights" :key="highlight">• {{ highlight }}</li>
                            </ul>

                            <button
                                class="mt-6 rounded-full bg-slate-900 px-4 py-2 text-sm font-medium text-white transition hover:bg-slate-700"
                                @click="openPackDetails(pack)"
                            >
                                {{ selectedPack?.title === pack.title ? 'Masquer les détails' : 'Voir les détails du pack' }}
                            </button>

                            <Transition name="details" appear>
                                <div v-if="selectedPack?.title === pack.title" class="mt-6 rounded-2xl bg-slate-50 p-4">
                                    <h4 class="text-sm font-semibold uppercase tracking-[0.2em] text-slate-700">Itinéraire</h4>
                                    <ul class="mt-3 space-y-2 text-sm text-slate-600">
                                        <li v-for="step in pack.itinerary" :key="step">• {{ step }}</li>
                                    </ul>
                                </div>
                            </Transition>
                        </div>
                    </article>
                </div>
            </div>
        </section>

        <section id="booking" class="mx-auto max-w-6xl px-6 pb-20">
            <div class="rounded-3xl bg-slate-100 p-8 md:p-12">
                <h2 class="text-3xl font-semibold text-slate-900">Comment réserver — Andemia Prestige Travel</h2>
                <div class="mt-8 grid gap-6 md:grid-cols-2">
                    <div>
                        <h3 class="text-lg font-semibold text-slate-900">01. Demande initiale</h3>
                        <p class="mt-2 text-slate-600">Envoyez vos dates, le nombre de participants et vos centres d'intérêt par e-mail ou WhatsApp. Réponse sous 24h.</p>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-slate-900">02. Questionnaire personnalisé</h3>
                        <p class="mt-2 text-slate-600">Nous vous envoyons un questionnaire pour comprendre vos attentes profondes et affiner l'itinéraire.</p>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-slate-900">03. Cotation sur mesure</h3>
                        <p class="mt-2 text-slate-600">Vous recevez sous 48h une cotation détaillée avec programme, hébergements, inclus/exclus et tarif final.</p>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-slate-900">04. Confirmation</h3>
                        <p class="mt-2 text-slate-600">Un acompte de 30 % confirme votre réservation, avec un dossier voyageur envoyé 60 jours avant le départ.</p>
                    </div>
                </div>
            </div>
        </section>
    </GuestLayout>
</template>

<style scoped>
.details-enter-active,
.details-leave-active {
    transition: all 0.25s ease;
}

.details-enter-from,
.details-leave-to {
    opacity: 0;
    transform: translateY(-8px);
}

.details-enter-to,
.details-leave-from {
    opacity: 1;
    transform: translateY(0);
}
</style>
