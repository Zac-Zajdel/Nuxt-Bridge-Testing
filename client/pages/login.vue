<template>
  <div class="min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
      <div>
        <span class="flex justify-center">
          <logo />
        </span>
        <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
          Sign in to Venture Code
        </h2>
      </div>
      <div class="mt-8 space-y-6">
        <div class="rounded-md shadow-sm -space-y-px">
          <div>
            <label for="email-address" class="sr-only">Email address</label>
            <input
              id="email-address"
              v-model="userLogin.email"
              name="email"
              type="email"
              autocomplete="email"
              required
              class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
              placeholder="Email address"
            >
          </div>
          <div>
            <label for="password" class="sr-only">Password</label>
            <input
              id="password"
              v-model="userLogin.password"
              name="password"
              type="password"
              autocomplete="current-password"
              required
              class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
              placeholder="Password"
            >
          </div>
        </div>
        <div>
          <button
            class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
            @click="login"
          >
            <span class="absolute left-0 inset-y-0 flex items-center pl-3">
              <icon-user-lock
                class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400"
              />
            </span>
            Sign in
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script lang="ts" setup>
const { $auth } = useContext()
const $router = useRouter()
const userLogin = ref({
  email: '',
  password: '',
})

onMounted(() => {
  if ($auth.loggedIn)
    $router.push('/')
})

/**
 * @desc Logs in user with an email and password
 */
function login () {
  $auth.loginWith('laravelSanctum', {
    data: {
      email: userLogin.value.email,
      password: userLogin.value.password,
    },
  })
}
</script>
