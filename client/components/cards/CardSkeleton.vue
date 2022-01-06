<template>
  <div class="flex flex-col justify-between col-span-8 overflow-hidden transition-shadow duration-500 rounded-none sm:border theme-bg theme-shadow theme-border hover:shadow-xl ease dark:bg-dark-900 sm:rounded-xl xl:col-span-8">
    <div class="px-8 py-4 mx-auto bg-white rounded-lg shadow-md w-full">
      <div class="mt-2">
        <!-- Title and tags -->
        <div class="flex items-center justify-between">
          <a class="text-2xl w-32 skeleton">
            &nbsp;
          </a>

          <div>
            <!-- Associated Badges -->
            <a
              v-for="index in [1, 2, 3]"
              :key="index"
              class="hidden sm:inline-block p-1 mx-1 transition-colors duration-200 transform rounded skeleton w-8"
            >
              &nbsp;
            </a>
          </div>
        </div>

        <!-- Brief description -->

        <span class="flex">
          <p
            v-for="index in [1, 2, 3, 4, 5]"
            :key="index"
            class="skeleton mt-2 mr-1 w-56"
          >
            &nbsp;
          </p>
        </span>
      </div>

      <div class="flex items-center justify-between mt-4">
        <div class="flex items-center py-2">
          <span class="hidden skeleton w-8 h-8 mr-3 rounded-full sm:block">&nbsp;</span>
          <a class="skeleton w-24 cursor-pointer font-medium dark:text-gray-200">&nbsp;</a>
          <span class="skeleton w-24 ml-3">&nbsp;</span>
        </div>

        <div class="flex items-center p-1 rounded-md">
          <icon-bell
            class="w-5 h-5"
          />
        </div>
      </div>
    </div>
  </div>
</template>
