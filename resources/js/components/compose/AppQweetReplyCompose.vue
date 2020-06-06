<template>
  <form
    @submit.prevent="submit"
    class="w-full flex"
  >

    <!-- Avatar -->
    <div class="flex-shrink-0 mr-3">
      <img
          :src="$user.avatar_url"
          class="w-12 rounded-full"
        >
    </div>

    <div class="flex-grow">
      
      <!-- Compose -->
      <app-qweet-compose-textarea
        v-model="form.body"
        placeholder="Qweet your reply"
      />

      <!-- Media upload progress -->
      <app-qweet-media-progress
        v-if="media.progress"
        :progress="media.progress"
        class="mb-4"
      />

      <!-- Image preview -->
      <app-qweet-image-preview
        v-if="media.images.length"
        @image:remove="handleImageRemove"
        :images="media.images"
      />

      <!-- Video preview -->
      <app-qweet-video-preview
        v-if="media.video"
        @video:remove="handleVideoRemove"
        :video="media.video"
      />

      <div class="flex justify-between">
        <ul class="flex items-center">
          <li class="mr-4">
            <app-qweet-compose-media-button
              @selected="handleMediaSelected"
              id="media-compose-reply"
            />
          </li>
        </ul>

        <div class="flex justify-end items-center">

          <div>
            <app-qweet-compose-limit
              :body="form.body"
              class="mr-2"
            />
          </div>
          
          <button
            type="submit"
            class="bg-blue-500 rounded-full font-bold leading-none text-center px-4 py-3"
          >
            Reply
          </button>
        </div>
      </div>

    </div>

  </form>
</template>

<script>
import axios from 'axios'
import compose from '../../mixins/compose'

export default {
  mixins: [
    compose
  ],
  props: {
    qweet: {
      type: Object,
      required: true
    }
  },
  methods: {
    async post () {
      console.log('Reply')
      this.$emit('reply:success')
    }
  }
}
</script>
