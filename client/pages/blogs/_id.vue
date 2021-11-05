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

// Data
const { $auth, $axios } = useContext()
const route = useRoute()
const blog = ref<Blog>()
const id = computed(() => route.value.params.id)

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
