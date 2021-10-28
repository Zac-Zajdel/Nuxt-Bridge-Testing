<template>
  <page-wrapper>
    <div
      v-for="(blog, index) in blogs"
      :key="index"
      class="py-3"
    >
      <card
        :title="blog.title"
        description="In this tutorial I will show you how to create simple modals in Tailwind CSS. This utility-based framework allows you to..."
        @select="select"
      />
    </div>
  </page-wrapper>
</template>

<script lang="ts" setup>
import { Blogs } from '@/types/api'

const { $auth, $axios } = useContext()
const blogs = ref<Blogs|undefined>(undefined)

onMounted(async () => {
  blogs.value = (await $axios.get(`/user/${$auth.user?.id}/blog`)).data.data
  console.log('Value: ', blogs.value)
})

function select () {
  console.log('Hello world')
}
</script>
