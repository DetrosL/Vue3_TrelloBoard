<script setup>
    import { ref } from 'vue'
    import { router } from '@inertiajs/vue3'
    import route from 'ziggy-js'

    const $page = usePage()

    const tags_task = ref([])
    const steps_task = ref([])

    const tag = ref('')
    const color = ref('#000000')
    const title_step = ref('')
    const completed_step = ref(false)
    const currentTaskId = ref(null)

    async function saveTask() {
    const payload = {
        board_id: selectedBoardId.value,
        position_id: 1,
        creator_id: $page.props.auth.user.id,
        user_id: $page.props.auth.user.id,
        nome: title_task.value,
        desc: desc_task.value,
        dt_start: new Date().toISOString().split('T')[0],
        dt_end: null,
    }

    await router.post(route('task.store'), payload, {
        onSuccess: (page) => {
        console.log('Task criada:', page.props)
        currentTaskId.value = page.props?.task?.id || null
        },
        onError: (err) => console.error(err),
    })
    }

    async function addStep() {
        if (!title_step.value.trim()) return
            const stepPayload = {
                user_id: $page.props.auth.user.id,
                task_id: currentTaskId.value, // precisa existir task
                desc: title_step.value,
                completed: completed_step.value,
        }

        try {
            const response = await router.post(route('step.store'), stepPayload, {
            onSuccess: (page) => console.log('Step salvo:', page.props),
            onError: (err) => console.error('Erro ao salvar step:', err),
            })
            steps_task.value.push({
            id: Date.now(),
            titleS: title_step.value,
            completedS: completed_step.value,
            })
        } catch (error) {
            console.error(error)
        }

        title_step.value = ''
        completed_step.value = false
    }

    async function addTag() {
        if (!tag.value.trim()) return
            const tagPayload = {
                user_id: $page.props.auth.user.id,
                task_id: currentTaskId.value,
                title: tag.value,
                color: color.value,
        }

        try {
            await router.post(route('tag.store'), tagPayload, {
            onSuccess: (page) => console.log('Tag salva:', page.props),
            onError: (err) => console.error('Erro ao salvar tag:', err),
            })
            tags_task.value.push({
            id: Date.now(),
            titleG: tag.value,
            colorG: color.value,
            })
        } catch (error) {
            console.error(error)
        }

        tag.value = ''
        color.value = '#000000'
    }

    // function delTag(tagItem) {
    //     tags_task.value = tags_task.value.filter(t => t.id !== tagItem.id)
    // }
</script>
<template>
</template>
<style scoped>
</style>
