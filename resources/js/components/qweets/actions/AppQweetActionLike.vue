<template>
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
      <path d="M12.76 3.76a6 6 0 0 1 8.48 8.48l-8.53 8.54a1 1 0 0 1-1.42 0l-8.53-8.54a6 6 0 0 1 8.48-8.48l.76.75.76-.75zm7.07 7.07a4 4 0 1 0-5.66-5.66l-1.46 1.47a1 1 0 0 1-1.42 0L9.83 5.17a4 4 0 1 0-5.66 5.66L12 18.66l7.83-7.83z"/>
    </svg>
    <span>
      {{ qweet.likes_count }}
    </span>
  </a>
</template>

<script>
export default {
  props: {
    qweet: {
      type: Object,
      required: true
    }
  }
}
</script>
