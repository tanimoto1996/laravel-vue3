<script setup>
import { Head } from '@inertiajs/vue3';
import { defineProps } from 'vue';

const props = defineProps({
  userData: Object,
});

console.log(props.userData);

</script>

<template>
  <Head title="Dashboard" />
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
          ポイント
        </div>
        <div class="p-6 text-gray-900">
          プロフィール
        </div>
        <div class="p-6 text-gray-900">
          応援履歴
        </div>
        <div class="p-6 text-gray-900">
          ランキング
        </div>
      </div>
    </div>
  </div>
</template>