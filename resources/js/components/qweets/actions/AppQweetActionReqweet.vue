<template>
  <app-dropdown>
    <template slot="trigger">
      <a
        href="#"
        class="flex items-center text-sm text-gray-600"
      >
        <svg
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 24 24"
          width="24"
          height="24"
          class="w-4 fill-current mr-2"
        >
          <path d="M5.41 16H18a2 2 0 0 0 2-2 1 1 0 0 1 2 0 4 4 0 0 1-4 4H5.41l2.3 2.3a1 1 0 0 1-1.42 1.4l-4-4a1 1 0 0 1 0-1.4l4-4a1 1 0 1 1 1.42 1.4L5.4 16zM6 8a2 2 0 0 0-2 2 1 1 0 0 1-2 0 4 4 0 0 1 4-4h12.59l-2.3-2.3a1 1 0 1 1 1.42-1.4l4 4a1 1 0 0 1 0 1.4l-4 4a1 1 0 0 1-1.42-1.4L18.6 8H6z"/>
        </svg>
        <span>
          {{ qweet.reqweets_count }}
        </span>
      </a>
    </template>

    <!-- Reqweet -->
    <app-dropdown-item @click.prevent="log">
      Reqweet
    </app-dropdown-item>

    <!-- Reqweet with comment -->
    <app-dropdown-item @click.prevent="log">
      Reqweet with comment
    </app-dropdown-item>

  </app-dropdown>
</template>

<script>
export default {
  props: {
    qweet: {
      type: Object,
      required: true
    }
  },
  methods: {
    log () {
      console.log('Yo')
    }
  }
}
</script>
