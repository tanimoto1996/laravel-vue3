<script setup>
import { ref } from 'vue';
import { usePage } from '@inertiajs/vue3'
import DashboardView from './DashboardView.vue';
import DashboardView2 from './DashboardView2.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

// このコンポーネントはデータの取得や状態管理を担当します。
// 例えば、APIからデータを取得する、ローカルの状態を管理する等。
// usePage() フックを使用してページのpropsにアクセス
const { props } = usePage();

// propsの中のauth.user.nameにアクセスしてuserDataを取得
const isAuthenticated = ref(true);
const userData = ref(props.auth.user.name);

</script>

<template>
  <AuthenticatedLayout :is-authenticated="isAuthenticated">
    <DashboardView  :user-data="userData" />
    <DashboardView2 :user-data="userData" />
  </AuthenticatedLayout>
</template>