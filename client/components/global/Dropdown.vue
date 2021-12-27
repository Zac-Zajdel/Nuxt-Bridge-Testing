<template>
  <div
    class="origin-top-right absolute right-0 mt-2 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-50"
    :class="width"
    role="menu"
    aria-orientation="vertical"
    aria-labelledby="user-menu-button"
    tabindex="-1"
  >
    <span
      v-for="item in items"
      :key="item.name"
      @click="$emit('selected', item.value)"
    >
      <span class="block px-3 py-2 rounded-md cursor-pointer text-sm font-medium hover:bg-gray-100 divide-y divide-y-2">
        {{ item.name }}
      </span>
    </span>
  </div>
</template>

<script lang="ts" setup>
import { PropType } from '@vue/runtime-core'
import { DropdownItems } from '@/types/components'

defineProps({
  items: {
    type: Array as PropType<DropdownItems>,
    required: true,
  },
  width: {
    type: String as PropType<string>,
    default: 'w-48',
  },
})
</script>
