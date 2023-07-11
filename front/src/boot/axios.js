import { boot } from 'quasar/wrappers'
import axios from 'axios'
import { useCounterStore } from 'stores/example-store'
import moment from 'moment'

// Be careful when using SSR for cross-request state pollution
// due to creating a Singleton instance here;
// If any client changes this (global) instance, it might be a
// good idea to move this instance creation inside of the
// "export default () => {}" function below (which runs individually
// for each client)
const api = axios.create({ baseURL: 'https://api.example.com' })

export default boot(({ app }) => {
  // for use inside Vue files (Options API) through this.$axios and this.$api
  app.config.globalProperties.$store = useCounterStore()
  app.config.globalProperties.$axios = axios.create({ baseURL: import.meta.env.VITE_BACK_API })
  app.config.globalProperties.$filters = {
    dateDmY (fecha) {
      const meses = ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Set', 'Nov', 'Dic']
      const mes = meses[moment(String(fecha)).format('MM') - 1]
      if (!fecha) return ''
      const date = moment(String(fecha)).format('DD') + ' ' + mes + ' ' + moment(String(fecha)).format('YYYY')
      return date
    },
    dateDay (fecha) {
      const dias = ['Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab', 'Dom']
      return dias[moment(String(fecha)).format('d') - 1]
    },
    dateTime (fecha) {
      if (!fecha) return ''
      const date = moment(String(fecha)).format('hh:mm A')
      return date
    }
  }
  app.config.globalProperties.$url = import.meta.env.VITE_BACK_API
  // ^ ^ ^ this will allow you to use this.$axios (for Vue Options API form)
  //       so you won't necessarily have to import axios in each vue file

  app.config.globalProperties.$api = api
  // ^ ^ ^ this will allow you to use this.$api (for Vue Options API form)
  //       so you can easily perform requests against your app's API
})

export { api }
