<template>
  <div class="inline-block hover:bg-gray-800 border-b border-gray-800 cursor-pointer p-4">
    
    <div class="flex">

      <!-- Avatar -->
      <div class="flex-shrink-0 mr-3">
        <img
          :src="qweet.user.avatar_url"
          class="w-12 rounded-full"
        >
      </div>

      <div>

        <!-- Handle & username -->
        <app-qweet-username :user="qweet.user"></app-qweet-username>

        <!-- Body -->
        <p class="text-gray-300 whitespace-pre-wrap">{{ qweet.body }}</p>

      </div>
    </div>

  </div>
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