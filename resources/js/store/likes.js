import axios from 'axios'
import { without } from 'lodash'

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
    },
    ADD_LIKE (state, id) {
      state.likes.push(id)
    },
    REMOVE_LIKE (state, id) {
      state.likes = without(state.likes, id)
    }
  },
  actions: {
    async likeQweet (_, qweet) {
      await axios.post(`/api/qweets/${qweet.id}/likes`)
    },
    async unlikeQweet (_, qweet) {
      await axios.delete(`/api/qweets/${qweet.id}/likes`)
    },
    syncLike ({ state, commit }, id) {
      if (state.likes.includes(id)) {
        commit('REMOVE_LIKE', id)
        return
      }

      commit('ADD_LIKE', id)
    }
  }
}