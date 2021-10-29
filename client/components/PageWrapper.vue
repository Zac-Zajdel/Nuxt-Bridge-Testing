<template>
  <div
    class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8"
    :class="className"
  >
    <slot />
  </div>
</template>

<script lang="ts" setup>
defineProps({
  className: String,
})
</script>
