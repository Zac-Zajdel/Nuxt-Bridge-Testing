<template>
  <div
    class="flex flex-col justify-between col-span-8 overflow-hidden transition-shadow duration-500 rounded-none sm:border theme-bg theme-shadow theme-border hover:shadow-xl ease dark:bg-dark-900 sm:rounded-xl xl:col-span-8"
  >
    <div class="px-8 py-4 mx-auto bg-white rounded-lg shadow-md dark:bg-gray-800 w-full">
      <div class="mt-2">
        <!-- Title and tags -->
        <div class="flex items-center justify-between">
          <a
            class="text-2xl font-bold text-gray-700 dark:text-white hover:text-gray-600 dark:hover:text-gray-200 hover:underline cursor-pointer"
            @click="selectCard"
          >
            {{ blog.title }}
          </a>

          <div>
            <!-- Associated Badges -->
            <a
              v-for="(badge, index) in blog.badges"
              :key="index"
              class="hidden sm:inline-block p-1 mx-1 text-xs font-semibold text-gray-100 transition-colors duration-200 transform bg-gray-600 rounded cursor-pointer hover:bg-gray-500"
            >
              {{ badge.name }}
            </a>
          </div>
        </div>

        <!-- Brief description -->
        <p
          class="mt-2 text-gray-600 dark:text-gray-300"
          v-html="blog.body"
        />
      </div>

      <div class="flex items-center justify-between mt-4">
        <a
          class="text-blue-600 dark:text-blue-400 hover:underline cursor-pointer"
          @click="selectCard"
        >
          Read more
        </a>

        <div class="flex items-center">
          <img class="hidden object-cover w-8 h-8 mx-3 rounded-full sm:block" src="https://images.unsplash.com/photo-1502980426475-b83966705988?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=40&q=80" alt="avatar">
          <a class="text-gray-700 cursor-pointer font-medium dark:text-gray-200">{{ blog.user.name }}</a>
          <span class="pl-3 text-sm font-normal text-gray-600 dark:text-gray-400">{{ $dayjs(blog.created_at).format('MM/DD/YYYY') }}</span>
        </div>
      </div>
    </div>
  </div>
</template>

<script lang="ts" setup>
import { PropType } from '@nuxtjs/composition-api'
import { Blog } from '@/types/api'

defineProps({
  blog: {
    type: Object as PropType<Blog>,
    required: true,
  },
})

const emit = defineEmits(['select'])

/**
 * @desc Click event on the entire card
 */
function selectCard () {
  emit('select')
}
</script>
