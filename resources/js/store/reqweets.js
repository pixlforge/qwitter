import axios from 'axios'
import { without } from 'lodash'

export default {
  namespaced: true,
  state: {
    reqweets: []
  },
  getters: {
    reqweets (state) {
      return state.reqweets
    }
  },
  mutations: {
    SET_REQWEETS (state, reqweets) {
      state.reqweets.push(...reqweets)
    },
    // ADD_REQWEET (state, id) {
    //   state.reqweets.push(id)
    // },
    // REMOVE_REQWEET (state, id) {
    //   state.reqweets = without(state.reqweets, id)
    // }
  },
  actions: {
    // async reqweetQweet (_, qweet) {
    //   await axios.post(`/api/qweets/${qweet.id}/reqweets`)
    // },
    // async unreqweetQweet (_, qweet) {
    //   await axios.delete(`/api/qweets/${qweet.id}/reqweets`)
    // },
    // syncReqweet ({ state, commit }, id) {
    //   if (state.reqweets.includes(id)) {
    //     commit('REMOVE_REQWEET', id)
    //     return
    //   }

    //   commit('ADD_REQWEET', id)
    // }
  }
}