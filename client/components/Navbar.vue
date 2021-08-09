<template>
  <nav class="bg-gray-800">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
      <div class="relative flex items-center justify-between h-16">
        <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
          <!-- Mobile menu button-->
          <button
            type="button"
            class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
            aria-controls="mobile-menu"
            aria-expanded="false"
            @click="toggleNavbarDropdown"
          >
            <span class="sr-only">Open main menu</span>
            <!--
              Icon when menu is closed.

              Heroicon name: outline/menu

              Menu open: "hidden", Menu closed: "block"
            -->
            <icon-bars
              class="w-6 h-6"
              :class="isNavbarToggled ? 'hidden' : null"
            />
            <!--
              Icon when menu is open.

              Heroicon name: outline/x

              Menu open: "block", Menu closed: "hidden"
            -->
            <client-only>
              <icon-times
                class="w-6 h-6"
                :class="!isNavbarToggled ? 'hidden' : null"
              />
            </client-only>
          </button>
        </div>
        <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
          <div class="flex-shrink-0 flex items-center">
            <h2 class="w-2 h-2 p-2 mr-2 rounded-full bg-gradient-to-tr from-blue-300 to-blue-600" />
            <h2 class="text-lg font-bold tracking-tighter text-white uppercase transition duration-500 ease-in-out transform">
              <n-link to="/">
                Venture Code
              </n-link>
            </h2>
          </div>
          <div class="hidden sm:block sm:ml-6">
            <div class="flex space-x-4">
              <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
              <n-link
                :to="'/blogs'"
                class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium"
              >
                Blogs
              </n-link>
              <n-link
                :to="'/snippets'"
                class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium"
              >
                Snippets
              </n-link>
              <n-link
                :to="'/questions'"
                class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium"
              >
                Code Questions
              </n-link>
            </div>
          </div>
        </div>
        <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
          <button class="bg-gray-800 p-1 rounded-full text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
            <span class="sr-only">View notifications</span>
            <client-only>
              <icon-bell class="w-6 h-6" />
            </client-only>
          </button>

          <div class="ml-3 relative">
            <div>
              <button
                id="user-menu-button"
                type="button"
                class="bg-gray-800 flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"
                aria-expanded="false"
                aria-haspopup="true"
                @click="toggleUserDropdown"
              >
                <span class="sr-only">Open user menu</span>
                <img
                  class="h-8 w-8 rounded-full"
                  src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                  alt=""
                >
              </button>
            </div>

            <!--
              Dropdown menu, show/hide based on menu state.

              Entering: "transition ease-out duration-100"
                From: "transform opacity-0 scale-95"
                To: "transform opacity-100 scale-100"
              Leaving: "transition ease-in duration-75"
                From: "transform opacity-100 scale-100"
                To: "transform opacity-0 scale-95"
            -->
            <!-- Active: "bg-gray-100", Not Active: "" -->
            <div
              v-if="isUserToggled"
              class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
              role="menu"
              aria-orientation="vertical"
              aria-labelledby="user-menu-button"
              tabindex="-1"
            >
              <a id="user-menu-item-0" href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1">Your Profile</a>
              <a id="user-menu-item-1" href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1">Settings</a>
              <a id="user-menu-item-2" href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1">Sign out</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div
      v-if="isNavbarToggled"
      id="mobile-menu"
      class="sm:hidden"
    >
      <div class="px-2 pt-2 pb-3 space-y-1">
        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
        <n-link
          :to="'/blogs'"
          class="block bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium"
        >
          Blogs
        </n-link>
        <n-link
          :to="'/snippets'"
          class="block text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium"
        >
          Snippets
        </n-link>
        <n-link
          :to="'/questions'"
          class="block text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium"
        >
          Code Questions
        </n-link>
      </div>
    </div>
  </nav>
</template>

<script lang="ts">
import Vue from 'vue'
// TODO - Add vue-clickaway but make this be a NUXT plugin

export default Vue.extend({
  data () {
    return {
      isUserToggled: false,
      isNavbarToggled: false,
    }
  },
  methods: {
    /**
     * @desc Opens dropdown underneath right side navbar
     */
    toggleNavbarDropdown () {
      this.isNavbarToggled = !this.isNavbarToggled
    },

    /**
     * @desc Opens dropdown underneath user profile
     */
    toggleUserDropdown () {
      this.isUserToggled = !this.isUserToggled
    },
  },
})
</script>
