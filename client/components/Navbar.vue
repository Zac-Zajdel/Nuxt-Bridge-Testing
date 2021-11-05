<template>
  <nav style="background-color: #222629;">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
      <div class="relative flex items-center justify-between h-16">
        <!-- Mobile menu button-->
        <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
          <button
            v-on-clickaway="closeNavbarDropdown"
            type="button"
            class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
            aria-controls="mobile-menu"
            aria-expanded="false"
            @click="toggleNavbarDropdown"
          >
            <span class="sr-only">Open main menu</span>
            <icon-bars
              class="w-6 h-6"
              :class="isNavbarToggled ? 'hidden' : null"
            />
            <client-only>
              <icon-times
                class="w-6 h-6"
                :class="!isNavbarToggled ? 'hidden' : null"
              />
            </client-only>
          </button>
        </div>

        <!-- User on medium + screens -->
        <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
          <div class="flex-shrink-0 flex items-center">
            <logo />
            <h2 class="text-lg font-bold tracking-tighter text-white uppercase transition duration-500 ease-in-out transform">
              <n-link to="/">
                Venture Code
              </n-link>
            </h2>
          </div>
          <div class="hidden sm:block sm:ml-6">
            <div class="flex space-x-4">
              <span
                v-for="nav in headerNavigation"
                :key="nav.name"
              >
                <n-link
                  :to="`/${nav.route}`"
                  class="block px-3 py-2 rounded-md text-sm font-medium"
                  :class="$route.name === nav.route ? 'bg-gray-600 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'"
                >
                  {{ nav.name }}
                </n-link>
              </span>
            </div>
          </div>
        </div>

        <!-- Notifications and user profile options -->
        <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
          <button class="p-1 rounded-full text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
            <span class="sr-only">View notifications</span>
            <client-only>
              <icon-bell class="w-6 h-6" />
            </client-only>
          </button>

          <div class="ml-3 relative">
            <div>
              <button
                id="user-menu-button"
                v-on-clickaway="closeUserDropdown"
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

            <transition
              mode="out-in"
              enter-class="transform -translate-y-1"
              enter-active-class="transition ease-out duration-150"
              leave-active-class="ease-in duration-100"
              leave-to-class="transform -translate-y-1"
            >
              <dropdown
                v-if="isUserToggled"
                :items="profileNavigation"
                width="w-36"
              />
            </transition>
          </div>
        </div>
      </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <transition
      mode="out-in"
      enter-class="transform -translate-y-1"
      enter-active-class="transition ease-out duration-150"
      leave-active-class="ease-in duration-100"
      leave-to-class="transform -translate-y-1"
    >
      <div
        v-if="isNavbarToggled"
        id="mobile-menu"
        class="sm:hidden"
      >
        <div class="px-2 pt-2 pb-3 space-y-1">
          <span
            v-for="nav in headerNavigation"
            :key="nav.name"
          >
            <n-link
              :to="`/${nav.route}`"
              class="block px-3 py-2 rounded-md text-sm font-medium"
              :class="$route.name === nav.route ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'"
            >
              {{ nav.name }}
            </n-link>
          </span>
        </div>
      </div>
    </transition>
  </nav>
</template>

<script lang="ts">
import Vue from 'vue'

interface route {
  name: string
  route: string
}
type routes = Array<route>

export default Vue.extend({
  data () {
    return {
      isUserToggled: false,
      isNavbarToggled: false,
      headerNavigation: [
        {
          name: 'Blogs',
          route: 'blogs',
        },
        {
          name: 'Snippets',
          route: 'snippets',
        },
        {
          name: 'Code Questions',
          route: 'questions',
        },
      ] as routes,

      profileNavigation: [
        {
          name: 'Profile',
          route: 'profile',
        },
        {
          name: 'Settings',
          route: 'settings',
        },
        {
          name: 'Logout',
          route: 'logout',
        },
      ] as routes,

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
     * @desc Used to close navbar dropdown with v-on-clickaway directive
     */
    closeNavbarDropdown () {
      this.isNavbarToggled = false
    },

    /**
     * @desc Opens dropdown underneath user profile
     */
    toggleUserDropdown () {
      this.isUserToggled = !this.isUserToggled
    },

    /**
     * @desc Used to close user dropdown with v-on-clickaway directive
     */
    closeUserDropdown () {
      this.isUserToggled = false
    },
  },
})
</script>
