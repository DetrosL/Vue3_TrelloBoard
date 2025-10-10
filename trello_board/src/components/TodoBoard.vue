<script setup>
    import draggable from 'vuedraggable';
    import TodoColumns from "./TodoColumns.vue";
    import TodoTask from "./TodoTask.vue";
    import TodoCard from "./TodoCard.vue";
    import { inject, ref } from 'vue';

    const list_todo     = inject('list_todo');
    const list_columns  = inject('list_columns');
    let isOpened        = false;

    const openTask = () => {
        console.log('teste');
        isOpened = true;
        console.log(isOpened);
    };
    const closeTask = () => {
        isOpened = false;
    };

</script>
<template>
    <button type="button" class="btn btn-primary" @click="openTask">
        ✚ Create
    </button> 
    <TodoColumns />
    <TodoTask :showModal="isOpened" @close-task="closeTask" name="task-modal"/>
    <div class="d-flex items-start overflow-x-auto overflow-y-auto" style="margin-bottom: 70px;">
        <div v-for="column in list_columns" :key="column.id" class="column list-group-item">
            <div class="header-col">
                <h1 class="title-col">{{ column.titleC }}</h1>
                <h4 class="qt-col">{{ column.taskC.length }}</h4>
            </div>            
            <draggable
                v-model="column.taskC"
                :group="{ name: 'tasks', pull: true, put: true }"
                item-key="id"
                animation="200"
                ghost-class="ghost">
                <template #item="{ element: task }">
                    <TodoCard :task="list_todo[task]"/>
                </template>
            </draggable>
        </div>
        <button type="button" class="btn btn-primary add-col text-dark" data-bs-toggle="modal" data-bs-target="#addColModal">
            <span class="material-symbols-outlined">
            add_2
            </span>
        </button>

    </div>
</template>