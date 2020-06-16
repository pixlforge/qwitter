import axios from 'axios'

import getters from './qweet/getters'
import mutations from './qweet/mutations'
import actions from './qweet/actions'

export default {
  namespaced: true,
  state: {
    notifications: [],
    qweets: []
  },
  getters: {
    ...getters,
    notifications (state) {
      return state.notifications
    },
    qweetIdsFromNotifications (state) {
      return state.notifications.map((notification) => notification.data.qweet.id)
    }
  },
  mutations: {
    ...mutations,
    SET_NOTIFICATIONS (state, data) {
      state.notifications.push(...data)
    }
  },
  actions: {
    ...actions,
    async getNotifications ({ commit, dispatch, getters }, url) {
      const notifications = await axios.get(url)

      commit('SET_NOTIFICATIONS', notifications.data.data)

      dispatch('getQweets', `/api/qweets?ids=${getters.qweetIdsFromNotifications.join(',')}`)
      
      return notifications
    }
  }
}
