<template>
  <page-wrapper>
    <div>
      Details Tab
    </div>
  </page-wrapper>
</template>

<script lang="ts" setup>
import { Blog } from '@/types/api'

// Data
const { $auth, $axios } = useContext()
const route = useRoute()
const blog = ref<Blog|undefined>(undefined)
const id = computed(() => route.value.params.id)

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
