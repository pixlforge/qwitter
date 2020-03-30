import axios from 'axios'

export default {
  namespaced: true,
  state: {
    qweets: []
  },
  getters: {
    qweets (state) {
      return state.qweets
    }
  },
  mutations: {
    SET_QWEETS (state, qweets) {
      state.qweets.push(...qweets)
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