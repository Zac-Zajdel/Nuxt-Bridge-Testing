<template>
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
</template>

<script lang="ts" setup>
import { Blogs } from '@/types/api'

const { $auth, $axios } = useContext()
const route = useRouter()
const blogs = ref<Blogs|undefined>(undefined)

onMounted(async () => {
  blogs.value = (await $axios.get(`/user/${$auth.user?.id}/blog`)).data.data

  const result = (await $axios.post(`/user/${$auth.user?.id}/badge`, {
    name: 'New Name 2',
    model: 'blogs',
    model_id: 1,
  })).data.data
  console.log(result)
})

/**
 * @desc - User has selected the card and we are to go to the details page
 * @param id - ID of the blog
 */
function select (id: number) {
  route.push(`/blogs/${id}`)
}
</script>
