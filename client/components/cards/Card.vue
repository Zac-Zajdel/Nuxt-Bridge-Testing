<template>
  <div
    class="flex flex-col justify-between col-span-8 overflow-hidden transition-shadow duration-500 rounded-none sm:border theme-bg theme-shadow theme-border hover:shadow-xl ease dark:bg-dark-900 sm:rounded-xl xl:col-span-8"
  >
    <div
      class="relative p-0 rounded-none cursor-pointer sm:rounded-t-xl"
      @click="selectCard"
    >
      <div class="flex flex-col">
        <div class="flex flex-col w-full py-6 sm:px-4 sm:flex-row sm:p-6">
          <div class="relative px-4 sm:px-0">
            <h1 class="text-xl font-medium theme-text">{{ title }}</h1>
            <div class="inline-block mt-2 text-sm opacity-50 theme-text sm:text-sm">
              {{ description }}
            </div>
          </div>
          <!-- Image -->
          <div
            class="relative flex-shrink-0 hidden block w-full h-full p-0 mt-5 overflow-hidden mx-auto sm:block sm:mt-0 sm:w-64 sm:rounded-lg"
          >
            <img
              src="https://cdn.devdojo.com/posts/images/October2021/creating-modals-in-laravel-livewire1.jpg"
              width="1280"
              height="auto"
              class="object-cover w-full h-auto"
              data-src="https://cdn.devdojo.com/posts/images/October2021/creating-modals-in-laravel-livewire1.jpg"
              alt="Creating Modals in Laravel Livewire"
            />
          </div>
        </div>
      </div>
    </div>

    <!-- Feed Item Details -->
    <div
      class="flex justify-between px-4 pb-6 border-b border-gray-200 rounded-none sm:border-none sm:rounded-b-xl sm:p-6 sm:pt-0"
    >
      <div class="flex items-center space-x-3">
        <a href="tnylea" onclick="window.ignoreDynamicClick = true;" class="flex-shrink-0">
          <img
            class="w-8 h-8 rounded-full"
            src="https://cdn.devdojo.com/users/April2021/tnylea.jpg"
            alt
          />
        </a>
        <p class="text-sm font-medium text-gray-900">
          <a
            href="tnylea"
            onclick="window.ignoreDynamicClick = true;"
            class="hover:underline ignore-dynamic-click"
          >Tony Lea</a>
        </p>
        <p class="text-sm text-gray-500">3 hours ago</p>
      </div>

      <!-- Reactions and Bookmark -->
      <div class="flex">
        <div>
          <div wire:id="477F30Kb46xS7K3uS2v8">
            <div
              class="relative flex items-center justify-center reaction"
              x-data="{ showReactions: false }"
            >
              <div
                class="rounded-md flex relative justify-between items-center py-1 px-3 cursor-pointer h-8 bg-gray-100 dark:bg-dark-990 hover:bg-blue-100 dark-hover:bg-dark-800"
                x-on:mouseenter="showReactions = true"
                x-on:mouseleave="showReactions = false"
              >
                <div class="flex items-center justify-center">
                  <img class="w-4 h-4 mr-2" src="https://cdn.devdojo.com/images/emojis/unicorn.png" />
                  <span class="text-sm font-medium text-blue-500">1</span>
                </div>

                <div x-show="showReactions" style="display: none;">
                  <div class="absolute bottom-0 right-0 select-none">
                    <div
                      class="w-64 p-3 pt-2 mb-10 bg-white rounded-md shadow-xl dark:bg-dark-750 dark:bg-dark-850"
                    >
                      <h5 class="mt-1 mb-1 ml-1 text-xs font-medium text-gray-500">Select One:</h5>
                      <div class="grid grid-cols-5 reactions no-load">
                        <div
                          class="flex col-span-1 justify-center items-center rounded-md cursor-pointer h-8 w-8 mb-2 hover:bg-blue-100 dark-hover:bg-dark-700"
                          wire:click="userReacted('like')"
                        >
                          <img src="https://cdn.devdojo.com/images/emojis/like.png" class="w-5 h-5" />
                        </div>
                        <div
                          class="flex col-span-1 justify-center items-center rounded-md cursor-pointer h-8 w-8 mb-2 hover:bg-blue-100 dark-hover:bg-dark-700"
                          wire:click="userReacted('love')"
                        >
                          <img src="https://cdn.devdojo.com/images/emojis/love.png" class="w-5 h-5" />
                        </div>
                        <div
                          class="flex col-span-1 justify-center items-center rounded-md cursor-pointer h-8 w-8 mb-2 hover:bg-blue-100 dark-hover:bg-dark-700"
                          wire:click="userReacted('raised_hands')"
                        >
                          <img
                            src="https://cdn.devdojo.com/images/emojis/raised_hands.png"
                            class="w-5 h-5"
                          />
                        </div>
                        <div
                          class="flex col-span-1 justify-center items-center rounded-md cursor-pointer h-8 w-8 mb-2 hover:bg-blue-100 dark-hover:bg-dark-700"
                          wire:click="userReacted('clap')"
                        >
                          <img src="https://cdn.devdojo.com/images/emojis/clap.png" class="w-5 h-5" />
                        </div>
                        <div
                          class="flex col-span-1 justify-center items-center rounded-md cursor-pointer h-8 w-8 mb-2 hover:bg-blue-100 dark-hover:bg-dark-700"
                          wire:click="userReacted('beer')"
                        >
                          <img src="https://cdn.devdojo.com/images/emojis/beer.png" class="w-5 h-5" />
                        </div>
                        <div
                          class="flex col-span-1 justify-center items-center rounded-md cursor-pointer h-8 w-8 mb-2 hover:bg-blue-100 dark-hover:bg-dark-700"
                          wire:click="userReacted('beers')"
                        >
                          <img
                            src="https://cdn.devdojo.com/images/emojis/beers.png"
                            class="w-5 h-5"
                          />
                        </div>
                        <div
                          class="flex col-span-1 justify-center items-center rounded-md cursor-pointer h-8 w-8 mb-2 hover:bg-blue-100 dark-hover:bg-dark-700"
                          wire:click="userReacted('sushi')"
                        >
                          <img
                            src="https://cdn.devdojo.com/images/emojis/sushi.png"
                            class="w-5 h-5"
                          />
                        </div>
                        <div
                          class="flex col-span-1 justify-center items-center rounded-md cursor-pointer h-8 w-8 mb-2 hover:bg-blue-100 dark-hover:bg-dark-700"
                          wire:click="userReacted('fire')"
                        >
                          <img src="https://cdn.devdojo.com/images/emojis/fire.png" class="w-5 h-5" />
                        </div>
                        <div
                          class="flex col-span-1 justify-center items-center rounded-md cursor-pointer h-8 w-8 mb-2 hover:bg-blue-100 dark-hover:bg-dark-700"
                          wire:click="userReacted('unicorn')"
                        >
                          <img
                            src="https://cdn.devdojo.com/images/emojis/unicorn.png"
                            class="w-5 h-5"
                          />
                        </div>
                        <div
                          class="flex col-span-1 justify-center items-center rounded-md cursor-pointer h-8 w-8 mb-2 hover:bg-blue-100 dark-hover:bg-dark-700"
                          wire:click="userReacted('crystal_ball')"
                        >
                          <img
                            src="https://cdn.devdojo.com/images/emojis/crystal_ball.png"
                            class="w-5 h-5"
                          />
                        </div>
                        <div
                          class="flex col-span-1 justify-center items-center rounded-md cursor-pointer h-8 w-8 mb-2 hover:bg-blue-100 dark-hover:bg-dark-700"
                          wire:click="userReacted('popper')"
                        >
                          <img
                            src="https://cdn.devdojo.com/images/emojis/popper.png"
                            class="w-5 h-5"
                          />
                        </div>
                        <div
                          class="flex col-span-1 justify-center items-center rounded-md cursor-pointer h-8 w-8 mb-2 hover:bg-blue-100 dark-hover:bg-dark-700"
                          wire:click="userReacted('smile')"
                        >
                          <img
                            src="https://cdn.devdojo.com/images/emojis/smile.png"
                            class="w-5 h-5"
                          />
                        </div>
                        <div
                          class="flex col-span-1 justify-center items-center rounded-md cursor-pointer h-8 w-8 mb-2 hover:bg-blue-100 dark-hover:bg-dark-700"
                          wire:click="userReacted('thinker')"
                        >
                          <img
                            src="https://cdn.devdojo.com/images/emojis/thinker.png"
                            class="w-5 h-5"
                          />
                        </div>
                        <div
                          class="flex col-span-1 justify-center items-center rounded-md cursor-pointer h-8 w-8 mb-2 hover:bg-blue-100 dark-hover:bg-dark-700"
                          wire:click="userReacted('joy')"
                        >
                          <img src="https://cdn.devdojo.com/images/emojis/joy.png" class="w-5 h-5" />
                        </div>
                        <div
                          class="flex col-span-1 justify-center items-center rounded-md cursor-pointer h-8 w-8 mb-2 hover:bg-blue-100 dark-hover:bg-dark-700"
                          wire:click="userReacted('heart_eyes')"
                        >
                          <img
                            src="https://cdn.devdojo.com/images/emojis/heart_eyes.png"
                            class="w-5 h-5"
                          />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="ml-3">
          <div wire:id="cWE4j87Nc2sTI5Zeon5S">
            <div class="relative flex items-center justify-center bookmark">
              <div
                class="relative flex items-center justify-center w-8 h-8 px-3 py-1 rounded-md cursor-pointer bg-gray-100 dark:bg-dark-800 dark-hover:bg-dark-750 hover:bg-blue-100 text-gray-600"
                wire:click="bookmark()"
              >
                <svg
                  class="absolute w-3 fill-current"
                  viewBox="0 0 384 512"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M336 0H48C21.49 0 0 21.49 0 48v464l192-112 192 112V48c0-26.51-21.49-48-48-48zm0 428.43l-144-84-144 84V54a6 6 0 016-6h276c3.314 0 6 2.683 6 5.996V428.43z"
                  />
                </svg>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script lang="ts" setup>
defineProps({
  title: String,
  description: String,
})

const emit = defineEmits(['select'])

/**
 * @desc Click event on the entire card
 */
function selectCard () {
  emit('select')
}
</script>
