<script setup>
import { ref } from 'vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';

const formData = ref({
    fullName: '',
    email: '',
    phone: '',
    section: '',
    pack: '',
    numberOfPeople: '',
    arrivalDate: '',
    message: '',
    agreeToTerms: false,
});

const sections = [
    { id: 'section-i', label: 'SECTION I - Packs créatifs & thématiques spéciaux' },
    { id: 'section-ii', label: 'SECTION II - THE FASCINATING WORLD SERIE' },
    { id: 'section-iii', label: 'SECTION III - DESTINATIONS SIGNATURE ANDEMI' },
    { id: 'section-iv', label: 'SECTION IV - GRAND SUD CIRCUIT' },
];

const packs = {
    'section-i': [
        { id: 'pack-photographe', label: 'PACK PHOTOGRAPHE' },
        { id: 'pack-safari-silence', label: 'PACK SAFARI SILENCE' },
    ],
    'section-ii': [
        { id: 'pack-anjajavy', label: 'PACK ANJAJAVY' },
        { id: 'pack-miavana', label: 'PACK MIAVANA' },
        { id: 'pack-island-retreat', label: 'PACK ISLAND RETREAT' },
    ],
    'section-iii': [
        { id: 'pack-aventure-grand-sud', label: 'PACK AVENTURE GRAND SUD' },
        { id: 'pack-desert-dream', label: 'PACK DESERT DREAM' },
    ],
    'section-iv': [
        { id: 'pack-evenement-honeymoon', label: 'PACK ÉVÉNEMENT / HONEYMOON' },
        { id: 'pack-moonlight-escape', label: 'PACK MOONLIGHT ESCAPE' },
    ],
};

const availablePacks = () => {
    return packs[formData.value.section] || [];
};

const handleSectionChange = () => {
    formData.value.pack = '';
};

const submitForm = async () => {
    if (!formData.value.fullName || !formData.value.email || !formData.value.phone || !formData.value.message) {
        alert('Veuillez remplir tous les champs obligatoires.');
        return;
    }

    if (!formData.value.agreeToTerms) {
        alert('Vous devez accepter les conditions générales.');
        return;
    }

    try {
        const response = await fetch('/api/contact', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(formData.value),
        });

        if (response.ok) {
            alert('Votre demande a été envoyée avec succès. Nous vous recontacterons sous 24h.');
            formData.value = {
                fullName: '',
                email: '',
                phone: '',
                section: '',
                pack: '',
                numberOfPeople: '',
                arrivalDate: '',
                message: '',
                agreeToTerms: false,
            };
        } else {
            alert('Une erreur s\'est produite. Veuillez réessayer.');
        }
    } catch (error) {
        console.error('Error:', error);
        alert('Une erreur s\'est produite. Veuillez réessayer.');
    }
};
</script>

