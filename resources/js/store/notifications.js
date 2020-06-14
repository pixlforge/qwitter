import axios from 'axios'

export default {
  namespaced: true,
  state: {
    notifications: []
  },
  getters: {
    notifications (state) {
      return state.notifications
    }
  },
  mutations: {
    SET_NOTIFICATIONS (state, data) {
      state.notifications.push(...data)
    }
  },
  actions: {
    async getNotifications ({ commit }, url) {
      const notifications = await axios.get(url)

      commit('SET_NOTIFICATIONS', notifications.data.data)
      
      return notifications
    }
  }
}
