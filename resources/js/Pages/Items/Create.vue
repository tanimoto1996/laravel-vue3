<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import TextAreaInput from '@/Components/TextAreaInput.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, router } from '@inertiajs/vue3';
import { reactive } from 'vue';

defineProps({
    errors: Object
});

const form = reactive({ 
    name: null, 
    memo: null, 
    price: null 
}) 

const storeItem = () => { 
    router.post('/items', form) 
} 
</script>

<template>
    <Head title="商品登録" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">商品登録</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <form @submit.prevent="storeItem">
                            <InputLabel for="name" value="name" />

                            <TextInput
                                id="name"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.name"
                                required
                                autocomplete="name"
                            />

                            <InputError class="mt-2" :message="errors.name" />
                        
                            <InputLabel for="memo" value="memo" />

                            <TextAreaInput
                                id="memo"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.memo"
                                required
                                autocomplete="memo"
                            />

                            <InputError class="mt-2" :message="errors.memo" />
                
                            <InputLabel for="price" value="price" />

                            <TextInput
                                id="price"
                                type="number"
                                class="mt-1 block w-full"
                                v-model="form.price"
                                required
                                autocomplete="price"
                            />

                            <InputError class="mt-2" :message="errors.price" />

                            <PrimaryButton class="ml-0 mt-3" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                ログイン
                            </PrimaryButton>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
