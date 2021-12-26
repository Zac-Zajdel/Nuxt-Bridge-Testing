<template>
  <page-wrapper>
    <div>
      Details Tab
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
 * @desc - Obtin specific blog
 */
async function get () {
  blog.value = (await $axios.get(`/user/${$auth.user?.id}/blog/${id.value}`)).data.data
  console.log('Value: ', blog.value)
}
</script>
