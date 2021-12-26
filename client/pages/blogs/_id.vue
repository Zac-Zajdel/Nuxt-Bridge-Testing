<template>
  <page-wrapper>
    <div
      v-if="blog && blog.body"
      id="app"
    >
      <client-only>
        <label
          for="blog-title"
          class="sr-only"
        >
          Blog Title
        </label>
        <input
          id="blog-title"
          v-model="blog.title"
          type="text"
          name="blog-title"
          autocomplete="email"
          class="block sm:mx-6 lg:mx-8 w-3/4 focus:ring-gray-300 focus:border-gray-300 shadow-sm sm:text-sm border-gray-300 rounded-md"
        >
        <tiptap
          :content="blog.body"
        />
      </client-only>
    </div>
  </page-wrapper>
</template>

<script lang="ts" setup>
import { Blog } from '@/types/api'
import { useNuxtApp } from '#app'
import { useRoute } from '#imports'

// Data
const { $auth, $axios } = useNuxtApp()
const route = useRoute()
const blog = ref<Blog|undefined>(undefined)
const id = computed(() => route.params.id)

onMounted(async () => {
  await get()
})

/**
 * @desc - Obtain specific blog
 */
async function get () {
  blog.value = (await $axios.get(`/user/${$auth.user?.id}/blog/${id.value}`)).data.data
  console.log('Value: ', blog.value)
}
</script>
