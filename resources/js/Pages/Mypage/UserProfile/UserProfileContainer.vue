<script setup>
    import { usePage } from '@inertiajs/vue3';
    import { ref } from 'vue';
    import UserProfile from './UserProfilePresentational.vue';

    const { props } = usePage();
    const userData = ref(props.auth.user.name);
</script>

<template>
    <UserProfile v-bind:name="userData" />
</template>