<template>
  <section class="flex flex-col items-center h-screen md:flex-row">
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
              <div class="flex justify-center mx-auto w-56 lg:py-6">
                <button type="button" class="inline-flex w-full px-4 py-3 font-semibold text-black transition duration-500 ease-in-out transform bg-white border rounded-lg border-gray-300 hover:bg-black hover:text-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2">
                  <div class="flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="w-6 h-6" viewBox="0 0 48 48">
                      <defs>
                        <path id="a" d="M44.5 20H24v8.5h11.8C34.7 33.9 30.1 37 24 37c-7.2 0-13-5.8-13-13s5.8-13 13-13c3.1 0 5.9 1.1 8.1 2.9l6.4-6.4C34.6 4.1 29.6 2 24 2 11.8 2 2 11.8 2 24s9.8 22 22 22c11 0 21-8 21-22 0-1.3-.2-2.7-.5-4z" />
                      </defs>
                      <clipPath id="b">
                        <use xlink:href="#a" overflow="visible" />
                      </clipPath>
                      <path clip-path="url(#b)" fill="#FBBC05" d="M0 37V11l17 13z" />
                      <path clip-path="url(#b)" fill="#EA4335" d="M0 11l17 13 7-6.1L48 14V0H0z" />
                      <path clip-path="url(#b)" fill="#34A853" d="M0 37l30-23 7.9 1L48 0v48H0z" />
                      <path clip-path="url(#b)" fill="#4285F4" d="M48 48L17 24l-4-3 35-10z" />
                    </svg>
                    <span class="ml-4"> Log in with Google </span>
                  </div>
                </button>
              </div>
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
                <button type="submit" class="block w-full px-4 py-3 mt-6 font-semibold text-white transition duration-500 ease-in-out transform rounded-lg bg-gradient-to-r from-black hover:from-black to-black focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 hover:to-black">Log In</button>
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
    return {}
  },
  head () {
    return {
      title: 'Login',
    }
  },
  mounted () {
    // if (this.$auth.loggedIn)
    //   this.$router.push('/')
  },
})
</script>
