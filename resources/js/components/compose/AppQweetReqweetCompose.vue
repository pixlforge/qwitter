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
        placeholder="Add a comment"
      />

      <div class="flex justify-end">
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
            Reqweet
          </button>
        </div>
      </div>

    </div>

  </form>
</template>

<script>
import axios from 'axios'
import compose from '../../mixins/compose'
import { mapActions } from 'vuex'

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
    ...mapActions({
      quoteQweet: 'timeline/quoteQweet'
    }),
    async post () {
      await this.quoteQweet({
        qweet: this.qweet,
        data: this.form
      })

      this.$emit('quote:success')
    }
  }
}
</script>
