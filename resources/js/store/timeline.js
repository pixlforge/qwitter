import axios from 'axios'

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
      console.log(id, count)
      state.qweets = state.qweets.map((qweet) => {
        if (qweet.id === id) {
          qweet.likes_count = count
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

      return res
    }
  }
}