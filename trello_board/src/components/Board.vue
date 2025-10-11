<script setup>
    import HeaderT from './HeaderT.vue';
    import AddColumns from "./AddColumns.vue"
    import AddEdit from "./AddEdit.vue";
    import Card from "./Card.vue";
    import FooterT from './FooterT.vue';
    import draggable from 'vuedraggable';
    import { inject, ref } from 'vue';

    const list_todo     = inject('list_todo');
    const list_columns  = inject('list_columns');
    const isOpened      = ref(false)
    const isEdit        = ref(false)
    const selectedId    = ref(null)

    function openAdd(){
        isOpened.value   = true;
        isEdit.value     = false;
        selectedId.value = null;
        console.log('openAddHOME', isOpened.value, isEdit.value, selectedId.value);
    }

    function openEdit(id){
        isOpened.value   = true;
        isEdit.value     = true;
        selectedId.value = id;
        console.log('openEditHOME', isOpened.value, isEdit.value, selectedId.value);
    }

    function closeTask(){
        isOpened.value   = false;
        isEdit.value     = false;
        selectedId.value = null;
        console.log('closeTaskHOME', isOpened.value, isEdit.value, selectedId.value);
    }

</script>
<template>    
    <HeaderT @add-task="openAdd"/>
    <AddColumns />

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
                    <Card :task="list_todo[task]" @edit-task="openEdit($event)"/>
                </template>
            </draggable>
        </div>
        <button type="button" class="btn btn-primary add-col text-dark" data-bs-toggle="modal" data-bs-target="#addColModal">
            <span class="material-symbols-outlined">
            add_2
            </span>
        </button>
    </div>

    <AddEdit :showModal="isOpened" :isEdit="isEdit" :id="selectedId" @close-task="closeTask" name="task-modal"/>

    <FooterT />
</template>