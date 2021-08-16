<template>
  <div class="container mx-auto p-2 lg:p-8 flex flex-col">
    <ul v-if="users.length === 0" class="grid grid-cols-1 gap-6 bg-gray-100 rounded p-8 w-full sm:grid-cols-2 lg:grid-cols-3">
      <contact-card-skeleton v-for="i in 9" :key="`skel-${i}`" />
    </ul>
    <ul v-if="users.length > 0" class="grid grid-cols-1 gap-6 bg-gray-100 rounded p-8 w-full sm:grid-cols-2 lg:grid-cols-3">
      <contact-card v-for="(user, index) in users" :key="index" :user="user" />
    </ul>
  </div>
</template>

<script lang="ts">
import Vue from 'vue'
import { Users } from '@/types/api'

export default Vue.extend({
  data () {
    const users: Users = []
    const count: number = 9

    return {
      users,
      count,
      login: false,
    }
  },
  mounted () {
    this.get(this.count)
    console.log(this.$auth)
  },
  methods: {
    async get (count: number): Promise<void> {
      this.users = (
        await this.$axios.get('/api/users', { params: { count } })
      ).data.data as Users
    },
    total (count: number): void {
      this.users = []
      this.count = count
      this.get(this.count)
    },
  },
})
</script>
