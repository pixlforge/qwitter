<template>
  <div class="flex">

    <!-- Avatar -->
    <div class="flex-shrink-0 mr-3">
      <img
        :src="qweet.user.avatar_url"
        class="w-12 rounded-full"
      >
    </div>

    <div class="flex-grow">

      <!-- Handle & username -->
      <app-qweet-username :user="qweet.user"></app-qweet-username>

      <!-- Body -->
      <p class="text-gray-300 whitespace-pre-wrap">{{ qweet.body }}</p>

      <div
        v-if="images.length"
        class="flex flex-wrap rounded-lg overflow-hidden my-4"
      >
        <div
          v-for="(image, index) in images"
          :key="index"
          class="w-1/2 flex-grow"
        >
          <img
            :src="image.url"
            alt="Image"
            class="w-full block"
          >
        </div>
      </div>

      <!-- Actions -->
      <app-qweet-actions-group :qweet="qweet"/>

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
  },
  computed: {
    images () {
      return this.qweet.media.data.filter(m => m.type === 'image')
    },
    video () {
      return this.qweet.media.data.filter(m => m.type === 'video')
    }
  }
}
</script>
