<template>
  <div v-if="blogs && blogs.length">
    <page-wrapper>
      <div
        v-for="(blog, index) in blogs"
        :key="index"
        class="py-3"
      >
        <card
          v-if="blog"
          :blog="blog"
          @select="select(blog.id)"
        />
      </div>
    </page-wrapper>
  </div>
  <div v-else>
    <page-wrapper>
      <div
        v-for="index in [1, 2, 3, 4, 5]"
        :key="index"
        class="py-3"
      >
        <card-skeleton />
      </div>
    </page-wrapper>
  </div>
</template>

<script lang="ts" setup>
import { Blogs } from '@/types/api'
import { useNuxtApp } from '#app'

const { $auth, $axios } = useNuxtApp()
const route = useRouter()
const blogs = ref<Blogs|undefined>(undefined)

onMounted(async () => {
  try {
    blogs.value = (await $axios.get(`/user/${$auth.user?.id}/blog`)).data.data
  } catch (e) {}
})

/**
 * @desc - User has selected the card and we are to go to the details page
 * @param id - ID of the blog
 */
function select (id: number) {
  route.push(`/blogs/${id}`)
}
</script>
