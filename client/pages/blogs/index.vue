<template>
  <page-wrapper>
    <card
      title="Hello world Title section"
      description="In this tutorial I will show you how to create simple modals in Tailwind CSS. This utility-based framework allows you to..."
      @select="select"
    />
  </page-wrapper>
</template>

<script lang="ts" setup>
const { $auth, $axios } = useContext()

onMounted(() => {
  const value = $axios.get(`/user/${$auth.user?.id}/blog`)
  console.log('Value: ', value)
})

function select () {
  console.log('Hello world')
}
</script>
