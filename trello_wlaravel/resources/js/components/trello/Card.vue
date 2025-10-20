<script setup lang="ts">
    import { defineProps, ref } from 'vue'

    interface Task {
        id: number;
        title: string;
        description: string;
        tags: string[];
        comments: string[];
        steps: string[];
        attaches: string[];
    }

    const props = defineProps<{
        tasks?: Task[];
    }>();

    console.log('Board TITLE', props.title);

    console.log('Card TASK', props.task);

    // const emit = defineEmits(["edit-task"]);

    // function openEdit(){
    //     emit('edit-task', task.id);
    // }
</script>
<template>
    <div v-if="props.task" class="card" :style="{borderLeftColor: props.task.tags[0].color }" @edit-task="openEdit">
        <div class="card0" >
            <div v-for="tag in props.task.tags" :key="tag.id" class="card-color" :style="{backgroundColor: tag.color }"></div>
        </div>
        <div class="card1">
            <p>{{ props.task.title }}</p>
        </div>
        <div class="card2">

            <div class="card2-1">
                <a v-if="props.task.steps.length > 0" class="icons" href="">
                    <span class="material-symbols-outlined text-dark s_check">check_box</span> <!--{{ task.stepsT.filter(item => item === true).length }}--><>/{{ props.task.steps.length }} 
                </a>
                <a v-if="props.task.comments.length > 0" class="icons"  href="">
                    <span class="material-symbols-outlined text-dark s_comment">mode_comment</span> {{ props.task.comments.length }}
                </a>
                <a v-if="props.task.attaches.length > 0" class="icons"  href="">
                    <span class="material-symbols-outlined text-dark s_attach">attachment</span> {{ props.task.attaches.length }}
                </a>
            </div>
            <div class="card2-2">
                <a v-if="true" class="icons"  href=""><!--props.task.circle-->
                    <span class="material-symbols-outlined text-dark">account_circle</span>
                    <span class="material-symbols-outlined text-dark">account_circle</span>
                </a>
            </div>
             
        </div>
    </div>
</template>
