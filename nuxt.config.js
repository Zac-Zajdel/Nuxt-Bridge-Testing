
export default {
  /**
  * Nuxt.js root directory
  * See https://nuxtjs.org/api/configuration-srcdir/
  */
  srcDir: 'client/',

  /**
  * Nuxt target
  * See https://nuxtjs.org/api/configuration-target
  */
  target: 'server',

  /**
  * Headers of the page
  * See https://nuxtjs.org/api/configuration-head
  */
  head: {
    title: 'Venture Code',
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      { hid: 'description', name: 'description', content: process.env.npm_package_description || '' },
    ],
    link: [
      { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' },
    ],
  },

  /**
  * Global CSS
  */
  css: [
  ],

  /**
  * Plugins to load before mounting the App
  * https://nuxtjs.org/guide/plugins
  */
  plugins: [
    // https://github.com/simplesmiler/vue-clickaway
    '~/plugins/clickAway',
  ],

  /**
  * Auto import components
  * See https://nuxtjs.org/api/configuration-components
  */
  components: [
    '@/components',
    '@/components/cards',
    '@/components/icons',
  ],

  /**
   * https://nuxtjs.org/docs/2.x/directory-structure/middleware
   */
  router: {
    middleware: ['auth'],
  },

  // https://auth.nuxtjs.org/providers/laravel-sanctum
  auth: {
    strategies: {
      laravelSanctum: {
        provider: 'laravel/sanctum',
        url: 'http://localhost:8000',
        endpoints: {
          login: {
            url: '/api/login',
          },
        },
      },
    },
    redirect: {
      login: '/login',
      logout: '/login',
      home: '/',
    },
  },

  compilerOptions: {
    types: [
      '@nuxtjs/auth-next',
    ],
  },

  /**
  * Nuxt.js dev-modules
  */
  buildModules: [
    // https://tailwindcss.nuxtjs.org/
    '@nuxtjs/tailwindcss',

    // https://typescript.nuxtjs.org/
    '@nuxt/typescript-build',

    // https://composition-api.nuxtjs.org/
    '@nuxtjs/composition-api/module',

    // https://typed-vuex.roe.dev/
    'nuxt-typed-vuex',

    // https://color-mode.nuxtjs.org/
    '@nuxtjs/color-mode',

    // https://github.com/antfu/unplugin-auto-import
    [
      'unplugin-auto-import/nuxt',
      {
        dts: 'client/types/auto-imports.d.ts',
        imports: [
          '@vueuse/core',
          '@nuxtjs/composition-api',
        ],
        presetOverriding: true,
      },
    ],
  ],

  tailwindcss: {
    mode: 'jit',
  },

  /**
  * Nuxt.js modules
  */
  modules: [
    // Doc: https://axios.nuxtjs.org/usage
    '@nuxtjs/axios',

    // Doc: https://github.com/nuxt-community/auth-module
    '@nuxtjs/auth-next',

    // Doc: https://github.com/acidjazz/nuxt-tailvue
    ['nuxt-tailvue', { all: true }],
  ],

  /**
  * Axios module configuration
  * See https://axios.nuxtjs.org/options
  */
  axios: {
    credentials: true,
    baseURL: process.env.API_URL,
    headers: {
      accept: 'application/json',
    },
  },

  /**
  * Build configuration
  * See https://nuxtjs.org/api/configuration-build/
  */
  build: {
  },

  /**
  * Runtime Config
  * See https://nuxtjs.org/guide/runtime-config/
  */
  publicRuntimeConfig: {
    apiUrl: process.env.API_URL,
  },
}
