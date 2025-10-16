<script setup>
    import { defineProps } from 'vue'
    const props = defineProps({
        task: Object,
        required: true
    })

    const emit = defineEmits(["edit-task"]);

    function openEdit(){
        emit('edit-task', props.task.id);
    }

</script>
<template>
    <div v-if="props.task" class="card" :style="{borderLeftColor: props.task.tagT[0].colorG }" @edit-task="openEdit">
        <div class="card0" >
            <div v-for="tag in props.task.tagT" :key="tag.id" class="card-color" :style="{backgroundColor: tag.colorG }"></div>
        </div>
        <div class="card1">
            <p>{{ props.task.titleT }}</p>
        </div>
        <div class="card2">

            <div class="card2-1">
                <a v-if="props.task.stepsT.length > 0" class="icons" href="">
                    <span class="material-symbols-outlined text-dark s_check">check_box</span> <!--{{ props.task.stepsT.filter(item => item === true).length }}--><>/{{ props.task.stepsT.length }} 
                </a>
                <a v-if="props.task.commentsT.length > 0" class="icons"  href="">
                    <span class="material-symbols-outlined text-dark s_comment">mode_comment</span> {{ props.task.commentsT.length }}
                </a>
                <a v-if="props.task.attachT.length > 0" class="icons"  href="">
                    <span class="material-symbols-outlined text-dark s_attach">attachment</span> {{ props.task.attachT.length }}
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
