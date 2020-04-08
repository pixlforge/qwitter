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
    }
  },
  actions: {
    async getQweets ({ commit }, url) {
      const res = await axios.get(url)

      commit('SET_QWEETS', res.data.data)

      return res
    }
  }
}