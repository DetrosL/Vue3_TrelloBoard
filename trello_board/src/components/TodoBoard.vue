<script setup>
    import draggable from 'vuedraggable';
    import TodoCard from "./TodoCard.vue";
    import { inject } from 'vue'

    const list_todo     = inject('list_todo');
    const list_columns  = inject('list_columns');

    function onDragEnd(column) {
        console.log("updated:", column.titleC, column.taskC)
    }

</script>
<template>
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
                @end="onDragEnd(column)"
                animation="200"
                ghost-class="ghost"
            >
                <!-- <div v-for="(task, i) in column.taskC" :key="i"> -->
                <template #item="{ element: task }">
                    <TodoCard :task="list_todo[task]"/>
                </template>
                <!-- </div> -->

            </draggable>
        </div>
        <button type="button" class="btn btn-primary add-col text-dark" data-bs-toggle="modal" data-bs-target="#addColModal">
            <span class="material-symbols-outlined">
            add_2
            </span>
        </button>

    </div>
</template>
<style scoped>
    .add-col{
        margin: 20px 20px 10px 30px;
        min-width: 300px;
        min-height: 500px;
        background-color: #f9fafb56;
        border-radius: 10px;
        border: 0;
        box-shadow: 0px 4px 4px #00000040;
    }

    .add-col:hover {
        background-color: #f9fafbc9;
    }

    .ghost {
        opacity: 0.1;
    }
</style>