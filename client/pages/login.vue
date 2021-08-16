<template>
  <section class="flex flex-col items-center md:flex-row mt-40">
    <div class="container mx-auto">
      <div class="flex justify-center px-2 py-6">
        <div class="flex w-full rounded-lg xl:w-3/4 lg:w-11/12 lg:shadow-xl">
          <div class="relative hidden w-full h-auto bg-white bg-cover border-r rounded-l-lg lg:block lg:w-6/12">
            <div class="relative z-10 m-12 text-left">
              <a class="flex items-center w-38 mb-4 font-medium text-gray-900 title-font md:mb-10">
                <logo />
                <h2 class="w-full text-lg font-bold tracking-tighter text-black uppercase transition duration-500 ease-in-out transform hover:text-lightBlack-500 dark:text-lightBlue-400"> Venture Code </h2>
              </a>
              <h2 class="mt-12 mb-2 text-2xl font-semibold tracking-tighter text-black sm:text-3xl title-font"> Create an account. </h2>
              <div class="mt-16 mb-8 text-base leading-relaxed text-gray-900 sm:md:w-3/3 lg:text-1xl">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
              </div>
            </div>
          </div>
          <div class="w-full px-8 py-24 bg-white rounded-lg border-gray-100 lg:w-8/12 lg:px-24 lg:py-4 lg:rounded-l-none">
            <div class="relative z-10 text-left ">
              <form class="mt-6" action="#" method="POST">
                <div>
                  <label class="block text-base font-medium leading-relaxed text-gray-700">User Name</label>
                  <input id="" type="text" name="" placeholder="Your User Name " class="w-full px-4 py-2 mt-2 text-base transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-100 focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ext-black focus:border-gray-500">
                </div>
                <div class="mt-4">
                  <label class="block text-base font-medium leading-relaxed text-gray-700">Email Address</label>
                  <input
                    id=""
                    type="email"
                    name=""
                    placeholder="Your Email "
                    class="w-full px-4 py-2 mt-2 text-base transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-100 focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ext-black focus:border-gray-500"
                    autocomplete=""
                    required=""
                  >
                </div>
                <div class="flex flex-wrap mt-4 mb-6 -mx-3">
                  <div class="w-full px-3 mb-6 md:w-1/2 md:mb-0">
                    <label class="text-base font-medium leading-relaxed text-gray-700" for="password" minlength="6"> Password </label>
                    <input id="password" class="block w-full px-4 py-2 mt-2 text-base text-black transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-100 focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ext-black focus:border-gray-500" type="text" placeholder="Your Password">
                    <p class="mt-1 text-xs italic text-black">Please fill out this field.</p>
                  </div>
                  <div class="w-full px-3 md:w-1/2">
                    <label class="text-base font-medium leading-relaxed text-gray-700" for="confirm"> Confirm </label>
                    <input id="confirm" class="block w-full px-4 py-2 mt-2 text-base text-black transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-100 focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ext-black focus:border-gray-500 " type="text" placeholder="Confirm">
                  </div>
                </div>
                <button
                  type="submit"
                  class="block w-full px-4 py-3 mt-6 font-semibold text-white transition duration-500 ease-in-out transform rounded-lg bg-gradient-to-r from-black hover:from-black to-black focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 hover:to-black"
                  @click.prevent="login"
                >
                  Log In
                </button>
              </form>
              <p class="mt-8 text-center">Already have an account? <a href="#" class="font-semibold text-black hover:text-black">Sign In</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script lang="ts">
import Vue from 'vue'

export default Vue.extend({
  data () {
    return {
      credentials: {},
    }
  },
  head () {
    return {
      title: 'Login',
    }
  },
  mounted () {
    console.log(this.$auth)
    if (this.$auth.loggedIn)
      this.$router.push('/')
  },
  methods: {
    login () {
      this.$auth.loginWith('laravelSanctum', {
        data: {
          email: 'zaczajdel213@gmail.com',
          password: 'password',
        },
      })
    },
  },
})
</script>
