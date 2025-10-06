<script setup>
    import TodoHeader from './components/TodoHeader.vue';
    import TodoForm from './components/TodoForm.vue';
    import TodoFooter from './components/TodoFooter.vue';
    import { ref, provide } from 'vue'
    
    const list_todo = ref([]);
    provide('list_todo', list_todo);
</script>
<template>
    <div>
         <TodoHeader />
         <TodoForm />
         <TodoFooter />
    </div>
</template>
<style scoped>
</style>