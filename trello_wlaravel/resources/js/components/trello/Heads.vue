<script setup>
    const emit = defineEmits(['add-task']);

    function openAdd(){
        emit('add-task');
        console.log('HeaderT: openAdd', openAdd);
    }
</script>
<template>
    <header class="bg-white">
        <div class="mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
                <div class="md:flex md:items-center md:gap-12">
                <a class="block text-teal-600" href="#">
                    <span class="sr-only">Home</span>
                    
                    <a class="navbar-brand" href="#"><img src="../../assets/freeline.png" alt="freeline" style="width: 40px;"></a>
                </a>
                </div>
        
                <div class="hidden md:block">
                <nav aria-label="Global">
                    <ul class="flex items-center gap-6 text-sm">
                        <li><a class="text-gray-500 transition hover:text-gray-500/75" href="#"> Workspaces </a> </li>
                        <li><a class="text-gray-500 transition hover:text-gray-500/75" href="#"> Recent </a></li>
            
                        <li>
                            <a class="text-gray-500 transition hover:text-gray-500/75" href="#"> Starred </a>
                        </li>
            
                        <li>
                            <a class="text-gray-500 transition hover:text-gray-500/75" href="#"> Templates </a>
                        </li>
            
                        <li>
                            <!-- <button type="button" class="trello-button-create" @click="openAdd"> Create</button> -->
                            <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">✚ Create</button>
                        </li>
                    </ul>
                </nav>
                </div>
        
                <div class="flex items-center gap-4">
                <div class="sm:flex sm:gap-4">
                    <div class="w-full max-w-sm min-w-[200px]">
                        <div class="relative">
                            <input class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md pl-3 pr-15 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow" placeholder="Search..." />
                        </div>
                    </div>

                    <a href=""><span class="material-icons">notifications</span></a>
                    <a href=""><span class="material-icons">help</span></a>
                    <a href=""><span class="material-icons">account_circle</span></a>

                </div>
        
                <div class="block md:hidden">
                    <button
                    class="rounded-sm bg-gray-100 p-2 text-gray-600 transition hover:text-gray-600/75"
                    >
                    <span class="material-icons">menu</span>
                    </button>
                </div>
                </div>
            </div>
        </div>
    </header>
    <header class="bg-white dark:bg-gray-900">
        <div class="mx-auto flex h-16 max-w-screen-xl items-center gap-8 px-4 sm:px-6 lg:px-8">    
        <div class="flex flex-1 items-center justify-end md:justify-between">
            <nav aria-label="Global" class="hidden md:block">
            <ul class="flex items-center gap-6 text-sm">
                <li>
                <a
                    class="text-gray-500 transition hover:text-gray-500/75 dark:text-white dark:hover:text-white/75"
                    href="#"
                >
                    Development Sprint Board
                </a>
                </li>
                <li>
                <a
                    class="text-gray-500 transition hover:text-gray-500/75 dark:text-white dark:hover:text-white/75"
                    href="#"
                >
                    Dashboard
                </a>
                </li>

            </ul>
            </nav>
    
            <div class="flex items-center gap-4">
            <div class="sm:flex sm:gap-4">    
                <a class="hidden rounded-md bg-gray-100 px-5 py-2.5 text-sm font-medium text-teal-600 transition hover:text-teal-600/75 sm:block dark:bg-gray-800 dark:text-white dark:hover:text-white/75" href="#">
                    Search
                </a>
            </div>
    
            <button
                class="block rounded-sm bg-gray-100 p-2.5 text-gray-600 transition hover:text-gray-600/75 md:hidden dark:bg-gray-800 dark:text-white dark:hover:text-white/75"
            >
                <!-- <span class="sr-only">Toggle menu</span> -->
                    <span class="material-icons">menu</span>
            </button>
            </div>
        </div>
        </div>
    </header>
</template>