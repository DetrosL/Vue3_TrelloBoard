<script setup lang="ts">
    import Button from '@/components/ui/button/Button.vue';
    import Heads from '@/components/trello/Heads.vue';
    import teste from '@/components/trello/teste.vue';
    import AddEdit from '@/components/trello/AddEdit.vue';
    import AddPosition from '@/components/trello/AddPosition.vue';
    import Card from '@/components/trello/Card.vue';
    import App from '@/layouts/App.vue';
    import { ref, computed, provide } from 'vue';
    import { create as createP }  from '@/routes/position';
    import { create as createT }  from '@/routes/task';
    import { Link } from '@inertiajs/vue3';
    import { defineProps } from 'vue';
import Footer from '@/components/trello/Footer.vue';

    interface Task {
        id: number;
        title: string;
        description: string;
        tags: string[];
        comments: string[];
        steps: string[];
        attaches: string[];
    }

    interface Position {
        id: number;
        desc: string;
        tasks: string[];
    }

    const props = defineProps<{
        title?: string;
        positions?: Position[];
        tasks?: Task[];
    }>();

    console.log('Board TITLE', props.title);
    console.log('Board POSITIONS', props.positions);
    console.log('Board TASKS', props.tasks);
    console.log('Board PROPS', props);

    const list_cols     = ref(props.positions);
    const list_task     = ref(props.tasks);
    const ShowCol       = ref(false);
    const ShowTask      = ref(false);
    const isEdit        = ref(false);
    
    // function openAdd(id: number){
    //     ShowTask.value = true;
    //     console.log('openEditBOARD', id);
    // }

    function openAdd(){
        ShowTask.value = true;
        isEdit.value = false;
    }

    function openCol(){
        ShowCol.value = true;
    }

    function openEdit(id: number){
        ShowTask.value = true;
        isEdit.value = true;
        console.log('openEditBOARD', id);
    }

</script>
<template>
    <App>
        <div class="trello-board">
            <Heads /> <!--@add-task="openAdd"-->
            <!-- <Link :href="createT.url()"><Button></Button></Link> -->
            <Button @click="openCol">New Col</Button>
            <Button @click="openEdit">New Task</Button>

            <teste/>

            <div class="flex overflow-x-auto">
                <div v-for="column in list_cols" :key="column.id" class="trello-column">
                    <div class="trello-header-col">
                        <h1 class="trello-title-col">{{ column.desc }}</h1>
                        <h4 class="trello-qt-col">{{ column.tasks.length }}</h4>
                    </div>       
                    <draggable
                        v-model="column.tasks"
                        :group="{ name: 'tasks', pull: true, put: true }"
                        item-key="id"
                        animation="200"
                        ghost-class="trello-ghost">
                        <template #item="{ element: task }">
                            <!-- <Card :task="list_task[task]" @edit-task="openEdit($event)"/> -->
                        </template>
                    </draggable>
                </div>
                <button type="button" class="trello-add-col text-gray-900"> <!--dark:text-white-->
                    <span class="material-icons">add_2</span>
                </button>
            </div>
            <div v-if="ShowCol">
                <AddPosition class="modal fade"/>
            </div>
            <div v-if="ShowTask">
                <AddEdit/>
            </div>

            <Footer />
        </div>
    </App>
</template>