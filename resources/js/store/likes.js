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
  actions: {}
}