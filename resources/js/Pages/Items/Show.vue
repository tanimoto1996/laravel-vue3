<script setup>
import '/resources/scss/Items/show.scss';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import { nl2br } from '@/common'


defineProps({
    item: Object,
});

</script>

<template>
    <Head title="商品詳細" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">商品詳細</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="text-color">
                            {{ item.name }}
                        </div>
                        <div class="text-color">
                            <div class="text-color" v-html="nl2br(item.memo)"></div>
                        </div>
                        <div class="text-color">
                            {{ item.price }}
                        </div>
                        <div class="text-color">
                            <span v-if="item.is_selling === true">販売中</span> 
                            <span v-if="item.is_selling === false">停止中</span> 
                        </div>
                        <Link as="button" :href="route('items.edit', { item: item.id})">
                            編集する
                        </Link>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
