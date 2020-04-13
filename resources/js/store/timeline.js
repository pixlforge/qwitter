import axios from 'axios'
import { get } from 'lodash'

export default {
  namespaced: true,
  state: {
    qweets: []
  },
  getters: {
    qweets (state) {
      return state.qweets
        .sort((a, b) => b.created_at - a.created_at)
    }
  },
  mutations: {
    SET_QWEETS (state, qweets) {
      state.qweets.push(
        ...qweets.filter((qweet) => {
          return !state.qweets.map((q) => q.id).includes(qweet.id)
        })
      )
    },
    SET_LIKES (state, { id, count }) {
      state.qweets = state.qweets.map((qweet) => {
        if (qweet.id === id) {
          qweet.likes_count = count
        }

        if (get(qweet.original_qweet, 'id') === id) {
          qweet.original_qweet.likes_count = count
        }

        return qweet
      })
    }
  },
  actions: {
    async getQweets ({ commit }, url) {
      const res = await axios.get(url)

      commit('SET_QWEETS', res.data.data)

      commit('likes/SET_LIKES', res.data.meta.likes, { root: true })

      commit('reqweets/SET_REQWEETS', res.data.meta.reqweets, { root: true })

      return res
    }
  }
}