<template>
    <GuestLayout>
        <!-- Hero Section -->
        <section class="bg-gradient-to-br from-slate-900 via-slate-800 to-amber-900 py-24 text-white">
            <div class="mx-auto max-w-6xl px-6">
                <p class="text-sm uppercase tracking-[0.3em] text-amber-300">Contact & Booking</p>
                <h1 class="mt-4 text-4xl font-semibold sm:text-5xl">Planifiez votre séjour à Madagascar</h1>
                <p class="mt-6 max-w-3xl text-lg text-slate-200">
                    Contactez-nous pour organiser votre prochain voyage d\'exception. Notre équipe vous répondra sous 24h.
                </p>
            </div>
        </section>

        <div class="mx-auto max-w-6xl px-6 py-16">
            <div class="grid gap-12 lg:grid-cols-3">
                <!-- Contact Form -->
                <div class="lg:col-span-2">
                    <div class="rounded-3xl border border-slate-200 bg-white p-8 shadow-sm">
                        <h2 class="mb-8 text-2xl font-semibold text-slate-900">Demande de Réservation</h2>

                        <form @submit.prevent="submitForm" class="space-y-6">
                            <!-- Full Name -->
                            <div>
                                <label for="fullName" class="block text-sm font-medium text-slate-700">Nom Complet *</label>
                                <input
                                    v-model="formData.fullName"
                                    type="text"
                                    id="fullName"
                                    placeholder="Votre nom"
                                    class="mt-2 w-full rounded-lg border border-slate-300 px-4 py-2 text-slate-900 placeholder-slate-400 focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-100"
                                    required
                                />
                            </div>

                            <!-- Email -->
                            <div>
                                <label for="email" class="block text-sm font-medium text-slate-700">Email *</label>
                                <input
                                    v-model="formData.email"
                                    type="email"
                                    id="email"
                                    placeholder="votre@email.com"
                                    class="mt-2 w-full rounded-lg border border-slate-300 px-4 py-2 text-slate-900 placeholder-slate-400 focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-100"
                                    required
                                />
                            </div>

                            <!-- Phone -->
                            <div>
                                <label for="phone" class="block text-sm font-medium text-slate-700">Téléphone *</label>
                                <input
                                    v-model="formData.phone"
                                    type="tel"
                                    id="phone"
                                    placeholder="+261 XX XXX XXXX"
                                    class="mt-2 w-full rounded-lg border border-slate-300 px-4 py-2 text-slate-900 placeholder-slate-400 focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-100"
                                    required
                                />
                            </div>

                            <!-- Section -->
                            <div>
                                <label for="section" class="block text-sm font-medium text-slate-700">Section</label>
                                <select
                                    v-model="formData.section"
                                    @change="handleSectionChange"
                                    id="section"
                                    class="mt-2 w-full rounded-lg border border-slate-300 px-4 py-2 text-slate-900 focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-100"
                                >
                                    <option value="">-- Sélectionner une section --</option>
                                    <option v-for="sec in sections" :key="sec.id" :value="sec.id">
                                        {{ sec.label }}
                                    </option>
                                </select>
                            </div>

                            <!-- Pack -->
                            <div>
                                <label for="pack" class="block text-sm font-medium text-slate-700">Pack</label>
                                <select
                                    v-model="formData.pack"
                                    id="pack"
                                    :disabled="!formData.section"
                                    class="mt-2 w-full rounded-lg border border-slate-300 px-4 py-2 text-slate-900 focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-100 disabled:bg-slate-100 disabled:text-slate-400"
                                >
                                    <option value="">-- Sélectionner un pack --</option>
                                    <option v-for="pack in availablePacks()" :key="pack.id" :value="pack.id">
                                        {{ pack.label }}
                                    </option>
                                </select>
                            </div>

                            <!-- Number of People -->
                            <div>
                                <label for="numberOfPeople" class="block text-sm font-medium text-slate-700">Nombre de personnes</label>
                                <input
                                    v-model.number="formData.numberOfPeople"
                                    type="number"
                                    id="numberOfPeople"
                                    placeholder="2"
                                    min="1"
                                    class="mt-2 w-full rounded-lg border border-slate-300 px-4 py-2 text-slate-900 placeholder-slate-400 focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-100"
                                />
                            </div>

                            <!-- Arrival Date -->
                            <div>
                                <label for="arrivalDate" class="block text-sm font-medium text-slate-700">Date d\'arrivée souhaitée</label>
                                <input
                                    v-model="formData.arrivalDate"
                                    type="date"
                                    id="arrivalDate"
                                    class="mt-2 w-full rounded-lg border border-slate-300 px-4 py-2 text-slate-900 focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-100"
                                />
                            </div>

                            <!-- Message -->
                            <div>
                                <label for="message" class="block text-sm font-medium text-slate-700">Message *</label>
                                <textarea
                                    v-model="formData.message"
                                    id="message"
                                    rows="5"
                                    placeholder="Détails de votre demande, attentes particulières, etc."
                                    class="mt-2 w-full rounded-lg border border-slate-300 px-4 py-2 text-slate-900 placeholder-slate-400 focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-100"
                                    required
                                ></textarea>
                            </div>

                            <!-- Terms Agreement -->
                            <div class="flex items-start gap-3">
                                <input
                                    v-model="formData.agreeToTerms"
                                    type="checkbox"
                                    id="agreeToTerms"
                                    class="mt-1 rounded border border-slate-300 focus:ring-2 focus:ring-amber-500"
                                    required
                                />
                                <label for="agreeToTerms" class="text-sm text-slate-600">
                                    J\'accepte les <span class="font-semibold text-slate-900">conditions de réservation et de collaboration</span> *
                                </label>
                            </div>

                            <!-- Submit Button -->
                            <button
                                type="submit"
                                class="w-full rounded-full bg-slate-900 px-6 py-3 font-medium text-white transition hover:bg-slate-700"
                            >
                                Envoyer ma demande
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Sidebar Info -->
                <div class="space-y-6">
                    <!-- Contact Info Card -->
                    <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                        <h3 class="mb-4 text-lg font-semibold text-slate-900">Informations</h3>
                        <div class="space-y-4">
                            <div>
                                <p class="text-sm text-slate-500">Email</p>
                                <p class="mt-1 font-medium text-slate-900">contact@andemia.mg</p>
                            </div>
                            <div>
                                <p class="text-sm text-slate-500">Téléphone</p>
                                <p class="mt-1 font-medium text-slate-900">+261 XX XXX XXXX</p>
                            </div>
                            <div>
                                <p class="text-sm text-slate-500">Localisation</p>
                                <p class="mt-1 font-medium text-slate-900">Antananarivo, Madagascar</p>
                            </div>
                        </div>
                    </div>

                    <!-- Response Time Card -->
                    <div class="rounded-3xl border border-amber-200 bg-amber-50 p-6">
                        <h3 class="mb-3 font-semibold text-amber-900">⏱️ Délai de réponse</h3>
                        <p class="text-sm text-amber-800">
                            Nous vous recontacterons sous <span class="font-bold">24 heures</span> pour discuter de votre demande.
                        </p>
                    </div>

                    <!-- Deposit Card -->
                    <div class="rounded-3xl border border-emerald-200 bg-emerald-50 p-6">
                        <h3 class="mb-3 font-semibold text-emerald-900">💳 Acompte requis</h3>
                        <p class="text-sm text-emerald-800">
                            <span class="font-bold">50%</span> d\'acompte pour confirmer votre réservation.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Terms Section -->
        <section class="bg-slate-50 py-16">
            <div class="mx-auto max-w-6xl px-6">
                <h2 class="mb-12 text-3xl font-semibold text-slate-900">Conditions de Réservation & Collaboration</h2>

                <div class="grid gap-8 md:grid-cols-2">
                    <!-- Booking Confirmation -->
                    <div class="rounded-2xl border border-slate-200 bg-white p-6">
                        <h3 class="mb-3 text-lg font-semibold text-slate-900">Confirmation de Réservation</h3>
                        <p class="text-slate-600">
                            Une réservation est confirmée à la réception écrite de l\'acceptation du devis et de l\'acompte de 50%. Le solde restant est dû 30 jours avant l\'arrivée.
                        </p>
                    </div>

                    <!-- Payment -->
                    <div class="rounded-2xl border border-slate-200 bg-white p-6">
                        <h3 class="mb-3 text-lg font-semibold text-slate-900">Paiement</h3>
                        <ul class="space-y-2 text-sm text-slate-600">
                            <li>• 50% d\'acompte pour sécuriser les réservations</li>
                            <li>• 50% du solde 30 jours avant l\'arrivée</li>
                            <li>• Arrangements alternatifs possibles sur accord mutuel</li>
                        </ul>
                    </div>

                    <!-- Cancellation Policy -->
                    <div class="rounded-2xl border border-slate-200 bg-white p-6">
                        <h3 class="mb-3 text-lg font-semibold text-slate-900">Politique d\'Annulation</h3>
                        <ul class="space-y-2 text-sm text-slate-600">
                            <li>• <span class="font-semibold">Plus de 30 jours :</span> acompte retenu</li>
                            <li>• <span class="font-semibold">15–30 jours :</span> frais possibles</li>
                            <li>• <span class="font-semibold">Moins de 15 jours :</span> jusqu\'à 100% facturé</li>
                        </ul>
                    </div>

                    <!-- Amendments -->
                    <div class="rounded-2xl border border-slate-200 bg-white p-6">
                        <h3 class="mb-3 text-lg font-semibold text-slate-900">Modifications</h3>
                        <p class="text-slate-600">
                            Les modifications aux réservations confirmées sont bienvenues selon les disponibilités et les frais supplémentaires des fournisseurs.
                        </p>
                    </div>

                    <!-- Rates -->
                    <div class="rounded-2xl border border-slate-200 bg-white p-6">
                        <h3 class="mb-3 text-lg font-semibold text-slate-900">Tarifs</h3>
                        <p class="text-slate-600">
                            Tous les tarifs sont confidentiels et réservés exclusivement à nos partenaires du secteur touristique.
                        </p>
                    </div>

                    <!-- Force Majeure -->
                    <div class="rounded-2xl border border-slate-200 bg-white p-6">
                        <h3 class="mb-3 text-lg font-semibold text-slate-900">Force Majeure</h3>
                        <p class="text-slate-600">
                            Aucune partie n\'est responsable des circonstances indépendantes de leur contrôle (catastrophes naturelles, événements politiques, pandémies).
                        </p>
                    </div>
                </div>

                <!-- Commitment -->
                <div class="mt-8 rounded-3xl border-2 border-amber-300 bg-amber-50 p-8">
                    <h3 class="mb-3 text-xl font-semibold text-amber-900">Notre Engagement</h3>
                    <p class="text-amber-800">
                        En tant que Destination Management Company 100% malgache, nous nous engageons envers la transparence, la flexibilité, le service exceptionnel, et un tourisme responsable qui bénéficie aux communautés locales tout en préservant le patrimoine naturel de Madagascar.
                    </p>
                </div>
            </div>
        </section>
    </GuestLayout>
</template>

<style scoped>
input:focus,
textarea:focus,
select:focus {
    outline: none;
}
</style>
