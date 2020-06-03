<template>
  <form
    @submit.prevent="submit"
    class="w-full flex"
  >

    <!-- Avatar -->
    <div class="mr-3">
      <img
          :src="$user.avatar_url"
          class="w-12 rounded-full"
        >
    </div>

    <div class="flex-grow">
      
      <!-- Compose -->
      <app-qweet-compose-textarea v-model="form.body" />

      <span class="text-gray-700">
        {{ media }}
      </span>

      <div class="flex justify-between">
        <ul class="flex items-center">
          <li class="mr-4">
            <app-qweet-compose-media-button
              @selected="handleMediaSelected"
              id="media-compose"
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
            Qweet
          </button>
        </div>
      </div>

    </div>

  </form>
</template>

<script>
import axios from 'axios'

export default {
  data () {
    return {
      form: {
        body: '',
        media: []
      },
      media: {
        images: [],
        video: null
      },
      mediaTypes: {}
    }
  },
  mounted () {
    this.getMediaTypes()
  },
  methods: {
    async submit () {
      try {
        await axios.post('/api/qweets', this.form)
        this.form.body = ''
      } catch (e) {
        console.log(e)
      }
    },
    async getMediaTypes () {
      try {
        const res = await axios.get('/api/media/types')
        this.mediaTypes = res.data.data
      } catch (e) {
        console.log(e)
      }
    },
    handleMediaSelected (files) {
      const filesList = Array.from(files).slice(0, 4).forEach((file) => {
        if (this.mediaTypes.image.includes(file.type)) {
          this.media.images.push(file)
        }

        if (this.mediaTypes.video.includes(file.type)) {
          this.media.video = file
        }
      })

      if (this.media.video) {
        this.media.images = []
      }
    }
  }
}
</script>
