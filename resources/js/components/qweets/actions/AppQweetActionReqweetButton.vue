<template>
  <a
    href="#"
    :class="{
    'text-green-600': reqweeted,
    'text-gray-600 hover:text-gray-200': !reqweeted
  }"
    class="flex items-center transition-colors duration-100 ease-out"
  >
    <svg
      xmlns="http://www.w3.org/2000/svg"
      viewBox="0 0 24 24"
      width="24"
      height="24"
      class="w-5 fill-current mr-1"
    >
      <path d="M5.41 16H18a2 2 0 0 0 2-2 1 1 0 0 1 2 0 4 4 0 0 1-4 4H5.41l2.3 2.3a1 1 0 0 1-1.42 1.4l-4-4a1 1 0 0 1 0-1.4l4-4a1 1 0 1 1 1.42 1.4L5.4 16zM6 8a2 2 0 0 0-2 2 1 1 0 0 1-2 0 4 4 0 0 1 4-4h12.59l-2.3-2.3a1 1 0 1 1 1.42-1.4l4 4a1 1 0 0 1 0 1.4l-4 4a1 1 0 0 1-1.42-1.4L18.6 8H6z"/>
    </svg>
    <span>
      {{ qweet.reqweets_count }}
    </span>
  </a>
</template>

<script>
import { mapGetters } from 'vuex'

export default {
  props: {
    qweet: {
      type: Object,
      required: true
    }
  },
  computed: {
    ...mapGetters({
      reqweets: 'reqweets/reqweets'
    }),
    reqweeted () {
      return this.reqweets.includes(this.qweet.id)
    }
  },
}
</script>
