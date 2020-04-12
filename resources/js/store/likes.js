import axios from 'axios'

export default {
  namespaced: true,
  state: {
    likes: []
  },
  getters: {
    likes (state) {
      return state.likes
    }
  },
  mutations: {
    SET_LIKES (state, likes) {
      state.likes.push(...likes)
    }
  },
  actions: {
    async likeQweet (_, qweet) {
      await axios.post(`/api/qweets/${qweet.id}/likes`)
    },
    async unlikeQweet (_, qweet) {
      await axios.delete(`/api/qweets/${qweet.id}/likes`)
    }
  }
}