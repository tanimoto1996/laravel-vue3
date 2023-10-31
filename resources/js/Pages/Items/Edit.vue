<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import TextAreaInput from '@/Components/TextAreaInput.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, router } from '@inertiajs/vue3';
import { reactive } from 'vue';

const props = defineProps({
    errors: Object,
    item: Object
});

const form = reactive({
    id: props.item.id,
    name: props.item.name,
    memo: props.item.memo,
    price: props.item.price,
    is_selling: props.item.is_selling
})

const updateItem = id => { 
    router.put(route('items.update', { item: id}), form) 
} 

</script>

<template>
    <Head title="商品編集" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">商品編集</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <form @submit.prevent="updateItem(form.id)">
                            <InputLabel for="name" value="name" />
                            <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" required
                                autocomplete="name" />
                            <InputError class="mt-2" :message="errors.name" />

                            <InputLabel for="memo" value="memo" />
                            <TextAreaInput id="memo" type="text" class="mt-1 block w-full" v-model="form.memo" required
                                autocomplete="memo" />
                            <InputError class="mt-2" :message="errors.memo" />

                            <InputLabel for="price" value="price" />
                            <TextInput id="price" type="number" class="mt-1 block w-full" v-model="form.price" required
                                autocomplete="price" />
                            <InputError class="mt-2" :message="errors.price" />

                            <InputLabel for="is_selling" value="is_selling" />
                            <div>
                                <label for="is_selling">販売中</label>
                                <input type="radio" name="is_selling" v-model="form.is_selling" :value=true>
                                <label  class="ml-2" for="is_selling">停止中</label>
                                <input type="radio" name="is_selling" v-model="form.is_selling" :value=false>
                            </div>
                            <InputError class="mt-2" :message="errors.is_selling" />

                            <PrimaryButton class="ml-0 mt-3" :class="{ 'opacity-25': form.processing }"
                                :disabled="form.processing">
                                更新する
                            </PrimaryButton>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
