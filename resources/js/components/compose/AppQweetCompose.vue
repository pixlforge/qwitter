<template>
  <form
    @submit.prevent
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
      <textarea
        id=""
        placeholder="What's happening?"
        class="w-full bg-gray-900 outline-none focus:shadow-outline text-lg resize-none mb-2"
      ></textarea>

      <div class="flex justify-between">
        <div>
          <!-- Actions -->
        </div>

        <div>
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