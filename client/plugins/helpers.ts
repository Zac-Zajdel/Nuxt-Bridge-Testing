import type { Plugin } from '@nuxt/types'
import { ucFirst, shortenString } from '@/utils'

const sleep = (milliseconds: number) => {
  return new Promise(resolve => setTimeout(resolve, milliseconds))
}

declare module 'vue/types/vue' {
  interface Vue {
    $sleep: typeof sleep
    $ucFirst: typeof ucFirst
    $shortenString: typeof shortenString
  }
}

const plugins: Plugin = (_context: Object, inject: Function) => {
  inject('sleep', sleep)
  inject('ucFirst', ucFirst)
  inject('shortenString', shortenString)
}
export default plugins
