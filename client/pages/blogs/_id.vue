<template>
  <page-wrapper>
    <div
      v-if="blog && blog.body"
      id="app"
    >
      <client-only>
        <tiptap
          v-model="blog.body"
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
